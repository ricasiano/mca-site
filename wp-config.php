<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
require('mainconfig.php');
define('DB_NAME', CONFIG_DATABASE_NAME);

/** MySQL database username */
define('DB_USER', CONFIG_DATABASE_USER);

/** MySQL database password */
define('DB_PASSWORD', CONFIG_DATABASE_PASSWORD);

/** MySQL hostname */
define('DB_HOST', CONFIG_DATABASE_HOST);

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '2|9Q5(a4FfA~vA@/K=%_/)4,STJq]wynR3D0E5bWNK>gq.X/<SxVnO.+H:+|4x8x');
define('SECURE_AUTH_KEY',  '~H,%bowCp:;;!M_**8<Of7[0tn)[T2JmED_{dF4c_j1*Ns!:OZ<k6E8W$q7>az8i');
define('LOGGED_IN_KEY',    '{xr9(s6f5*3KV<>*u!eLO %`[##]F<Vl=4AERM[0:~;`6{5hE?K~Pi4w8{30Bg$Z');
define('NONCE_KEY',        'MRhmVEE 7>-UW JLObEeZa/hZGNg?1Cdg&N0)oB@|BnR:M_W;s{uY@~q3zLxp1;`');
define('AUTH_SALT',        'WQs^Wy?lH@_dVwX<Hvp:5NFgr-`:@E$]}iK.L!&IK5)^~3NY>v(8fGAF5LY_%<{G');
define('SECURE_AUTH_SALT', '4@,:JH+uJGl>tDrj3NgA}vMB}FC_@_zjqD%$!2mR82 jg7%^iMR1]4Y4B>s)c]t^');
define('LOGGED_IN_SALT',   ',>j7@AX=$ 2}ADRxGe&KdbYHomS[RNVviFC/?:#Z|M9kH{zC6jf.Gu^&5kWc=`k ');
define('NONCE_SALT',       'd6V_n$UKl<4SEI0Afj~9yBc%5!g_*#MJcdVCqC,l@b;jZX1om.?)Utb>oR0h|o^x');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
