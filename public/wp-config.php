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
define('DB_NAME', 'wordpress-test');

/** MySQL database username */
define('DB_USER', 'user');

/** MySQL database password */
define('DB_PASSWORD', 'password');

/** MySQL hostname */
define('DB_HOST', 'LAPTOP-M8DVVE37');

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
define('AUTH_KEY',         ')>=J${7!rTqVt)%?__snGMkgUIR2|vTQ1$JQ~]C`7$pnW8})hus[Ys}E:G)o6b:/');
define('SECURE_AUTH_KEY',  'MwKOBY6|;o>;_aID[)9tFF#5G{u0gU3kmfy~_S7XJzk+O0W-ghCb8E=+J8uHA7v*');
define('LOGGED_IN_KEY',    '7>9a4ciXy5.6&}$9S!l5ZKitnKtJe,4b>ou>#D:38)>c4;Z*oMx@6M8KB3DE$IS4');
define('NONCE_KEY',        '~oQ:pW]$Zv[)Db{JvZ&}WHM(666.5Ie84.>Jc-*%2ctd[cqBXGZx6$sx~ W2eGv}');
define('AUTH_SALT',        'mqMu; Z#fK,`2/jtt3!XHc`v~GQBy@,4ErN%jabYO;06HD~_z,$Jr3wg2->,AB}=');
define('SECURE_AUTH_SALT', '+Iq:1]iHi5FjG$ *5 Q75~0U9D]u;Rb~&z<PMNPB9$<J~?^1Y!l[!nTHt!{Ht@ZK');
define('LOGGED_IN_SALT',   '`(6Xx5@koHwtW;PatjxA]~~fwgyPHO6Ni1I o<s$KyT1` .?ZQ:U%*FTAt)]^J[-');
define('NONCE_SALT',       '2a+</Q+xxQUA$n1AR/ K6cuNOpZ|q(YU#_IE=8foS4d4Xq-trfh;X&_acn{F*{Ml');

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
