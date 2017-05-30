<?php
get_header('yellow');
the_post();
?>

<div class="container">
	<div class="row">
		<div class="col-md-offset-1 col-md-10">
			<small>404</small>
			<h1>Page Not Found</h1>
			We couldn't find the page you're looking for. 
		</div>
	</div>
</div>

<?php
mscw_footer();
get_footer('yellow');