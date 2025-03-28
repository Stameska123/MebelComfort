<?php
/**
 * Modern Furniture Store functions and definitions
 *
 * @package Modern Furniture Store
 * @subpackage modern_furniture_store
 */

function modern_furniture_store_setup() {

	load_theme_textdomain( 'modern-furniture-store', get_template_directory() . '/language' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'modern-furniture-store-featured-image', 2000, 1200, true );
	add_image_size( 'modern-furniture-store-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'    => __( 'Primary Menu', 'modern-furniture-store' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', modern_furniture_store_fonts_url() ) );
}
add_action( 'after_setup_theme', 'modern_furniture_store_setup' );

/**
 * Register custom fonts.
 */
function modern_furniture_store_fonts_url(){
	$modern_furniture_store_font_url = '';
	$modern_furniture_store_font_family = array();
	$modern_furniture_store_font_family[] = 'Playfair Display:400,400i,700,700i,900,900i';
	$modern_furniture_store_font_family[] = 'Poppins:200,200i,300,300i,400,400i,500';
	$modern_furniture_store_font_family[] = 'Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';

	$modern_furniture_store_font_family[] = 'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_furniture_store_font_family[] = 'Bad Script';
	$modern_furniture_store_font_family[] = 'Bebas Neue';
	$modern_furniture_store_font_family[] = 'Fjalla One';
	$modern_furniture_store_font_family[] = 'PT Sans:ital,wght@0,400;0,700;1,400;1,700';
	$modern_furniture_store_font_family[] = 'PT Serif:ital,wght@0,400;0,700;1,400;1,700';
	$modern_furniture_store_font_family[] = 'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900';
	$modern_furniture_store_font_family[] = 'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700';
	$modern_furniture_store_font_family[] = 'Alex Brush';
	$modern_furniture_store_font_family[] = 'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_furniture_store_font_family[] = 'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_furniture_store_font_family[] = 'Playball';
	$modern_furniture_store_font_family[] = 'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_furniture_store_font_family[] = 'Julius Sans One';
	$modern_furniture_store_font_family[] = 'Arsenal:ital,wght@0,400;0,700;1,400;1,700';
	$modern_furniture_store_font_family[] = 'Slabo 13px';
	$modern_furniture_store_font_family[] = 'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900';
	$modern_furniture_store_font_family[] = 'Overpass Mono:wght@300;400;500;600;700';
	$modern_furniture_store_font_family[] = 'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900';
	$modern_furniture_store_font_family[] = 'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_furniture_store_font_family[] = 'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900';
	$modern_furniture_store_font_family[] = 'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_furniture_store_font_family[] = 'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$modern_furniture_store_font_family[] = 'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700';
	$modern_furniture_store_font_family[] = 'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$modern_furniture_store_font_family[] = 'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$modern_furniture_store_font_family[] = 'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_furniture_store_font_family[] = 'Quicksand:wght@300;400;500;600;700';
	$modern_furniture_store_font_family[] = 'Padauk:wght@400;700';
	$modern_furniture_store_font_family[] = 'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$modern_furniture_store_font_family[] = 'Inconsolata:wght@200;300;400;500;600;700;800;900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$modern_furniture_store_font_family[] = 'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$modern_furniture_store_font_family[] = 'Pacifico';
	$modern_furniture_store_font_family[] = 'Indie Flower';
	$modern_furniture_store_font_family[] = 'VT323';
	$modern_furniture_store_font_family[] = 'Dosis:wght@200;300;400;500;600;700;800';
	$modern_furniture_store_font_family[] = 'Frank Ruhl Libre:wght@300;400;500;700;900';
	$modern_furniture_store_font_family[] = 'Fjalla One';
	$modern_furniture_store_font_family[] = 'Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_furniture_store_font_family[] = 'Oxygen:wght@300;400;700';
	$modern_furniture_store_font_family[] = 'Arvo:ital,wght@0,400;0,700;1,400;1,700';
	$modern_furniture_store_font_family[] = 'Noto Serif:ital,wght@0,400;0,700;1,400;1,700';
	$modern_furniture_store_font_family[] = 'Lobster';
	$modern_furniture_store_font_family[] = 'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700';
	$modern_furniture_store_font_family[] = 'Yanone Kaffeesatz:wght@200;300;400;500;600;700';
	$modern_furniture_store_font_family[] = 'Anton';
	$modern_furniture_store_font_family[] = 'Libre Baskerville:ital,wght@0,400;0,700;1,400';
	$modern_furniture_store_font_family[] = 'Bree Serif';
	$modern_furniture_store_font_family[] = 'Gloria Hallelujah';
	$modern_furniture_store_font_family[] = 'Abril Fatface';
	$modern_furniture_store_font_family[] = 'Varela Round';
	$modern_furniture_store_font_family[] = 'Vampiro One';
	$modern_furniture_store_font_family[] = 'Shadows Into Light';
	$modern_furniture_store_font_family[] = 'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$modern_furniture_store_font_family[] = 'Rokkitt:wght@100;200;300;400;500;600;700;800;900';
	$modern_furniture_store_font_family[] = 'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_furniture_store_font_family[] = 'Francois One';
	$modern_furniture_store_font_family[] = 'Orbitron:wght@400;500;600;700;800;900';
	$modern_furniture_store_font_family[] = 'Patua One';
	$modern_furniture_store_font_family[] = 'Acme';
	$modern_furniture_store_font_family[] = 'Satisfy';
	$modern_furniture_store_font_family[] = 'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700';
	$modern_furniture_store_font_family[] = 'Quattrocento Sans:ital,wght@0,400;0,700;1,400;1,700';
	$modern_furniture_store_font_family[] = 'Architects Daughter';
	$modern_furniture_store_font_family[] = 'Russo One';
	$modern_furniture_store_font_family[] = 'Monda:wght@400;700';
	$modern_furniture_store_font_family[] = 'Righteous';
	$modern_furniture_store_font_family[] = 'Lobster Two:ital,wght@0,400;0,700;1,400;1,700';
	$modern_furniture_store_font_family[] = 'Hammersmith One';
	$modern_furniture_store_font_family[] = 'Courgette';
	$modern_furniture_store_font_family[] = 'Permanent Marke';
	$modern_furniture_store_font_family[] = 'Cherry Swash:wght@400;700';
	$modern_furniture_store_font_family[] = 'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700';
	$modern_furniture_store_font_family[] = 'Poiret One';
	$modern_furniture_store_font_family[] = 'BenchNine:wght@300;400;700';
	$modern_furniture_store_font_family[] = 'Economica:ital,wght@0,400;0,700;1,400;1,700';
	$modern_furniture_store_font_family[] = 'Handlee';
	$modern_furniture_store_font_family[] = 'Cardo:ital,wght@0,400;0,700;1,400';
	$modern_furniture_store_font_family[] = 'Alfa Slab One';
	$modern_furniture_store_font_family[] = 'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700';
	$modern_furniture_store_font_family[] = 'Cookie';
	$modern_furniture_store_font_family[] = 'Chewy';
	$modern_furniture_store_font_family[] = 'Great Vibes';
	$modern_furniture_store_font_family[] = 'Coming Soon';
	$modern_furniture_store_font_family[] = 'Philosopher:ital,wght@0,400;0,700;1,400;1,700';
	$modern_furniture_store_font_family[] = 'Days One';
	$modern_furniture_store_font_family[] = 'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_furniture_store_font_family[] = 'Shrikhand';
	$modern_furniture_store_font_family[] = 'Tangerine:wght@400;700';
	$modern_furniture_store_font_family[] = 'IM Fell English SC';
	$modern_furniture_store_font_family[] = 'Boogaloo';
	$modern_furniture_store_font_family[] = 'Bangers';
	$modern_furniture_store_font_family[] = 'Fredoka One';
	$modern_furniture_store_font_family[] = 'Volkhov:ital,wght@0,400;0,700;1,400;1,700';
	$modern_furniture_store_font_family[] = 'Shadows Into Light Two';
	$modern_furniture_store_font_family[] = 'Marck Script';
	$modern_furniture_store_font_family[] = 'Sacramento';
	$modern_furniture_store_font_family[] = 'Unica One';
	$modern_furniture_store_font_family[] = 'Dancing Script:wght@400;500;600;700';
	$modern_furniture_store_font_family[] = 'Exo 2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_furniture_store_font_family[] = 'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_furniture_store_font_family[] = 'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$modern_furniture_store_font_family[] = 'DM Serif Display:ital@0;1';
	$modern_furniture_store_font_family[] = 'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800';

	$modern_furniture_store_query_args = array(
		'family'	=> rawurlencode(implode('|',$modern_furniture_store_font_family)),
	);
	$modern_furniture_store_font_url = add_query_arg($modern_furniture_store_query_args,'//fonts.googleapis.com/css');
	return $modern_furniture_store_font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $modern_furniture_store_font_url ) );
}

