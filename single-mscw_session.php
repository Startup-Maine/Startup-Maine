<?php
get_header();
the_post();
$presenters = get_field('presenters');

//https://placeholdit.imgix.net/~text?txtsize=48&bg=cccccc&txt=512%C3%97512&w=512&h=512
?>

<div class="container">
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<div class="detail">
				<h1><?php the_title()?></h1>
				<div class="meta">
					<?php the_field('type')?>
					<small><?php the_field('day')?> | <?php the_field('start')?>–<?php the_field('end')?> | <?php the_field('venue')?></small>
				</div>
				<?php if ($presenters) {?>
				<div class="row more-details">
					<div class="col-md-7">
						<?php if ($subtitle = get_field('subtitle')) {?><h3><?php echo $subtitle?></h3><?php }?>
						<?php the_content()?>
					</div>
					<div class="col-md-5">
						<div class="row">
							<?php foreach ($presenters as $presenter) {?>
							<a class="col-md-6 presenter" href="<?php echo get_author_posts_url($presenter['ID'])?>">
								<?php echo get_avatar($presenter['ID'], 512, null, $presenter['display_name'], array('class' => 'img-responsive'))?>
								<?php echo $presenter['display_name']?>
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