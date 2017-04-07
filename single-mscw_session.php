<?php
get_header();
the_post();
$presenters = get_field('presenters');
?>

<div class="container">
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<div class="session">
				<h1><?php the_title()?></h1>
				<div class="meta">
					<?php the_field('type')?>
					<small><?php the_field('day')?> | <?php the_field('start')?>–<?php the_field('end')?> | <?php the_field('venue')?></small>
				</div>
				<?php if ($presenters) {?>
				<div class="row">
					<div class="col-md-6">
						<?php if ($subtitle = get_field('subtitle')) {?><h3><?php echo $subtitle?></h3><?php }?>
						<?php the_content()?>
					</div>
					<div class="col-md-6">
						<div class="row">
							<?php foreach ($presenters as $presenter) {?>
							<div class="col-md-6">
								<?php echo $presenter['display_name']?>
							</div>
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