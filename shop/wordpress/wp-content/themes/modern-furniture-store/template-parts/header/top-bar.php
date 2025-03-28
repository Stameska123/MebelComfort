<?php
/*
* Display Top Bar
*/
?>

<div class="top-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 align-self-center text-lg-start">
        <div class="timebox">
          <?php if( get_theme_mod( 'modern_furniture_store_topbar_text') != '') { ?>
            <span class="phone"><?php echo esc_html( get_theme_mod('modern_furniture_store_topbar_text','')); ?></span>
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 align-self-center text-lg-center">
        <div class="social-media">
          <?php                 
            $modern_furniture_store_header_fb_new_tab = esc_attr(get_theme_mod('modern_furniture_store_header_fb_new_tab','true'));
            $modern_furniture_store_header_twt_new_tab = esc_attr(get_theme_mod('modern_furniture_store_header_twt_new_tab','true'));
            $modern_furniture_store_header_ins_new_tab = esc_attr(get_theme_mod('modern_furniture_store_header_ins_new_tab','true'));
            $modern_furniture_store_header_ut_new_tab = esc_attr(get_theme_mod('modern_furniture_store_header_ut_new_tab','true'));
            $modern_furniture_store_header_pint_new_tab = esc_attr(get_theme_mod('modern_furniture_store_header_pint_new_tab','true'));
            ?>
          <?php if( get_theme_mod( 'modern_furniture_store_facebook_url' ) != '') { ?>
            <a <?php if($modern_furniture_store_header_fb_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'modern_furniture_store_facebook_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('modern_furniture_store_facebook_icon','fab fa-facebook-f')); ?>"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'modern_furniture_store_twitter_url' ) != '') { ?>
            <a <?php if($modern_furniture_store_header_twt_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'modern_furniture_store_twitter_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('modern_furniture_store_twt_icon','fab fa-twitter')); ?>"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'modern_furniture_store_instagram_url' ) != '') { ?>
            <a <?php if($modern_furniture_store_header_ins_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'modern_furniture_store_instagram_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('modern_furniture_store_instagram_icon','fab fa-instagram')); ?>"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'modern_furniture_store_youtube_url' ) != '') { ?>
            <a <?php if($modern_furniture_store_header_ut_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'modern_furniture_store_youtube_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('modern_furniture_store_youtube_icon','fab fa-youtube')); ?>"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'modern_furniture_store_pint_url' ) != '') { ?>
            <a <?php if($modern_furniture_store_header_pint_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'modern_furniture_store_pint_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('modern_furniture_store_pint_icon','fab fa-pinterest')); ?>"></i></a>
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 align-self-center">
        <div class="topbar-links align-self-center">
           <?php if(get_theme_mod('modern_furniture_store_about_us_link' ) != '' || get_theme_mod('modern_furniture_store_about_us_text') != ""){?>
            <span><a href="<?php echo esc_url( get_theme_mod('modern_furniture_store_about_us_link','') ); ?>"> <?php echo esc_html( get_theme_mod('modern_furniture_store_about_us_text','') ); ?></a></span>
          <?php } ?>
          <?php if(class_exists('woocommerce')){ ?>
          <?php global $woocommerce; ?>
          <span><?php if( get_theme_mod('modern_furniture_store_change_usd',true) != '' ){ ?>
            <?php echo do_shortcode('[woocommerce_currency_switcher_drop_down_box]'); ?>
          <?php }?></span>
          <?php } ?>
          <?php if(get_theme_mod('modern_furniture_store_wishlist_link' ) != '' || get_theme_mod('modern_furniture_store_wishlist_text') != ""){?>
          <span><a href="<?php echo esc_url( get_theme_mod('modern_furniture_store_wishlist_link','') ); ?>"> <?php echo esc_html( get_theme_mod('modern_furniture_store_wishlist_text','') ); ?></a></span>
          <?php } ?>

        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
