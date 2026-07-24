<?php
// Init vendor
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

// Enqueue scripts and styles.
function stonebridge_scripts() {
	wp_enqueue_style( 'stonebridge-style', get_stylesheet_uri(), array(), '' );
	wp_style_add_data( 'stonebridge-style', 'rtl', 'replace' );

	// Enqueue Google Fonts (DM Sans)
	wp_enqueue_style( 'stonebridge-google-fonts', 'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap', array(), null );

	// Add main app styles
	wp_enqueue_style( 'stonebridge-tailwind', get_template_directory_uri() . '/assets/css/tailwind.css?version=' . filemtime(get_template_directory() . '/assets/css/tailwind.css') );
	wp_enqueue_style( 'stonebridge-app', get_template_directory_uri() . '/assets/scss/app.css?version=' . filemtime(get_template_directory() . '/assets/scss/app.css') );

	// Add main app scripts
	wp_enqueue_script( 'stonebridge-app', get_template_directory_uri() . '/assets/js/app.js?version=' . filemtime(get_template_directory() . '/assets/js/app.js'), array(), '', true );
}
add_action( 'wp_enqueue_scripts', 'stonebridge_scripts' );

// Init classic editor
add_filter( 'use_block_editor_for_post', '__return_false', 10 );
add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );