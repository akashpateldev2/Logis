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
define( 'DB_NAME', 'demo-logis-373158be' );

/** MySQL database username */
define( 'DB_USER', 'demo-logis-373158be' );

/** MySQL database password */
define( 'DB_PASSWORD', '0e7s7dvgxh' );

/** MySQL hostname */
define( 'DB_HOST', 'shareddb-g.hosting.stackcp.net' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '6<!Qu?K(]9/pu:P<KVLN%W`Wy +SaGaIXg>7%)%.|;*ihVf$%^S=!qq@<vYh2Q4u' );
define( 'SECURE_AUTH_KEY',  '&s_8~ `E7kYXUiW]:+$9f8i/[|pz6x457{x-;>DkC?e9=`$sY/UVn4rCbktw!J(w' );
define( 'LOGGED_IN_KEY',    ' fY!Mj+tvgIYoGlw`$s(E%4e ]NM/g>aWOZ+C>YDHoqzH94pyO&>/.<Ik}~/~?Nk' );
define( 'NONCE_KEY',        ':j5t8J/<56v=.Qlss$^Wavq`c!N}3T!3KqfV.-_Y.3FBldA!^l$t<u5iHCf6dK0u' );
define( 'AUTH_SALT',        'udaYB,} & is0e{nf8{#o3u?Hz8oQHc2;:6J=t&WwtTZ6_iQ5~g^ dxUULgvmt~+' );
define( 'SECURE_AUTH_SALT', '5~#uDzE&JLjh+d^VSWw5|O.0<zlE/A-sfDf1 v4&rj4NHq6kbkH<m=Bq (1|O@}{' );
define( 'LOGGED_IN_SALT',   '6]s&%phN?m{+)f(^]RG]p8s:h.BP_oKJfBd2:cC{L^+%NBADu=T*qGfp9&hC;,lv' );
define( 'NONCE_SALT',       'O;kK@0LpQFRv!`u^N/<I`(:5#GzFkvU3tM6`=PLHZp88YKWHFH9x*9IAs~`#tp4x' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', true );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