/**
 * Register widget area.
 */
function modern_furniture_store_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'modern-furniture-store' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'modern-furniture-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'modern-furniture-store' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'modern-furniture-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'modern-furniture-store' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'modern-furniture-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'modern-furniture-store' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'modern-furniture-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'modern-furniture-store' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'modern-furniture-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'modern-furniture-store' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'modern-furniture-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'modern-furniture-store' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'modern-furniture-store' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'modern_furniture_store_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function modern_furniture_store_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'modern-furniture-store-fonts', modern_furniture_store_fonts_url(), array(), null );

	// Bootstrap
	wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

	//Owl Carousel CSS
	wp_enqueue_style( 'owl.carousel-style', get_theme_file_uri( '/assets/css/owl.carousel.css' ) );

	// Theme stylesheet.
	wp_enqueue_style( 'modern-furniture-store-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/tp-theme-color.php' );
	wp_add_inline_style( 'modern-furniture-store-style',$modern_furniture_store_tp_theme_css );
	require get_parent_theme_file_path( '/tp-body-width-layout.php' );
	wp_add_inline_style( 'modern-furniture-store-style',$modern_furniture_store_tp_theme_css );
	wp_style_add_data('modern-furniture-store-style', 'rtl', 'replace');

	// Theme block stylesheet.
	wp_enqueue_style( 'modern-furniture-store-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'modern-furniture-store-style' ), '1.0' );

	// Fontawesome
	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/assets/css/fontawesome-all.css' ) );

	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ), true );

	//Owl Carousel JS
	wp_enqueue_script( 'owl.carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ),true );

	wp_enqueue_script( 'modern-furniture-store-custom-scripts', esc_url( get_template_directory_uri() ) . '/assets/js/custom.js', array('jquery'), true );

	wp_enqueue_script( 'modern-furniture-store-focus-nav', esc_url( get_template_directory_uri() ) . '/assets/js/focus-nav.js', array('jquery'), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	$modern_furniture_store_body_font_family = get_theme_mod('modern_furniture_store_body_font_family', '');

	$modern_furniture_store_heading_font_family = get_theme_mod('modern_furniture_store_heading_font_family', '');

	$modern_furniture_store_menu_font_family = get_theme_mod('modern_furniture_store_menu_font_family', '');

	$modern_furniture_store_tp_theme_css = '
		body{
		    font-family: '.esc_html($modern_furniture_store_body_font_family).';
		}
		.more-btn a{
		    font-family: '.esc_html($modern_furniture_store_body_font_family).';
		}
		h1,.logo h1{
		    font-family: '.esc_html($modern_furniture_store_heading_font_family).';
		}
		h2{
		    font-family: '.esc_html($modern_furniture_store_heading_font_family).';
		}
		h3{
		    font-family: '.esc_html($modern_furniture_store_heading_font_family).';
		}
		h4{
		    font-family: '.esc_html($modern_furniture_store_heading_font_family).';
		}
		h5{
		    font-family: '.esc_html($modern_furniture_store_heading_font_family).';
		}
		h6{
		    font-family: '.esc_html($modern_furniture_store_heading_font_family).';
		}
		#theme-sidebar .wp-block-search .wp-block-search__label{
		    font-family: '.esc_html($modern_furniture_store_heading_font_family).';
		}
		.menubar{
		    font-family: '.esc_html($modern_furniture_store_menu_font_family).';
		}
	';
	wp_add_inline_style('modern-furniture-store-style', $modern_furniture_store_tp_theme_css);
}
add_action( 'wp_enqueue_scripts', 'modern_furniture_store_scripts' );

