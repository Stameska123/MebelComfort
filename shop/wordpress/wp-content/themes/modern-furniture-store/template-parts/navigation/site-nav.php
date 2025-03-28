<?php
/*
* Display Theme menus
*/
?>
<?php
$modern_furniture_store_sticky = get_theme_mod('modern_furniture_store_sticky');
    $modern_furniture_store_data_sticky = "false";
    if ($modern_furniture_store_sticky) {
    $modern_furniture_store_data_sticky = "true";
    }
    global $wp_customize;
?>

<div class="menubar <?php if( is_user_logged_in() && !isset( $wp_customize ) ){ echo "login-user";} ?>" data-sticky="<?php echo esc_attr($modern_furniture_store_data_sticky); ?>">
  	<div class="container">
    	<div class="menubox">
      		<div class="innermenubox">
		          	<div class="toggle-nav mobile-menu">
            			<button onclick="modern_furniture_store_menu_open()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','modern-furniture-store'); ?></span></button>
          			</div>
     	 		<div id="mySidenav" class="nav sidenav">
        			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'modern-furniture-store' ); ?>">
		              	<?php {
		                  	wp_nav_menu( array(
			                    'theme_location' => 'primary-menu',
			                    'container_class' => 'main-menu clearfix' ,
			                    'menu_class' => 'clearfix',
			                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
			                    'fallback_cb' => 'wp_page_menu',
		                  	) );
		              	} ?>
          				<a href="javascript:void(0)" class="closebtn mobile-menu" onclick="modern_furniture_store_menu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','modern-furniture-store'); ?></span></a>
            		</nav>
          		</div>
      			<div class="clearfix"></div>
    		</div>
    	</div>
  	</div>
</div>
