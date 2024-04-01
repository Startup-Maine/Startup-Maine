<?php
get_header();

$open = explode(',', $_COOKIE['schedule']) ?: array('monday');

$days = array(
	'Monday' => array(),
	'Tuesday' => array(),
	'Wednesday' => array(),
	'Thursday' => array(),
	'Friday' => array(),
    'Saturday' => array(),
);
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
    $session->program_note = get_field('program_note', $session);
	
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
	
        <h1>Maine Startup Week 2024</h1>
        <p><em>Program schedule subject to change</em></p>
			<a href="https://events.humanitix.com/maine-startup-week/tickets" style="border-radius:4px;background:#353337;font-family: Helvetica;font-size:16px;color:#FFFFFF;text-align:center;padding: 4px 18px;text-decoration: none;display: inline-block;">Purchase Week Pass</a>
<div id="schedule">
			<?php foreach ($days as $day => $slots) {
				if (empty($slots)) continue;
				ksort($slots);
				$key = sanitize_title($day);
				?>
				<h1 data-parent="#schedule" href="#<?php echo $key?>"><?php echo $day?></h1>
				<div  id="<?php echo $key?>">
				<?php foreach ($slots as $key => $sessions) {
					list ($start, $end, $type) = explode('|', $key);
					?>
				<div class="slot">
					<div class="info">
						<h3><?php echo mscw_time_range($start, $end)?></h3>
						<?php if (!empty($type)) {?><small><?php echo $type?></small><?php }?>
					</div>
					<?php foreach ($sessions as $session) {?>
						<div class="session <?php echo sanitize_title_with_dashes($session->type)?>">
							<div class="inner">
								<small><?php echo $session->venue?></small>
								<a href="<?php echo $session->link?>" class="title"><?php echo $session->post_title?></a>
                      			<small><?php echo $session->program_note?></small>
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

<?php
get_footer();