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

//include files for specific wordpress actions
$files = scandir(get_stylesheet_directory() . '/actions');
foreach ($files as $file) {
	$parts = explode('.', $file);
	$extension = array_pop($parts);
	if ($extension == 'php') {
		$action = implode('.', $parts);
		add_action($action, function() use ($action) {
			require_once('actions/' . $action . '.php');
		});
		if (substr($action, 0, 8) == 'wp_ajax_') {
			add_action('wp_ajax_nopriv_' . substr($action, 8), function() use ($action) {
				require_once('actions/' . $action . '.php');
			});
		}
	}
}

//page slug body class
add_filter('body_class', function($classes) {
	global $post;
	if (isset($post)) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
});

//helper function
function dd($var) {
	echo '<pre>';
	print_r($var);
	exit;
}

