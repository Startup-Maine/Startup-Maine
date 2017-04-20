<?php
get_header();

$days = array(
	'Monday' => array(),
	'Tuesday' => array(),
	'Wednesday' => array(),
	'Thursday' => array(),
	'Friday' => array(),
);

$args = array(
	'post_type' => 'session',
	'numberposts' => -1,
);

$searching = !empty($_GET['search']);

if ($searching) {
	$args['s'] = sanitize_text_field($_GET['search']);
}

$sessions = get_posts($args);

foreach ($sessions as $session) {
	
	//get custom field values
	$session->day = get_field('day', $session->ID);
	$session->type = get_field('type', $session->ID);
	$session->start = get_field('start', $session->ID);
	$session->end = get_field('end', $session->ID);
	$session->venue = get_field('venue', $session->ID);
	$session->speakers = get_field('speakers', $session->ID);
	$session->link = get_permalink($session->ID);
	
	if (is_array($session->speakers)) {
		foreach ($session->speakers as &$speaker) {
			$speaker = '<a href="' . get_permalink($speaker->ID) . '">' . $speaker->post_title . '</a>';
		}
		$session->speakers = implode(', ', $session->speakers);
	}

	//day not valid for some reason
	if (!array_key_exists($session->day, $days)) continue;
	
	//store info in key
	$key = implode('|', array(strtotime($session->start), strtotime($session->end), $session->type));
	
	//create slot for session
	if (!array_key_exists($key, $days[$session->day])) $days[$session->day][$key] = array();
	
	//add session to slot
	$days[$session->day][$key][] = $session;

}
//dd($days);
?>

<div class="container">
	<div class="row">
		<div class="col-md-9 col-md-offset-1">
			<?php if ($searching) {?>
			<small>Searching Schedule for '<?php echo $_GET['search']?>'</small>
			<?php } else {?>
			<small>Schedule</small>
			<?php }?>
			
			<div id="schedule">
			<?php foreach ($days as $day => $slots) {
				ksort($slots);			
				?>
				<h1 data-toggle="collapse" data-parent="#schedule" href="#<?php echo sanitize_title($day)?>"><?php echo $day?></h1>
				<div <?php if (!$searching) {?>class="collapse" id="<?php echo sanitize_title($day)?>"<?php }?>>
				<?php foreach ($slots as $key => $sessions) {
					list ($start, $end, $type) = explode('|', $key);
					
					//calculate first time format
					$time_format = (date('a', $start) == date('a', $end)) ? 'g:i' : 'g:i a';
					?>
				<div class="slot">
					<div class="info">
						<h3><?php echo str_replace(':00', '', date($time_format, $start))?>&ndash;<?php echo str_replace(':00', '', date('g:i a', $end))?></h3>
						<?php if (!empty($type)) {?><small><?php echo $type?><?php if (count($sessions) > 1) echo 's'?></small><?php }?>
					</div>
					<?php foreach ($sessions as $session) {?>
						<div class="session <?php echo sanitize_title_with_dashes($session->type)?>">
							<div class="inner">
								<small><?php echo $session->venue?></small>
								<a href="<?php echo $session->link?>" class="title"><?php echo $session->post_title?></a>
								<?php echo $session->speakers?>
							</div>
						</div>
					<?php }?>
				</div>
				<?php }?>
				</div>
			<?php }?>
			</div>
			
		</div>
		<div class="col-md-2">
			<form id="program-search">
				<label for="search">Search</label>
				<input type="search" name="search" value="<?php echo $_GET['search']?>">
			</form>
		</div>
	</div>
</div>

<?php

get_footer();