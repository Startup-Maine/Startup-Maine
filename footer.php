<?php
global $tickets;
$latest = current(get_posts(array('numberposts' => 1)));
?>

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
						<?php wp_nav_menu(array(
							'menu'              => 'social',
							'theme_location'    => 'social',
							'container'			=> null,
							'walker'				=> new mscw_social_icons()
						))?>
					</div>
				</div>
			</div>
		</nav>

		<div id="triangle" class="draggable">
			<div class="shape"></div>
			<div class="text">
				June 19–23<br>
				Portland ME
				<a href="<?php echo $tickets?>" target="_blank">Reserve Tickets!</a>
			</div>
		</div>

		<div id="circle" class="draggable">
			<small>What's New?</small>
			<a href="<?php echo get_the_permalink($latest)?>"><?php echo get_the_title($latest)?></a>
		</div>
	
		<?php wp_footer()?>

	</body>
</html>