<?php

	$modern_furniture_store_tp_theme_css = "";

//body-layout
$modern_furniture_store_theme_lay = get_theme_mod( 'modern_furniture_store_tp_body_layout_settings','Full');
if($modern_furniture_store_theme_lay == 'Container Fluid'){
$modern_furniture_store_tp_theme_css .='body{';
	$modern_furniture_store_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
$modern_furniture_store_tp_theme_css .='}';
$modern_furniture_store_tp_theme_css .='.page-template-front-page .menubar{';
	$modern_furniture_store_tp_theme_css .='width: 99%';
$modern_furniture_store_tp_theme_css .='}';
$modern_furniture_store_tp_theme_css .='@media screen and (max-width:575px){';
$modern_furniture_store_tp_theme_css .='body{';
	$modern_furniture_store_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left:0px';
$modern_furniture_store_tp_theme_css .='} }';
$modern_furniture_store_tp_theme_css .='.scrolled{';
	$modern_furniture_store_tp_theme_css .='width: auto; left:0; right:0;';
$modern_furniture_store_tp_theme_css .='}';
}else if($modern_furniture_store_theme_lay == 'Full'){
$modern_furniture_store_tp_theme_css .='body{';
	$modern_furniture_store_tp_theme_css .='max-width: 100%;';
$modern_furniture_store_tp_theme_css .='}';
}

//scrol-top
$modern_furniture_store_scroll_position = get_theme_mod( 'modern_furniture_store_scroll_top_position','Right');
if($modern_furniture_store_scroll_position == 'Right'){
$modern_furniture_store_tp_theme_css .='#return-to-top{';
    $modern_furniture_store_tp_theme_css .='right: 20px;';
$modern_furniture_store_tp_theme_css .='}';
}else if($modern_furniture_store_scroll_position == 'Left'){
$modern_furniture_store_tp_theme_css .='#return-to-top{';
    $modern_furniture_store_tp_theme_css .='left: 20px;';
$modern_furniture_store_tp_theme_css .='}';
}else if($modern_furniture_store_scroll_position == 'Center'){
$modern_furniture_store_tp_theme_css .='#return-to-top{';
    $modern_furniture_store_tp_theme_css .='right: 50%;left: 50%;';
$modern_furniture_store_tp_theme_css .='}';
}

//Social icon Font size
$modern_furniture_store_social_icon_fontsize = get_theme_mod('modern_furniture_store_social_icon_fontsize');
	$modern_furniture_store_tp_theme_css .='.social-media i {';
$modern_furniture_store_tp_theme_css .='font-size: '.esc_attr($modern_furniture_store_social_icon_fontsize).'px;';
$modern_furniture_store_tp_theme_css .='}';

// site title font size option
$modern_furniture_store_site_title_font_size = get_theme_mod('modern_furniture_store_site_title_font_size', 25);{
$modern_furniture_store_tp_theme_css .='.logo h1 , .logo p a{';
	$modern_furniture_store_tp_theme_css .='font-size: '.esc_attr($modern_furniture_store_site_title_font_size).'px;';
$modern_furniture_store_tp_theme_css .='}';
}

//site tagline font size option
$modern_furniture_store_site_tagline_font_size = get_theme_mod('modern_furniture_store_site_tagline_font_size', 15);{
$modern_furniture_store_tp_theme_css .='.logo p{';
	$modern_furniture_store_tp_theme_css .='font-size: '.esc_attr($modern_furniture_store_site_tagline_font_size).'px;';
$modern_furniture_store_tp_theme_css .='}';
}

// related post
$modern_furniture_store_related_post_mob = get_theme_mod('modern_furniture_store_related_post_mob', true);
$modern_furniture_store_related_post = get_theme_mod('modern_furniture_store_remove_related_post', true);
$modern_furniture_store_tp_theme_css .= '.related-post-block {';
if ($modern_furniture_store_related_post == false) {
    $modern_furniture_store_tp_theme_css .= 'display: none;';
}
$modern_furniture_store_tp_theme_css .= '}';
$modern_furniture_store_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($modern_furniture_store_related_post == false || $modern_furniture_store_related_post_mob == false) {
    $modern_furniture_store_tp_theme_css .= '.related-post-block { display: none; }';
}
$modern_furniture_store_tp_theme_css .= '}';

