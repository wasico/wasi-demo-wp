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
define('DB_NAME', '');

/** MySQL database username */
define('DB_USER', '');

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
define('AUTH_KEY',         '8u3kol1y4vbq9s9tjh4i3cbvy1hleoeplk4outoonxbkhjqfq3i5qqjcrrdliwpd');
define('SECURE_AUTH_KEY',  'mt3ejn3r0fcncbeq90gf3e3vyaf16hmw5ymezal7tepcn5lyrae2jxhgtu60mcpk');
define('LOGGED_IN_KEY',    'drmbbuyvalnu43bfxvbgtkpnpvkitik7e4riniprlnawxhho51zfwnxp0jbxp9n7');
define('NONCE_KEY',        'wlccxwnxuezzqlw5fkudvkvnn1swyg5qhcms6efznqfnwvbyb7zyy5tdhmmvfj6c');
define('AUTH_SALT',        '78rgkkhiqbp9udggywcztdehjmijy9wipthj5nqfkjdizcyl1lozcaysutdi22km');
define('SECURE_AUTH_SALT', '4mpfiuse7il6tlw9xqowwuq3da5sejb3fqe3nbuvusey5nkfq2jyzypt4uxve3vk');
define('LOGGED_IN_SALT',   'lfcxewiwecvxhgbdwqanpujzorimf7ezhfkigm03y1klgknt0rq0arx8tcfmvcnh');
define('NONCE_SALT',       'dbzoixfqrmsgp5bsvl3zwn0qllrlvea8jwkybqjqqxqwwsbw8ne447ao716qhjp1');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wpmq_';

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
