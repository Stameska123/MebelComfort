<?php
/**
 * Displays main header
 *
 * @package Digital Storefront
 */

$digital_storefront_sticky_header = get_theme_mod('digital_storefront_sticky_header');
    $data_sticky = "false";
    if ($digital_storefront_sticky_header) {
        $data_sticky = "true";
    }
?>
<div class="main_header py-2" data-sticky="<?php echo esc_attr($data_sticky); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-4 col-12 align-self-md-center">
                <div class="navbar-brand">
                    <?php if ( has_custom_logo() ) : ?>
                        <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                    <?php $blog_info = get_bloginfo( 'name' ); ?>
                        <?php if ( ! empty( $blog_info ) ) : ?>
                            <?php if ( is_front_page() && is_home() ) : ?>
                              <?php if( get_theme_mod('digital_storefront_logo_title',true) != ''){ ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                              <?php }?>
                            <?php else : ?>
                              <?php if( get_theme_mod('digital_storefront_logo_title',true) != ''){ ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                              <?php }?>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) :
                        ?>
                        <?php if( get_theme_mod('digital_storefront_theme_description',false) != ''){ ?>
                          <p class="site-description"><?php echo esc_html($description); ?></p>
                        <?php }?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-5 col-md-1 col-sm-1 col-12 align-self-md-center">
                <?php get_template_part('template-parts/navigation/navigation', 'top'); ?>
            </div>
            <div class="col-lg-4 col-md-8 col-sm-7 align-self-md-center">
                <?php if(class_exists('woocommerce')){ ?>
                    <div class="product-asset">
                        <?php get_product_search_form(); ?>
                        <?php if ( is_user_logged_in() ) { ?>
                            <a class="account-btn mx-md-2" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','digital-storefront'); ?>"><i class="fas fa-sign-in-alt"></i></a>
                        <?php }
                        else { ?>
                            <a class="account-btn mx-md-2" href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','digital-storefront'); ?>"><i class="far fa-user"></i></a>
                        <?php } ?>
                        <?php global $woocommerce; ?>
                        <a class="cart-customlocation" href="<?php echo esc_url(wc_get_cart_url()); ?>" title="<?php esc_attr_e( 'shopping cart','digital-storefront' ); ?>"><i class="fas fa-shopping-cart"></i><span class="cart-value"><?php echo sprintf ( esc_html( '%d', '%d', WC()->cart->get_cart_contents_count() ), WC()->cart->get_cart_contents_count() ); ?></span></a>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
