<?php

register_nav_menu('social', 'Social Menu');
register_nav_menu('main', 'Header Menu');
register_nav_menu('footer', 'Tab Menu');

register_post_type('mscw_speaker',
	array(
		'labels'		=> array(
			'name'					=> 'Speakers',
			'singular_name'			=> 'Speaker',
			'add_new_item'			=> 'Add Speaker',
			'edit_item'				=> 'Edit Speaker',
			'new_item'				=> 'New Speaker',
			'view_item'				=> 'View Speaker',
			'view_items'				=> 'View Speakers',
			'search_items'			=> 'Search Speaker',
			'not_found'				=> 'No speakers added yet.',
			'not_found_in_trash'		=> 'No speakers items found in Trash',
			'all_items'				=> 'All Speakers',
			'archives'				=> 'Speaker Archives',
			'attributes'				=> 'Speaker Attributes',
			'insert_into_item'		=> 'Insert into speaker',
			'uploaded_to_this_item'	=> 'Uploaded to this speaker',
			
		),
		'supports'		=> array('title', 'thumbnail', 'editor'),
		'show_ui'		=> true,
		'has_archive'	=> true,
		'menu_icon'		=> 'dashicons-groups',
		'rewrite'		=> array('slug'=>'speakers'),
	)
);

register_post_type('mscw_carousel',
	array(
		'labels'		=> array(
			'name'					=> 'Carousel Items',
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
		//'rewrite'		=> array('slug'=>'speakers'),
	)
);