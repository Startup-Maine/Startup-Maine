<?php get_header()?>

<div class="container">
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<div class="keynote">
				<img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/marvin-ammori-cropped.jpg" width="1333" height="1333" class="img-responsive">
				<div class="bio">
					<small>Keynote 1</small>
					<h3>Marvin Ammori</h3>
					<h4>General Counsel, Hyperloop One</h4>
					<p>Named among Politico's 50 visionaries for 2015, Fast Company's 100 Most Creative in Business in 2012, a Washingtonian Magazine "Tech Titan" in 2015, Marvin focuses on next-generation transportation law.</p>
					<p>“I lead the legal team and serve on the senior business leadership team at Hyperloop One, a company working to make ultra-highspeed ground transportation a reality.”</p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<p class="tagline"><?php echo bloginfo('description')?></p>
			<div class="row testimonials">
				<?php foreach (array(1, 2) as $num) {?>
				<div class="col-md-6 testimonial">
					<div class="row">
						<div class="col-xs-6">
							<img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/marvin-ammori-cropped.jpg" width="1333" height="1333" class="img-responsive">
						</div>
						<div class="col-xs-6">
							<strong>Testimonial <?php echo $num?></strong>
							Maine Startup and Create Week is an awesome experience. It really feels intimate and people are willing to help you
							out with whatever challenge you're facing.
						</div>
					</div>
				</div>
				<?php }?>
			</div>
		</div>
	</div>
	<?php mscw_circle_triangle()?>
</div>

<?php get_footer()?>