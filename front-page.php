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
				<?php
				//settting order
				$tiers = array(
					'Presenting Donors' => array(),
					'Partner Donors' => array(),
					'Presenting Media Sponsor' => array(),
					'Platinum' => array(),
					'Gold' => array(),
					'Silver' => array(),	
				);
				$sponsors = get_posts(array(
					'post_type' => 'mscw_sponsor',
					'numberposts' => -1,
				));
				foreach ($sponsors as $sponsor) {
					$fields = get_fields($sponsor->ID);
					if (!array_key_exists($fields['tier'], $tiers)) $tiers[$fields['tier']] = array();
					$tiers[$fields['tier']][] = array_merge($fields, array(
						'title' => $sponsor->post_title,
						'image' => get_the_post_thumbnail($sponsor->ID, 'large', array('class' => 'img-responsive', 'alt' => $sponsor->post_title)),
					));
				}
				foreach ($tiers as $tier => $sponsors) {?>
					<div class="tier">
						<small><?php echo $tier?></small>
						<div class="row"><!--
						<?php foreach ($sponsors as $sponsor) {?>
							--><div class="col-xs-12 col-md-3"><a href="<?php echo $sponsor['url']?>" title="<?php echo $sponsor['title']?>"><?php echo $sponsor['image']?></a></div><!--
						<?php }?>
						--></div>
					</div>
				<?php }?>
			</div>
		</div>
	</div>
</div>

<?php get_footer()?>