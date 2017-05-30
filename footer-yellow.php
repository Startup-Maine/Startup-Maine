<?php
if (!empty($_GET['pjax'])) return;
?>
		</main>
		
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
				<?php the_field('triangle_content', 'option')?>
				<a href="<?php the_field('tickets_url', 'option')?>" target="_blank">Reserve Tickets!</a>
			</div>
		</div>

		<?php $latest = current(get_posts(array('numberposts' => 1)))?>

		<div id="circle" class="draggable">
			<div class="shape"></div>
			<small>What's New?</small>
			<span class="move">Move Me!</span>
			<a href="<?php echo get_the_permalink($latest)?>"><span><?php echo get_the_title($latest)?></span></a>
		</div>
		
		<?php wp_footer()?>
	</body>
</html>