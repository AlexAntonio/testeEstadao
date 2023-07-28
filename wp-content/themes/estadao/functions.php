<?php

require_once get_template_directory() . '/inc/customizer.php';

function estadao_load_css(){
	wp_enqueue_style('custom-css', get_template_directory_uri().'/assets/css/custom.css', array(), date('Y-m-d H:i:s'), 'all');
	wp_enqueue_style('bootstrap-css', get_template_directory_uri().'/assets/css/bootstrap.min.css', array(), '5.3.1', 'all');
	wp_enqueue_style('font-awesome', get_template_directory_uri().'/assets/css/font-awesome-5.15.3.css', array(), '5.15.3', 'all');
}

add_action('wp_enqueue_scripts', 'estadao_load_css');

function estadao_load_scripts(){
	wp_enqueue_script( 'jquery-js', get_stylesheet_directory_uri() . '/assets/js/jquery3-6-0.min.js', array(), '3.6.0', true);
	wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), '5.3.1', true);
	wp_enqueue_script( 'vue-js', get_stylesheet_directory_uri() . '/assets/js/vue.js', array(), '2.6.14', false);
}

add_action('wp_enqueue_scripts', 'estadao_load_scripts');

if ( ! file_exists( get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php' ) ) {
	return new WP_Error( 'class-wp-bootstrap-navwalker-missing', __( 'It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker' ) );
} else {
	require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}

add_filter('carousel_slider_load_scripts', 'carousel_slider_load_scripts');
	function carousel_slider_load_scripts( $load_scripts ) {
		return true;
}

function get_excerpt($count){  
	$permalink = get_permalink($post->ID);
	$excerpt = get_the_content(); 
	$excerpt = strip_tags($excerpt);
	$excerpt = substr($excerpt, 0, $count);
	$excerpt = substr($excerpt, 0, strripos($excerpt, " "));
	return $excerpt;
}

add_filter( 'nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3 );
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute( $atts, $item, $args ) {
	if ( is_a( $args->walker, 'WP_Bootstrap_Navwalker' ) ) {
		if ( array_key_exists( 'data-toggle', $atts ) ) {
			unset( $atts['data-toggle'] );
			$atts['data-bs-toggle'] = 'dropdown';
		}
	}
	return $atts;
}

function formatar($valor) {
	return number_format($valor, 2, ',', '.');
}

function estadao_config(){
	register_nav_menus(
		array(
			'my_main_menu' => 'Main Menu',
			'my_footer_menu' => 'Footer Menu'
		)
	);
	
	add_theme_support('post-thumbnails');
	add_theme_support('post-formats', array('video', 'image'));
	add_theme_support('custom-logo', array(
		'width' => 200,
		'height' => 110
	));
}

add_action('after_setup_theme', 'estadao_config', 0);

add_action('widgets_init', 'estadao_sidebars');

function estadao_sidebars(){
	register_sidebar(
		array(
			'name' => 'Sidebar 1',
			'id' => 'sidebar-1',
			'description' => 'Este é o sidebar 1',
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		)
	);
	register_sidebar(
		array(
			'name' => 'Sidebar 2',
			'id' => 'sidebar-2',
			'description' => 'Este é o sidebar 2',
			'before_widget' => '<div class="widget-wrapper">',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		)
	);
}
	
?>