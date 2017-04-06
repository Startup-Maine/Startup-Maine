<?php

//register menus
register_nav_menu('social', 'Social Menu');
register_nav_menu('main', 'Header Menu');
register_nav_menu('footer', 'Tab Menu');

//register custom post types
register_post_type('mscw_carousel',
	array(
		'labels'		=> array(
			'name'					=> 'Carousel Items',
			'menu_name'				=> 'Carousel',
			'singular_name'			=> 'Carousel Item',
			'add_new_item'			=> 'Add Carousel Item',
			'edit_item'				=> 'Edit Carousel Item',
			'new_item'				=> 'New Carousel Item',
			'view_item'				=> 'View Carousel Item',
			'view_items'				=> 'View Carousel Items',
			'search_items'			=> 'Search Carousel Item',
			'not_found'				=> 'No carousel items added yet.',
			'not_found_in_trash'		=> 'No carousel items found in Trash',
			'all_items'				=> 'All Carousel Items',
			'archives'				=> 'Carousel Item Archives',
			'attributes'				=> 'Carousel Item Attributes',
			'insert_into_item'		=> 'Insert into carousel item',
			'uploaded_to_this_item'	=> 'Uploaded to this carousel item',
			
		),
		'supports'		=> array('title', 'thumbnail', 'editor'),
		'show_ui'		=> true,
		'has_archive'	=> false,
		'menu_icon'		=> 'dashicons-images-alt2',
	)
);

register_post_type('mscw_sponsor',
	array(
		'labels'		=> array(
			'name'					=> 'Sponsors',
			'singular_name'			=> 'Sponsor',
			'add_new_item'			=> 'Add Sponsor',
			'edit_item'				=> 'Edit Sponsor',
			'new_item'				=> 'New Sponsor',
			'view_item'				=> 'View Sponsor',
			'view_items'				=> 'View Sponsors',
			'search_items'			=> 'Search Sponsors',
			'not_found'				=> 'No sponsors added yet.',
			'not_found_in_trash'		=> 'No sponsors found in Trash',
			'all_items'				=> 'All Sponsors',
			'archives'				=> 'Sponsor Archives',
			'attributes'				=> 'Sponsor Attributes',
			'insert_into_item'		=> 'Insert into sponsor',
			'uploaded_to_this_item'	=> 'Uploaded to this sponsor',
			
		),
		'supports'		=> array('title', 'thumbnail'),
		'show_ui'		=> true,
		'has_archive'	=> false,
		'menu_icon'		=> 'dashicons-awards',
	)
);

register_post_type('mscw_session',
	array(
		'labels'		=> array(
			'name'					=> 'Sessions',
			'singular_name'			=> 'Session',
			'add_new_item'			=> 'Add Session',
			'edit_item'				=> 'Edit Session',
			'new_item'				=> 'New Session',
			'view_item'				=> 'View Session',
			'view_items'				=> 'View Sessions',
			'search_items'			=> 'Search Sessions',
			'not_found'				=> 'No sessions added yet.',
			'not_found_in_trash'		=> 'No sessions found in Trash',
			'all_items'				=> 'All Sessions',
			'archives'				=> 'Session Archives',
			'attributes'				=> 'Session Attributes',
			'insert_into_item'		=> 'Insert into session',
			'uploaded_to_this_item'	=> 'Uploaded to this session',
			
		),
		'supports'		=> array('title', 'editor'),
		'show_ui'		=> true,
		'public'			=> true,
		'has_archive'	=> true,
		'menu_icon'		=> 'dashicons-schedule',
		'rewrite'		=> array('slug'=>'program'),
	)
);