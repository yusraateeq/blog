<?php

// Editors Choice section
$wp_customize->add_section('editors_choice_section', array(    
	'title'       => __('Editors Choice Options', 'peace-blog'),
	'panel'       => 'theme_option_panel'    
));

$wp_customize->add_setting('editors_choice', 
	array(
		'default' 			=> true,
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cube_blog_sanitize_checkbox',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('editors_choice', 
	array(		
		'label' 	=> __('Enable Editors Choice', 'peace-blog'),
		'section' 	=> 'editors_choice_section',
		'settings'  => 'editors_choice',
		'type' 		=> 'checkbox',
	)
);

$wp_customize->add_setting('editors_choice_section_title', 
	array(
		'default'           => esc_html__('Editors Choice', 'peace-blog'),
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('editors_choice_section_title', 
	array(
		'label'       => __('Section Title', 'peace-blog'),
		'section'     => 'editors_choice_section',   
		'settings'    => 'editors_choice_section_title',	
		'type'        => 'text'
	)
);

$wp_customize->add_setting('editors_choice_category', 
	array(
		'default' 			=> '',
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'cube_blog_sanitize_select',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control('editors_choice_category', 
	array(		
		'label' 	=> __('Select Categories', 'peace-blog'),
		'section' 	=> 'editors_choice_section',
		'settings'  => 'editors_choice_category',
		'type' 		=> 'select',
		'choices' 	=> peace_blog_get_post_categories(),
	)
);