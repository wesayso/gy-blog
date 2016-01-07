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
define('DB_NAME', 'gy-blog');

/** MySQL database username */
define('DB_USER', 'wes');

/** MySQL database password */
define('DB_PASSWORD', 'bottle123');

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
define('AUTH_KEY',         '[|(Zp#A/Z8c=*6GSJNa/5_i)nS|[sn2+b^44vH6;`L`Ba>h:iz[E)]zglrg!-31#');
define('SECURE_AUTH_KEY',  'k%2_gl*Mx|&|S;n3ExJKm1T*Cy5+~7%x-<Q$X[I84Y6bWHAT[G@ b:ls:sEce[W`');
define('LOGGED_IN_KEY',    '~C8ifCg*N`eU:O<YRjvCf-M>r,D!xlZn_wE%P;3/7-)8X@OB*Pu(7nP|[a|`zQ)X');
define('NONCE_KEY',        ']&0g)4rI)z /Zya-#jHoX`x>Qdzuy@u($.Wny,yQJ>Iq+[kJA9Ms7r/ 5#|f3Ayq');
define('AUTH_SALT',        'Uwfhp|7R)kH84X$y]A o|sJ:ba[Pi{:G^;?8<%|&0|RilWr+C7#[}2IXZNIHaP+@');
define('SECURE_AUTH_SALT', 'P@g,*MK]ab4XUxK0b# 1d2&9EoIur-h~moN{5>5<g+6k~T ui0k)`o~e])=8aPY*');
define('LOGGED_IN_SALT',   'SP036_YKx7)=Q$cla~5,ub!e.Lt(#8@$jplzjZLs|jWK7rgAPsjyV2F@(uY2iDt9');
define('NONCE_SALT',       'sKLa]ap48)|UIUL-E>FQY;u_-bgyfz<-+W+nSS/-e-0s_u[>kpSEFfW/*8-b1~Jk');

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
