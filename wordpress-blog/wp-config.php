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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress-blog-db' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         'R&:!GY}sE]UpsPf%g!Ql|TC}/qajy=4n0 6d930D[}ng0<[_Y{N53`u%w/#Lz,{^' );
define( 'SECURE_AUTH_KEY',  'xp3KA+:k4De.jpt_*D05WouyN]h?kX +|![Xc~A7R=$Jr3bR:]n-r,;FpkJ<VxJ$' );
define( 'LOGGED_IN_KEY',    'ztS@jD?8#}?J0Q/ V?L{8.eiCqA_ZSMoSw54fq$S:#9Ms(:0f(%&3WcA7<&p,U4o' );
define( 'NONCE_KEY',        '6OrsOfW(P/2VL2N,<rQ>3L^]>HMXdi]}[5tjID8Tt~K4.mFm>o1drh@3_2nEi<ly' );
define( 'AUTH_SALT',        ';U#T)0@JY[tpsM/6|:kEdB6A79F!wKvMmEJ$vbMITZ`L) e|@YwWpe]U)XA`OslM' );
define( 'SECURE_AUTH_SALT', 'D&}ht&@Wns VRo1ce+S6xW,Cmg87JU24N9fVerh;c[Vyje$!{h~Rwx>>ma/,kBvj' );
define( 'LOGGED_IN_SALT',   '|$9.*4Y{-9r2>-E4Cqax!f{7t^HLLPI8+d(_)Q!}l5JYpJ*6p7Qw8Aqg-6N+n&mz' );
define( 'NONCE_SALT',       '?osVTptVN:.zb(]*~Y$P/A0mW=RRn;qzR:DAaAp$^yD!I77C`{@yPp|zsp/=I=n&' );

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
