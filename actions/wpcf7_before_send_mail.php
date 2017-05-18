<?php

if ($input->id() == 281) {

    //get current form & submission instance
    $wpcf7 = WPCF7_ContactForm::get_current();
    $submission = WPCF7_Submission::get_instance();

    //ok go forward
    if (empty($submission)) return;

    //get submission data
    $data = $submission->get_posted_data();
	$uploads = $submission->uploaded_files();

    //don't do anything
    if (empty($data)) return;
    
	//check if speakers with that email exist
	$speaker_ids = get_posts(array(
		'numberposts' => -1,
		'post_status' => 'any',
		'post_type' => 'speaker',
		'meta_key' => 'email',
		'meta_value' => $data['email'],
		'fields' => 'ids',
	));
	
	if (count($speaker_ids)) {
		//update the speakers
		foreach ($speaker_ids as $speaker_id) {
			wp_update_post(array(
				'ID' => $speaker_id,
				'post_title' => $data['your-name'],
				'post_type' => 'speaker',
				'post_content' => $data['bio'],
			));
		}
	} else {
		//create speaker post type
		$speaker_id = wp_insert_post(array(
			'post_title' => $data['your-name'],
			'post_type' => 'speaker',
			'post_content' => $data['bio'],
		));
	}
	
	//set the custom fields
	foreach (array('email', 'organization', 'title', 'linkedin', 'twitter') as $field) {
		if (empty($data[$field])) {
			delete_post_meta($speaker_id, $field);
		} else {
			
			//make sure twitter is real url
			if ($field == 'twitter') {
				$data[$field] = str_replace('@', '', $data[$field]);
				if (substr($data[$field], 0, 4) != 'http') {
					$data[$field] = 'https://twitter.com/' . $data[$field];
				}
			}
			
			update_post_meta($speaker_id, $field, $data[$field]);
		}
	}

    //get the email body
    $mail = $wpcf7->prop('mail');

	//get uploaded image and uplaod it to wordpress
	$image_location = $uploads['image'];
	$image_content = file_get_contents($image_location);
	$image_name = $data['image'];
	$upload = wp_upload_bits($image_name, null, $image_content);
	$filename = $upload['file'];
	
	//create wordpress media object and attach it to the post
	if (!empty($filename)) {
		require_once(ABSPATH . 'wp-admin/includes/admin.php');
		$type = wp_check_filetype(basename($filename), null);
		$attach_id = wp_insert_attachment(array(
			'post_mime_type' => $type['type'],
			'post_title' => $data['your-name'],
			'post_content' => '',
			'post_status' => 'inherit'
		), $filename, $speaker_id);
		require_once(ABSPATH . 'wp-admin/includes/image.php');
		$attach_data = wp_generate_attachment_metadata($attach_id, $filename);
		wp_update_attachment_metadata($attach_id, $attach_data);
		set_post_thumbnail($speaker_id, $attach_id);
	}

	//append a link
	$mail['body'] .= '<br><hr><br><a href="' . admin_url('post.php?post=' . $speaker_id . '&action=edit') . '">Click here</a> to edit this speaker.';
    
    //save the mail back to the form object
    $wpcf7->set_properties(compact('mail'));

    // return current cf7 instance
    return $wpcf7;
    
}