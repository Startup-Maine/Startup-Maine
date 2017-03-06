<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head()?>
	</head>
	<body <?php body_class()?>>

		<div class="container">
			<div class="row" id="banner">
				<div class="col-md-6">
					<a href="/" id="logo"><h1>Maine Startup & Create Week</h1></a>
				</div>
				<div class="col-md-5">
					<?php /* wp_nav_menu(array(
						'menu'              => 'banner',
						'theme_location'    => 'main',
						'container'			=> null,
					)) */?>
					<ul id="menu-header-menu">
						<li><a href="http://www.mainestartupandcreateweek.com/2016/">MSCW 2016</a></li>
						<li><a href="http://www.mainestartupandcreateweek.com/2015/">2015</a></li>
					</ul>
				</div>
			</div>
		</div>

