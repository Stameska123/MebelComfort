<?php
/**
 * Displays top header
 *
 * @package Digital Storefront
 */
?>

<div class="top-info py-2">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-8 align-self-center">
		        <?php if(get_theme_mod('digital_storefront_header_offer_text') != ''){ ?>
		            <p class="mb-0"><i class="fas fa-bullhorn me-2"></i><?php echo esc_html(get_theme_mod('digital_storefront_header_offer_text','')); ?></p>
		        <?php }?>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 align-self-center">
				<?php if(get_theme_mod('digital_storefront_header_social_icon') != ''){ ?>
				<?php if(get_theme_mod('digital_storefront_facebook_url') != '' || get_theme_mod('digital_storefront_twitter_url') != '' || get_theme_mod('digital_storefront_intagram_url') != '' || get_theme_mod('digital_storefront_linkedin_url') != '' || get_theme_mod('digital_storefront_pintrest_url') != ''){ ?>
	                <div class="social-link text-center text-md-end">
	                	<span><?php esc_html_e('Connect with us -','digital-storefront'); ?></span>
	                    <?php if(get_theme_mod('digital_storefront_facebook_url') != ''){ ?>
	                        <a href="<?php echo esc_url(get_theme_mod('digital_storefront_facebook_url','')); ?>"><i class="<?php echo esc_html( get_theme_mod('digital_storefront_facebook_icon') ); ?>"></i></a>
	                    <?php }?>
	                    <?php if(get_theme_mod('digital_storefront_twitter_url') != ''){ ?>
	                        <a href="<?php echo esc_url(get_theme_mod('digital_storefront_twitter_url','')); ?>"><i class="<?php echo esc_html( get_theme_mod('digital_storefront_twitter_icon') ); ?>"></i></a>
	                    <?php }?>
	                    <?php if(get_theme_mod('digital_storefront_intagram_url') != ''){ ?>
	                        <a href="<?php echo esc_url(get_theme_mod('digital_storefront_intagram_url','')); ?>"><i class="<?php echo esc_html( get_theme_mod('digital_storefront_intagram_icon') ); ?>"></i></a>
	                    <?php }?>
	                    <?php if(get_theme_mod('digital_storefront_linkedin_url') != ''){ ?>
	                        <a href="<?php echo esc_url(get_theme_mod('digital_storefront_linkedin_url','')); ?>"><i class="<?php echo esc_html( get_theme_mod('digital_storefront_linkedin_icon') ); ?>"></i></a>
	                    <?php }?>
	                    <?php if(get_theme_mod('digital_storefront_pintrest_url') != ''){ ?>
	                        <a href="<?php echo esc_url(get_theme_mod('digital_storefront_pintrest_url','')); ?>"><i class="<?php echo esc_html( get_theme_mod('digital_storefront_pintrest_icon') ); ?>"></i></a>
	                    <?php }?>
	                </div>
	            <?php }?>
	             <?php }?>
			</div>
		</div>
	</div>
</div>