<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Digital Storefront
 */

$digital_storefront_post_page_title =  get_theme_mod( 'digital_storefront_post_page_title', 1 );
$digital_storefront_post_page_thumb = get_theme_mod( 'digital_storefront_post_page_thumb', 1 );
$digital_storefront_post_page_cat = get_theme_mod( 'digital_storefront_post_page_cat', 1 );
$digital_storefront_post_page_content =  get_theme_mod( 'digital_storefront_post_page_content', 1 );
?>

<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $audio = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>

  <div class="col-lg-6 col-md-6 col-sm-6">
    <article id="post-<?php the_ID(); ?>" <?php post_class('article-box'); ?>>
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the audio file.
          if ( ! empty( $audio ) ) {
            foreach ( $audio as $audio_html ) {
              echo '<div class="entry-audio">';
                echo $audio_html;
              echo '</div><!-- .entry-audio -->';
            }
          };
        };
      ?>
      <header class="entry-header pt-3">
        <?php if ($digital_storefront_post_page_title == 1 ) {?>
          <?php the_title('<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>');?>
        <?php }?>
      </header>
      <?php if ($digital_storefront_post_page_content == 1 ) {?>
        <div class="entry-summary">
          <p><?php echo wp_trim_words( get_the_content(), esc_attr(get_theme_mod('digital_storefront_post_page_excerpt_length', 30)) ); ?><?php echo esc_html(get_theme_mod('digital_storefront_post_page_excerpt_suffix','[...]')); ?></p>
          <?php
            wp_link_pages(array(
              'before' => '<div class="page-links">' . esc_html__('Pages:', 'digital-storefront'),
              'after' => '</div>',
            ));
          ?>
        </div>
      <?php }?>
      <?php if ($digital_storefront_post_page_cat == 1 ) {?>
        <footer class="entry-footer">
          <?php digital_storefront_entry_footer(); ?>
        </footer>
      <?php }?>
    </article>
  </div>