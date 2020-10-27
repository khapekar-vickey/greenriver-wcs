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
define( 'DB_NAME', 'greenriver-wcs' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root123' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'Kb+7z2&U}4K|Y)Q2AIS;h(:DWluC,~7%)vZq8D1gVuvzpDD8yO/%]&o<}zi!57de' );
define( 'SECURE_AUTH_KEY',  '`bz95aK@vZwt9UrFS]9&Pv_zdg=Ja+GTHxtf2+7(%n~ r*.Gda1k59Qu*fh{O_y3' );
define( 'LOGGED_IN_KEY',    '*e9!2doGwwkE[4om@W&b2B#&T#;AMlW9*~t>*i##1DzHto>y]<,l%::S}nwv26Fi' );
define( 'NONCE_KEY',        'Z?A!Q/.Tu V#LDpF]dXm1@GG>`IWrK^{Sx# !:7Do+Xqax(,K&0SD%S_tKYxf#BG' );
define( 'AUTH_SALT',        '<`+fJ|v`IXJ`<(/HCVkuIpDJ yq$N`uKDoL l!]D&@Nf}t(Z66]k>i=iQHhX`D=V' );
define( 'SECURE_AUTH_SALT', '6iGt$9QFm$2Fr%G75qgqdYHh:yrUp0MV*dG!RL5bXq|%gft]#|+m4UXYgcBBJ5&C' );
define( 'LOGGED_IN_SALT',   '2OR&h-t`W ?zPN}2d3T%;b8;&4/)n1H>DI HGGt-sp4WH/P2{ZxefQ+~j1NH)3aI' );
define( 'NONCE_SALT',       'JxOmA+&#u,h:$7P#eTuA=&MQ~v>z<u)nF.mc6T2^a=OJZ2qOz;oR.$wh).+O}ym0' );

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
