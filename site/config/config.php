<?php

/**
 * The config file is optional. It accepts a return array with config options
 * Note: Never include more than one return statement, all options go within this single return array
 * In this example, we set debugging to true, so that errors are displayed onscreen. 
 * This setting must be set to false in production.
 * All config options: https://getkirby.com/docs/reference/system/options
 */
return [
    'debug' => true,


	// Markdown plugin
	'community.markdown-field.buttons'    => [['h1', 'h2', 'h3', 'h4', 'h5', 'h6'], 'bold', 'italic', 'divider', 'link','pagelink', 'email', 'file', 'divider', 'ul', 'ol', 'blockquote'],
	'community.markdown-field.font'       => [
		'family'  => 'sans-serif',
		'scaling' => true,
		'size'    => 'regular',
	],
	'community.markdown-field.query'      => [
		'pagelink' => null,
		'images'   => 'page.images',
		'files'    => 'page.files.filterBy("type", "!=", "image")',
	],
	'community.markdown-field.modals'     => true,
	'community.markdown-field.blank'      => false,
	'community.markdown-field.invisibles' => false,

];
