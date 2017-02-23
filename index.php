<?php
$links = array(
	'tickets' => 'https://ticketbud.com/events/32582f4c-eb1c-11e6-999e-afbf3b0f7479/register',
	'email' => 'mailto:info@mainestartupandcreateweek.com',
	'facebook' => 'https://www.facebook.com/mainestartupandcreateweek',
	'twitter' => 'https://twitter.com/MaineSCW',
	'youtube' => 'https://www.youtube.com/channel/UCGCfv9pQb26YnABmw-ISUMQ',
	'subscribe' => 'http://eepurl.com/Sn_TT',
);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Maine Startup & Create Week</title>
		<link href="<?php echo get_stylesheet_directory_uri()?>/assets/css/main.css" rel="stylesheet">
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body class="home">
		<div class="container">
			<div class="row" id="logo">
				<div class="col-md-12">
					<a href="<?php echo $links['tickets']?>" target="_blank"><h1>Maine Startup & Create Week</h1></a>
				</div>
			</div>
			<div class="row">
				<div class="col-md-offset-2 col-lg-8 col-md-9">
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
				<div class="col-md-offset-2 col-lg-8 col-md-9 tagline">
					<p>Join us to move your business forward, through expert insight, applied skill-building, and meaningful connections.</p>
				</div>
			</div>
			<div class="triangle">
				<div class="shape"></div>
				<div class="text">
					June 19–23<br>
					Portland ME
					<a href="<?php echo $links['tickets']?>" target="_blank">Reserve Tickets!</a>
				</div>
			</div>
		</div>
		<nav id="utility">
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-sm-3 col-md-2 when">
						June 19–23, 2017
					</div>
					<div class="col-xs-6 col-sm-3 col-md-2 where">
						<span>Portland, ME</span>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-8 social">
						<a href="<?php echo $links['subscribe']?>" target="_blank" class="fa fa-envelope"></a>
						<a href="<?php echo $links['facebook']?>" target="_blank" class="fa fa-facebook"></a>
						<a href="<?php echo $links['twitter']?>" target="_blank" class="fa fa-twitter"></a>
						<a href="<?php echo $links['youtube']?>" target="_blank" class="fa fa-youtube-play"></a>
						<a href="<?php echo $links['email']?>" class="fa fa-question-circle"></a>
					</div>
				</div>
			</div>
		</nav>
	</body>
</html>