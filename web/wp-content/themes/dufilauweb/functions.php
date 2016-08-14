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
    'primary menu' => __('Menu principal', 'dufilauweb'),
    'footer menu' => __('Menu du pied de page', 'dufilauweb')
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
        ],
        'rewrite' => [
            'slug' => __('dossier', 'dufilauweb')
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

// Add HTML5 theme support
function add_html5_support_theme() {
    add_theme_support( 'html5', array( 'search-form' ) );
}
add_action( 'after_setup_theme', 'add_html5_support_theme' );

// Add one item in the footer menu
function add_menu_item_theme ( $items, $args ) {
    if ($args->theme_location == 'footer menu') {
        $items = '<li>© '.__('2015', 'dufilauweb').' </li>'.$items;
    }
    return $items;
}
add_filter( 'wp_nav_menu_items', 'add_menu_item_theme', 10, 2 );

// Remove titles in a text
function delete_title($text) {
    $text = preg_replace('#<h[1-6]>(.*)</h[1-6]>#', '', $text);
    return $text;
}

// Built a customized extract
function custom_excerpt($text, $limit = 20, $more = '...')
{
    $text = delete_title($text);
    $text = wp_strip_all_tags(strip_shortcodes($text));
    $e_text = explode(' ', $text);
    if (count($e_text) > $limit) {
        array_splice($e_text, $limit);
        $text = implode(' ', $e_text).$more;
    }
    return $text;
}

// Add CSS and JS
function theme_scripts() {
    wp_enqueue_style( 'css', get_template_directory_uri().'/build/css/style.min.css' );
	wp_enqueue_script( 'script', get_template_directory_uri().'/build/js/script.min.js', false );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

// Publication moment
function moment($timestamp){
	setlocale(LC_TIME, 'fr_FR');
	$dif = time() - $timestamp;
	if($dif < 60){
		return sprintf(__('Il y a %d secondes', 'cfrt'), $dif);
	}elseif( $dif < 3600){
		$min = round($dif/60);
		return sprintf(__('Il y a %d minutes', 'cfrt'), $min);
	}elseif($dif <= 3600*5){
		$h = round($dif/3600);
		return  sprintf(__('Il y a %d heures', 'cfrt'), $h);
	}else {
		return strftime ('%A %e %B %G %H:%M', $timestamp);
	}
}

//Pagination
function pagination($query)
{
	$big = 999999999;
	return paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $query->max_num_pages,
		'prev_text' => '<span class="icon-caret-left"></span>',
		'next_text' => '<span class="icon-caret-right"></span>'
	) );
}