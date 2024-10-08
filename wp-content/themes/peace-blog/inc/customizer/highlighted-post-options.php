<?php

// Highlighted Posts section
$wp_customize->add_section('highlighted_posts_section', array(    
	'title'       => __('Highlighted Post Options', 'peace-blog'),
	'panel'       => 'theme_option_panel'    
));

$wp_customize->add_setting('highlighted_posts', 
	array(
		'default' 			=> true,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cube_blog_sanitize_checkbox',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('highlighted_posts', 
	array(		
		'label' 	=> __('Enable Highlighted Posts', 'peace-blog'),
		'section' 	=> 'highlighted_posts_section',
		'settings'  => 'highlighted_posts',
		'type' 		=> 'checkbox',
	)
);

$wp_customize->add_setting('highlighted_posts_category', 
	array(
		'default' 			=> '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cube_blog_sanitize_select',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('highlighted_posts_category', 
	array(		
		'label' 	=> __('Select Categories', 'peace-blog'),
		'section' 	=> 'highlighted_posts_section',
		'settings'  => 'highlighted_posts_category',
		'type' 		=> 'select',
		'choices' 	=> peace_blog_get_post_categories(),
	)
);