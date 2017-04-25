<?php

//temporary, will go away soon
$tickets = 'https://ticketbud.com/events/32582f4c-eb1c-11e6-999e-afbf3b0f7479/register';

//add options page to wp dashboard
acf_add_options_page();

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
	}, 10, 2);
}

//helper function
function dd($var) {
	echo '<pre>';
	print_r($var);
	exit;
}

//get the thumnail (or a fallback) for a speaker
function mscw_speaker_img($speaker_id) {
	if ($image = get_the_post_thumbnail($speaker_id, 'large', array('class' => 'img-responsive'))) {
		return $image;
	} else {
		return '<img src="' . get_stylesheet_directory_uri() . '/assets/img/blank.png" width="1024" height="1024" class="img-responsive">';
	}	
}

//social icons: replace strings with icons
class mscw_social_icons extends Walker_Nav_Menu {
 
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        global $wp_query;
        $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent
 
        //depth-dependent classes
        $depth_classes = array(
            ($depth == 0 ? 'main-menu-item' : 'sub-menu-item'),
            ($depth >=2 ? 'sub-sub-menu-item' : ''),
            ($depth % 2 ? 'menu-item-odd' : 'menu-item-even'),
            'menu-item-depth-' . $depth
        );
        $depth_class_names = esc_attr(implode(' ', $depth_classes));
 
		$icons = array(
			'email' => 'fa fa-envelope',
			'facebook' => 'fa fa-facebook-official',
			'twitter' => 'fa fa-twitter',
			'youtube' => 'fa fa-youtube-play',
			'help' => 'fa fa-question-circle',
		);
		
		$title = sanitize_title_with_dashes($item->title);
		
        //passed classes
        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $class_names = esc_attr(implode(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item)));
 
        //build HTML
        $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';
 
        //link attributes
        $attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) . '"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target)     . '"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn)        . '"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url)        . '"' : '';
        $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '" title="' . $item->title . '"';
 
        //build HTML output and pass through the proper filter
        $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
            $args->before,
            $attributes,
            $args->link_before,
            array_key_exists($title, $icons) ? '<i class="' . $icons[$title] .'"></i>' : apply_filters( 'the_title', $item->title, $item->ID ),
            $args->link_after,
            $args->after
        );
        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }
}