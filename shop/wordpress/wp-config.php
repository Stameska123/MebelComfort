<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'comfort' );

/** Database username */
define( 'DB_USER', 'ND' );

/** Database password */
define( 'DB_PASSWORD', '3669' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'Y](%{UynD;)3sn);PK~6,K}P!9XhJnA6:kc%DLG,B8aeU^12=U@.W1otE%[{5L/+' );
define( 'SECURE_AUTH_KEY',  'Ss,M#<V.^`]snKv3IIyA5mnLs8GX9*?,O.autZjl%D$A:If7cO!C*?9Sv`*JAPP$' );
define( 'LOGGED_IN_KEY',    '(_a>tC&U+k[ra4x<s;TP2fu+o/N>aBX/s* $AY1y+VlZ@mK&>~]fiPDY^]hI4ZFi' );
define( 'NONCE_KEY',        ']<6]#bxlcL3x3A#+>rf]/5yz=V.h`I5[m_0h5iVuSxZ!:O`>$JH/x(I|?f,3nz:f' );
define( 'AUTH_SALT',        '1u3!X<,{/5l3YL0(!/qjU*g/%>&I ~T2Oru-UR8}e+$w,]!IK>MQ|oS0OGgJ+qxD' );
define( 'SECURE_AUTH_SALT', '?a/O2_,l@f`km_/a ,d_C4;vv=%m>%?{] z6;;1@i)Fqhby^Y.M@[b&C28:`*+(^' );
define( 'LOGGED_IN_SALT',   '%8G0{/6<Me}vXE2ql[c1COQY0o_7~A}t^0jZEr}-NaYI]|T ERP?WRbru0m~(% E' );
define( 'NONCE_SALT',       '5X,cr@`Kq_hpFT7B^Nq0$nC2_5J$.;Wr)aKWJBw;2Jh/Qwm*a_Sit1BR@az`wc^O' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
