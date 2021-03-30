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
define( 'DB_NAME', 'Medeber' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

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
define( 'AUTH_KEY',         '?q% z5,sXqRGv50|kXIM@#=/N)*~s70%:/J~=z|z@-HCOs @U,Kew.zhu ^mpcL>' );
define( 'SECURE_AUTH_KEY',  'pF%,TO.85+iiL~kiraef#@N$%8W@Cg,9=_VxK8g*jUdBV^>DmVgyWB9z#3mDqPxH' );
define( 'LOGGED_IN_KEY',    '3z3~,-$x<Y@!2}dly*)21XIHHB0k0b:zfN%a.Dle].HxuH~X_;=44IMSKAwg*UH~' );
define( 'NONCE_KEY',        '<Lib~wPa@}$-ob_|{AFjvC$E1>mM`ZBT:yg&?dX<8P-w|NPJ.J?ds._93^%-K/&B' );
define( 'AUTH_SALT',        '8^;CpZ,9pFKRIvAOcA2{]v;Vc7H[v_wa59J %@cLJs6T>K6FiK8dZdtqHVNgio[u' );
define( 'SECURE_AUTH_SALT', 'RdO=.kERoz`uWor|]Y~s!rVtse{0/i!T&Rfluuz;3KxPtpGoQu.{Q/TI/.5$pj5,' );
define( 'LOGGED_IN_SALT',   'j`/Ik%c G4_9PNHbYkUJGpOGBRe!g2B1$qi CnMLo3p946uL_8ljI[%_9}4~4 9_' );
define( 'NONCE_SALT',       'VC|Vc0A,5I%> d%$0S>C9ZiP-oO+E^p}Ar{[ks@58!?5@3]3Aak/)RK9BZq<2XyQ' );

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
