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
		<div class="col-md-8 col-md-offset-1 schedule">
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
						<?php if (!empty($type)) {?><small><?php echo $type?>s</small><?php }?>
					</div>
					<?php foreach ($sessions as $session) {?>
						<div class="session">
							<?php echo $session->venue?>
							<a href=""><?php echo $session->post_title?></a>
							<?php echo $session->presenters?>
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