<?php
wp_enqueue_style('mscw', get_stylesheet_directory_uri() . '/assets/css/main.css', array('dashicons'), filemtime(get_stylesheet_directory() . '/assets/css/main.css'));
wp_enqueue_script('mscw', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), filemtime(get_stylesheet_directory() . '/assets/js/main.js'), true);

wp_enqueue_script('jqueryui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js', array(), null, true);

//only load youtube on homepage
if (is_home()) {
	wp_enqueue_script('youtube', 'https://www.youtube.com/iframe_api', array(), null, true);
}

/*
wp_localize_script('mscw', 'mscw', array(
	'ajax_url' => admin_url('admin-ajax.php'),
));
*/