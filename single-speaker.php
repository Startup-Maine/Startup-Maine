<?php
get_header();
the_post();
$sessions = get_field('sessions');
?>

<div class="container">
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<div id="detail">
				<h1><?php the_title()?></h1>
				<h3><?php the_field('title')?></h3>
				<h3><?php the_field('organization')?></h3>
				<div class="row more-details">
					<div class="col-md-7">
						<?php if (!empty($sessions)) {?>
						<div class="meta">
							<?php foreach ($sessions as $session) {?>
							<a href="<?php echo get_permalink($session->ID)?>" class="session">
								<span><?php echo get_the_title($session)?></span>
								<small><?php the_field('day', $session)?> | <?php echo mscw_time_range(get_field('start', $session), get_field('end', $session->ID))?> | <?php the_field('venue', $session)?></small>
							</a>
							<?php }?>
						</div>
						<?php }
						the_content();
						if ($linkedin = get_field('linkedin')) {?>
							<p><a href="<?php echo $linkedin?>" class="linkedin"><i class="fa fa-linkedin-square"></i> LinkedIn Profile</a></p>
						<?php }
						if ($twitter = get_field('twitter')) {?>
							<p><a href="<?php echo $twitter?>" class="twitter"><i class="fa fa-twitter-square"></i> Twitter Profile</a></p>
						<?php }?>
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