//Admin Enqueue for Admin
function modern_furniture_store_admin_enqueue_scripts(){
	wp_enqueue_style('modern-furniture-store-admin-style', esc_url( get_template_directory_uri() ) . '/assets/css/admin.css');
	wp_enqueue_script( 'modern-furniture-store-custom-scripts', esc_url( get_template_directory_uri() ). '/assets/js/custom.js', array('jquery'), true);
	wp_register_script( 'modern-furniture-store-admin-script', get_template_directory_uri() . '/assets/js/modern-furniture-store-admin.js', array( 'jquery' ), '', true );

	wp_localize_script(
		'modern-furniture-store-admin-script',
		'modern_furniture_store',
		array(
			'admin_ajax'	=>	admin_url('admin-ajax.php'),
			'wpnonce'			=>	wp_create_nonce('modern_furniture_store_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('modern-furniture-store-admin-script');

    wp_localize_script( 'modern-furniture-store-admin-script', 'modern_furniture_store_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'modern_furniture_store_admin_enqueue_scripts' );

// Category count 
function modern_furniture_store_display_post_category_count() {
    $modern_furniture_store_category = get_the_category();
    $modern_furniture_store_category_count = ($modern_furniture_store_category) ? count($modern_furniture_store_category) : 0;
    $modern_furniture_store_category_text = ($modern_furniture_store_category_count === 1) ? 'category' : 'categories'; // Check for pluralization
    echo $modern_furniture_store_category_count . ' ' . $modern_furniture_store_category_text;
}

//post tag
function custom_tags_filter($modern_furniture_store_tag_list) {
    // Replace the comma (,) with an empty string
    $modern_furniture_store_tag_list = str_replace(', ', '', $modern_furniture_store_tag_list);

    return $modern_furniture_store_tag_list;
}
add_filter('the_tags', 'custom_tags_filter');

function custom_output_tags() {
    $modern_furniture_store_tags = get_the_tags();

    if ($modern_furniture_store_tags) {
        $modern_furniture_store_tags_output = '<div class="post_tag">Tags: ';

        $modern_furniture_store_first_tag = reset($modern_furniture_store_tags);

        foreach ($modern_furniture_store_tags as $tag) {
            $modern_furniture_store_tags_output .= '<a href="' . esc_url(get_tag_link($tag)) . '" rel="tag" class="me-2">' . esc_html($tag->name) . '</a>';
            if ($tag !== $modern_furniture_store_first_tag) {
                $modern_furniture_store_tags_output .= ' ';
            }
        }

        $modern_furniture_store_tags_output .= '</div>';

        echo $modern_furniture_store_tags_output;
    }
}

/*radio button sanitization*/
function modern_furniture_store_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function modern_furniture_store_sanitize_sortable( $val, $setting ) {
	if ( is_string( $val ) || is_numeric( $val ) ) {
		return array(
			esc_attr( $val ),
		);
	}
	$sanitized_value = array();
	foreach ( $val as $item ) {
		if ( isset( $setting->manager->get_control( $setting->id )->choices[ $item ] ) ) {
			$sanitized_value[] = esc_attr( $item );
		}
	}
	return $sanitized_value;
}
/* Excerpt Limit Begin */
function modern_furniture_store_excerpt_function($excerpt_count = 35) {
    $modern_furniture_store_excerpt = get_the_excerpt();

    $modern_furniture_store_text_excerpt = wp_strip_all_tags($modern_furniture_store_excerpt);

    $modern_furniture_store_excerpt_limit = esc_attr(get_theme_mod('modern_furniture_store_excerpt_count', $excerpt_count));

    $modern_furniture_store_theme_excerpt = implode(' ', array_slice(explode(' ', $modern_furniture_store_text_excerpt), 0, $modern_furniture_store_excerpt_limit));

    return $modern_furniture_store_theme_excerpt;
}


// Change number or products per row to 3
add_filter('loop_shop_columns', 'modern_furniture_store_loop_columns');
if (!function_exists('modern_furniture_store_loop_columns')) {
	function modern_furniture_store_loop_columns() {
		$columns = get_theme_mod( 'modern_furniture_store_per_columns', 3 );
		return $columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'modern_furniture_store_per_page', 20 );
function modern_furniture_store_per_page( $modern_furniture_store_cols ) {
  	$modern_furniture_store_cols = get_theme_mod( 'modern_furniture_store_product_per_page', 9 );
	return $modern_furniture_store_cols;
}

function modern_furniture_store_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function modern_furniture_store_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

function modern_furniture_store_sanitize_select( $input, $setting ){
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function modern_furniture_store_sanitize_number_range( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function modern_furniture_store_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'modern_furniture_store_front_page_template' );

define('MODERN_FURNITURE_STORE_CREDIT',__('https://www.themespride.com/products/free-furniture-wordpress-theme','modern-furniture-store') );
if ( ! function_exists( 'modern_furniture_store_credit' ) ) {
	function modern_furniture_store_credit(){
		echo "<a href=".esc_url(MODERN_FURNITURE_STORE_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('modern_furniture_store_footer_text',__('Furniture Store WordPress Theme','modern-furniture-store')))."</a>";
	}
}

add_action( 'wp_ajax_modern_furniture_store_dismissed_notice_handler', 'modern_furniture_store_ajax_notice_handler' );

function modern_furniture_store_ajax_notice_handler() {
	if (!wp_verify_nonce($_POST['wpnonce'], 'modern_furniture_store_dismissed_notice_nonce')) {
		exit;
	}
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function modern_furniture_store_activation_notice() { 

	if ( ! get_option('dismissed-get_started', FALSE ) ) { ?>

    <div class="modern-furniture-store-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="modern-furniture-store-getting-started-notice clearfix">
            <div class="modern-furniture-store-theme-notice-content">
                <h2 class="modern-furniture-store-notice-h2">
                    <?php
                printf(
                /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                    esc_html__( 'Welcome! Thank you for choosing %1$s!', 'modern-furniture-store' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                ?>
                </h2>

                <p class="plugin-install-notice"><?php echo sprintf(__('Click here to get started with the theme set-up.', 'modern-furniture-store')) ?></p>

                <a class="modern-furniture-store-btn-get-started button button-primary button-hero modern-furniture-store-button-padding" href="<?php echo esc_url( admin_url( 'themes.php?page=modern-furniture-store-about' )); ?>" ><?php esc_html_e( 'Get started', 'modern-furniture-store' ) ?></a><span class="modern-furniture-store-push-down">
                <?php
                    /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                    printf(
                        'or %1$sCustomize theme%2$s</a></span>',
                        '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                        '</a>'
                    );
                ?>
            </div>
        </div>
    </div>
<?php }

}

add_action( 'admin_notices', 'modern_furniture_store_activation_notice' );

add_action('after_switch_theme', 'modern_furniture_store_setup_options');
function modern_furniture_store_setup_options () {
    update_option('dismissed-get_started', FALSE );
}


/**
 * Logo Custamization.
 */

function modern_furniture_store_logo_width(){

	$modern_furniture_store_logo_width   = get_theme_mod( 'modern_furniture_store_logo_width', 150 );

	echo "<style type='text/css' media='all'>"; ?>
		img.custom-logo{
		    width: <?php echo absint( $modern_furniture_store_logo_width ); ?>px;
		    max-width: 100%;
		}
	<?php echo "</style>";
}

add_action( 'wp_head', 'modern_furniture_store_logo_width' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Load Theme About Page
 */
require get_parent_theme_file_path( '/inc/about-theme.php' );

/**
 * Load Theme Web File
 */
require get_parent_theme_file_path('/inc/wptt-webfont-loader.php' );
/**
 * Load toggle control
 */
require get_parent_theme_file_path( '/inc/controls/customize-control-toggle.php' );
/**
 * load sortable file
 */
require get_parent_theme_file_path( '/inc/controls/sortable-control.php' );

/**
 * TGM Recommendation
 */
require get_parent_theme_file_path( '/inc/TGM/tgm.php' );