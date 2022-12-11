<?php

DEFINE('CONTENT_URI', get_stylesheet_directory_uri());

require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-post-type.php';
require_once get_template_directory() . '/core/classes/class-taxonomy.php';
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
require_once get_template_directory() . '/core/helpers.php';

if ( ! function_exists( 'odin_setup_features' ) ) {
	function odin_setup_features() {
		load_theme_textdomain( 'odin', get_template_directory() . '/languages' );
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'odin' ),
			)
		);

		add_theme_support( 'post-thumbnails' );
        add_image_size( 'blog-thumbnails', 960, 960 );
        add_image_size( 'blog-thumbnail', 750, 500 );
        add_image_size( 'post-thumbnail', 200, 220, array( 'center', 'center' ) );
        add_image_size( 'logo-top', 178, 250 );
        add_image_size( 'logo-footer', 349, 178 );
        add_image_size( 'case', 1284, 712 );
	}
}
add_action( 'after_setup_theme', 'odin_setup_features' );


function odin_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'odin' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'odin' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'odin_widgets_init' );


function odin_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'odin_flush_rewrite' );

/**
 * Load site scripts.
 *
 * @since 2.2.0
 */
function odin_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	//CSS
	wp_enqueue_style( 'main-min-style', $template_url . '/assets/css/main.min.css?v='.rand(), array(), null, 'all' );
	//wp_enqueue_style( 'style-lgpd',  'https://cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.css', array(), null, 'all' );
	wp_enqueue_style( 'style-slider',  '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), null, 'all' );

	//JS
	wp_enqueue_script( 'main-min-js', $template_url . '/assets/js/main.min.js', array(), null, true );
	wp_enqueue_script( 'mask', '//cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js', array(), null, true );
	//wp_enqueue_script( 'lgpd', '//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.0.3/cookieconsent.min.js', array(), null, true );
	wp_enqueue_script( 'slider', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), null, true );
	wp_enqueue_script( 'popper', '//cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js', array(), null, false );
}
add_action( 'wp_enqueue_scripts', 'odin_enqueue_scripts', 1 );

if( function_exists( 'acf_add_options_page' ) ) {

    acf_add_options_page(array(
        'page_title'  => 'Opções do Tema',
        'menu_title'  => 'Opções do Tema',
        'menu_slug'   => 'amdt-opcoes',
        'capability'  => 'edit_posts',
        'redirect'    => false
    ));
//    acf_add_options_sub_page(array(
//        'page_title'  => 'Home',
//        'menu_title'  => 'Home',
//        'parent_slug' => 'amdt-opcoes'
//    ));
}

function remove_menus(){
 // remove_menu_page( 'edit.php?post_type=acf-field-group' );    //Dashboard
}
add_action( 'admin_menu', 'remove_menus' );

function setPostViews() {
	Global $post;
	$countKey = 'post_views_count';
	$count = get_post_meta($post->ID, $countKey, true);
	if($count==''){
		$count = 0;
		delete_post_meta($post->ID, $countKey);
		add_post_meta($post->ID, $countKey, '0');
	}else{
		$count++;
		update_post_meta($post->ID, $countKey, $count);
	}
}

