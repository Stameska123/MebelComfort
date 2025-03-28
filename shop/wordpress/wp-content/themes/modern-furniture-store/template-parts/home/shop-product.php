<?php
/**
 * Template part for displaying blog section
 *
 * @package Modern Furniture Store
 * @subpackage modern_furniture_store
 */

?>
<?php if( get_theme_mod( 'modern_furniture_store_show_hide_product_section') != '') { ?>
<section id="product">
  <div class="container">
    <div class="product_kit">
      <?php if(class_exists('woocommerce')){ ?>
        <?php global $woocommerce; ?>
        <div class="row">
            <?php
                $modern_furniture_store_args = array(
                    'post_type'      => 'product',
                    'posts_per_page' => 10,
                    'product_cat'    => get_theme_mod('modern_furniture_store_recent_product_category')
                );
                $loop = new WP_Query( $modern_furniture_store_args );
                while ( $loop->have_posts() ) : $loop->the_post();
                ?>
                  <div class="col-lg-3 col-md-4 col-sm-6 py-md-4 py-3">
                    <div class="product-box">
                     <?php
                    global $product; ?>
                    <div class="product-image">
                      <?php echo woocommerce_get_product_thumbnail(); ?>
                    </div>
                  </div>
                  <div class="product-content p-2">
                    <h2 class="text-center"><a href="<?php the_permalink(); ?>"><?php echo esc_html(get_the_title()); ?></a></h2>
                    <p><?php echo $product->get_price_html(); ?></p>
                  </div>
                  </div>
                <?php
                  endwhile;
                  wp_reset_query();
                ?>
          </div>
      <?php } ?>
    </div>
  </div>
</section>
<?php } ?>
