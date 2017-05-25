<?php
get_header();

$speakers = get_posts(array(
	'post_type' => 'speaker',
	'numberposts' => -1,
	'orderby' => 'post_title',
	'order' => 'asc',
));

$people = array(
	'Keynotes' => array(),
	'Panelists & Moderators' => array(),
);

foreach ($speakers as $speaker) {
	$fields = get_fields($speaker->ID);
	$speaker->organization = empty($fields['organization']) ? '' : $fields['organization'];
	$speaker->title = empty($fields['title']) ? '' : $fields['title'];
	$speaker->type = empty($fields['type']) ? '' : $fields['type'];
	if (!array_key_exists($speaker->type, $people)) $people[$speaker->type] = array();
	$people[$speaker->type][] = $speaker;
}
?>

<div class="container">
	<div class="row">
		<div class="col-md-11 col-md-offset-1">
			<small>People</small>
			<h1>Speakers</h1>
			<?php foreach ($people as $type => $speakers) {?>
				<div class="type">
					<h3><?php echo $type?></h3>
					<div class="row">
						<?php foreach ($speakers as $speaker) {?>
						<a class="col-md-2" href="<?php echo get_permalink($speaker->ID)?>">
							<?php echo mscw_speaker_img($speaker->ID)?>
							<div class="meta">
								<strong><?php echo $speaker->post_title?></strong>
								<div><?php echo $speaker->title?></div>
								<div><?php echo $speaker->organization?></div>
							</div>
						</a>
						<?php }?>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
</div>

<?php
get_footer();