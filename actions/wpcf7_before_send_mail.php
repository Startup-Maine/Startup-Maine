<?php

if ($input->id() == 281) {

    //get current form & submission instance
    $wpcf7 = WPCF7_ContactForm::get_current();
    $submission = WPCF7_Submission::get_instance();

    //ok go forward
    if (empty($submission)) return;

    //get submission data
    $data = $submission->get_posted_data();

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
	foreach (array('email', 'organization', 'title', 'linkedin') as $field) {
		if (empty($data[$field])) {
			delete_post_meta($speaker_id, $field);
		} else {
			update_post_meta($speaker_id, $field, $data[$field]);
		}
	}

    //get the email body
    $mail = $wpcf7->prop('mail');

	//append a link
    $mail['body'] .= '<br><hr><br><a href="' . admin_url('post.php?post=' . $speaker_id . '&action=edit') . '">Click here</a> to edit this speaker.';

    //save the mail back to the form object
    $wpcf7->set_properties(compact('mail'));

    // return current cf7 instance
    return $wpcf7;
    
}