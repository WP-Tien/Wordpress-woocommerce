<?php

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
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
define('DB_NAME', 'wd_tshop');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'SD5c?4$!Vu78?uJ1rwfDl+P7d:VcOX^hE>LkRfW|d]G6<Ue}g=*H=3o]OLA4=y!P');
define('SECURE_AUTH_KEY',  'T$UDU*@mfta3_$b)Nn:JFU/6}}|}pOW;U4+[XwM]%IR>xV~(J&wzRWjLo=~vgEV8');
define('LOGGED_IN_KEY',    ')SL8X:_k2Q>0+lg}+ vO^tfA/dK]J$ -nu]Oh_<CYAU<yecQ6.-1VSdV!%<zga[G');
define('NONCE_KEY',        'd?^rxUK:q;bH<@v7;UN%64/k,|aCi-Hfht%4#9_<d24OKh+c(Z[{[vu}#$35]@fC');
define('AUTH_SALT',        'O3OLK^19?$:m=f%$C&g*oZ])H;@j)U+X?7<lTyW$G)On;0e+@ZV_tjV!Sw#?TA#c');
define('SECURE_AUTH_SALT', 'U?$SosI=g5%0mojCgnWprN,SaWxb:0MmWufD}YD5Y=.Kc1,~}[*C~:x:KAbo+>+J');
define('LOGGED_IN_SALT',   '=d`V1<S3qJJBs+XA|n}kG,hV|uZfSZx&YAy Jo|;] bAk]AQtyJwJfy{/%DOF>vi');
define('NONCE_SALT',       'tL4:<.6z05SE4)Z`zT~Q7TtYs*<7DA%8Zg;%imCN{%htT~OfB/~MB}`tpsOP6/nk');

/**#@-*/

/**
 * WordPress Database Table prefix.
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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if (!defined('ABSPATH')) {
	define('ABSPATH', __DIR__ . '/');
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
