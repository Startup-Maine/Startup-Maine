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
		<?php wp_head()?>
	</head>
	<body <?php body_class()?>>
		
		<header>
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<a href="<?php echo home_url()?>"><h1 id="logo">Maine Startup & Create Week</h1></a>
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

		<main id="primary">