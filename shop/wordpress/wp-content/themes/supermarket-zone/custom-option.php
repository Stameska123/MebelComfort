<?php

    $digital_storefront_theme_css= "";

    /*--------------------------- Preloader color -------------------*/
    $digital_storefront_preloader2_dot_color = get_theme_mod( 'digital_storefront_preloader2_dot_color');
    if( $digital_storefront_preloader2_dot_color != '') {
        $digital_storefront_theme_css .='.load hr {';
            $digital_storefront_theme_css .='background-color: '. $digital_storefront_preloader2_dot_color. ';';
        $digital_storefront_theme_css .='}';
    }