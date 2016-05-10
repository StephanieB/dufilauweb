<?php

// enabling support for post thumbnails
add_theme_support('post-thumbnails');

// enabling support for post formats
add_theme_support( 'post-formats',
    [
        'aside',
        'gallery',
        'link',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat'
    ]
);

// enabling widgets support
function theme_widgets_init() {
    register_sidebar([
        'name' => __('Main Sidebar', 'dufilauweb'),
        'id' => 'sidebar-1',
        'description' => __('Widgets area', 'dufilauweb')
    ]);
}
add_action( 'widgets_init', 'theme_widgets_init' );

// enabling menus support
register_nav_menus([
    'primary menu' => 'Main menu'
]);