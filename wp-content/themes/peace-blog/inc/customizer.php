<?php
/**
 * Peace Blog Theme Customizer
 *
 * @package peace_blog
 */

/**
 * Customizer options
 */
function peace_blog_customize_register( $wp_customize ) {
	include get_stylesheet_directory() . '/inc/customizer/slider-post-options.php';
    include get_stylesheet_directory() . '/inc/customizer/highlighted-post-options.php';
    include get_stylesheet_directory() . '/inc/customizer/top-stories-options.php';
    include get_stylesheet_directory() . '/inc/customizer/popular-post-options.php';
    include get_stylesheet_directory() . '/inc/customizer/trending-post-options.php';
    include get_stylesheet_directory() . '/inc/customizer/recent-post-options.php';
    include get_stylesheet_directory() . '/inc/customizer/editors-choice-options.php';
}
add_action( 'customize_register', 'peace_blog_customize_register' );