// slider btn
$modern_furniture_store_slider_button_mob = get_theme_mod('modern_furniture_store_slider_button_mob', true);
$modern_furniture_store_slider_button = get_theme_mod('modern_furniture_store_slider_button', true);
$modern_furniture_store_tp_theme_css .= '#slider .home-btn {';
if ($modern_furniture_store_slider_button == false) {
    $modern_furniture_store_tp_theme_css .= 'display: none;';
}
$modern_furniture_store_tp_theme_css .= '}';
$modern_furniture_store_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($modern_furniture_store_slider_button == false || $modern_furniture_store_slider_button_mob == false) {
    $modern_furniture_store_tp_theme_css .= '#slider .home-btn { display: none; }';
}
$modern_furniture_store_tp_theme_css .= '}';

//return to header mobile				
$modern_furniture_store_return_to_header_mob = get_theme_mod('modern_furniture_store_return_to_header_mob', true);
$modern_furniture_store_return_to_header = get_theme_mod('modern_furniture_store_return_to_header', true);
$modern_furniture_store_tp_theme_css .= '.return-to-header{';
if ($modern_furniture_store_return_to_header == false) {
    $modern_furniture_store_tp_theme_css .= 'display: none;';
}
$modern_furniture_store_tp_theme_css .= '}';
$modern_furniture_store_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($modern_furniture_store_return_to_header == false || $modern_furniture_store_return_to_header_mob == false) {
    $modern_furniture_store_tp_theme_css .= '.return-to-header{ display: none; }';
}
$modern_furniture_store_tp_theme_css .= '}';



//footer image
$modern_furniture_store_footer_widget_image = get_theme_mod('modern_furniture_store_footer_widget_image');
if($modern_furniture_store_footer_widget_image != false){
$modern_furniture_store_tp_theme_css .='#footer{';
	$modern_furniture_store_tp_theme_css .='background: url('.esc_attr($modern_furniture_store_footer_widget_image).');';
$modern_furniture_store_tp_theme_css .='}';
}

// related product
$modern_furniture_store_related_product = get_theme_mod('modern_furniture_store_related_product',true);
if($modern_furniture_store_related_product == false){
$modern_furniture_store_tp_theme_css .='.related.products{';
	$modern_furniture_store_tp_theme_css .='display: none;';
$modern_furniture_store_tp_theme_css .='}';
}

//menu font size
$modern_furniture_store_menu_font_size = get_theme_mod('modern_furniture_store_menu_font_size', 15);{
$modern_furniture_store_tp_theme_css .='.main-navigation a, .main-navigation li.page_item_has_children:after, .main-navigation li.menu-item-has-children:after{';
	$modern_furniture_store_tp_theme_css .='font-size: '.esc_attr($modern_furniture_store_menu_font_size).'px;';
$modern_furniture_store_tp_theme_css .='}';
}

// menu text tranform
$modern_furniture_store_menu_text_tranform = get_theme_mod( 'modern_furniture_store_menu_text_tranform','Capitalize');
if($modern_furniture_store_menu_text_tranform == 'Uppercase'){
$modern_furniture_store_tp_theme_css .='.main-navigation a {';
	$modern_furniture_store_tp_theme_css .='text-transform: uppercase;';
$modern_furniture_store_tp_theme_css .='}';
}else if($modern_furniture_store_menu_text_tranform == 'Lowercase'){
$modern_furniture_store_tp_theme_css .='.main-navigation a {';
	$modern_furniture_store_tp_theme_css .='text-transform: lowercase;';
$modern_furniture_store_tp_theme_css .='}';
}
else if($modern_furniture_store_menu_text_tranform == 'Capitalize'){
$modern_furniture_store_tp_theme_css .='.main-navigation a {';
	$modern_furniture_store_tp_theme_css .='text-transform: capitalize;';
$modern_furniture_store_tp_theme_css .='}';
}

//======================= slider Content layout ===================== //

