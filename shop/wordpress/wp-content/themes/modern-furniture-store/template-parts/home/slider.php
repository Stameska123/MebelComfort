<?php
/**
 * Template part for displaying slider section
 *
 * @package Modern Furniture Store
 * @subpackage modern_furniture_store
 */

?>
<?php $modern_furniture_store_static_image = get_stylesheet_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if( get_theme_mod( 'modern_furniture_store_slider_arrows') != '') { ?>
<section id="slider">
    <div class="owl-carousel">
      <?php
        $modern_furniture_store_slider_category=  get_theme_mod('modern_furniture_store_post_setting');if($modern_furniture_store_slider_category){
        $modern_furniture_store_page_query = new WP_Query(array( 'category_name' => esc_html($modern_furniture_store_slider_category ,'modern-furniture-store')));?>
          <?php while( $modern_furniture_store_page_query->have_posts() ) : $modern_furniture_store_page_query->the_post(); ?>
          <div class="slide-box">
            <?php if(has_post_thumbnail()){ ?>
              <img src="<?php echo (the_post_thumbnail_url('full')); ?>"/>
               <?php }else {echo ('<img src="'.$modern_furniture_store_static_image.'">'); } ?>
            <div class="slide-inner-box">
              <h1 class="slider-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
              <p class="mb-0"><?php echo esc_html(wp_trim_words(get_the_content(),'20') );?></p>
                <div class="home-btn py-4">
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('View All','modern-furniture-store'); ?></a>
                </div>
            </div>
          </div>
          <?php endwhile;
        wp_reset_postdata();
      }?>
    </div>
  </section>
<?php } ?>