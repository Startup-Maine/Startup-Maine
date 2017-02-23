<?php
//temporary, will go away soon
$links = array(
	'tickets' => 'https://ticketbud.com/events/32582f4c-eb1c-11e6-999e-afbf3b0f7479/register',
	'email' => 'mailto:info@mainestartupandcreateweek.com',
	'facebook' => 'https://www.facebook.com/mainestartupandcreateweek',
	'twitter' => 'https://twitter.com/MaineSCW',
	'youtube' => 'https://www.youtube.com/channel/UCGCfv9pQb26YnABmw-ISUMQ',
	'subscribe' => 'http://eepurl.com/Sn_TT',
);

//include wordpress actions from actions folder
foreach (glob(get_stylesheet_directory() . '/actions/*.php') as $file) {
	$action = basename($file, '.php');
	add_action($action, function() use ($action) {
		require_once('actions/' . $action . '.php');
	});
	if (substr($action, 0, 8) == 'wp_ajax_') {
		add_action('wp_ajax_nopriv_' . substr($action, 8), function() use ($action) {
			require_once('actions/' . $action . '.php');
		});
	}
}

//include wordpress filters from filters folder
foreach (glob(get_stylesheet_directory() . '/filters/*.php') as $file) {
	$filter = basename($file, '.php');
	add_action($filter, function($input) use ($filter) {
		require_once('filters/' . $filter . '.php');
		return $input;
	});
}

//helper function
function dd($var) {
	echo '<pre>';
	print_r($var);
	exit;
}

