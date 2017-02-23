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
