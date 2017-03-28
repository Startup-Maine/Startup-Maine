<?php get_header()?>

<div class="hero">
	<div class="container">
		<?php
		if ($items = get_posts(array(
				'post_type' => 'mscw_carousel',
				'numberposts' => -1,
			))) {?>
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<div class="carousel slide" id="home-carousel" data-ride="carousel">
					<div class="carousel-inner">
						<?php foreach ($items as $key => $item) {
							setup_postdata($item);
							?>
						<div class="item<?php if (!$key) echo ' active'?>">
							<?php if ($image = get_the_post_thumbnail_url($item->ID, 'large')) {?>
								<div class="image" style="background-image:url(<?php echo $image?>)"></div>
								<div class="caption">
									<?php the_content()?>
								</div>
							<?php } else {
								the_content();
							}?>
						</div>
						<?php }?>
					</div>
					<?php if (count($items) > 1) {?>
					<a class="left carousel-control" href="#home-carousel" role="button" data-slide="prev">
						<span class="fa fa-angle-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#home-carousel" role="button" data-slide="next">
						<span class="fa fa-angle-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
					<?php }?>
				</div>
			</div>
		</div>
		<?php }?>
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
	</div>
</div>
	
<div class="sponsors">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10">
				<h3>Thank you to our sponsors!</h3>
				<div class="tier">
					<small>Presenting Donors</small>
					<div class="row"><!--
						--><div class="col-xs-12 col-md-3"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/sponsors/preti-flaherty.jpg" alt="preti-flaherty" width="1081" height="180" class="img-responsive"></div><!--
						--><div class="col-xs-12 col-md-3"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/sponsors/mti.jpg" alt="mti" width="1329" height="726" class="img-responsive"></div><!--
					--></div>
				</div>
				<div class="tier">
					<small>Partner Donors</small>
					<div class="row"><!--
						--><div class="col-xs-12 col-md-3"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/sponsors/red-thread.jpg" alt="red-thread" width="1946" height="603" class="img-responsive"></div><!--
						--><div class="col-xs-12 col-md-3"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/sponsors/meca.png" alt="meca" width="19" height="600" class="img-responsive"></div><!--
						--><div class="col-xs-12 col-md-3"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/sponsors/knack-factory.jpg" alt="knack-factory" width="2118" height="883" class="img-responsive"></div><!--
					--></div>
				</div>
				<div class="tier">
					<small>Presenting Media Sponsor</small>
					<div class="row"><!--
						--><div class="col-xs-12 col-md-3"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/sponsors/maine-mag.jpg" alt="maine-mag" width="628" height="215" class="img-responsive"></div><!--
					--></div>
				</div>
				<div class="tier">
					<small>Platinum</small>
					<div class="row"><!--
						--><div class="col-xs-12 col-md-3"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/sponsors/idexx.png" alt="idexx" width="426" height="78" class="img-responsive"></div><!--
						--><div class="col-xs-12 col-md-3"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/sponsors/wex.png" alt="wex" width="156" height="156" class="img-responsive"></div><!--
					--></div>
				</div>
				<div class="tier">
					<small>Gold</small>
					<div class="row"><!--
						--><div class="col-xs-12 col-md-3"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/sponsors/decd.jpg" alt="decd" width="967" height="808" class="img-responsive"></div><!--
						--><div class="col-xs-12 col-md-3"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/sponsors/memic.png" alt="memic" width="525" height="111" class="img-responsive"></div><!--
					--></div>
				</div>
				<div class="tier">
					<small>Silver</small>
					<div class="row"><!--
						--><div class="col-xs-12 col-md-3"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/sponsors/fame.png" alt="fame" width="1024" height="323" class="img-responsive"></div><!--
						--><div class="col-xs-12 col-md-3"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/img/sponsors/eaton-peabody.png" alt="eaton-peabody" width="1024" height="329" class="img-responsive"></div><!--
					--></div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php get_footer()?>