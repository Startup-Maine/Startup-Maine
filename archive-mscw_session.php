<?php
get_header();

$days = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday');

?>

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-1 schedule">
			<small>Schedule</small>
			
			<?php foreach ($days as $day) {?>
			<h1><?php echo $day?></h1>
			<?php }?>
			
		</div>
		<div class="col-md-2">
			<form id="program-search">
				<label for="search">Search</label>
				<input type="search" id="search">
			</form>
		</div>
	</div>
</div>

<?php

get_footer();