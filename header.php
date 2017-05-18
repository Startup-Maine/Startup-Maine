<?php
if (!empty($_GET['pjax'])) return;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php wp_head()?>
	</head>
	<body <?php body_class()?>>
		
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<a href="/"><h1 id="logo">Maine Startup & Create Week</h1></a>
					</div>
					<div class="col-md-5">
						<form action="https://mainestartupandcreateweek.createsend.com/t/r/s/uluubk/" method="post">
							<label for="receive_updates">Subscribe for Updates!</label>
							<input id="receive_updates" name="cm-uluubk-uluubk" type="email" placeholder="Email" required>
							<input type="submit" id="submit">
						</form>
						<?php echo wp_nav_menu(array(
							'menu'              => 'banner',
							'theme_location'    => 'main',
							'container'			=> null,
						))?>
					</div>
				</div>
			</div>
		</header>

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

		<main id="content">