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
define( 'DB_NAME', 'wordpresspb' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'oracle' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define('WP_MEMORY_LIMIT','512M');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'I6^TxK 4wKJVfY]!001c%aI|uj0r`Z/F>K+Y7Vqm B(8#vrJ0$nB:>;dahP)GNX@' );
define( 'SECURE_AUTH_KEY',  '``&sQm8PVV]<LOeofAlVUEdGKtzrC<(!;a=b!I%#xM=jr$Pgy/wFdd8IUmHk)s+=' );
define( 'LOGGED_IN_KEY',    '2Zz>H3t70,4-`<G;D#[dPlyw>HkhZCnN|8SSv,0D[-`[I#ly?Q}p79n$N?jBkA,*' );
define( 'NONCE_KEY',        'n;lFSf00.7z+Q:y^1tt:.E7P Lz@Gcr:>LDx{Ut2kCIb*14+XL{3E>T~gvM}cZ!%' );
define( 'AUTH_SALT',        '@o|O>ab!8r72PYL|5fiN!+1D`ejm)E^Q<f5XA[`$u$*csZ`zyt|3IC*nXO]%u3FY' );
define( 'SECURE_AUTH_SALT', 'ag5kRwDmzkf^^VIWD1!*.ziOSi-m2f3>Ze^NydDGwHwwXoVOv{ANfR=W>%$E}=ca' );
define( 'LOGGED_IN_SALT',   'Jo4~ $4$}codm*/T%i^{:#6m5U%-`QV,FxFU|FYb}!}lXB{5~7LqSl@dk;.gc/Nj' );
define( 'NONCE_SALT',       'Lnk1+H[oPE~fJ1xK+hyCj|Ns`:>ODlZM4#Rq!<p$ubW39<tyJ?`]W#lF7s{CxEQW' );

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
