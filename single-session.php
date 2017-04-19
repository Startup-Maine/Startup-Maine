<?php
get_header();
the_post();
$speakers = get_field('speakers');


?>

<div class="container">
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<div class="detail">
				<h1><?php the_title()?></h1>
				<div class="meta">
					<span><?php the_field('type')?></span>
					<small><?php the_field('day')?> | <?php the_field('start')?>–<?php the_field('end')?> | <?php the_field('venue')?></small>
				</div>
				<?php if ($speakers) {?>
				<div class="row more-details">
					<div class="col-md-7">
						<?php if ($subtitle = get_field('subtitle')) {?><h3><?php echo $subtitle?></h3><?php }?>
						<?php the_content()?>
					</div>
					<div class="col-md-5">
						<div class="row">
							<?php foreach ($speakers as $speaker) {?>
							<a class="col-md-6" href="<?php echo get_permalink($speaker->ID)?>">
								<?php 
								echo mscw_speaker_img($speaker->ID);
								echo $speaker->post_title;
								?>
							</a>
							<?php }?>
						</div>
					</div>
				</div>
				<?php } else {?>
					<h3><?php the_field('subtitle')?></h3>
					<?php the_content()?>
				<?php }?>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();