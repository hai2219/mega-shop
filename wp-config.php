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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'hai2219_megashop');

/** MySQL database username */
define('DB_USER', 'hai2219_megashop');

/** MySQL database password */
define('DB_PASSWORD', '123456');

/** MySQL hostname */
define('DB_HOST', '64.62.211.131');

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
define('AUTH_KEY',         'WM]9t%7<an&b]4Z#8`TR&Lh! 8CQ2ET7*;Fh0Lv3Dq/*TO_ ?t3H#5.Me<[v|X-0');
define('SECURE_AUTH_KEY',  'Bj:;ou ag1uMf60hxNQ`Xy.E>k3(,W]6Q:q*`*i}:;~mzt((<^b7Lf?a}Y^@gICu');
define('LOGGED_IN_KEY',    '1veR|K2{GSNy[m|@5eu>1GyWEFQj2s. J`6^2(FL.DITZ C!oimCWQ.yS&x{<^^4');
define('NONCE_KEY',        '@A3f8of:EbZ#d}Ms?bxri{,xgn:4fu*|mE|WAV%_pX$J90A1t/+C7@I5^kTcIK0w');
define('AUTH_SALT',        'jv%,k>{l./)6@-ZEUR9L^4R$cD ma(jBC|l1ZKca`yLjq J)o2=*D1>=@,4A_`1v');
define('SECURE_AUTH_SALT', '&iaTY<Z.{fw  Q{*+gRu]358:&WL_&ZWIi[7UM#X/|. RQW>6knL~yLt.UH>#>1t');
define('LOGGED_IN_SALT',   'od|V:[f3Y$pDMt0hj@6uog{R=}b?cig0?b7E)VPT;SnTqbZLrx#{Tq* H/X,[0A_');
define('NONCE_SALT',       '7vim S_Q}*Vw5c$+d`-gtqc1|w}0|l6~a]Ddx63N:k)~2qC;W6G1Oj2UfTzD|b(<');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
