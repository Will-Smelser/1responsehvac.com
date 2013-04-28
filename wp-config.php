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
define('DB_NAME', '1responsehvac');

/** MySQL database username */
define('DB_USER', 'rosas');

/** MySQL database password */
define('DB_PASSWORD', '!vanRosas1');

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
define('AUTH_KEY',         'H71}~4b$/t{mW; e9/ub)I;x7{eD`FTx9 ~cNYtM=!=j,rsJspWW>O4|2vmY^Y5U');
define('SECURE_AUTH_KEY',  '?8zf8lFkn.d0DU:+tQERORaz?Cg !S% ]{Jax^yY`-U>R$!3[UC)Gh)QFY%Jd,MS');
define('LOGGED_IN_KEY',    ':hp@/2,-2#B)#@;rWUovG5xx;(l[zrng,tKb5!:n$,ZOuSJ}l&C{V_xLL5DeJw/s');
define('NONCE_KEY',        'YR]9O5|fz3Sxe*^qgNK(^JKejFDvk:^Gm5S/s[}}]%G^gua~O(rp}|SDKUf/0yp.');
define('AUTH_SALT',        'vP>-D}TO>ai+Q14 }BD,Ph`|P]a7M[?l1%}pV;#OC(GDx&D5ZAoBeS=N g.LAL2f');
define('SECURE_AUTH_SALT', '*~cSzKjk(cfk_GE|>c?($XgWSQi(O0?u?XjC3a!JE$2g>O[.FMC{~+I7fvW&d2pP');
define('LOGGED_IN_SALT',   '8iVqM#2(d0Tux|#p#smK]J<3pvlWyvYvP(@^+64)&do~AfMmr>#<I*:e~i_=>Y<[');
define('NONCE_SALT',       'Sh<#MiO8g(xYyM6+R=4wQ14PXEzi,wf=8},2&qzw`XJ:4cT)-9060Lq?mB:evqMT');

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
