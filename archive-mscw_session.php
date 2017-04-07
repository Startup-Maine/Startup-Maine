<?php
get_header();

$days = array(
	'Monday' => array(),
	'Tuesday' => array(),
	'Wednesday' => array(),
	'Thursday' => array(),
	'Friday' => array(),
);

$sessions = get_posts(array(
	'post_type' => 'mscw_session',
	'numberposts' => -1,
));

foreach ($sessions as $session) {
	
	//get custom field values
	$session->day = get_field('day', $session->ID);
	$session->type = get_field('type', $session->ID);
	$session->start = get_field('start', $session->ID);
	$session->end = get_field('end', $session->ID);
	$session->venue = get_field('venue', $session->ID);
	$session->presenters = get_field('presenters', $session->ID);
	$session->link = get_permalink($session->ID);
	
	if (is_array($session->presenters)) {
		foreach ($session->presenters as &$presenter) {
			$presenter = '<a href="' . get_author_posts_url($presenter['ID']) . '">' . $presenter['display_name'] . '</a>';
		}
		$session->presenters = implode(', ', $session->presenters);
	}

	//day not valid for some reason
	if (!array_key_exists($session->day, $days)) continue;
	
	//store info in key
	$key = $session->start . '|' . $session->end . '|' . $session->type;
	
	//create slot for session
	if (!array_key_exists($key, $days[$session->day])) $days[$session->day][$key] = array();
	
	//add session to slot
	$days[$session->day][$key][] = $session;

}
//dd($days);
?>

<div class="container">
	<div class="row">
		<div class="col-md-9 col-md-offset-1 schedule">
			<small>Schedule</small>
			
			<?php foreach ($days as $day => $slots) {
				ksort($slots);			
				?>
				<h1><?php echo $day?></h1>
				<?php foreach ($slots as $key => $sessions) {
					list ($start, $end, $type) = explode('|', $key);
					?>
				<div class="slot">
					<div class="info">
						<h3><?php echo date('g:i a', strtotime($start))?>&ndash;<?php echo date('g:i a', strtotime($end))?></h3>
						<?php if (!empty($type)) {?><small><?php echo $type?><?php if (count($sessions) > 1) echo 's'?></small><?php }?>
					</div>
					<?php foreach ($sessions as $session) {?>
						<div class="session <?php echo sanitize_title_with_dashes($session->type)?>">
							<div class="inner">
								<small><?php echo $session->venue?></small>
								<a href="<?php echo $session->link?>" class="title"><?php echo $session->post_title?></a>
								<?php echo $session->presenters?>
							</div>
						</div>
					<?php }?>
				</div>
				<?php }?>
			<?php }?>
		</div>
		<div class="col-md-2">
			<form id="program-search">
				<label for="search">Search</label>
				<input type="search" id="search">
			</form>
		</div>
	</div>
</div>

<?php

get_footer();