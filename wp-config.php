<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'woocommerce' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('WP_MEMORY_LIMIT', '128M');

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
define( 'AUTH_KEY',         'i@_|/a+]lsRs?qiDE:U!rAUf_B??F5IW0zud~/sy^/d:R|TCdMNEM/>?H3$ssV _' );
define( 'SECURE_AUTH_KEY',  '44V8!V$D3Ld/HaY;mQ--My]9[Wy=/)1&ZKN1SPPX]{gbMwLZz5`vQAt X@PYYg^Z' );
define( 'LOGGED_IN_KEY',    '~jo$&B9Z>%BKk<&6Nz7jT6zD3WcQ%)[cIG$ us2=qspl_+x]rO=#7%u?E0{;)HmN' );
define( 'NONCE_KEY',        'Ikx/eL-$)<;{Rm^j9*?$oUH9avQiB9Mn&V1*H7[`_N29u-}xx*vv]w_ Aj?(rA:1' );
define( 'AUTH_SALT',        '/tS>j#z7/0`lD!A.ZlNsf0?0Y7v&3L4:1lsbX<D*h%m1mx1`AW`/_C+0K<}O12yY' );
define( 'SECURE_AUTH_SALT', 'zAZov=-e}/Mrdwmc_:Rw,y{eL@c2VkLw|G|^%D7j[@9y+->aB!%hFMW2tCW-2M)#' );
define( 'LOGGED_IN_SALT',   'Fj3?pmVKZ@f,.LwUK`!9s:y.=(@mL7O7LpD*.wt^+:0y]jJsAfwlC<ugt0q>&vj;' );
define( 'NONCE_SALT',       'O &6QowO|.!|94ixWq?KbbPXu>91(L--S{9Hb}87;4afzF_ue{<tmljRHyrUn(wp' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
