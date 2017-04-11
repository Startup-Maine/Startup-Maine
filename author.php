<?php
get_header();

$presenter = get_userdata($author);

//dd($presenter);

$sessions = get_posts(array(
	'post_type' => 'mscw_session',
	'numberposts' => -1,
	'meta_query' => array(
		array(
			'key' => 'presenters',
			'value' => '"' . $author . '"',
			'compare' => 'LIKE',
		),
	),
));
?>

<div class="container">
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<div class="detail">
				<h1><?php echo $presenter->display_name?></h1>
				<h3><?php the_field('title')?></h3>
				<h3><?php the_field('organization')?></h3>
				<div class="row more-details">
					<div class="col-md-7">
						<div class="meta">
							<?php foreach ($sessions as $session) {?>
							<a href="<?php get_permalink($session->ID)?>" class="session">
								<?php the_field('type', $session->ID)?>
								<small><?php the_field('day', $session->ID)?> | <?php the_field('start', $session->ID)?>–<?php the_field('end', $session->ID)?> | <?php the_field('venue', $session->ID)?></small>
							</a>
							<?php }?>
						</div>
						<?php echo ($presenter->user_description)?>
					</div>
					<div class="col-md-5">
						<?php echo get_avatar($author, 512, null, $presenter->display_name, array('class' => 'img-responsive'))?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();