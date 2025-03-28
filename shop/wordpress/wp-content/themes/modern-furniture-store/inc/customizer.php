<?php
/**
 * Modern Furniture Store: Customizer
 *
 * @package Modern Furniture Store
 * @subpackage modern_furniture_store
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function modern_furniture_store_customize_register( $wp_customize ) {

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');

    require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	// Register the custom control type.
    $wp_customize->register_control_type( 'Modern_Furniture_Store_Toggle_Control' );

    //Register the sortable control type.
	$wp_customize->register_control_type( 'Modern_Furniture_Store_Control_Sortable' );

	//add home page setting pannel
	$wp_customize->add_panel( 'modern_furniture_store_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Home page Settings', 'modern-furniture-store' ),
	    'description' => __( 'Description of what this panel does.', 'modern-furniture-store' ),
	) );

	//TP General Option
	$wp_customize->add_section('modern_furniture_store_tp_general_settings',array(
        'title' => __('TP General Option', 'modern-furniture-store'),
        'panel' => 'modern_furniture_store_panel_id',
        'priority' => 1,
    ) );
    $wp_customize->add_setting('modern_furniture_store_tp_body_layout_settings',array(
        'default' => 'Full',
        'sanitize_callback' => 'modern_furniture_store_sanitize_choices'
	));
    $wp_customize->add_control('modern_furniture_store_tp_body_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Body Layout Setting', 'modern-furniture-store'),
        'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'modern-furniture-store'),
        'section' => 'modern_furniture_store_tp_general_settings',
        'choices' => array(
            'Full' => __('Full','modern-furniture-store'),
            'Container Fluid' => __('Container Fluid','modern-furniture-store')
        ),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('modern_furniture_store_sidebar_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'modern_furniture_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_furniture_store_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Sidebar Position', 'modern-furniture-store'),
        'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'modern-furniture-store'),
        'section' => 'modern_furniture_store_tp_general_settings',
        'choices' => array(
            'full' => __('Full','modern-furniture-store'),
            'left' => __('Left','modern-furniture-store'),
            'right' => __('Right','modern-furniture-store'),
            'three-column' => __('Three Columns','modern-furniture-store'),
            'four-column' => __('Four Columns','modern-furniture-store'),
            'grid' => __('Grid Layout','modern-furniture-store')
        ),
	) );
	$wp_customize->add_setting('modern_furniture_store_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'modern_furniture_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_furniture_store_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'modern-furniture-store'),
        'description'   => __('This option work for single blog page', 'modern-furniture-store'),
        'section' => 'modern_furniture_store_tp_general_settings',
        'choices' => array(
            'full' => __('Full','modern-furniture-store'),
            'left' => __('Left','modern-furniture-store'),
            'right' => __('Right','modern-furniture-store'),
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('modern_furniture_store_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'modern_furniture_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_furniture_store_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'modern-furniture-store'),
        'description'   => __('This option work for pages.', 'modern-furniture-store'),
        'section' => 'modern_furniture_store_tp_general_settings',
        'choices' => array(
            'full' => __('Full','modern-furniture-store'),
            'left' => __('Left','modern-furniture-store'),
            'right' => __('Right','modern-furniture-store')
        ),
	) );
	$wp_customize->add_setting( 'modern_furniture_store_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_sticky', array(
		'label'       => esc_html__( 'Show / Hide Sticky Header', 'modern-furniture-store' ),
		'section'     => 'modern_furniture_store_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_sticky',
	) ) );

	//tp typography option
	$modern_furniture_store_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	$wp_customize->add_section('modern_furniture_store_typography_option',array(
		'title'         => __('TP Typography Option', 'modern-furniture-store'),
		'priority' => 1,
		'panel' => 'modern_furniture_store_panel_id'
   	));

   	$wp_customize->add_setting('modern_furniture_store_heading_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'modern_furniture_store_sanitize_choices',
	));
	$wp_customize->add_control(	'modern_furniture_store_heading_font_family', array(
		'section' => 'modern_furniture_store_typography_option',
		'label'   => __('heading Fonts', 'modern-furniture-store'),
		'type'    => 'select',
		'choices' => $modern_furniture_store_font_array,
	));

	$wp_customize->add_setting('modern_furniture_store_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'modern_furniture_store_sanitize_choices',
	));
	$wp_customize->add_control(	'modern_furniture_store_body_font_family', array(
		'section' => 'modern_furniture_store_typography_option',
		'label'   => __('Body Fonts', 'modern-furniture-store'),
		'type'    => 'select',
		'choices' => $modern_furniture_store_font_array,
	));

	//TP Color Option
	$wp_customize->add_section('modern_furniture_store_color_option',array(
     'title'         => __('TP Color Option', 'modern-furniture-store'),
     'priority' => 1,
     'panel' => 'modern_furniture_store_panel_id'
    ) );
    
	$wp_customize->add_setting( 'modern_furniture_store_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_furniture_store_tp_color_option', array(
			'label'     => __('Theme First Color', 'modern-furniture-store'),
	    'description' => __('It will change the complete theme color in one click.', 'modern-furniture-store'),
	    'section' => 'modern_furniture_store_color_option',
	    'settings' => 'modern_furniture_store_tp_color_option',
  	)));

  	$wp_customize->add_setting( 'modern_furniture_store_tp_color_second_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_furniture_store_tp_color_second_option', array(
			'label'     => __('Theme Second Color', 'modern-furniture-store'),
	    'description' => __('It will change the complete theme color in one click.', 'modern-furniture-store'),
	    'section' => 'modern_furniture_store_color_option',
	    'settings' => 'modern_furniture_store_tp_color_second_option',
  	)));

		//TP Preloader Option
	$wp_customize->add_section('modern_furniture_store_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'modern-furniture-store'),
		'priority' => 1,
		'panel' => 'modern_furniture_store_panel_id'
	) );
	$wp_customize->add_setting( 'modern_furniture_store_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'modern-furniture-store' ),
		'section'     => 'modern_furniture_store_prelaoder_option',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_preloader_show_hide',
	) ) );
	$wp_customize->add_setting( 'modern_furniture_store_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_furniture_store_tp_preloader_color1_option', array(
			'label'     => __('Preloader First Ring Color', 'modern-furniture-store'),
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'modern-furniture-store'),
	    'section' => 'modern_furniture_store_prelaoder_option',
	    'settings' => 'modern_furniture_store_tp_preloader_color1_option',
  	)));
  	$wp_customize->add_setting( 'modern_furniture_store_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_furniture_store_tp_preloader_color2_option', array(
			'label'     => __('Preloader Second Ring Color', 'modern-furniture-store'),
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'modern-furniture-store'),
	    'section' => 'modern_furniture_store_prelaoder_option',
	    'settings' => 'modern_furniture_store_tp_preloader_color2_option',
  	)));
  	$wp_customize->add_setting( 'modern_furniture_store_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_furniture_store_tp_preloader_bg_color_option', array(
			'label'     => __('Preloader Background Color', 'modern-furniture-store'),
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'modern-furniture-store'),
	    'section' => 'modern_furniture_store_prelaoder_option',
	    'settings' => 'modern_furniture_store_tp_preloader_bg_color_option',
  	)));

  		//TP Blog Option
	$wp_customize->add_section('modern_furniture_store_blog_option',array(
        'title' => __('TP Blog Option', 'modern-furniture-store'),
        'panel' => 'modern_furniture_store_panel_id',
        'priority' => 1,
    ) );

    $wp_customize->add_setting('modern_furniture_store_edit_blog_page_title',array(
		'default'=> 'Home',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_edit_blog_page_title',array(
		'label'	=> __('Change Blog Page Title','modern-furniture-store'),
		'section'=> 'modern_furniture_store_blog_option',
		'type'=> 'text'
	));

	/** Meta Order */
    $wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment','category'),
        'sanitize_callback' => 'modern_furniture_store_sanitize_sortable',
    ));
    $wp_customize->add_control(new Modern_Furniture_Store_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'modern-furniture-store'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'modern-furniture-store') ,
        'section' => 'modern_furniture_store_blog_option',
        'choices' => array(
            'date' => __('date', 'modern-furniture-store') ,
            'author' => __('author', 'modern-furniture-store') ,
            'comment' => __('comment', 'modern-furniture-store') ,
            'category' => __('category', 'modern-furniture-store') ,
        ) ,
    )));
    $wp_customize->add_setting( 'modern_furniture_store_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'modern_furniture_store_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'modern_furniture_store_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','modern-furniture-store' ),
		'section'     => 'modern_furniture_store_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );
	$wp_customize->add_setting('modern_furniture_store_read_more_text',array(
		'default'=> __('Read More','modern-furniture-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_read_more_text',array(
		'label'	=> __('Edit Button Text','modern-furniture-store'),
		'section'=> 'modern_furniture_store_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting('modern_furniture_store_post_image_round', array(
	  'default' => '0',
      'sanitize_callback' => 'modern_furniture_store_sanitize_number_range',
	));
	$wp_customize->add_control(new modern_furniture_store_Range_Slider($wp_customize, 'modern_furniture_store_post_image_round', array(
       'section' => 'modern_furniture_store_blog_option',
      'label' => esc_html__('Edit Post Image Border Radius', 'modern-furniture-store'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 180,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('modern_furniture_store_post_image_width', array(
	  'default' => '',
      'sanitize_callback' => 'modern_furniture_store_sanitize_number_range',
	));
	$wp_customize->add_control(new modern_furniture_store_Range_Slider($wp_customize, 'modern_furniture_store_post_image_width', array(
       'section' => 'modern_furniture_store_blog_option',
      'label' => esc_html__('Edit Post Image Width', 'modern-furniture-store'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 367,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('modern_furniture_store_post_image_length', array(
	  'default' => '',
      'sanitize_callback' => 'modern_furniture_store_sanitize_number_range',
	));
	$wp_customize->add_control(new modern_furniture_store_Range_Slider($wp_customize, 'modern_furniture_store_post_image_length', array(
       'section' => 'modern_furniture_store_blog_option',
      'label' => esc_html__('Edit Post Image height', 'modern-furniture-store'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 900,
        'step' => 1
    )
	)));
	
	$wp_customize->selective_refresh->add_partial( 'modern_furniture_store_read_more_text', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'modern_furniture_store_customize_partial_modern_furniture_store_read_more_text',
	) );
	$wp_customize->add_setting( 'modern_furniture_store_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'modern-furniture-store' ),
		'section'     => 'modern_furniture_store_blog_option',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_remove_read_button',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'modern_furniture_store_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'modern_furniture_store_customize_partial_modern_furniture_store_remove_read_button',
	));
	$wp_customize->add_setting( 'modern_furniture_store_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'modern-furniture-store' ),
		'section'     => 'modern_furniture_store_blog_option',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_remove_tags',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'modern_furniture_store_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'modern_furniture_store_customize_partial_modern_furniture_store_remove_tags',
	));
	$wp_customize->add_setting( 'modern_furniture_store_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'modern-furniture-store' ),
		'section'     => 'modern_furniture_store_blog_option',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_remove_category',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'modern_furniture_store_remove_category', array(
		'selector' => '.box-content a[rel="category"]',
		'render_callback' => 'modern_furniture_store_customize_partial_modern_furniture_store_remove_category',
	));
	$wp_customize->add_setting( 'modern_furniture_store_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'modern-furniture-store' ),
	 'section'     => 'modern_furniture_store_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'modern_furniture_store_remove_comment',
	) ) );

	$wp_customize->add_setting( 'modern_furniture_store_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'modern-furniture-store' ),
	 'section'     => 'modern_furniture_store_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'modern_furniture_store_remove_related_post',
	) ) );
	$wp_customize->add_setting('modern_furniture_store_related_post_heading',array(
		'default'=> __('Related Posts','modern-furniture-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_related_post_heading',array(
		'label'	=> __('Edit Section Title','modern-furniture-store'),
		'section'=> 'modern_furniture_store_blog_option',
		'type'=> 'text'
	));
	$wp_customize->add_setting( 'modern_furniture_store_related_post_per_page', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'modern_furniture_store_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'modern_furniture_store_related_post_per_page', array(
		'label'       => esc_html__( 'Related Post Per Page','modern-furniture-store' ),
		'section'     => 'modern_furniture_store_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 3,
			'max'              => 9,
		),
	) );
	$wp_customize->add_setting( 'modern_furniture_store_related_post_per_columns', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'modern_furniture_store_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'modern_furniture_store_related_post_per_columns', array(
		'label'       => esc_html__( 'Related Post Per Row','modern-furniture-store' ),
		'section'     => 'modern_furniture_store_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	) );
	$wp_customize->add_setting('modern_furniture_store_post_layout',array(
        'default' => 'image-content',
        'sanitize_callback' => 'modern_furniture_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_furniture_store_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Layout', 'modern-furniture-store'),
        'section' => 'modern_furniture_store_blog_option',
        'choices' => array(
            'image-content' => __('Media-Content','modern-furniture-store'),
            'content-image' => __('Content-Media','modern-furniture-store'),
        ),
	) );
	//MENU TYPOGRAPHY
	$wp_customize->add_section( 'modern_furniture_store_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'modern-furniture-store' ),
    	'priority' => 2,
		'panel' => 'modern_furniture_store_panel_id'
	) );

	$wp_customize->add_setting('modern_furniture_store_menu_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'modern_furniture_store_sanitize_choices',
	));
	$wp_customize->add_control(	'modern_furniture_store_menu_font_family', array(
		'section' => 'modern_furniture_store_menu_typography',
		'label'   => __('Menu Fonts', 'modern-furniture-store'),
		'type'    => 'select',
		'choices' => $modern_furniture_store_font_array,
	));

	$wp_customize->add_setting('modern_furniture_store_menu_font_weight',array(
        'default' => '400',
        'sanitize_callback' => 'modern_furniture_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_furniture_store_menu_font_weight',array(
     'type' => 'radio',
     'label'     => __('Font Weight', 'modern-furniture-store'),
     'section' => 'modern_furniture_store_menu_typography',
     'type' => 'select',
     'choices' => array(
         '100' => __('100','modern-furniture-store'),
         '200' => __('200','modern-furniture-store'),
         '300' => __('300','modern-furniture-store'),
         '400' => __('400','modern-furniture-store'),
         '500' => __('500','modern-furniture-store'),
         '600' => __('600','modern-furniture-store'),
         '700' => __('700','modern-furniture-store'),
         '800' => __('800','modern-furniture-store'),
         '900' => __('900','modern-furniture-store')
     ),
	) );
	
	$wp_customize->add_setting('modern_furniture_store_menu_text_tranform',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'modern_furniture_store_sanitize_choices'
 	));
 	$wp_customize->add_control('modern_furniture_store_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','modern-furniture-store'),
		'section' => 'modern_furniture_store_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','modern-furniture-store'),
		   'Lowercase' => __('Lowercase','modern-furniture-store'),
		   'Capitalize' => __('Capitalize','modern-furniture-store'),
		),
	) );
	$wp_customize->add_setting('modern_furniture_store_menu_font_size', array(
	    'default' => 15,
        'sanitize_callback' => 'modern_furniture_store_sanitize_number_range',
	));
	$wp_customize->add_control(new Modern_Furniture_Store_Range_Slider($wp_customize, 'modern_furniture_store_menu_font_size', array(
        'section' => 'modern_furniture_store_menu_typography',
        'label' => esc_html__('Font Size', 'modern-furniture-store'),
        'input_attrs' => array(
          'min' => 0,
          'max' => 20,
          'step' => 1
    )
	)));

	$wp_customize->add_setting( 'modern_furniture_store_menu_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_furniture_store_menu_color', array(
			'label'     => __('Change Menu Color', 'modern-furniture-store'),
	    'section' => 'modern_furniture_store_menu_typography',
	    'settings' => 'modern_furniture_store_menu_color',
  	)));

	// Top bar Section
	$wp_customize->add_section( 'modern_furniture_store_topbar', array(
    	'title'      => __( 'Topbar Details', 'modern-furniture-store' ),
    	'description' => __( 'Add your contact details', 'modern-furniture-store' ),
		'panel' => 'modern_furniture_store_panel_id',
        'priority' => 2,
	) );
	$wp_customize->add_setting('modern_furniture_store_topbar_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_topbar_text',array(
		'label'	=> __('Add Topbar Text','modern-furniture-store'),
		'section'=> 'modern_furniture_store_topbar',
		'type'=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'modern_furniture_store_topbar_text', array(
		'selector' => '.timebox i',
		'render_callback' => 'modern_furniture_store_customize_partial_modern_furniture_store_topbar_text',
	) );
	$wp_customize->add_setting('modern_furniture_store_about_us_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_about_us_text',array(
		'label'	=> __('Track Order Text','modern-furniture-store'),
		'section'	=> 'modern_furniture_store_topbar',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('modern_furniture_store_about_us_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('modern_furniture_store_about_us_link',array(
		'label'	=> __('Track Order Link','modern-furniture-store'),
		'section'	=> 'modern_furniture_store_topbar',
		'type'		=> 'url'
	));
	$wp_customize->add_setting( 'modern_furniture_store_change_usd', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_change_usd', array(
		 'label'       => esc_html__( 'Show / Hide Currency', 'modern-furniture-store' ),
		 'section'     => 'modern_furniture_store_topbar',
		 'type'        => 'toggle',
		 'settings'    => 'modern_furniture_store_change_usd',
	) ) );
	$wp_customize->add_setting('modern_furniture_store_wishlist_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_wishlist_text',array(
		'label'	=> __('Offer Zone Text','modern-furniture-store'),
		'section'	=> 'modern_furniture_store_topbar',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('modern_furniture_store_wishlist_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('modern_furniture_store_wishlist_link',array(
		'label'	=> __('Offer Zone Link','modern-furniture-store'),
		'section'	=> 'modern_furniture_store_topbar',
		'type'		=> 'url'
	));

	// Header Section
	$wp_customize->add_section( 'modern_furniture_store_header', array(
    	'title'      => __( 'Header Details', 'modern-furniture-store' ),
    	'description' => __( 'Add your contact details', 'modern-furniture-store' ),
		'panel' => 'modern_furniture_store_panel_id',
      'priority' => 2,
	) );
	$wp_customize->add_setting('modern_furniture_store_shipping_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_shipping_text',array(
		'label'	=> __('Add Shipping','modern-furniture-store'),
		'section'=> 'modern_furniture_store_header',
		'type'=> 'text'
	));
	$wp_customize->add_setting('modern_furniture_store_shipping',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_shipping',array(
		'label'	=> __('Add Shipping Text','modern-furniture-store'),
		'section'=> 'modern_furniture_store_header',
		'type'=> 'text'
	));
	$wp_customize->add_setting('modern_furniture_store_shipping_icon',array(
		'default'	=> 'fas fa-truck',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Modern_Furniture_Store_Icon_Changer(
        $wp_customize,'modern_furniture_store_shipping_icon',array(
		'label'	=> __('Shipping Icon','modern-furniture-store'),
		'transport' => 'refresh',
		'section'	=> 'modern_furniture_store_header',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('modern_furniture_store_return_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_return_text',array(
		'label'	=> __('Add Money Return','modern-furniture-store'),
		'section'=> 'modern_furniture_store_header',
		'type'=> 'text'
	));
	$wp_customize->add_setting('modern_furniture_store_return',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_return',array(
		'label'	=> __('Add Money Return Text','modern-furniture-store'),
		'section'=> 'modern_furniture_store_header',
		'type'=> 'text'
	));
	$wp_customize->add_setting('modern_furniture_store_return_icon',array(
		'default'	=> 'fas fa-undo',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Modern_Furniture_Store_Icon_Changer(
        $wp_customize,'modern_furniture_store_return_icon',array(
		'label'	=> __('Money Return Icon','modern-furniture-store'),
		'transport' => 'refresh',
		'section'	=> 'modern_furniture_store_header',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('modern_furniture_store_deal_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_deal_text',array(
		'label'	=> __('Add Deals','modern-furniture-store'),
		'section'=> 'modern_furniture_store_header',
		'type'=> 'text'
	));
	$wp_customize->add_setting('modern_furniture_store_deal',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_deal',array(
		'label'	=> __('Add Deal Text','modern-furniture-store'),
		'section'=> 'modern_furniture_store_header',
		'type'=> 'text'
	));
	$wp_customize->add_setting('modern_furniture_store_deal_icon',array(
		'default'	=> 'fas fa-tags',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Modern_Furniture_Store_Icon_Changer(
        $wp_customize,'modern_furniture_store_deal_icon',array(
		'label'	=> __('Deal Icon','modern-furniture-store'),
		'transport' => 'refresh',
		'section'	=> 'modern_furniture_store_header',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'modern_furniture_store_show_hide_cart_option', array(
		'default'           => True,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
    ) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_show_hide_cart_option', array(
		'label'       => esc_html__( 'Show / Hide Cart Option', 'modern-furniture-store' ),
		'section'     => 'modern_furniture_store_header',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_show_hide_cart_option',
	) ) );
	$wp_customize->add_setting('modern_furniture_store_cart_icon',array(
		'default'	=> 'fas fa-shopping-cart',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Modern_Furniture_Store_Icon_Changer(
        $wp_customize,'modern_furniture_store_cart_icon',array(
		'label'	=> __('Cart Icon','modern-furniture-store'),
		'transport' => 'refresh',
		'section'	=> 'modern_furniture_store_header',
		'type'		=> 'icon'
	)));

	// Social Link
	$wp_customize->add_section( 'modern_furniture_store_social_media', array(
    	'title'      => __( 'Social Media Links', 'modern-furniture-store' ),
    	'description' => __( 'Add your Social Links', 'modern-furniture-store' ),
		'panel' => 'modern_furniture_store_panel_id',
        'priority' => 2,
	) );
	$wp_customize->add_setting( 'modern_furniture_store_header_fb_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_header_fb_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'modern-furniture-store' ),
		'section'     => 'modern_furniture_store_social_media',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_header_fb_new_tab',
	) ) );
	$wp_customize->add_setting('modern_furniture_store_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('modern_furniture_store_facebook_url',array(
		'label'	=> __('Facebook Link','modern-furniture-store'),
		'section'=> 'modern_furniture_store_social_media',
		'type'=> 'url'
	));
	$wp_customize->selective_refresh->add_partial( 'modern_furniture_store_facebook_url', array(
		'selector' => '.media-links a',
		'render_callback' => 'modern_furniture_store_customize_partial_modern_furniture_store_facebook_url',
	) );
	$wp_customize->add_setting('modern_furniture_store_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Modern_Furniture_Store_Icon_Changer(
        $wp_customize,'modern_furniture_store_facebook_icon',array(
		'label'	=> __('Facebook Icon','modern-furniture-store'),
		'transport' => 'refresh',
		'section'	=> 'modern_furniture_store_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'modern_furniture_store_header_twt_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_header_twt_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'modern-furniture-store' ),
		'section'     => 'modern_furniture_store_social_media',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_header_twt_new_tab',
	) ) );
	$wp_customize->add_setting('modern_furniture_store_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('modern_furniture_store_twitter_url',array(
		'label'	=> __('Twitter Link','modern-furniture-store'),
		'section'=> 'modern_furniture_store_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('modern_furniture_store_twt_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Modern_Furniture_Store_Icon_Changer(
        $wp_customize,'modern_furniture_store_twt_icon',array(
		'label'	=> __('Twitter Icon','modern-furniture-store'),
		'transport' => 'refresh',
		'section'	=> 'modern_furniture_store_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'modern_furniture_store_header_ins_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_header_ins_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'modern-furniture-store' ),
		'section'     => 'modern_furniture_store_social_media',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_header_ins_new_tab',
	) ) );
	$wp_customize->add_setting('modern_furniture_store_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('modern_furniture_store_instagram_url',array(
		'label'	=> __('Instagram Link','modern-furniture-store'),
		'section'=> 'modern_furniture_store_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('modern_furniture_store_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Modern_Furniture_Store_Icon_Changer(
        $wp_customize,'modern_furniture_store_instagram_icon',array(
		'label'	=> __('Instagram Icon','modern-furniture-store'),
		'transport' => 'refresh',
		'section'	=> 'modern_furniture_store_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'modern_furniture_store_header_ut_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_header_ut_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'modern-furniture-store' ),
		'section'     => 'modern_furniture_store_social_media',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_header_ut_new_tab',
	) ) );
	$wp_customize->add_setting('modern_furniture_store_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('modern_furniture_store_youtube_url',array(
		'label'	=> __('YouTube Link','modern-furniture-store'),
		'section'=> 'modern_furniture_store_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('modern_furniture_store_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Modern_Furniture_Store_Icon_Changer(
        $wp_customize,'modern_furniture_store_youtube_icon',array(
		'label'	=> __('YouTube Icon','modern-furniture-store'),
		'transport' => 'refresh',
		'section'	=> 'modern_furniture_store_social_media',
		'type'		=> 'icon'
	))); 
	$wp_customize->add_setting( 'modern_furniture_store_header_pint_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_header_pint_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'modern-furniture-store' ),
		'section'     => 'modern_furniture_store_social_media',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_header_pint_new_tab',
	) ) );
	$wp_customize->add_setting('modern_furniture_store_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('modern_furniture_store_pint_url',array(
		'label'	=> __('Pinterest Link','modern-furniture-store'),
		'section'=> 'modern_furniture_store_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('modern_furniture_store_pint_icon',array(
		'default'	=> 'fab fa-pinterest',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Modern_Furniture_Store_Icon_Changer(
        $wp_customize,'modern_furniture_store_pint_icon',array(
		'label'	=> __('Pinterest Icon','modern-furniture-store'),
		'transport' => 'refresh',
		'section'	=> 'modern_furniture_store_social_media',
		'type'		=> 'icon'
	))); 
	$wp_customize->add_setting('modern_furniture_store_social_icon_fontsize',array(
	   'default'=> '14',
	   'sanitize_callback'	=> 'modern_furniture_store_sanitize_number_absint'
    ));
    $wp_customize->add_control('modern_furniture_store_social_icon_fontsize',array(
	    'label'	=> __('Social Icons Font Size in PX','modern-furniture-store'),
	    'type'=> 'number',
	    'section'=> 'modern_furniture_store_social_media',
	    'input_attrs' => array(
		  'step' => 1,
		  'min'  => 0,
		  'max'  => 30,
		),
    ));

	//Slider
	$wp_customize->add_section( 'modern_furniture_store_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'modern-furniture-store' ),
    	'description' => __('Slider Image Dimension ( 1600px x 650px )','modern-furniture-store'),
		'panel' => 'modern_furniture_store_panel_id',
		'priority'   => 3,
	) );
	$wp_customize->add_setting( 'modern_furniture_store_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide Slider Section', 'modern-furniture-store' ),
		'section'     => 'modern_furniture_store_slider_section',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_slider_arrows',
	) ) );
	$modern_furniture_store_categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_post[]= 'select';
	foreach($modern_furniture_store_categories as $category){
	if($i==0){
	  $default = $category->slug;
	  $i++;
	}
	$cat_post[$category->slug] = $category->name;
	}
	$wp_customize->add_setting('modern_furniture_store_post_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'modern_furniture_store_sanitize_select',
	));
	$wp_customize->add_control('modern_furniture_store_post_setting',array(
		'type'    => 'select',
		'choices' => $cat_post,
		'label' => esc_html__('Select Category to display slider images','modern-furniture-store'),
		'section' => 'modern_furniture_store_slider_section',
	));
	$wp_customize->add_setting( 'modern_furniture_store_slider_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_slider_button', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'modern-furniture-store' ),
		'section'     => 'modern_furniture_store_slider_section',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_slider_button',
	) ) );
	$wp_customize->add_setting('modern_furniture_store_slider_content_layout',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'modern_furniture_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_furniture_store_slider_content_layout',array(
        'type' => 'radio',
        'label'     => __('Slider Content Layout', 'modern-furniture-store'),
        'section' => 'modern_furniture_store_slider_section',
        'choices' => array(
            'LEFT-ALIGN' => __('LEFT-ALIGN','modern-furniture-store'),
            'CENTER-ALIGN' => __('CENTER-ALIGN','modern-furniture-store'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','modern-furniture-store'),
        ),
	) );

	// Product Section
	$wp_customize->add_section( 'modern_furniture_store_product_section' , array(
	 	'title'      => __( 'Product Section', 'modern-furniture-store' ),
	 	'priority' => 3,
		'panel' => 'modern_furniture_store_panel_id'
	) );
	$wp_customize->add_setting( 'modern_furniture_store_show_hide_product_section', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_show_hide_product_section', array(
		'label'       => esc_html__( 'Show / Hide Product Section', 'modern-furniture-store' ),
		'section'     => 'modern_furniture_store_product_section',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_show_hide_product_section',
	) ) );
	$modern_furniture_store_args = array(
		'type'                     => 'product',
		'child_of'                 => 0,
		'parent'                   => '',
		'orderby'                  => 'term_group',
		'order'                    => 'ASC',
		'hide_empty'               => false,
		'hierarchical'             => 1,
		'number'                   => '',
		'taxonomy'                 => 'product_cat',
		'pad_counts'               => false
		);
		$categories = get_categories( $modern_furniture_store_args );
		$modern_furniture_store_cats = array();
		$i = 0;
		foreach($categories as $category){
				if($i==0){
						$default = $category->slug;
						$i++;
				}
		$modern_furniture_store_cats[$category->slug] = $category->name;
		}
		$wp_customize->add_setting('modern_furniture_store_recent_product_category',array(
				'sanitize_callback' => 'modern_furniture_store_sanitize_select',
		));
		$wp_customize->add_control('modern_furniture_store_recent_product_category',array(
				'type'    => 'select',
				'choices' => $modern_furniture_store_cats,
				'label' => __('Select Product Category','modern-furniture-store'),
				'section' => 'modern_furniture_store_product_section',
	));

	//footer
	$wp_customize->add_section('modern_furniture_store_footer_section',array(
		'title'	=> __('Footer Widget Settings','modern-furniture-store'),
		'priority' => 4,
		'panel' => 'modern_furniture_store_panel_id'
	));

	// footer columns
	$wp_customize->add_setting('modern_furniture_store_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'modern_furniture_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_furniture_store_footer_columns',array(
		'label'	=> __('Footer Widget Columns','modern-furniture-store'),
		'section'	=> 'modern_furniture_store_footer_section',
		'setting'	=> 'modern_furniture_store_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));
	$wp_customize->add_setting( 'modern_furniture_store_tp_footer_bg_color_option', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_furniture_store_tp_footer_bg_color_option', array(
			'label'     => __('Footer Widget Background Color', 'modern-furniture-store'),
			'description' => __('It will change the complete footer widget backgorund color.', 'modern-furniture-store'),
			'section' => 'modern_furniture_store_footer_section',
			'settings' => 'modern_furniture_store_tp_footer_bg_color_option',
	)));

	$wp_customize->add_setting('modern_furniture_store_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'modern_furniture_store_footer_widget_image',array(
        'label' => __('Footer Widget Background Image','modern-furniture-store'),
        'section' => 'modern_furniture_store_footer_section'
	)));

	$wp_customize->selective_refresh->add_partial( 'modern_furniture_store_footer_text', array(
		'selector' => '#footer p',
		'render_callback' => 'modern_furniture_store_customize_partial_modern_furniture_store_footer_text',
	) );

	//footer widget title font size
	$wp_customize->add_setting('modern_furniture_store_footer_widget_title_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'modern_furniture_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_furniture_store_footer_widget_title_font_size',array(
		'label'	=> __('Change Footer Widget Title Font Size in PX','modern-furniture-store'),
		'section'	=> 'modern_furniture_store_footer_section',
	    'setting'	=> 'modern_furniture_store_footer_widget_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'modern_furniture_store_footer_widget_title_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_furniture_store_footer_widget_title_color', array(
			'label'     => __('Change Footer Widget Title Color', 'modern-furniture-store'),
	    'section' => 'modern_furniture_store_footer_section',
	    'settings' => 'modern_furniture_store_footer_widget_title_color',
  	)));

    $wp_customize->add_setting( 'modern_furniture_store_return_to_header', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
    ) );
    $wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_return_to_header', array(
	 'label'       => esc_html__( 'Show / Hide Return to header', 'modern-furniture-store' ),
	 'section'     => 'modern_furniture_store_footer_section',
	 'type'        => 'toggle',
	 'settings'    => 'modern_furniture_store_return_to_header',
    ) ) );
    
    $wp_customize->add_setting('modern_furniture_store_scroll_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Modern_Furniture_Store_Icon_Changer(
        $wp_customize,'modern_furniture_store_scroll_icon',array(
		'label'	=> __('Scroll Top  Icon','modern-furniture-store'),
		'transport' => 'refresh',
		'section'	=> 'modern_furniture_store_footer_section',
		'type'		=> 'icon'
	)));

    // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('modern_furniture_store_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'modern_furniture_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_furniture_store_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'modern-furniture-store'),
        'description'   => __('This option work for scroll to top', 'modern-furniture-store'),
        'section' => 'modern_furniture_store_footer_section',
        'choices' => array(
            'Right' => __('Right','modern-furniture-store'),
            'Left' => __('Left','modern-furniture-store'),
            'Center' => __('Center','modern-furniture-store')
        ),
	) );

	//footer
	$wp_customize->add_section('modern_furniture_store_footer_copyright_section',array(
		'title'	=> __('Footer Copyright Settings','modern-furniture-store'),
		'description'	=> __('Add copyright text.','modern-furniture-store'),
		'priority' => 4,
		'panel' => 'modern_furniture_store_panel_id'
	));

	$wp_customize->add_setting('modern_furniture_store_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_footer_text',array(
		'label'	=> __('Copyright Text','modern-furniture-store'),
		'section'	=> 'modern_furniture_store_footer_copyright_section',
		'type'		=> 'text'
	));

	//footer widget title font size
	$wp_customize->add_setting('modern_furniture_store_footer_copyright_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'modern_furniture_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_furniture_store_footer_copyright_font_size',array(
		'label'	=> __('Change Footer Copyright Font Size in PX','modern-furniture-store'),
		'section'	=> 'modern_furniture_store_footer_copyright_section',
	    'setting'	=> 'modern_furniture_store_footer_copyright_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'modern_furniture_store_footer_copyright_text_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_furniture_store_footer_copyright_text_color', array(
			'label'     => __('Change Footer Copyright Text Color', 'modern-furniture-store'),
	    'section' => 'modern_furniture_store_footer_copyright_section',
	    'settings' => 'modern_furniture_store_footer_copyright_text_color',
  	)));

  	$wp_customize->add_setting('modern_furniture_store_footer_copyright_top_bottom_padding',array(
		'default'	=> '',
		'sanitize_callback'	=> 'modern_furniture_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_furniture_store_footer_copyright_top_bottom_padding',array(
		'label'	=> __('Change Footer Copyright Padding in PX','modern-furniture-store'),
		'section'	=> 'modern_furniture_store_footer_copyright_section',
	    'setting'	=> 'modern_furniture_store_footer_copyright_top_bottom_padding',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	// Add Settings and Controls for copyright
	$wp_customize->add_setting('modern_furniture_store_copyright_text_position',array(
        'default' => 'Center',
        'sanitize_callback' => 'modern_furniture_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_furniture_store_copyright_text_position',array(
        'type' => 'radio',
        'label'     => __('Copyright Text Position', 'modern-furniture-store'),
        'description'   => __('This option work for Copyright', 'modern-furniture-store'),
        'section' => 'modern_furniture_store_footer_copyright_section',
        'choices' => array(
            'Right' => __('Right','modern-furniture-store'),
            'Left' => __('Left','modern-furniture-store'),
            'Center' => __('Center','modern-furniture-store')
        ),
	) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'modern_furniture_store_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'modern_furniture_store_customize_partial_blogdescription',
	) );

		//MOBILE RESPONSIVE
	$wp_customize->add_section('modern_furniture_store_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'modern-furniture-store'),
		'description' => __('Control will no function if the toggle in the main settings is off.', 'modern-furniture-store'),
		'priority' => 5,
		'panel' => 'modern_furniture_store_panel_id'
	) );
	$wp_customize->add_setting( 'modern_furniture_store_return_to_header_mob', array(
		'default'           => True,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'modern-furniture-store' ),
		'section'     => 'modern_furniture_store_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_return_to_header_mob',
	) ) );
	$wp_customize->add_setting( 'modern_furniture_store_slider_button_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_slider_button_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'modern-furniture-store' ),
		'section'     => 'modern_furniture_store_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_slider_button_mob',
	) ) );
	$wp_customize->add_setting( 'modern_furniture_store_related_post_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_related_post_mob', array(
		'label'       => esc_html__( 'Show / Hide Related Post', 'modern-furniture-store' ),
		'section'     => 'modern_furniture_store_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_related_post_mob',
	) ) );

	//Site Identity
	$wp_customize->add_setting( 'modern_furniture_store_site_title_text', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_site_title_text', array(
		 'label'       => esc_html__( 'Show / Hide Site Title', 'modern-furniture-store' ),
		 'section'     => 'title_tagline',
		 'type'        => 'toggle',
		 'settings'    => 'modern_furniture_store_site_title_text',
	) ) );
	$wp_customize->add_setting('modern_furniture_store_site_title_font_size',array(
		'default'	=> 25,
		'sanitize_callback'	=> 'modern_furniture_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_furniture_store_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','modern-furniture-store'),
		'section'	=> 'title_tagline',
		'setting'	=> 'modern_furniture_store_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 80,
		),
	));

	$wp_customize->add_setting( 'modern_furniture_store_site_tagline_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_furniture_store_site_tagline_color', array(
			'label'     => __('Change Site Title Color', 'modern-furniture-store'),
	    'section' => 'title_tagline',
	    'settings' => 'modern_furniture_store_site_tagline_color',
  	)));

	$wp_customize->add_setting( 'modern_furniture_store_site_tagline_text', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_site_tagline_text', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'modern-furniture-store' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_site_tagline_text',
	) ) );

	// logo site tagline size
	$wp_customize->add_setting('modern_furniture_store_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'modern_furniture_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_furniture_store_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','modern-furniture-store'),
		'section'	=> 'title_tagline',
		'setting'	=> 'modern_furniture_store_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'modern_furniture_store_logo_tagline_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_furniture_store_logo_tagline_color', array(
			'label'     => __('Change Site Tagline Color', 'modern-furniture-store'),
	    'section' => 'title_tagline',
	    'settings' => 'modern_furniture_store_logo_tagline_color',
  	)));

    $wp_customize->add_setting('modern_furniture_store_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'modern_furniture_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_furniture_store_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','modern-furniture-store'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));
	$wp_customize->add_setting('modern_furniture_store_logo_settings',array(
        'default' => 'Different Line',
        'sanitize_callback' => 'modern_furniture_store_sanitize_choices'
	));
    $wp_customize->add_control('modern_furniture_store_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'modern-furniture-store'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'modern-furniture-store'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','modern-furniture-store'),
            'Same Line' => __('Same Line','modern-furniture-store')
        ),
	) );

	//Woo Commerce
	$wp_customize->add_setting('modern_furniture_store_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'modern_furniture_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_furniture_store_per_columns',array(
		'label'	=> __('Product Per Row','modern-furniture-store'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting('modern_furniture_store_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'modern_furniture_store_sanitize_number_absint'
	));
	$wp_customize->add_control('modern_furniture_store_product_per_page',array(
		'label'	=> __('Product Per Page','modern-furniture-store'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
    $wp_customize->add_setting( 'modern_furniture_store_product_sidebar', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_product_sidebar', array(
		 'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'modern-furniture-store' ),
		 'section'     => 'woocommerce_product_catalog',
		 'type'        => 'toggle',
		 'settings'    => 'modern_furniture_store_product_sidebar',
    ) ) );
    $wp_customize->add_setting('modern_furniture_store_sale_tag_position',array(
        'default' => 'right',
        'sanitize_callback' => 'modern_furniture_store_sanitize_choices'
	));
	$wp_customize->add_control('modern_furniture_store_sale_tag_position',array(
        'type' => 'radio',
        'label'     => __('Sale Badge Position', 'modern-furniture-store'),
        'description'   => __('This option work for Archieve Products', 'modern-furniture-store'),
        'section' => 'woocommerce_product_catalog',
        'choices' => array(
            'left' => __('Left','modern-furniture-store'),
            'right' => __('Right','modern-furniture-store'),
        ),
	) );
	$wp_customize->add_setting( 'modern_furniture_store_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
    ) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_single_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'modern-furniture-store' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_single_product_sidebar',
	) ) );
	$wp_customize->add_setting( 'modern_furniture_store_related_product', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'modern_furniture_store_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Modern_Furniture_Store_Toggle_Control( $wp_customize, 'modern_furniture_store_related_product', array(
		'label'       => esc_html__( 'Show / Hide related product', 'modern-furniture-store' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'modern_furniture_store_related_product',
	) ) );
	
	//Page template settings
	$wp_customize->add_panel( 'modern_furniture_store_page_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Page Template Settings', 'modern-furniture-store' ),
	    'description' => __( 'Description of what this panel does.', 'modern-furniture-store' ),
	) );

	// 404 PAGE
	$wp_customize->add_section('modern_furniture_store_404_page_section',array(
		'title'         => __('404 Page', 'modern-furniture-store'),
		'description'   => 'Here you can customize 404 Page content.',
		'panel' => 'modern_furniture_store_page_panel_id'
	) );

	$wp_customize->add_setting('modern_furniture_store_edit_404_title',array(
		'default'=> __('Oops! That page cant be found.','modern-furniture-store'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('modern_furniture_store_edit_404_title',array(
		'label'	=> __('Edit Title','modern-furniture-store'),
		'section'=> 'modern_furniture_store_404_page_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('modern_furniture_store_edit_404_text',array(
		'default'=> __('It looks like nothing was found at this location. Maybe try a search?','modern-furniture-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_edit_404_text',array(
		'label'	=> __('Edit Text','modern-furniture-store'),
		'section'=> 'modern_furniture_store_404_page_section',
		'type'=> 'text'
	));

	// Search Results
	$wp_customize->add_section('modern_furniture_store_no_result_section',array(
		'title'         => __('Search Results', 'modern-furniture-store'),
		'description'   => 'Here you can customize Search Result content.',
		'panel' => 'modern_furniture_store_page_panel_id'
	) );

	$wp_customize->add_setting('modern_furniture_store_edit_no_result_title',array(
		'default'=> __('Nothing Found','modern-furniture-store'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('modern_furniture_store_edit_no_result_title',array(
		'label'	=> __('Edit Title','modern-furniture-store'),
		'section'=> 'modern_furniture_store_no_result_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('modern_furniture_store_edit_no_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','modern-furniture-store'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('modern_furniture_store_edit_no_result_text',array(
		'label'	=> __('Edit Text','modern-furniture-store'),
		'section'=> 'modern_furniture_store_no_result_section',
		'type'=> 'text'
	));

	// Header Image Height
    $wp_customize->add_setting(
        'modern_furniture_store_header_image_height',
        array(
            'default'           => 350,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'modern_furniture_store_header_image_height',
        array(
            'label'       => esc_html__( 'Header Image Height', 'modern-furniture-store' ),
            'section'     => 'header_image',
            'type'        => 'number',
            'description' => esc_html__( 'Control the height of the header image. Default is 350px.', 'modern-furniture-store' ),
            'input_attrs' => array(
                'min'  => 220,
                'max'  => 1000,
                'step' => 1,
            ),
        )
    );

    // Header Background Position
    $wp_customize->add_setting(
        'modern_furniture_store_header_background_position',
        array(
            'default'           => 'center',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'modern_furniture_store_header_background_position',
        array(
            'label'       => esc_html__( 'Header Background Position', 'modern-furniture-store' ),
            'section'     => 'header_image',
            'type'        => 'select',
            'choices'     => array(
                'top'    => esc_html__( 'Top', 'modern-furniture-store' ),
                'center' => esc_html__( 'Center', 'modern-furniture-store' ),
                'bottom' => esc_html__( 'Bottom', 'modern-furniture-store' ),
            ),
            'description' => esc_html__( 'Choose how you want to position the header image.', 'modern-furniture-store' ),
        )
    );

    // Header Image Parallax Effect
    $wp_customize->add_setting(
        'modern_furniture_store_header_background_attachment',
        array(
            'default'           => 1,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'modern_furniture_store_header_background_attachment',
        array(
            'label'       => esc_html__( 'Header Image Parallax', 'modern-furniture-store' ),
            'section'     => 'header_image',
            'type'        => 'checkbox',
            'description' => esc_html__( 'Add a parallax effect on page scroll.', 'modern-furniture-store' ),
        )
    );

    $wp_customize->add_setting(
        'modern_furniture_store_header_image_title_font_size',
        array(
            'default'           => 32,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'modern_furniture_store_header_image_title_font_size',
        array(
            'label'       => esc_html__( 'Change Header Image Title Font Size', 'modern-furniture-store' ),
            'section'     => 'header_image',
            'type'        => 'number',
            'description' => esc_html__( 'Control the font Size of the header image title. Default is 32px.', 'modern-furniture-store' ),
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 200,
                'step' => 1,
            ),
        )
    );

	$wp_customize->add_setting( 'modern_furniture_store_header_image_title_text_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'modern_furniture_store_header_image_title_text_color', array(
			'label'     => __('Change Header Image Title Color', 'modern-furniture-store'),
	    'section' => 'header_image',
	    'settings' => 'modern_furniture_store_header_image_title_text_color',
  	)));
}
add_action( 'customize_register', 'modern_furniture_store_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Modern Furniture Store 1.0
 * @see modern_furniture_store_customize_register()
 *
 * @return void
 */
function modern_furniture_store_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Modern Furniture Store 1.0
 * @see modern_furniture_store_customize_register()
 *
 * @return void
 */
function modern_furniture_store_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'MODERN_FURNITURE_STORE_PRO_THEME_NAME' ) ) {
	define( 'MODERN_FURNITURE_STORE_PRO_THEME_NAME', esc_html__( 'Modern Furniture Pro', 'modern-furniture-store' ));
}
if ( ! defined( 'MODERN_FURNITURE_STORE_PRO_THEME_URL' ) ) {
	define( 'MODERN_FURNITURE_STORE_PRO_THEME_URL', esc_url('https://www.themespride.com/products/furniture-store-wordpress-theme'));
}
if ( ! defined( 'MODERN_FURNITURE_STORE_DOCS_URL' ) ) {
	define( 'MODERN_FURNITURE_STORE_DOCS_URL', esc_url('https://page.themespride.com/demo/docs/modern-furniture-store/'));
}


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Modern_Furniture_Store_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Modern_Furniture_Store_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Modern_Furniture_Store_Customize_Section_Pro(
				$manager,
				'modern_furniture_store_section_pro',
				array(
					'priority'   => 9,
					'title'    => MODERN_FURNITURE_STORE_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'modern-furniture-store' ),
					'pro_url'  => esc_url( MODERN_FURNITURE_STORE_PRO_THEME_URL, 'modern-furniture-store' ),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new Modern_Furniture_Store_Customize_Section_Pro(
				$manager,
				'modern_furniture_store_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'modern-furniture-store' ),
					'pro_text' => esc_html__( 'Click Here', 'modern-furniture-store' ),
					'pro_url'  => esc_url( MODERN_FURNITURE_STORE_DOCS_URL, 'modern-furniture-store'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'modern-furniture-store-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'modern-furniture-store-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );

		wp_enqueue_script( 'modern-furniture-store-owl-carousel', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/owl.carousel.js' );
	}
}

// Doing this customizer thang!
Modern_Furniture_Store_Customize::get_instance();
