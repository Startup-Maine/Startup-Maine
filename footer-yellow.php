<?php
if (!empty($_GET['pjax'])) return;
?>
		</main>
		
		<nav id="utility">
			<div class="container">
				<div class="row">
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


		<?php $latest = current(get_posts(array('numberposts' => 1)))?>
		
		<?php wp_footer()?>
	</body>
</html>