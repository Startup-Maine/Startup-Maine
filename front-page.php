<?php get_header()?>

<div class="container">
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<div class="keynote">
				<div class="carousel slide" id="home-carousel" data-ride="carousel">
					<div class="carousel-inner">
						<div class="item active">
							<div class="image" style="background-image:url(/wp-content/themes/mscw/assets/img/carousel/01-marvin-ammori.jpg)"></div>
							<div class="caption">
								<small>Keynote 1</small>
								<h3>Marvin Ammori</h3>
								<h4>General Counsel, Hyperloop One</h4>
								<p>Named among Politico's 50 visionaries for 2015, Fast Company's 100 Most Creative in Business in 2012, a Washingtonian Magazine "Tech Titan" in 2015, Marvin focuses on next-generation transportation law.</p>
								<p>“I lead the legal team and serve on the senior business leadership team at Hyperloop One, a company working to make ultra-highspeed ground transportation a reality.”</p>
							</div>
						</div>
						<div class="item">
							<div class="image" style="background-image:url(/wp-content/themes/mscw/assets/img/carousel/02-attendees.jpg)"></div>
							<div class="caption big">
								<p>“Entrepreneurs converge on the city to network and learn new skills.”</p>
								<p>– Portland Press Herald</p>
							</div>
						</div>
						<div class="item">
							<div class="image" style="background-image:url(/wp-content/themes/mscw/assets/img/carousel/03-lunch.jpg)"></div>
							<div class="caption big">
								<p>“Entrepreneurs converge on the city to network and learn new skills.”</p>
								<p>– Portland Press Herald</p>
							</div>
						</div>
						<div class="item">
							<div class="image" style="background-image:url(/wp-content/themes/mscw/assets/img/carousel/04-landscape.png)"></div>
							<div class="caption big">
								<p>One of the best parts of Maine Startup and Create Week? Maine! Come early or stay late to enjoy the legendary Maine summer.</p>
							</div>
						</div>
						<div class="item">
							<iframe width="945" height="532" src="https://www.youtube.com/embed/0R305euPnSw" frameborder="0" allowfullscreen></iframe>
						</div>
					</div>
					<a class="left carousel-control" href="#home-carousel" role="button" data-slide="prev">
						<span class="fa fa-angle-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#home-carousel" role="button" data-slide="next">
						<span class="fa fa-angle-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<p class="tagline">
				<strong>Start stronger. Scale smarter. Solve better.</strong>
				Join us for a week of expert insight, applied skill-building, and meaningful connections that will help big things happen.
			</p>
			<div class="row testimonials">
				<div class="col-md-6 testimonial">
					<div class="row">
						<div class="col-xs-6">
							<img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/testimonials/01-interview.jpg" width="1500" height="1000" class="img-responsive">
						</div>
						<div class="col-xs-6">
							“The variety of workshop sessions was great, I wish I could have gone to all of them. The keynote speakers during lunch were also very informative. I felt like my time was used wisely during MSCW.”
						</div>
					</div>
				</div>
				<div class="col-md-6 testimonial">
					<div class="row">
						<div class="col-xs-6">
							<img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/testimonials/02-panel.jpg" width="1500" height="1000" class="img-responsive">
						</div>
						<div class="col-xs-6">
							“It was not academic; the guest speakers are out there doing it! Very upbeat atmosphere.”
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php mscw_circle_triangle()?>
</div>

<?php get_footer()?>