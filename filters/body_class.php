<?php
//page slug body class

global $post;

if (isset($post)) {
	$input[] = $post->post_type . '-' . $post->post_name;
}

return $input;
