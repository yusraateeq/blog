<?php

// Slider Posts section
$wp_customize->add_section('slider_posts_section', array(    
	'title'       => __('Slider Post Options', 'peace-blog'),
	'panel'       => 'theme_option_panel'    
));

//Enable Slider Posts
$wp_customize->add_setting('enable_slider_posts', 
	array(
		'default' 			=> true,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cube_blog_sanitize_checkbox',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('enable_slider_posts', 
	array(		
		'label' 	=> __('Enable Slider Posts', 'peace-blog'),
		'section' 	=> 'slider_posts_section',
		'settings'  => 'enable_slider_posts',
		'type' 		=> 'checkbox',
	)
);

// Slider Posts Category
$wp_customize->add_setting('slider_posts_category', 
	array(
		'default' 			=> '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cube_blog_sanitize_select',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('slider_posts_category', 
	array(		
		'label' 	=> __('Select Categories', 'peace-blog'),
		'section' 	=> 'slider_posts_section',
		'settings'  => 'slider_posts_category',
		'type' 		=> 'select',
		'choices' 	=> peace_blog_get_post_categories(),
	)
);