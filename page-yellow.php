<?php
/*
Template Name: Yellow
*/
get_header();
the_post();
?>

<div class="container">
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<h1><?php the_title()?></h1>
			<?php the_content()?>
		</div>
	</div>
	<?php mscw_circle_triangle()?>
</div>

<?php
get_footer();