$modern_furniture_store_slider_content_layout = get_theme_mod('modern_furniture_store_slider_content_layout', 'LEFT-ALIGN'); 
$modern_furniture_store_tp_theme_css .= '.slide-inner-box{';
switch ($modern_furniture_store_slider_content_layout) {
    case 'LEFT-ALIGN':
        $modern_furniture_store_tp_theme_css .= 'text-align:left; right: 30%; left: 15%';
        break;
    case 'CENTER-ALIGN':
        $modern_furniture_store_tp_theme_css .= 'text-align:center; left: 15%; right: 15%';
        break;
    case 'RIGHT-ALIGN':
        $modern_furniture_store_tp_theme_css .= 'text-align:right; left: 30%; right: 15%';
        break;
    default:
        $modern_furniture_store_tp_theme_css .= 'text-align:left; right: 30%; left: 15%';
        break;
}
$modern_furniture_store_tp_theme_css .= '}';

//sale position
$modern_furniture_store_scroll_position = get_theme_mod( 'modern_furniture_store_sale_tag_position','right');
if($modern_furniture_store_scroll_position == 'right'){
$modern_furniture_store_tp_theme_css .='.woocommerce ul.products li.product .onsale{';
    $modern_furniture_store_tp_theme_css .='right: 25px !important;';
$modern_furniture_store_tp_theme_css .='}';
}else if($modern_furniture_store_scroll_position == 'left'){
$modern_furniture_store_tp_theme_css .='.woocommerce ul.products li.product .onsale{';
    $modern_furniture_store_tp_theme_css .='left: 25px !important;';
$modern_furniture_store_tp_theme_css .='}';
}

//Font Weight
$modern_furniture_store_menu_font_weight = get_theme_mod( 'modern_furniture_store_menu_font_weight','400');
if($modern_furniture_store_menu_font_weight == '100'){
$modern_furniture_store_tp_theme_css .='.main-navigation a{';
    $modern_furniture_store_tp_theme_css .='font-weight: 100;';
$modern_furniture_store_tp_theme_css .='}';
}else if($modern_furniture_store_menu_font_weight == '200'){
$modern_furniture_store_tp_theme_css .='.main-navigation a{';
    $modern_furniture_store_tp_theme_css .='font-weight: 200;';
$modern_furniture_store_tp_theme_css .='}';
}else if($modern_furniture_store_menu_font_weight == '300'){
$modern_furniture_store_tp_theme_css .='.main-navigation a{';
    $modern_furniture_store_tp_theme_css .='font-weight: 300;';
$modern_furniture_store_tp_theme_css .='}';
}else if($modern_furniture_store_menu_font_weight == '400'){
$modern_furniture_store_tp_theme_css .='.main-navigation a{';
    $modern_furniture_store_tp_theme_css .='font-weight: 400;';
$modern_furniture_store_tp_theme_css .='}';
}else if($modern_furniture_store_menu_font_weight == '500'){
$modern_furniture_store_tp_theme_css .='.main-navigation a{';
    $modern_furniture_store_tp_theme_css .='font-weight: 500;';
$modern_furniture_store_tp_theme_css .='}';
}else if($modern_furniture_store_menu_font_weight == '600'){
$modern_furniture_store_tp_theme_css .='.main-navigation a{';
    $modern_furniture_store_tp_theme_css .='font-weight: 600;';
$modern_furniture_store_tp_theme_css .='}';
}else if($modern_furniture_store_menu_font_weight == '700'){
$modern_furniture_store_tp_theme_css .='.main-navigation a{';
    $modern_furniture_store_tp_theme_css .='font-weight: 700;';
$modern_furniture_store_tp_theme_css .='}';
}else if($modern_furniture_store_menu_font_weight == '800'){
$modern_furniture_store_tp_theme_css .='.main-navigation a{';
    $modern_furniture_store_tp_theme_css .='font-weight: 800;';
$modern_furniture_store_tp_theme_css .='}';
}else if($modern_furniture_store_menu_font_weight == '900'){
$modern_furniture_store_tp_theme_css .='.main-navigation a{';
    $modern_furniture_store_tp_theme_css .='font-weight: 900;';
$modern_furniture_store_tp_theme_css .='}';
}

