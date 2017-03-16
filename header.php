<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head()?>
	</head>
	<body <?php body_class()?>>
		
		<div id="header">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<a href="/"><h1 id="logo">Maine Startup & Create Week</h1></a>
					</div>
					<div class="col-md-5">
						<?php /*echo wp_nav_menu(array(
							'menu'              => 'banner',
							'theme_location'    => 'main',
							'container'			=> null,
						))*/?>
						<form method="get" target="_blank" action="https://mainestartupandcreateweek.us8.list-manage.com/subscribe">
							<input type="hidden" name="u" value="be23ad41095e0f44c873a7220">
							<input type="hidden" name="id" value="dc4a0f2b2f">
							<label for="receive_updates">Receive Updates!</label>
							<input type="email" name="MERGE0" id="receive_updates">
						</form>
						<ul id="menu-header-menu">
							<li><a href="http://www.mainestartupandcreateweek.com/2016/">MSCW 2016</a></li>
							<li><a href="http://www.mainestartupandcreateweek.com/2015/">2015</a></li>
						</ul>						
					</div>
				</div>
			</div>
		</div>

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

		<div id="content">