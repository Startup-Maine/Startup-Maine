<?php
get_header('yellow');
the_post();
?>

<div class="container">
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<div class="post">
				<div class="row">
					<div class="col-xs-4 col-sm-3">
						<?php echo get_the_post_thumbnail($post->ID, 'large', array('class' => 'img-responsive'))?>
					</div>
					<div class="col-xs-8 col-sm-9">
						<small><?php the_date('m.d.y')?></small>
						<h4><?php the_title()?></h4>
						<?php the_content()?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php 
mscw_footer();
get_footer('yellow');