<?php
get_header('yellow');
the_post();
?>

<div class="container" id="yellow">
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<h1><?php the_title()?></h1>
			<?php the_content()?>
		</div>
	</div>
</div>

<?php
get_footer('yellow');
