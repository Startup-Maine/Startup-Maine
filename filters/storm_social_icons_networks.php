<?php

//add extra icons to social icons plugin
$input['youtu.be']['icon'] = 'icon-youtube-play';
$input['youtube.com']['icon'] = 'icon-youtube-play';

unset($input['vk.com']);

$input['slack.com'] = array(
	'name' => 'Slack',
	'class' => 'slack',
	'icon' => 'fa-slack',
	//'icon->sign' => 'icon-slack-sign',
);

//dd($input);

