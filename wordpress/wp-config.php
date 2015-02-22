<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '>j{-.3|gJ#cr#,U?A95IM3jT<vQR-}Z8ahx$&8(t<(Ha44m^#O^n$Vwu`pb=+>55');
define('SECURE_AUTH_KEY',  'zPxQD@K9j[rC._w_8{lHJ]THd2+$;DqgD[n9Wy+e+|}%+~ro-8vQ!x*NFQgV?W4V');
define('LOGGED_IN_KEY',    '[vE<BB-f@^_3^94!f uI(i~`w2kO53+0q0$In!,q]`I*K-kS=cjdM]Pe6foi|nSp');
define('NONCE_KEY',        'P[/*8g3%y(IF)=S7_q{)(Nzy3Q~2_3Hwk6fQzR#W*mXhR@3d8k2~m:[{Dhn4A=k;');
define('AUTH_SALT',        '*:F&n&tT 1tDK~@xo<>}S5(bu^S&nW h}YdEhdO,2f/{Bvr-++AZ+E MnM8sb3`$');
define('SECURE_AUTH_SALT', '_Cm;dB-tBq7[u{Dbbn^~6CSJ:Ht!OD+asqr:da/giY0Gy)oYK+c^%a[Hm~n^=(B{');
define('LOGGED_IN_SALT',   'mf!dCoGUk(+DV%5B85gx|*Q]U}YGq4R(k<ax}|qF{IFV$|*bCr2s)2e_y<)(0|2_');
define('NONCE_SALT',       'n.&]22^e^8T7bH`%sYY4gtGnIvI!)36Yx7A{T{U 5ZXpJEiUo^|k-?M#o^,iEoUk');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
