<?php

//we want post thumbnails and to be able to manage the document title
add_theme_support('post-thumbnails');
add_theme_support('title-tag');

//custom image sizes
//add_image_size('speakers', 640, 640, true);

//custom editor style
add_editor_style(get_stylesheet_directory_uri() . '/assets/css/editor.css');