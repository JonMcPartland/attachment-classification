<?php

/*
Plugin Name: Attachment Classification
Plugin URI: https://github.com/jonmcpartland/attachment-classification/
Description: Adds taxonomy support to attachments.
Author: Jon McPartland
Version: 0.1.0
Author URI: https://jon.mcpart.land
Textdomain: attachment-classification
*/

new class {

	protected $taxonomies = [
		'category', 'post_tag',
	];

	public function __construct() {
		\add_action( 'after_setup_theme', [ $this, 'run_filter' ] );
		\add_action( 'init', [ $this, 'register_taxonomies' ], 9999 );
	}

	public function run_filter() {
		$this->taxonomies = \apply_filters( 'attachment_classification', $this->taxonomies );
	}

	public function register_taxonomies() {
		foreach ( $this->taxonomies as $taxonomy ) {
			\register_taxonomy_for_object_type( $taxonomy, 'attachment' );
		}
	}

};
