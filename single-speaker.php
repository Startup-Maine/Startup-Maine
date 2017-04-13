<?php
get_header();
the_post();
$sessions = get_posts(array(
	'post_type' => 'session',
	'numberposts' => -1,
	'meta_query' => array(
		array(
			'key' => 'speakers',
			'value' => '"' . $post->ID . '"',
			'compare' => 'LIKE',
		),
	),
));
?>

<div class="container">
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<div class="detail">
				<h1><?php the_title()?></h1>
				<h3><?php the_field('title')?></h3>
				<h3><?php the_field('organization')?></h3>
				<div class="row more-details">
					<div class="col-md-7">
						<div class="meta">
							<?php foreach ($sessions as $session) {?>
							<a href="<?php get_permalink($session->ID)?>" class="session">
								<span><?php the_field('type', $session->ID)?></span>
								<small><?php the_field('day', $session->ID)?> | <?php the_field('start', $session->ID)?>–<?php the_field('end', $session->ID)?> | <?php the_field('venue', $session->ID)?></small>
							</a>
							<?php }?>
						</div>
						<?php the_content()?>
					</div>
					<div class="col-md-5">
						<?php echo mscw_speaker_img($post->ID)?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();