<?php
// Init vendor
if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}

// WP settings
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');
});

// Enqueue scripts and styles.
function stonebridge_scripts() {
	wp_enqueue_style( 'stonebridge-style', get_stylesheet_uri(), array(), '' );
	wp_style_add_data( 'stonebridge-style', 'rtl', 'replace' );

	// Enqueue Google Fonts (DM Sans)
	wp_enqueue_style( 'stonebridge-google-fonts', 'https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap', array(), null );

	// Add main app styles
	wp_enqueue_style( 'stonebridge-swiper-bundle', get_template_directory_uri() . '/assets/css/swiper-bundle.min.css?version=' . filemtime(get_template_directory() . '/assets/css/swiper-bundle.min.css') );
	wp_enqueue_style( 'stonebridge-tailwind', get_template_directory_uri() . '/assets/css/tailwind.css?version=' . filemtime(get_template_directory() . '/assets/css/tailwind.css') );
	wp_enqueue_style( 'stonebridge-app', get_template_directory_uri() . '/assets/scss/app.css?version=' . filemtime(get_template_directory() . '/assets/scss/app.css') );

	// Add main app scripts
	wp_enqueue_script( 'stonebridge-swiper-bundle', get_template_directory_uri() . '/assets/js/swiper-bundle.min.js?version=' . filemtime(get_template_directory() . '/assets/js/swiper-bundle.min.js'), array('jquery'), '', true );
	wp_enqueue_script( 'stonebridge-app', get_template_directory_uri() . '/assets/js/app.js?version=' . filemtime(get_template_directory() . '/assets/js/app.js'), array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'stonebridge_scripts' );

// Init classic editor
add_filter( 'use_block_editor_for_post', '__return_false', 10 );
add_filter( 'use_block_editor_for_post_type', '__return_false', 10 );

// Add menu support
add_action('after_setup_theme', function () {
    register_nav_menus([
        'primary' => 'Primary',
        'footer-1' => 'Footer 1',
        'footer-2' => 'Footer 2',
    ]);
});

// ACF Theme Options init
add_action('acf/init', function() {
    if( function_exists('acf_add_options_page') ) {
        acf_add_options_page('Theme Settings');
    }
});

// Add safe SVG support
add_filter('upload_mimes', function ($mimes) {
    $mimes['svg']  = 'image/svg+xml';
    $mimes['svgz'] = 'image/svg+xml';
    return $mimes;
});

add_filter('wp_check_filetype_and_ext', function ($data, $file, $filename, $mimes) {
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if ($ext === 'svg') {
        $data['ext']  = 'svg';
        $data['type'] = 'image/svg+xml';
    }
    return $data;
}, 10, 4);

add_filter('wp_handle_upload_prefilter', function ($file) {
    if (pathinfo($file['name'], PATHINFO_EXTENSION) === 'svg') {
        $content = file_get_contents($file['tmp_name']);
        
        if (preg_match('/<script|on\w+=/i', $content)) {
            $file['error'] = 'Found suspicious code in SVG.';
        }
    }
    return $file;
});

add_action('admin_head', function () {
    echo '<style>td.media-icon img[src$=".svg"], .attachment-266x266 img[src$=".svg"] { width: 100% !important; height: auto !important; }</style>';
});

// Init widgets support
function stonebridge_widgets_init() {
    register_sidebar( array(
        'name'          => 'Footer Sidebar 1',
        'id'            => 'sidebar-1',
        'before_widget' => '<div id="%1$s" class="widget %2$s [&_li]:block [&_li]:my-1 [&_li>a:hover]:underline">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-[20px] font-medium mb-1">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => 'Footer Sidebar 2',
        'id'            => 'sidebar-2',
        'before_widget' => '<div id="%1$s" class="widget %2$s [&_li]:block [&_li]:my-1 [&_li>a:hover]:underline">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-[20px] font-medium mb-1">',
        'after_title'   => '</h4>',
    ) );
    register_sidebar( array(
        'name'          => 'Footer Sidebar 3',
        'id'            => 'sidebar-3',
        'before_widget' => '<div id="%1$s" class="widget %2$s [&_li]:block [&_li]:my-1 [&_li>a:hover]:underline">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="widget-title text-[20px] font-medium mb-1">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'stonebridge_widgets_init' );

// Disables the Gutenberg block editor from managing widgets
add_filter( 'use_widgets_block_editor', '__return_false' );