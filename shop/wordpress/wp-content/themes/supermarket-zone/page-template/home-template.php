<?php
/**
 * Template Name: Home Template
 */

get_header(); ?>

<main id="skip-content">
  <section id="top-slider">
     <?php if(get_theme_mod('digital_storefront_slider_section_setting') != ''){ ?>
    <?php $digital_storefront_slide_pages = array();
      for ( $digital_storefront_count = 1; $digital_storefront_count <= 3; $digital_storefront_count++ ) {
        $digital_storefront_mod = intval( get_theme_mod( 'digital_storefront_top_slider_page' . $digital_storefront_count ));
        if ( 'page-none-selected' != $digital_storefront_mod ) {
          $digital_storefront_slide_pages[] = $digital_storefront_mod;
        }
      }
      if( !empty($digital_storefront_slide_pages) ) :
        $digital_storefront_args = array(
          'post_type' => 'page',
          'post__in' => $digital_storefront_slide_pages,
          'orderby' => 'post__in'
        );
        $digital_storefront_query = new WP_Query( $digital_storefront_args );
        if ( $digital_storefront_query->have_posts() ) :
          $i = 1;
    ?>
    <div class="owl-carousel" role="listbox">
      <?php  while ( $digital_storefront_query->have_posts() ) : $digital_storefront_query->the_post(); ?>
        <div class="slider-box">
          <?php if(has_post_thumbnail()){
            the_post_thumbnail();
            } else{?>
            <img src="<?php echo esc_url(get_theme_file_uri()); ?>/assets/img/slider.png" alt="" />
          <?php } ?>
          <div class="slider-inner-box">
            <?php if(get_theme_mod('digital_storefront_slider_title_setting',1) == 1){ ?>
              <h1><?php the_title(); ?></h1>
            <?php }?>
            <?php if(get_theme_mod('digital_storefront_slider_button_setting',1) == 1 && get_theme_mod('digital_storefront_slider_button_text','VIEW MORE') != ''){ ?>
              <div class="my-4">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e(get_theme_mod('digital_storefront_slider_button_text','VIEW MORE')); ?></a>
              </div>
            <?php }?>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
      <div class="no-postfound"></div>
    <?php endif;
    endif;?>
    <?php }?>
  </section>

<?php if(get_theme_mod('supermarket_zone_new_product_setting') != ''){ ?>
  <section id="new-products" class="py-5">
    <div class="container">
      <?php if(get_theme_mod('supermarket_zone_new_product_title') != ''){ ?>
        <h3 class="text-center"><?php echo esc_html(get_theme_mod('supermarket_zone_new_product_title','')); ?></h3>
        <hr>
      <?php }?>
      <?php if(get_theme_mod('supermarket_zone_new_product_text') != ''){ ?>
        <p class="arrival-p text-center mt-2"><?php echo esc_html(get_theme_mod('supermarket_zone_new_product_text','')); ?></p>
      <?php }?>
      <div class="row mt-4">
        <?php
        if ( class_exists( 'WooCommerce' ) ) {
          $digital_storefront_args = array(
            'post_type' => 'product',
            'posts_per_page' => get_theme_mod('supermarket_zone_new_product_number'),
            'product_cat' => get_theme_mod('supermarket_zone_new_product_category'),
            'order' => 'ASC'
          );
          $loop = new WP_Query( $digital_storefront_args );
          while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
            <div class="col-lg-3 col-md-4 col-sm-4">
              <div class="product-box mb-4">
                <div class="product-image">
                  <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                </div>
                <p class="mb-0"><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></p>
                <?php woocommerce_show_product_sale_flash( $post, $product ); ?>
                <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_rating( $loop->post, $product ); } ?>
                <h5 class="<?php echo esc_attr( apply_filters( 'woocommerce_product_price_class', 'price' ) ); ?>"><?php echo $product->get_price_html(); ?></h5>
              </div>
            </div>
          <?php endwhile; wp_reset_query(); ?>
        <?php } ?>
      </div>
    </div>
  </section>
<?php } ?>

  <?php if(get_theme_mod('digital_storefront_services_on_off') != ''){ ?>
    <section id="serve-sec">
      <div class="container">
        <div class="row serv-bg-box">
          <?php
            $digital_storefront_catData = get_theme_mod('digital_storefront_services','');
            if($digital_storefront_catData){
              $digital_storefront_page_query = new WP_Query(array( 'category_name' => esc_html($digital_storefront_catData,'supermarket-zone')));
              while( $digital_storefront_page_query->have_posts() ) : $digital_storefront_page_query->the_post(); ?>
                <div class="col-lg-4 col-md-4">
                  <div class="serv-box text-center">
                    <?php the_post_thumbnail(); ?>
                    <h4><a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                    <p class="mb-0"><?php $digital_storefront_excerpt = get_the_excerpt(); echo esc_html( digital_storefront_string_limit_words( $digital_storefront_excerpt,8 ) ); ?></p>
                  </div>
                </div>
              <?php endwhile;
              wp_reset_postdata();
            } ?>
        </div>
      </div>
    </section>
  <?php }?>

  <?php if(get_theme_mod('digital_storefront_about_setting') != ''){ ?>
  <section id="about_sec" class="py-5">
    <div class="container">
      <?php $digital_storefront_about_pages = array();
        $digital_storefront_mod = intval( get_theme_mod( 'digital_storefront_about_page' ));
        if ( 'page-none-selected' != $digital_storefront_mod ) {
          $digital_storefront_about_pages[] = $digital_storefront_mod;
        }
        if( !empty($digital_storefront_about_pages) ) :
          $digital_storefront_args = array(
            'post_type' => 'page',
            'post__in' => $digital_storefront_about_pages,
            'orderby' => 'post__in'
          );
          $digital_storefront_query = new WP_Query( $digital_storefront_args );
          if ( $digital_storefront_query->have_posts() ) :
      ?>
      <?php  while ( $digital_storefront_query->have_posts() ) : $digital_storefront_query->the_post(); ?>
        <div class="row">
          <div class="col-lg-6 col-md-6 align-self-center">
            <img src="<?php the_post_thumbnail_url('full'); ?>"/>
          </div>
          <div class="col-lg-6 col-md-6 align-self-center">
            <div class="about-inner-box">
              <h3><?php the_title(); ?></h3>
              <p><?php the_excerpt(); ?></p>
              <div class="my-4">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('VIEW MORE','supermarket-zone'); ?></a>
              </div>
            </div>
          </div>
        </div>
      <?php $i++; endwhile;
      wp_reset_postdata();?>
      <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
      endif;?>
    </div>
  </section>
  <?php }?>

  <section id="content-section" class="container">
    <div class="py-5">
      <?php
        if ( have_posts() ) :
          while ( have_posts() ) : the_post();
            the_content();
          endwhile;
        endif;
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
