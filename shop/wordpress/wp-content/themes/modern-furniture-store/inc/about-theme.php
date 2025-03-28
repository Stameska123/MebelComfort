<?php
/**
 * Modern Furniture Store Theme Page
 *
 * @package Modern Furniture Store
 */

function modern_furniture_store_admin_scripts() {
	wp_dequeue_script('modern-furniture-store-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'modern_furniture_store_admin_scripts' );

if ( ! defined( 'MODERN_FURNITURE_STORE_FREE_THEME_URL' ) ) {
	define( 'MODERN_FURNITURE_STORE_FREE_THEME_URL', 'https://www.themespride.com/products/free-furniture-wordpress-theme' );
}
if ( ! defined( 'MODERN_FURNITURE_STORE_PRO_THEME_URL' ) ) {
	define( 'MODERN_FURNITURE_STORE_PRO_THEME_URL', 'https://www.themespride.com/products/furniture-store-wordpress-theme' );
}
if ( ! defined( 'MODERN_FURNITURE_STORE_DEMO_THEME_URL' ) ) {
	define( 'MODERN_FURNITURE_STORE_DEMO_THEME_URL', 'https://page.themespride.com/modern-furniture-store-pro/' );
}
if ( ! defined( 'MODERN_FURNITURE_STORE_DOCS_THEME_URL' ) ) {
    define( 'MODERN_FURNITURE_STORE_DOCS_THEME_URL', 'https://page.themespride.com/demo/docs/modern-furniture-store/' );
}
if ( ! defined( 'MODERN_FURNITURE_STORE_RATE_THEME_URL' ) ) {
    define( 'MODERN_FURNITURE_STORE_RATE_THEME_URL', 'https://wordpress.org/support/theme/modern-furniture-store/reviews/#new-post' );
}
if ( ! defined( 'MODERN_FURNITURE_STORE_SUPPORT_THEME_URL' ) ) {
    define( 'MODERN_FURNITURE_STORE_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/modern-furniture-store' );
}
if ( ! defined( 'MODERN_FURNITURE_STORE_CHANGELOG_THEME_URL' ) ) {
    define( 'MODERN_FURNITURE_STORE_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}
if ( ! defined( 'MODERN_FURNITURE_STORE_THEME_BUNDLE' ) ) {
    define( 'MODERN_FURNITURE_STORE_THEME_BUNDLE', 'https://www.themespride.com/products/wordpress-theme-bundle' );
}

/**
 * Add theme page
 */
function modern_furniture_store_menu() {
	add_theme_page( esc_html__( 'About Theme', 'modern-furniture-store' ), esc_html__( 'About Theme', 'modern-furniture-store' ), 'edit_theme_options', 'modern-furniture-store-about', 'modern_furniture_store_about_display' );
}
add_action( 'admin_menu', 'modern_furniture_store_menu' );

/**
 * Display About page
 */
function modern_furniture_store_about_display() {
	$modern_furniture_store_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $modern_furniture_store_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$modern_furniture_store_description = explode( '. ', $modern_furniture_store_theme->get( 'Description' ) );

					array_pop( $modern_furniture_store_description );

					$modern_furniture_store_description = implode( '. ', $modern_furniture_store_description );

					echo esc_html( $modern_furniture_store_description . '.' );
				?></p>
				<p class="actions">
					<a href="<?php echo esc_url( MODERN_FURNITURE_STORE_FREE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'modern-furniture-store' ); ?></a>

					<a href="<?php echo esc_url( MODERN_FURNITURE_STORE_DEMO_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'modern-furniture-store' ); ?></a>

					<a href="<?php echo esc_url( MODERN_FURNITURE_STORE_DOCS_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'modern-furniture-store' ); ?></a>

					<a href="<?php echo esc_url( MODERN_FURNITURE_STORE_RATE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'modern-furniture-store' ); ?></a>

					<a href="<?php echo esc_url( MODERN_FURNITURE_STORE_PRO_THEME_URL ); ?>" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'modern-furniture-store' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $modern_furniture_store_theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'modern-furniture-store' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'modern-furniture-store-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'modern-furniture-store-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'modern-furniture-store' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'modern-furniture-store-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'modern-furniture-store' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'modern-furniture-store-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'modern-furniture-store' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'modern-furniture-store-about', 'tab' => 'get_bundle' ), 'themes.php' ) ) ); ?>" class="blink wp-bundle nav-tab<?php echo ( isset( $_GET['tab'] ) && 'get_bundle' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Get WordPress Theme Bundle', 'modern-furniture-store' ); ?></a>
		</nav>

		<?php
			modern_furniture_store_main_screen();

			modern_furniture_store_changelog_screen();

			modern_furniture_store_free_vs_pro();

			modern_furniture_store_get_bundle();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'modern-furniture-store' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'modern-furniture-store' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'modern-furniture-store' ) : esc_html_e( 'Go to Dashboard', 'modern-furniture-store' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function modern_furniture_store_main_screen() {
	if ( isset( $_GET['page'] ) && 'modern-furniture-store-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'modern-furniture-store' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'modern-furniture-store' ) ?></p>
				<p><a target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'modern-furniture-store' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'modern-furniture-store' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'modern-furniture-store' ) ?></p>
				<p><a href="<?php echo esc_url( MODERN_FURNITURE_STORE_SUPPORT_THEME_URL ); ?>" class="button button-primary" target="_blank"><?php esc_html_e( 'Support Forum', 'modern-furniture-store' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Upgrade To Premium With Straight 20% OFF.', 'modern-furniture-store' ); ?></h2>
				<p><?php esc_html_e( 'Get our amazing WordPress theme with exclusive 20% off use the coupon', 'modern-furniture-store' ) ?>"<input type="text" value="GETPro20" id="myInput">".</p>
				<button class="button button-primary"><?php esc_html_e( 'GETPro20', 'modern-furniture-store' ); ?></button>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function modern_furniture_store_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'modern-furniture-store' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'modern_furniture_store_changelog_file', MODERN_FURNITURE_STORE_CHANGELOG_THEME_URL );

				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = modern_furniture_store_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function modern_furniture_store_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function modern_furniture_store_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'modern-furniture-store' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'modern-furniture-store' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'modern-furniture-store' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'modern-furniture-store' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'modern-furniture-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'modern-furniture-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'modern-furniture-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'modern-furniture-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'modern-furniture-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'modern-furniture-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'modern-furniture-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'modern-furniture-store' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'modern-furniture-store' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'modern-furniture-store' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'modern-furniture-store' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a href="<?php echo esc_url( MODERN_FURNITURE_STORE_PRO_THEME_URL ); ?>" class="sidebar-button single-btn" target="_blank"><?php esc_html_e( 'Go for Premium', 'modern-furniture-store' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}

function modern_furniture_store_get_bundle() {
	if ( isset( $_GET['tab'] ) && 'get_bundle' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'Get WordPress Theme Bundle', 'modern-furniture-store' ); ?></p>
			<div class="col card">
				<h2 class="title"><?php esc_html_e( ' WordPress Theme Bundle of 100+ Themes At 15% Discount. ', 'modern-furniture-store' ); ?></h2>
				<p><?php esc_html_e( 'Spring Offer Is To Get WP Bundle of 100+ Themes At 15% Discount use the coupon', 'modern-furniture-store' ) ?>"<input type="text" value=" TPRIDE15 "  id="myInput">".</p>
				<p><a target="_blank" href="<?php echo esc_url( MODERN_FURNITURE_STORE_THEME_BUNDLE ); ?>" class="button button-primary"><?php esc_html_e( 'Theme Bundle', 'modern-furniture-store' ); ?></a></p>
			</div>
		</div>
	<?php
	}
}
