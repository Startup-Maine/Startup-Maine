<?php
get_header();

$searching = !empty($_GET['search']);

$open = explode(',', $_COOKIE['schedule']) ?: array('monday');

$days = array(
	'Monday' => array(),
	'Tuesday' => array(),
	'Wednesday' => array(),
	'Thursday' => array(),
	'Friday' => array(),
);

//get all the speakers, think it's more efficient this way
$speakers = get_posts(array(
	'post_type' => 'speaker',
	'numberposts' => -1,
));
$session_speakers = array();
foreach ($speakers as $speaker) {
	if ($sessions = get_field('sessions', $speaker)) {
		foreach($sessions as $session) {
			if (!isset($session_speakers[$session->ID])) $session_speakers[$session->ID] = array();
			$session_speakers[$session->ID][] = '<a href="' . get_permalink($speaker) . '">' . get_the_title($speaker) . '</a>';
		}
	}
}

//searching
$include = array();
if ($searching) {
	
	//search sessions
	$sessions = get_posts(array(
		'post_type' => 'session',
		'numberposts' => -1,
		's' => sanitize_text_field($_GET['search']),
		'fields' => 'ids',
	));
	
	//also search speakers 
	$speakers = get_posts(array(
		'post_type' => 'speaker',
		'numberposts' => -1,
		's' => sanitize_text_field($_GET['search']),
		'fields' => 'ids',
	));
	
	foreach ($speakers as $speaker) {
		foreach (get_field('sessions', $speaker) as $session) {
			$sessions[] = $session->ID;
		}
	}
	
	$include = array_unique(array_merge($sessions, $speakers));
	
}

$sessions = get_posts(array(
	'post_type' => 'session',
	'numberposts' => -1,
	'orderby' => 'post_title',
	'order' => 'asc',
	'include' => $include,
));

//loop through and group results into daily schedule 'slots'
foreach ($sessions as $session) {
	
	//get custom field values
	$session->day = get_field('day', $session);
	$session->type = get_field('type', $session);
	$session->start = get_field('start', $session);
	$session->end = get_field('end', $session);
	$session->venue = get_field('venue', $session);
	$session->link = get_permalink($session);
	$session->speakers = isset($session_speakers[$session->ID]) ? implode(', ', $session_speakers[$session->ID]) : null;
	
	//day not valid for some reason
	if (!array_key_exists($session->day, $days)) continue;
	
	//store info in key
	$key = implode('|', array($session->start, $session->end, $session->type));
	
	//create slot for session
	if (!array_key_exists($key, $days[$session->day])) $days[$session->day][$key] = array();
	
	//add session to slot
	$days[$session->day][$key][] = $session;

}
//dd($days);
?>

<div class="container" id="program">
	<div class="row">
		<div class="col-md-2 col-md-push-10">
			<form id="program-search">
				<label for="search">Search</label>
				<input type="search" name="search" value="<?php echo $_GET['search']?>">
			</form>
		</div>
		<div class="col-md-9 col-md-pull-2 col-md-offset-1">
			<?php if ($searching) {?>
			<small>Searching Schedule for '<?php echo $_GET['search']?>'</small>
			<?php } else {?>
			<small>Schedule</small>
			<?php }?>
			<div id="schedule">
			<?php foreach ($days as $day => $slots) {
				if (empty($slots)) continue;
				ksort($slots);
				$key = sanitize_title($day);
				?>
				<h1 data-toggle="collapse" data-parent="#schedule" href="#<?php echo $key?>"><?php echo $day?></h1>
				<div class="collapse<?php if ($searching || in_array($key, $open)) {?> in<?php }?>" id="<?php echo $key?>">
				<?php foreach ($slots as $key => $sessions) {
					list ($start, $end, $type) = explode('|', $key);
					?>
				<div class="slot">
					<div class="info">
						<h3><?php echo mscw_time_range($start, $end)?></h3>
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
			<?php 
				$one_open = true;
			}?>
			</div>
		</div>
	</div>
</div>

<?php
mscw_footer();
get_footer();