<?php

    $digital_storefront_theme_css= "";

    /*--------------------------- Scroll To Top Positions -------------------*/

    $digital_storefront_scroll_position = get_theme_mod( 'digital_storefront_scroll_top_position','Right');
    if($digital_storefront_scroll_position == 'Right'){
        $digital_storefront_theme_css .='#button{';
            $digital_storefront_theme_css .='right: 20px;';
        $digital_storefront_theme_css .='}';
    }else if($digital_storefront_scroll_position == 'Left'){
        $digital_storefront_theme_css .='#button{';
            $digital_storefront_theme_css .='left: 20px; right:auto;';
        $digital_storefront_theme_css .='}';
    }else if($digital_storefront_scroll_position == 'Center'){
        $digital_storefront_theme_css .='#button{';
            $digital_storefront_theme_css .='right: auto;left: 50%; transform: translateX(-50%);';
        $digital_storefront_theme_css .='}';
    }

    /*--------------------------- Slider Image Opacity -------------------*/
    $digital_storefront_slider_opacity_setting = get_theme_mod( 'digital_storefront_slider_opacity_setting',true);
    $digital_storefront_image_opacity_color = get_theme_mod( 'digital_storefront_image_opacity_color');
    $digital_storefront_slider_opacity = get_theme_mod( 'digital_storefront_slider_opacity');
    if( $digital_storefront_slider_opacity_setting != false) {
        $digital_storefront_theme_css .='#top-slider .slider-box img{';
            $digital_storefront_theme_css .='opacity: '. $digital_storefront_slider_opacity. ';';
        $digital_storefront_theme_css .='}';
        if( $digital_storefront_image_opacity_color != '') {
            $digital_storefront_theme_css .='#top-slider .slider-box {';
                $digital_storefront_theme_css .='background-color: '. $digital_storefront_image_opacity_color. ';';
            $digital_storefront_theme_css .='}';
        }
    } else {
        $digital_storefront_theme_css .='#top-slider .slider-box img{';
            $digital_storefront_theme_css .='opacity: 1;';
        $digital_storefront_theme_css .='}';
    }

    /*---------------------------Slider Height ------------*/

    $digital_storefront_slider_img_height = get_theme_mod('digital_storefront_slider_img_height');
    if($digital_storefront_slider_img_height != false){
        $digital_storefront_theme_css .='#top-slider img{';
            $digital_storefront_theme_css .='height: '.esc_attr($digital_storefront_slider_img_height).';';
        $digital_storefront_theme_css .='}';
    }

    /*--------------------------- Post Page Image Box Shadow -------------------*/

    $digital_storefront_post_page_image_box_shadow = get_theme_mod('digital_storefront_post_page_image_box_shadow',0);
    if($digital_storefront_post_page_image_box_shadow != false){
        $digital_storefront_theme_css .='.article-box img{';
            $digital_storefront_theme_css .='box-shadow: '.esc_attr($digital_storefront_post_page_image_box_shadow).'px '.esc_attr($digital_storefront_post_page_image_box_shadow).'px '.esc_attr($digital_storefront_post_page_image_box_shadow).'px #cccccc;';
        $digital_storefront_theme_css .='}';
    }

    /*---------------- Single post Settings ------------------*/

    $digital_storefront_single_post_navigation_show_hide = get_theme_mod('digital_storefront_single_post_navigation_show_hide',true);
    if($digital_storefront_single_post_navigation_show_hide != true){
        $digital_storefront_theme_css .='.nav-links{';
            $digital_storefront_theme_css .='display: none;';
        $digital_storefront_theme_css .='}';
    }

    /*--------------------------- Product Image Box Shadow -------------------*/

    $digital_storefront_woo_product_image_box_shadow = get_theme_mod('digital_storefront_woo_product_image_box_shadow',0);
    if($digital_storefront_woo_product_image_box_shadow != false){
        $digital_storefront_theme_css .='.woocommerce ul.products li.product a img{';
            $digital_storefront_theme_css .='box-shadow: '.esc_attr($digital_storefront_woo_product_image_box_shadow).'px '.esc_attr($digital_storefront_woo_product_image_box_shadow).'px '.esc_attr($digital_storefront_woo_product_image_box_shadow).'px #cccccc;';
        $digital_storefront_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Positions -------------------*/

    $digital_storefront_product_sale = get_theme_mod( 'digital_storefront_woocommerce_product_sale','Right');
    if($digital_storefront_product_sale == 'Right'){
        $digital_storefront_theme_css .='.woocommerce ul.products li.product .onsale{';
            $digital_storefront_theme_css .='left: auto; right: 15px;';
        $digital_storefront_theme_css .='}';
    }else if($digital_storefront_product_sale == 'Left'){
        $digital_storefront_theme_css .='.woocommerce ul.products li.product .onsale{';
            $digital_storefront_theme_css .='left: 15px; right: auto;';
        $digital_storefront_theme_css .='}';
    }else if($digital_storefront_product_sale == 'Center'){
        $digital_storefront_theme_css .='.woocommerce ul.products li.product .onsale{';
            $digital_storefront_theme_css .='right: 50%;left: 50%;';
        $digital_storefront_theme_css .='}';
    }

    /*--------------------------- Scroll To Top Border Radius -------------------*/

    $digital_storefront_scroll_to_top_border_radius = get_theme_mod('digital_storefront_scroll_to_top_border_radius');
    $digital_storefront_scroll_bg_color = get_theme_mod('digital_storefront_scroll_bg_color');
    $digital_storefront_scroll_color = get_theme_mod('digital_storefront_scroll_color');
    $digital_storefront_scroll_font_size = get_theme_mod('digital_storefront_scroll_font_size');
    if($digital_storefront_scroll_to_top_border_radius != false || $digital_storefront_scroll_bg_color != false || $digital_storefront_scroll_color != false || $digital_storefront_scroll_font_size != false){
        $digital_storefront_theme_css .='#colophon a#button{';
            $digital_storefront_theme_css .='border-radius: '.esc_attr($digital_storefront_scroll_to_top_border_radius).'px; background-color: '.esc_attr($digital_storefront_scroll_bg_color).'; color: '.esc_attr($digital_storefront_scroll_color).' !important; font-size: '.esc_attr($digital_storefront_scroll_font_size).'px;';
        $digital_storefront_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Border Radius -------------------*/

    $digital_storefront_woo_product_border_radius = get_theme_mod('digital_storefront_woo_product_border_radius', 0);
    if($digital_storefront_woo_product_border_radius != false){
        $digital_storefront_theme_css .='.woocommerce ul.products li.product a img{';
            $digital_storefront_theme_css .='border-radius: '.esc_attr($digital_storefront_woo_product_border_radius).'px;';
        $digital_storefront_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Border Radius -------------------*/

    $digital_storefront_woo_product_sale_border_radius = get_theme_mod('digital_storefront_woo_product_sale_border_radius');
    if($digital_storefront_woo_product_sale_border_radius != false){
        $digital_storefront_theme_css .='.woocommerce ul.products li.product .onsale{';
            $digital_storefront_theme_css .='border-radius: '.esc_attr($digital_storefront_woo_product_sale_border_radius).'px;';
        $digital_storefront_theme_css .='}';
    }

    /*--------------------------- Footer Background Color -------------------*/

    $digital_storefront_footer_background_color = get_theme_mod('digital_storefront_footer_background_color');
    if($digital_storefront_footer_background_color != false){
        $digital_storefront_theme_css .='.footer-widgets{';
            $digital_storefront_theme_css .='background-color: '.esc_attr($digital_storefront_footer_background_color).' !important;';
        $digital_storefront_theme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $digital_storefront_footer_bg_image = get_theme_mod('digital_storefront_footer_bg_image');
    if($digital_storefront_footer_bg_image != false){
        $digital_storefront_theme_css .='#colophon{';
            $digital_storefront_theme_css .='background: url('.esc_attr($digital_storefront_footer_bg_image).')!important;';
        $digital_storefront_theme_css .='}';
    }

    /*--------------------------- Single Post Page Image Box Shadow -------------------*/

    $digital_storefront_single_post_page_image_box_shadow = get_theme_mod('digital_storefront_single_post_page_image_box_shadow',0);
    if($digital_storefront_single_post_page_image_box_shadow != false){
        $digital_storefront_theme_css .='.single-post .entry-header img{';
            $digital_storefront_theme_css .='box-shadow: '.esc_attr($digital_storefront_single_post_page_image_box_shadow).'px '.esc_attr($digital_storefront_single_post_page_image_box_shadow).'px '.esc_attr($digital_storefront_single_post_page_image_box_shadow).'px #cccccc;';
        $digital_storefront_theme_css .='}';
    }

     /*--------------------------- Single Post Page Image Border Radius -------------------*/

    $digital_storefront_single_post_page_image_border_radius = get_theme_mod('digital_storefront_single_post_page_image_border_radius', 0);
    if($digital_storefront_single_post_page_image_border_radius != false){
        $digital_storefront_theme_css .='.single-post .entry-header img{';
            $digital_storefront_theme_css .='border-radius: '.esc_attr($digital_storefront_single_post_page_image_border_radius).'px;';
        $digital_storefront_theme_css .='}';
    }

    /*--------------------------- Footer Background Image Position -------------------*/

    $digital_storefront_footer_bg_image_position = get_theme_mod( 'digital_storefront_footer_bg_image_position','scroll');
    if($digital_storefront_footer_bg_image_position == 'fixed'){
        $digital_storefront_theme_css .='#colophon{';
            $digital_storefront_theme_css .='background-attachment: fixed !important; background-position: center !important;';
        $digital_storefront_theme_css .='}';
    }elseif ($digital_storefront_footer_bg_image_position == 'scroll'){
        $digital_storefront_theme_css .='#colophon{';
            $digital_storefront_theme_css .='background-attachment: scroll !important; background-position: center !important;';
        $digital_storefront_theme_css .='}';
    }

    /*--------------------------- Footer Widget Heading Alignment -------------------*/

    $digital_storefront_footer_widget_heading_alignment = get_theme_mod( 'digital_storefront_footer_widget_heading_alignment','Left');
    if($digital_storefront_footer_widget_heading_alignment == 'Left'){
        $digital_storefront_theme_css .='#colophon h5, h5.footer-column-widget-title{';
        $digital_storefront_theme_css .='text-align: left;';
        $digital_storefront_theme_css .='}';
    }else if($digital_storefront_footer_widget_heading_alignment == 'Center'){
        $digital_storefront_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $digital_storefront_theme_css .='text-align: center;';
        $digital_storefront_theme_css .='}';
    }else if($digital_storefront_footer_widget_heading_alignment == 'Right'){
        $digital_storefront_theme_css .='#colophon h5, h5.footer-column-widget-title{';
            $digital_storefront_theme_css .='text-align: right;';
        $digital_storefront_theme_css .='}';
    }

    /*--------------------------- Copyright Background Color -------------------*/

    $digital_storefront_copyright_background_color = get_theme_mod('digital_storefront_copyright_background_color');
    if($digital_storefront_copyright_background_color != false){
        $digital_storefront_theme_css .='.footer_info{';
            $digital_storefront_theme_css .='background-color: '.esc_attr($digital_storefront_copyright_background_color).' !important;';
        $digital_storefront_theme_css .='}';
    } 

    /*--------------------------- Site Title And Tagline Color -------------------*/

    $digital_storefront_logo_title_color = get_theme_mod('digital_storefront_logo_title_color');
    if($digital_storefront_logo_title_color != false){
        $digital_storefront_theme_css .='p.site-title a, .navbar-brand a{';
            $digital_storefront_theme_css .='color: '.esc_attr($digital_storefront_logo_title_color).' !important;';
        $digital_storefront_theme_css .='}';
    }

    $digital_storefront_logo_tagline_color = get_theme_mod('digital_storefront_logo_tagline_color');
    if($digital_storefront_logo_tagline_color != false){
        $digital_storefront_theme_css .='.logo p.site-description, .navbar-brand p{';
            $digital_storefront_theme_css .='color: '.esc_attr($digital_storefront_logo_tagline_color).'  !important;';
        $digital_storefront_theme_css .='}';
    }

    /*--------------------------- Footer Widget Content Alignment -------------------*/

    $digital_storefront_footer_widget_content_alignment = get_theme_mod( 'digital_storefront_footer_widget_content_alignment','Left');
    if($digital_storefront_footer_widget_content_alignment == 'Left'){
        $digital_storefront_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
        $digital_storefront_theme_css .='text-align: left;';
        $digital_storefront_theme_css .='}';
    }else if($digital_storefront_footer_widget_content_alignment == 'Center'){
        $digital_storefront_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $digital_storefront_theme_css .='text-align: center;';
        $digital_storefront_theme_css .='}';
    }else if($digital_storefront_footer_widget_content_alignment == 'Right'){
        $digital_storefront_theme_css .='#colophon ul, #colophon p, .tagcloud, .widget{';
            $digital_storefront_theme_css .='text-align: right;';
        $digital_storefront_theme_css .='}';
    }

    /*--------------------------- Copyright Content Alignment -------------------*/

    $digital_storefront_copyright_content_alignment = get_theme_mod( 'digital_storefront_copyright_content_alignment','Right');
    if($digital_storefront_copyright_content_alignment == 'Left'){
        $digital_storefront_theme_css .='.footer-menu-left{';
        $digital_storefront_theme_css .='text-align: left;';
        $digital_storefront_theme_css .='}';
    }else if($digital_storefront_copyright_content_alignment == 'Center'){
        $digital_storefront_theme_css .='.footer-menu-left{';
            $digital_storefront_theme_css .='text-align: center;';
        $digital_storefront_theme_css .='}';
    }else if($digital_storefront_copyright_content_alignment == 'Right'){
        $digital_storefront_theme_css .='.footer-menu-left{';
            $digital_storefront_theme_css .='text-align: right;';
        $digital_storefront_theme_css .='}';
    }

    /*------------------ Nav Menus -------------------*/

    $digital_storefront_nav_menu = get_theme_mod( 'digital_storefront_nav_menu_text_transform','Uppercase');
    if($digital_storefront_nav_menu == 'Capitalize'){
        $digital_storefront_theme_css .='.main-navigation .menu > li > a{';
            $digital_storefront_theme_css .='text-transform:Capitalize;';
        $digital_storefront_theme_css .='}';
    }
    if($digital_storefront_nav_menu == 'Lowercase'){
        $digital_storefront_theme_css .='.main-navigation .menu > li > a{';
            $digital_storefront_theme_css .='text-transform:Lowercase;';
        $digital_storefront_theme_css .='}';
    }
    if($digital_storefront_nav_menu == 'Uppercase'){
        $digital_storefront_theme_css .='.main-navigation .menu > li > a{';
            $digital_storefront_theme_css .='text-transform:Uppercase;';
        $digital_storefront_theme_css .='}';
    }

    $digital_storefront_menu_font_size = get_theme_mod( 'digital_storefront_menu_font_size');
    if($digital_storefront_menu_font_size != ''){
        $digital_storefront_theme_css .='.main-navigation .menu > li > a{';
            $digital_storefront_theme_css .='font-size: '.esc_attr($digital_storefront_menu_font_size).'px;';
        $digital_storefront_theme_css .='}';
    }

    $digital_storefront_nav_menu_font_weight = get_theme_mod( 'digital_storefront_nav_menu_font_weight',400);
    if($digital_storefront_menu_font_size != ''){
        $digital_storefront_theme_css .='.main-navigation .menu > li > a{';
            $digital_storefront_theme_css .='font-weight: '.esc_attr($digital_storefront_nav_menu_font_weight).';';
        $digital_storefront_theme_css .='}';
    }

    /*------------------ Slider CSS -------------------*/

    $digital_storefront_slider_content_layout = get_theme_mod( 'digital_storefront_slider_content_layout','Left');
    if($digital_storefront_slider_content_layout == 'Left'){
        $digital_storefront_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $digital_storefront_theme_css .='text-align : left;';
        $digital_storefront_theme_css .='}';
    }
    if($digital_storefront_slider_content_layout == 'Center'){
        $digital_storefront_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $digital_storefront_theme_css .='text-align : center;';
        $digital_storefront_theme_css .='}';
    }
    if($digital_storefront_slider_content_layout == 'Right'){
        $digital_storefront_theme_css .='.slider-inner-box, #top-slider .slider-inner-box p{';
            $digital_storefront_theme_css .='text-align : right;';
        $digital_storefront_theme_css .='}';
    }