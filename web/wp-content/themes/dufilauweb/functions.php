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

// Add custom post type
function theme_create_custom_post_types() {
    register_post_type('dufilauweb_folder', [
        'labels' => [
            'name' => __('Dossiers', 'dufilauweb'),
            'singular_name' => __('Dossier', 'dufilauweb')
        ],
        'public' => true,
        'has_archive' => true,
        'show_ui' => true,
        'menu_position' => 21,
        'menu_icon' => 'dashicons-book-alt',
        'supports' => [
            'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments', 'revisions', 'post-formats'
        ]
    ]);
}
add_action('init', 'theme_create_custom_post_types');

// Add custom taxonomy
function theme_create_custom_taxonomies() {
    register_taxonomy('dufilauweb_subject', 'dufilauweb_folder', [
        'labels' => [
            'name' => __('Sujets', 'dufilauweb'),
            'singular_name' => __('Sujet', 'dufilauweb')
        ],
        'public' => true,
        'hierarchical' => true
    ]);
}
add_action('init', 'theme_create_custom_taxonomies');