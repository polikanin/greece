<?php

define('FS_METHOD', 'direct');
define('DISALLOW_FILE_EDIT', true);
define('WP_HOME', 'https://inosys.de/');
define('WP_SITEURL', 'https://inosys.de/');
define('FORCE_SSL_ADMIN', true);







define( 'WPCACHEHOME', '/homepages/31/d666062035/htdocs/app666771632/wp-content/plugins/wp-super-cache/' );


















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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db791783983' );

/** MySQL database username */
define( 'DB_USER', 'dbo791783983' );

/** MySQL database password */
define( 'DB_PASSWORD', 'SP8zin9bydxRTTK' );

/** MySQL hostname */
define( 'DB_HOST', 'db791783983.hosting-data.io' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'L(w_He-7Y(2a,zI=;8eJAz|;66gNW*U?V*s<O;#O]+*Z^nM6A]UQ03`RU%D1b(a[');
define('SECURE_AUTH_KEY',  'i|LxA[jz-Tp*j!n#wK>rYA _NRc[=~NzEV*M5/UUK,KlIL>wy;70`x+bN0h+4EDY');
define('LOGGED_IN_KEY',    'Grc7FS_1,(%%8+||6oO  3Lf[:?6o v]R-3>).-O{>@HUBoBz7DZ-0(Y[ICAOBmd');
define('NONCE_KEY',        'z|U&#Dd@M0xzIfz7)$<)1K!Poz.-J!I=ULA~K[$4|sOWB:sk>TB67<S#WE!D?A|X');
define('AUTH_SALT',        'a%L1K:,ygMUgZ#rnxBv_,pe&%>bkh~#NR$pc P8o?K>+qEr[fXV`8P+x{r;lkiqA');
define('SECURE_AUTH_SALT', '|~ED9k9Lj`XSX$+&rgcUx>2pF(Dvp,C)ug.d|z| ;bq@1p-5%qgwWFA+XF#Vz(V#');
define('LOGGED_IN_SALT',   'hF,.n#O3j>r-4SG+9%=d=:05in*tV^qX?HJyr&=PPG+.CpfLlXMK.}o.WEC-W:1Q');
define('NONCE_SALT',       'YfYpiTil-J5([)#;HIbTZD3(cn:Q#VM_}QDk[T(,ZxTzLICV:vGH*P/NB ?AP;<+');


/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'gohnstqcgr';




/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
    define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
