<?php
get_header('yellow');
the_post();
?>

<div class="container">
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<div class="post">
				<div class="row">
				<div>
						<small><?php the_date('m.d.y')?></small>
						<h4><?php the_title()?></h4>
						<?php the_content()?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
get_footer('yellow');