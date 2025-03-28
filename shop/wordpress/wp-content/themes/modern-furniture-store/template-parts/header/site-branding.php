<?php
/*
* Display Logo and contact details
*/
?>

<div class="headerbox">
  <div class="container">
    <div class="row">
      <div class="head-1 col-lg-5 col-md-4 align-self-center text-lg-start pb-2">
          <div class="row">
            <div class="col-lg-6">
              <?php if( get_theme_mod( 'modern_furniture_store_shipping_text' ) != '' || get_theme_mod( 'modern_furniture_store_shipping' ) != '') { ?>
              <div class="row head-box">
                <div class="col-lg-3 col-md-3 align-self-center"><i class="<?php echo esc_attr(get_theme_mod('modern_furniture_store_shipping_icon','fas fa-truck')); ?>"></i></div>
                <div class="col-lg-9 col-md-9 align-self-center">
                  <p class="infotext"><?php echo esc_html( get_theme_mod('modern_furniture_store_shipping_text','')); ?></p>
                  <p class="mb-0"><?php echo esc_html( get_theme_mod('modern_furniture_store_shipping','') ); ?></p>
                </div>
              </div>
              <?php } ?>
            </div>
            <div class="col-lg-6">
              <?php if(get_theme_mod( 'modern_furniture_store_return_text' ) != '' || get_theme_mod( 'modern_furniture_store_return' ) != '') { ?>
              <div class="row head-box">
                <div class="col-lg-3 col-md-3 align-self-center"><i class="<?php echo esc_attr(get_theme_mod('modern_furniture_store_return_icon','fas fa-undo')); ?>"></i></div>
                <div class="col-lg-9 col-md-9 align-self-center">
                  <p class="infotext"><?php echo esc_html( get_theme_mod('modern_furniture_store_return_text','')); ?></p>
                  <p class="mb-0"><?php echo esc_html( get_theme_mod('modern_furniture_store_return','') ); ?></p>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
      </div>
      <div class="col-lg-2 col-md-4 align-self-center">
        <?php $modern_furniture_store_logo_settings = get_theme_mod( 'modern_furniture_store_logo_settings','Different Line');
        if($modern_furniture_store_logo_settings == 'Different Line'){ ?>
          <div class="logo">
            <?php if( has_custom_logo() ) modern_furniture_store_the_custom_logo(); ?>
            <?php if( get_theme_mod('modern_furniture_store_site_title_text',true) == 1){ ?>
              <?php if (is_front_page() && is_home()) : ?>
                <h1 class="text-capitalize">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                </h1> 
              <?php else : ?>
                  <p class="text-capitalize site-title">
                      <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                  </p>
              <?php endif; ?>
            <?php }?>
            <?php $modern_furniture_store_description = get_bloginfo( 'description', 'display' );
            if ( $modern_furniture_store_description || is_customize_preview() ) : ?>
              <?php if( get_theme_mod('modern_furniture_store_site_tagline_text',false)){ ?>
                <p class="site-description"><?php echo esc_html($modern_furniture_store_description); ?></p>
              <?php }?>
            <?php endif; ?>
          </div>
        <?php }else if($modern_furniture_store_logo_settings == 'Same Line'){ ?>
          <div class="logo logo-same-line">
            <div class="row">
              <div class="col-lg-5 col-md-5 align-self-center">
                <?php if( has_custom_logo() ) modern_furniture_store_the_custom_logo(); ?>
              </div>
              <div class="col-lg-7 col-md-7 align-self-center">
                <?php if( get_theme_mod('modern_furniture_store_site_title_text',true) == 1){ ?>
                  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php }?>
                <?php $modern_furniture_store_description = get_bloginfo( 'description', 'display' );
                if ( $modern_furniture_store_description || is_customize_preview() ) : ?>
                  <?php if( get_theme_mod('modern_furniture_store_site_tagline_text',false)){ ?>
                    <p class="site-description"><?php echo esc_html($modern_furniture_store_description); ?></p>
                  <?php }?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php }?>
      </div>
      <div class="head-2 col-lg-5 col-md-4 align-self-center">
          <div class="row text-lg-end head-box">
            <div class="col-lg-6">
              <?php if( get_theme_mod( 'modern_furniture_store_deal_text' ) != '' || get_theme_mod( 'modern_furniture_store_deal' ) != '' ) { ?>
              <div class="row">
                <div class="col-lg-3 col-md-3 align-self-center"><i class="<?php echo esc_attr(get_theme_mod('modern_furniture_store_deal_icon','fas fa-tags')); ?>"></i></div>
                <div class="col-lg-9 col-md-9 align-self-center">
                  <p class="infotext"><?php echo esc_html( get_theme_mod('modern_furniture_store_deal_text','')); ?></p>
                  <p class="mb-0"><?php echo esc_html( get_theme_mod('modern_furniture_store_deal','') ); ?></p>
                </div>
              </div>
              <?php } ?>
            </div>
            <div class="col-lg-6">

              <?php if(class_exists('woocommerce')){ ?>
                <?php if( get_theme_mod('modern_furniture_store_show_hide_cart_option',true) == 1){ ?>
                <div class="row head-box text-centre text-md-end">                  
                  <div class="col-lg-3 col-md-3 align-self-center"><i class="<?php echo esc_attr(get_theme_mod('modern_furniture_store_cart_icon','fas fa-shopping-cart')); ?>"></i></div>
                    <div class="col-lg-9 col-md-9 align-self-center">
                      <p class="cart_no infotext">
                        <?php global $woocommerce; ?>
                        <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','modern-furniture-store' ); ?>"><?php esc_html_e('CART','modern-furniture-store'); ?>    <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count()));?></a>
                        </p>
                        <p class="cart-value simplep"> - <?php echo esc_sql( $woocommerce->cart->get_cart_total() ); ?></p>
                    </div>
                  </div>
                <?php } ?>
                <?php } ?>
                
              </div>
          </div>
      </div>
    </div>
  </div>
      <div class="clear"></div>
</div>