/*------------- Blog Page------------------*/
$modern_furniture_store_post_image_round = get_theme_mod('modern_furniture_store_post_image_round', 0);
if($modern_furniture_store_post_image_round != false){
    $modern_furniture_store_tp_theme_css .='.blog .box-image img{';
        $modern_furniture_store_tp_theme_css .='border-radius: '.esc_attr($modern_furniture_store_post_image_round).'px;';
    $modern_furniture_store_tp_theme_css .='}';
}

$modern_furniture_store_post_image_width = get_theme_mod('modern_furniture_store_post_image_width', '');
if($modern_furniture_store_post_image_width != false){
    $modern_furniture_store_tp_theme_css .='.blog .box-image img{';
        $modern_furniture_store_tp_theme_css .='Width: '.esc_attr($modern_furniture_store_post_image_width).'px;';
    $modern_furniture_store_tp_theme_css .='}';
}

$modern_furniture_store_post_image_length = get_theme_mod('modern_furniture_store_post_image_length', '');
if($modern_furniture_store_post_image_length != false){
    $modern_furniture_store_tp_theme_css .='.blog .box-image img{';
        $modern_furniture_store_tp_theme_css .='height: '.esc_attr($modern_furniture_store_post_image_length).'px;';
    $modern_furniture_store_tp_theme_css .='}';
}

// footer widget title font size
    $modern_furniture_store_footer_widget_title_font_size = get_theme_mod('modern_furniture_store_footer_widget_title_font_size', '');{
    $modern_furniture_store_tp_theme_css .='#footer h3, #footer h2.wp-block-heading{';
        $modern_furniture_store_tp_theme_css .='font-size: '.esc_attr($modern_furniture_store_footer_widget_title_font_size).'px;';
    $modern_furniture_store_tp_theme_css .='}';
    }

    // Copyright text font size
    $modern_furniture_store_footer_copyright_font_size = get_theme_mod('modern_furniture_store_footer_copyright_font_size', '');{
    $modern_furniture_store_tp_theme_css .='#footer .site-info p{';
        $modern_furniture_store_tp_theme_css .='font-size: '.esc_attr($modern_furniture_store_footer_copyright_font_size).'px;';
    $modern_furniture_store_tp_theme_css .='}';
    }

    // copyright padding
    $modern_furniture_store_footer_copyright_top_bottom_padding = get_theme_mod('modern_furniture_store_footer_copyright_top_bottom_padding', '');
    if ($modern_furniture_store_footer_copyright_top_bottom_padding !== '') { 
        $modern_furniture_store_tp_theme_css .= '.site-info {';
        $modern_furniture_store_tp_theme_css .= 'padding-top: ' . esc_attr($modern_furniture_store_footer_copyright_top_bottom_padding) . 'px;';
        $modern_furniture_store_tp_theme_css .= 'padding-bottom: ' . esc_attr($modern_furniture_store_footer_copyright_top_bottom_padding) . 'px;';
        $modern_furniture_store_tp_theme_css .= '}';
    }

    // copyright position
    $modern_furniture_store_copyright_text_position = get_theme_mod( 'modern_furniture_store_copyright_text_position','Center');
    if($modern_furniture_store_copyright_text_position == 'Center'){
    $modern_furniture_store_tp_theme_css .='#footer .site-info p{';
    $modern_furniture_store_tp_theme_css .='text-align:center;';
    $modern_furniture_store_tp_theme_css .='}';
    }else if($modern_furniture_store_copyright_text_position == 'Left'){
    $modern_furniture_store_tp_theme_css .='#footer .site-info p{';
    $modern_furniture_store_tp_theme_css .='text-align:left;';
    $modern_furniture_store_tp_theme_css .='}';
    }else if($modern_furniture_store_copyright_text_position == 'Right'){
    $modern_furniture_store_tp_theme_css .='#footer .site-info p{';
    $modern_furniture_store_tp_theme_css .='text-align:right;';
    $modern_furniture_store_tp_theme_css .='}';
}

// Header Image title font size
$modern_furniture_store_header_image_title_font_size = get_theme_mod('modern_furniture_store_header_image_title_font_size', '32');{
$modern_furniture_store_tp_theme_css .='.box-text h2{';
    $modern_furniture_store_tp_theme_css .='font-size: '.esc_attr($modern_furniture_store_header_image_title_font_size).'px;';
$modern_furniture_store_tp_theme_css .='}';
}