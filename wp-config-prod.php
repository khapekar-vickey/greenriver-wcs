<?php

/*Add at the begining of the file*/

$connectstr_dbhost = '';
$connectstr_dbname = '';
$connectstr_dbusername = '';
$connectstr_dbpassword = '';

foreach ($_SERVER as $key => $value) {
    if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
        continue;
    }
    
    $connectstr_dbhost = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
    $connectstr_dbname = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
    $connectstr_dbusername = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
    $connectstr_dbpassword = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
}

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
//define( 'DB_NAME', 'greenriver-wcs' );

/** MySQL database username */
//define( 'DB_USER', 'root' );

/** MySQL database password */
//define( 'DB_PASSWORD', 'XXXXXXX' );

/** MySQL hostname */
//define( 'DB_HOST', 'localhost' );

/*This is added by Shiva*/
define('DB_NAME', $connectstr_dbname);

/** MySQL database username */
define('DB_USER', $connectstr_dbusername);

/** MySQL database password */
define('DB_PASSWORD', $connectstr_dbpassword);

/** MySQL hostname */
define('DB_HOST', $connectstr_dbhost);

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
define( 'AUTH_KEY',         '>+To BEP: {s(+D(*>j64NmN;kpnQ)I;59gfwyueQ$!x&c?r<ovEXt,P6 E(P/J9' );
define( 'SECURE_AUTH_KEY',  '*(%rpk10y@3+4&a}ga#$kN1ZR,5D|&}i)Jt+/nO+kbKU0#Ydc]Z!,RPO|H27Wn/&' );
define( 'LOGGED_IN_KEY',    'seF*?,Z[J#gL8X&:0UB=-*W%va=2No6k`lEiT0>2tU<_qDL#0Hy8,UWgz6thP=As' );
define( 'NONCE_KEY',        ']Bn;n12b)gT/Sq=Ukh/bn<IPpTQl@DU<jROITg5I7+ay:_6<w0~P GqnUSh#IC j' );
define( 'AUTH_SALT',        '!$bCvhK*AyRiyoW^CMR_/XO0],tUZBRG]uvHxDtw> q{Su)$+7~UJ=`%ejzh|;$j' );
define( 'SECURE_AUTH_SALT', 'S<`-tzkZKUumLm)v{O8Fu1h~K#KP,d4k6Id64I*1cR3}QcI]>MVJ.$/%p#B;6ESd' );
define( 'LOGGED_IN_SALT',   'YBgQSKky7o9yX4E7o%cY<=HlD-10!GRX:F{uMRMJ#^c~nsCy9~n{<rId,>VL%w9o' );
define( 'NONCE_SALT',       '_L|R/&>)H=ck!Zr3UWY#;n:X0mLC>H)U.J% 1&O-ET>B!^g*av]=P/DD XhHGl.n' );

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
define( 'WP_DEBUG', false );
//define(‘ALLOW_UNFILTERED_UPLOADS’, true);


/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
