<?php
// Init vendor
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

// Enqueue scripts and styles.
function stonebridge_scripts() {
	wp_enqueue_style( 'stonebridge-style', get_stylesheet_uri(), array(), '' );
	wp_style_add_data( 'stonebridge-style', 'rtl', 'replace' );

	wp_enqueue_script( 'stonebridge-app', get_template_directory_uri() . '/assets/js/app.js', array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'stonebridge_scripts' );

// Init classic editor
add_filter( 'use_block_editor_for_post', '__return_false', 10 );
add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );