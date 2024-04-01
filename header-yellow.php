<?php
if (!empty($_GET['pjax'])) return;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" type="image/png" href="<?php echo get_stylesheet_directory_uri()?>/assets/img/favicon.png">
		<link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">
<style type="text/css">
	#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; width:100%;}
	#mc_embed_signup input.email{width:220px;}
	#mc_embed_signup .button {background-color: #003a5d;}
	#mc_embed_signup label{font-size:20px; text-shadow: 2px 1px black; font-family: font-mono;}
	header #menu-header-menu li a{text-shadow:3px 1px black;}
	@media (max-width: 768px) {header form {display: block !important;}}
</style>
		<?php wp_head()?>
	</head>
	<body <?php body_class('yellow')?>>
		
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<a href="<?php echo home_url()?>"><h1 id="logo">Startup Maine</h1></a>
					</div>
					<div class="col-md-5">
<!--						<p class="button"  style="float:right; margin-bottom:30px; margin-top:10px;"><a href="https://www.eventbrite.com/e/startup-maine-2020-tickets-93013496873" target="_blank">Buy Tickets</a></p>-->

						<!-- <form action="https://mainestartupandcreateweek.createsend.com/t/r/s/uluubk/" method="post"> -->
							<!-- <form action="https://startupmaine.us12.list-manage.com/subscribe/post?u=e622297fee792d99c7d2d1d37&amp;id=a96d471229" method="post">
							<label for="receive_updates">Subscribe for Updates!</label>
							<input id="receive_updates" name="cm-uluubk-uluubk" type="email" placeholder="Email" required>
							<input type="submit" id="submit">
						</form>  -->

<!-- Begin Mailchimp Signup Form -->
<div id="mc_embed_signup">
<form action="https://startupmaine.us12.list-manage.com/subscribe/post?u=e622297fee792d99c7d2d1d37&amp;id=a96d471229" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<label for="mce-EMAIL">Newsletter Signup</label>
	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_e622297fee792d99c7d2d1d37_a96d471229" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="SUBSCRIBE" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
    </div>
</form>
</div>

<!--End mc_embed_signup-->


						<!-- < ?php -->
						<!-- // echo wp_nav_menu(array(
							//'menu'              => 'banner',
							//'theme_location'    => 'main',
							//'container'			=> null,
						//)) -->
						<!-- ?> -->
					</div>
				</div>
			</div>
		</header>

		<main id="primary">
		</main>
		
		<nav id="footer">
			<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10">
						<?php echo wp_nav_menu(array(
							'menu'              => 'footer',
							'theme_location'    => 'footer',
							'container'			=> null,
							'items_wrap'			=> '<ul id="%1$s" class="%2$s">
								%3$s
								<div class="menu-toggle menu-open"><i class="fa fa-bars"></i> Menu</div>
								<div class="menu-toggle menu-close"><i class="fa fa-times"></i> Close</div>
								</ul>',
						)) ?>
					</div>
				</div>
			</div>
		</nav>

		<main id="secondary">