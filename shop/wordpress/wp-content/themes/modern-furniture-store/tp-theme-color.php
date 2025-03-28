<?php

$modern_furniture_store_tp_theme_css = '';

$modern_furniture_store_tp_color_option = get_theme_mod('modern_furniture_store_tp_color_option');

// 1st color
$modern_furniture_store_tp_color_option = get_theme_mod('modern_furniture_store_tp_color_option', '#f26685');
if ($modern_furniture_store_tp_color_option) {
	$modern_furniture_store_tp_theme_css .= ':root {';
	$modern_furniture_store_tp_theme_css .= '--color-primary1: ' . esc_attr($modern_furniture_store_tp_color_option) . ';';
	$modern_furniture_store_tp_theme_css .= '}';
}

// 1st color
$modern_furniture_store_tp_color_second_option = get_theme_mod('modern_furniture_store_tp_color_second_option', '#f17169');
if ($modern_furniture_store_tp_color_second_option) {
	$modern_furniture_store_tp_theme_css .= ':root {';
	$modern_furniture_store_tp_theme_css .= '--color-primary2: ' . esc_attr($modern_furniture_store_tp_color_second_option) . ';';
	$modern_furniture_store_tp_theme_css .= '}';
}

//preloader

$modern_furniture_store_tp_preloader_color1_option = get_theme_mod('modern_furniture_store_tp_preloader_color1_option');
$modern_furniture_store_tp_preloader_color2_option = get_theme_mod('modern_furniture_store_tp_preloader_color2_option');
$modern_furniture_store_tp_preloader_bg_color_option = get_theme_mod('modern_furniture_store_tp_preloader_bg_color_option');

if($modern_furniture_store_tp_preloader_color1_option != false){
$modern_furniture_store_tp_theme_css .='.center1{';
	$modern_furniture_store_tp_theme_css .='border-color: '.esc_attr($modern_furniture_store_tp_preloader_color1_option).' !important;';
$modern_furniture_store_tp_theme_css .='}';
}
if($modern_furniture_store_tp_preloader_color1_option != false){
$modern_furniture_store_tp_theme_css .='.center1 .ring::before{';
	$modern_furniture_store_tp_theme_css .='background: '.esc_attr($modern_furniture_store_tp_preloader_color1_option).' !important;';
$modern_furniture_store_tp_theme_css .='}';
}
if($modern_furniture_store_tp_preloader_color2_option != false){
$modern_furniture_store_tp_theme_css .='.center2{';
	$modern_furniture_store_tp_theme_css .='border-color: '.esc_attr($modern_furniture_store_tp_preloader_color2_option).' !important;';
$modern_furniture_store_tp_theme_css .='}';
}
if($modern_furniture_store_tp_preloader_color2_option != false){
$modern_furniture_store_tp_theme_css .='.center2 .ring::before{';
	$modern_furniture_store_tp_theme_css .='background: '.esc_attr($modern_furniture_store_tp_preloader_color2_option).' !important;';
$modern_furniture_store_tp_theme_css .='}';
}
if($modern_furniture_store_tp_preloader_bg_color_option != false){
$modern_furniture_store_tp_theme_css .='.loader{';
	$modern_furniture_store_tp_theme_css .='background: '.esc_attr($modern_furniture_store_tp_preloader_bg_color_option).';';
$modern_furniture_store_tp_theme_css .='}';
}

// footer-bg-color
$modern_furniture_store_tp_footer_bg_color_option = get_theme_mod('modern_furniture_store_tp_footer_bg_color_option');

if($modern_furniture_store_tp_footer_bg_color_option != false){
$modern_furniture_store_tp_theme_css .='#footer{';
	$modern_furniture_store_tp_theme_css .='background: '.esc_attr($modern_furniture_store_tp_footer_bg_color_option).' !important;';
$modern_furniture_store_tp_theme_css .='}';
}

// logo tagline color
$modern_furniture_store_site_tagline_color = get_theme_mod('modern_furniture_store_site_tagline_color');

if($modern_furniture_store_site_tagline_color != false){
$modern_furniture_store_tp_theme_css .='.logo h1 a, .logo p, .logo p.site-title a{';
$modern_furniture_store_tp_theme_css .='color: '.esc_attr($modern_furniture_store_site_tagline_color).';';
$modern_furniture_store_tp_theme_css .='}';
}

$modern_furniture_store_logo_tagline_color = get_theme_mod('modern_furniture_store_logo_tagline_color');
if($modern_furniture_store_logo_tagline_color != false){
$modern_furniture_store_tp_theme_css .='p.site-description{';
$modern_furniture_store_tp_theme_css .='color: '.esc_attr($modern_furniture_store_logo_tagline_color).';';
$modern_furniture_store_tp_theme_css .='}';
}

// footer widget title color
$modern_furniture_store_footer_widget_title_color = get_theme_mod('modern_furniture_store_footer_widget_title_color');
if($modern_furniture_store_footer_widget_title_color != false){
$modern_furniture_store_tp_theme_css .='#footer h3, #footer h2.wp-block-heading{';
$modern_furniture_store_tp_theme_css .='color: '.esc_attr($modern_furniture_store_footer_widget_title_color).';';
$modern_furniture_store_tp_theme_css .='}';
}

// copyright text color
$modern_furniture_store_footer_copyright_text_color = get_theme_mod('modern_furniture_store_footer_copyright_text_color');
if($modern_furniture_store_footer_copyright_text_color != false){
$modern_furniture_store_tp_theme_css .='#footer .site-info p, #footer .site-info a {';
$modern_furniture_store_tp_theme_css .='color: '.esc_attr($modern_furniture_store_footer_copyright_text_color).';';
$modern_furniture_store_tp_theme_css .='}';
}


// header image title color
$modern_furniture_store_header_image_title_text_color = get_theme_mod('modern_furniture_store_header_image_title_text_color');
if($modern_furniture_store_header_image_title_text_color != false){
$modern_furniture_store_tp_theme_css .='.box-text h2{';
$modern_furniture_store_tp_theme_css .='color: '.esc_attr($modern_furniture_store_header_image_title_text_color).';';
$modern_furniture_store_tp_theme_css .='}';
}

// menu color
$modern_furniture_store_menu_color = get_theme_mod('modern_furniture_store_menu_color');
if($modern_furniture_store_menu_color != false){
$modern_furniture_store_tp_theme_css .='.main-navigation a{';
$modern_furniture_store_tp_theme_css .='color: '.esc_attr($modern_furniture_store_menu_color).';';
$modern_furniture_store_tp_theme_css .='}';
}
