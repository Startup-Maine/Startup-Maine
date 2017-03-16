<?php get_header()?>

<div class="container">
	<div class="row">
		<div class="col-md-offset-1 col-md-10 blog">
			<?php 
			while (have_posts()) {
				the_post();
				?>
				<div class="post">
					<div class="row">
						<div class="col-md-3">
							<?php echo get_the_post_thumbnail($post->ID, 'large', array('class' => 'img-responsive'))?>
						</div>
						<div class="col-md-9">
							<small><?php the_date('m.d.y')?></small>
							<h4><a href="<?php the_permalink()?>"><?php the_title()?></a></h4>
							<?php the_excerpt()?>
						</div>
					</div>
				</div>
			<?php }?>
		</div>
	</div>
</div>

<?php get_footer()?>