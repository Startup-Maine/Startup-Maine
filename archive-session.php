<?php
get_header();

$days = array(
	'Monday' => array(),
	'Tuesday' => array(),
	'Wednesday' => array(),
	'Thursday' => array(),
	'Friday' => array(),
	'Saturday' => array(),
);
$dates = array(
	'Monday' => 'May 13',
	'Tuesday' => 'May 14',
	'Wednesday' => 'May 15',
	'Thursday' => 'May 16',
	'Friday' => 'May 17',
	'Saturday' => 'May 18',
);
$speakers = get_posts(array(
	'post_type' => 'speaker',
	'numberposts' => -1,
));
$session_speakers = array();
foreach ($speakers as $speaker) {
	if ($sessions = get_field('sessions', $speaker)) {
		foreach ($sessions as $session) {
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
	$session->day = get_field('day', $session);
	$session->type = get_field('type', $session);
	$session->start = get_field('start', $session);
	$session->end = get_field('end', $session);
	$session->venue = get_field('venue', $session);
	$session->link = get_permalink($session);
	$session->speakers = isset($session_speakers[$session->ID]) ? implode(', ', $session_speakers[$session->ID]) : null;
	$session->program_note = get_field('program_note', $session);

	if (!array_key_exists($session->day, $days)) continue;
	$key = implode('|', array($session->start, $session->end, $session->type));
	if (!array_key_exists($key, $days[$session->day])) $days[$session->day][$key] = array();
	$days[$session->day][$key][] = $session;
}
?>
<link rel="preload" href="https://community.slicpix.com/js/embed/slicpix-embed-orchestrator.js" as="script" onload="var script = document.createElement('script');script.src = this.href;document.head.appendChild(script);">
<link rel="preload" href="https://community.slicpix.com/js/embed/slicpix-embed-interact.js" as="script" onload="var script = document.createElement('script');script.src = this.href;document.head.appendChild(script);">
<script language="javascript" type="text/javascript" src="https://community.slicpix.com/js/embed/slicpix-embed-primer.js" async></script>
<div class="container" id="program">
	<div id="metadata">
		<h1>Startup Maine Week</h1>
		<h3>May 14-17, 2024</h3>
		<p>Join us for expert insight, skill building, and meaningful connections to make big things happen. Week passes are only $39 ($10 for students). Sales support programming by Startup Maine, a 501c3 organization.</p>
		<div>
			<p>Daily schedules: <?php foreach ($days as $day => $slots) {
									if (empty($slots)) continue;
									$key = sanitize_title($day);
								?>
					<a href="#<?php echo $key ?>"><?php echo $day ?></a>
				<?php } ?>
			</p>

		</div>
		<p><em>Program schedule subject to change</em></p>
		<a href="https://events.humanitix.com/maine-startup-week/tickets" style="border-radius:4px;background:#353337;font-family: Helvetica;font-size:16px;color:#FFFFFF;text-align:center;padding: 4px 18px;text-decoration: none;display: inline-block;">
			Purchase Week Pass
		</a>
		<a href="#map" style="border-radius:4px;background:#353337;font-family: Helvetica;font-size:16px;color:#FFFFFF;text-align:center;padding: 4px 18px;text-decoration: none;display: inline-block;">
			Venue and Session Map
		</a>


	</div>
	<div id="schedule">
		<?php foreach ($days as $day => $slots) {
			if (empty($slots)) continue;
			ksort($slots);
			$key = sanitize_title($day);
		?>
			<h1><?php echo $day, ", ", $dates[$day] ?></h1>
			<div id="<?php echo $key ?>">
				<?php foreach ($slots as $key => $sessions) {
					list($start, $end, $type) = explode('|', $key);
				?>
					<div class="slot">
						<div class="info">
							<h3><?php echo mscw_time_range($start, $end) ?></h3>
							<?php if (!empty($type)) { ?><small><?php echo $type ?></small><?php } ?>
						</div>
						<?php foreach ($sessions as $session) {
							$external = str_contains($session->program_note, 'affil') || str_contains($session->program_note, 'Separate');
							$bgcolor = $external ? 'background-color: #cccccc; !important' : '';
						?>
							<div class="session">
								<div class="inner" style="<?php echo $bgcolor ?>">
									<small><?php echo $session->venue ?></small>
									<a href="<?php echo $session->link ?>" class="title"><?php echo $session->post_title ?></a>
									<small><?php echo $session->program_note ?></small>
									<?php echo $session->speakers ?>
								</div>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
	<div id="map">
		<img style="width:100%;" src="/wp-content/uploads/2024/05/startupmaine.webp"></img>
	</div>
</div>
<?php
get_footer();
