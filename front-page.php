<?php
get_header();
?>

<div id="home">
	<div class="hero">
		<div class="container">
			<?php
			if ($items = get_posts(array(
				'post_type' => 'carousel',
				'numberposts' => -1,
			))) { ?>
				<div class="row">
					<div class="col-md-offset-1 col-md-10">
						<div class="carousel slide" id="home-carousel" data-ride="carousel">
							<div class="carousel-inner">
								<?php foreach ($items as $key => $item) {
									setup_postdata($item);
								?>
									<div class="item<?php if (!$key) echo ' active' ?>">
										<?php if ($image = get_the_post_thumbnail_url($item->ID, 'large')) { ?>
											<div class="image" style="background-image:url(<?php echo $image ?>)"></div>
											<div class="caption">
												<?php the_content() ?>
											</div>
										<?php } else {
											the_content();
										} ?>
									</div>
								<?php } ?>
							</div>
							<?php if (count($items) > 1) { ?>
								<a class="left carousel-control" href="#home-carousel" role="button" data-slide="prev">
									<span class="fa fa-angle-left" aria-hidden="true"></span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="right carousel-control" href="#home-carousel" role="button" data-slide="next">
									<span class="fa fa-angle-right" aria-hidden="true"></span>
									<span class="sr-only">Next</span>
								</a>
							<?php } ?>
						</div>
					</div>
				</div>
			<?php } ?>
			<div class="row">
				<div class="col-md-offset-1 col-md-10">
					<!--					<div class="tagline intro">-->
					<!--						<h1 class="giant">Join us in 2020.</h1>-->
					<!--                        <p class="large">Join us for three days of expert insight, applied skill-building, and meaningful connections that will help make big things happen. <strong>June 17th - 19th 2020</strong></p>-->
					<!--                        <p class="large">New location this year! <strong>University of Southern Maine Abromson Center, Portland</strong></p>-->
					<!--						<p class="button"><a href="https://www.eventbrite.com/e/startup-maine-2020-tickets-93013496873" target="_blank">Buy Tickets</a></p>-->
					<!--					</div>-->
					<!--                    <div class="tagline call-to-action">-->
					<!--                        <h2>Partner with us.  Get in touch!</h2>-->
					<!--                        <p>Want to be a sponsor of Startup Maine? <br />Learn how you can get involved.</p>-->
					<!--                        <p class="button2"><a href="https://www.startupmaine.org/become-a-sponsor">Reach Out</a></p>-->
					<!--                    </div>-->
					<!---->
					<!--                    <div class="tagline call-to-action">-->
					<!--                        <h2>Entrepreneurship Guide</h2>-->
					<!--                        <p>Are you an entrepreneur or startup-curious person who wants help navigating the Maine ecosystem? Check out this resource guide:</p>-->
					<!--                        <p class="button2"><a href="https://www.google.com/url?q=https://www.startupmaine.org/wp-content/uploads/2019/11/A-Guide-to-Resources-for-Maine-Entrepreneurs-5th-Edition-November-2019.pdf&sa=D&source=hangouts&ust=1573587947592000&usg=AFQjCNHr5MvMYrn01bx2vKekDoq6qb7v0A">Guide</a></p>-->
					<!--                    </div>-->


					<div class="row testimonials">
						<div class="col-md-6 testimonial">
							<div class="row">
								<div class="col-xs-6">
									<img data-src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/testimonials/01-interview.jpg" width="1500" height="1000" class="img-responsive lazyload">
								</div>
								<div class="col-xs-6">
									“The variety of workshop sessions was great, I wish I could have gone to all of them. The keynote speakers during lunch were also very informative. I felt like my time was used wisely during MSCW.”
								</div>
							</div>
						</div>
						<div class="col-md-6 testimonial">
							<div class="row">
								<div class="col-xs-6">
									<img data-src="<?php echo get_stylesheet_directory_uri() ?>/assets/img/testimonials/02-panel.jpg" width="1500" height="1000" class="img-responsive lazyload">
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
					<?php
					//settting order
					$tiers = array(
						'Presenting Donors' => array(),
						'Diamond' => array(),
						'Platinum' => array(),
						'Gold' => array(),
						'Silver' => array(),
						'Lightning' => array(),
						'Presenting Media Sponsor' => array(),
						'Business News Media Sponsor'  => array(),
						'Partner Donors' => array(),
						'Magazine Sponsor' => array(),
					);
					$sponsors = get_posts(array(
						'post_type' => 'sponsor',
						'numberposts' => -1,
					));
					foreach ($sponsors as $sponsor) {
						$fields = get_fields($sponsor->ID);
						if (!array_key_exists($fields['tier'], $tiers)) $tiers[$fields['tier']] = array();
						$tiers[$fields['tier']][] = array_merge($fields, array(
							'title' => $sponsor->post_title,
							'image' => get_the_post_thumbnail($sponsor->ID, 'large', array('class' => 'img-responsive lazyload', 'alt' => $sponsor->post_title)),
						));
						// console.log($sponsor->post_title);
					}
					foreach ($tiers as $tier => $sponsors) {
						if (empty($sponsors)) continue;
					?>
						<div class="tier">
							<small><?php echo $tier ?></small>
							<div class="row"><!--
							<?php foreach ($sponsors as $sponsor) {
								$imagesrc =  array("src=", "srcset=");
								$imagesetsrc =  array("data-src=", "data-srcset=");
							?>
								-->
								<div class="col-xs-12 col-md-3 <?php echo $tier ?>"><a href="<?php echo $sponsor['url'] ?>" title="<?php echo $sponsor['title'] ?>" target="_blank"><?php echo str_replace($imagesrc, $imagesetsrc, $sponsor['image']) ?></a></div><!--
							<?php } ?>
							<?php
							?>
							-->
							</div>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<script async defer type="text/javascript" src="//downloads.mailchimp.com/js/signup-forms/popup/embed.js" data-dojo-config="usePlainJson: true, isDebug: false"></script>
	<script type="text/javascript">
		require(["mojo/signup-forms/Loader"], function(L) {
			L.start({
				"baseUrl": "mc.us12.list-manage.com",
				"uuid": "e622297fee792d99c7d2d1d37",
				"lid": "22f8f595d4"
			})
		})
	</script>
</div>

<?php
get_footer();
