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
define( 'DB_NAME', 'mobirama_extranet' );

/** MySQL database username */
define( 'DB_USER', 'mobirama_extra' );

/** MySQL database password */
define( 'DB_PASSWORD', 'user_ext_2018' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

define ('WPLANG', 'sp_SP');


/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'xY%9#O@q&+__F8m_B=lDo69yW9K+=vzhw;D]&Cnlgx=g55qt#.cAcuhWfErHtZi#' );
define( 'SECURE_AUTH_KEY',  'pl]BEU>0=PrNGq6<6&8Z=}IHDzYGLm])cqT/$/S{Xf+e:s0-_#=v_^pI+?+5NnSa' );
define( 'LOGGED_IN_KEY',    'm+q^^4m<=b.4UoU9FQ()FiLI*5eDDzmo~J{`zG_*$6nq{Y5$Xa`xT`XHj#x%^p*I' );
define( 'NONCE_KEY',        'Cy=@sh1xQ%FE,_L6%+b=0V{g;?J$@)%4>,_lk9Dic`.Z|qTZ=qj3l;xY5`|5kh9u' );
define( 'AUTH_SALT',        'tqee~OzRL@>slT5V-mJZ~b*Ojusb%&3)3ESa&vZiu)7Xz$Kew4tBA; (:}v~&)w8' );
define( 'SECURE_AUTH_SALT', 'C[6 La)sI%0q+nxke:-g. aXca]<5~wR[,1,s39CTCT_bHILMnMyKS`/sl#UwBEh' );
define( 'LOGGED_IN_SALT',   '=:]Lt8/o}zl7G2C~p*~mdWgkbA8%]3e wTuxGp@w]{cV9{<O3?%1:PT<-ZkMIgJX' );
define( 'NONCE_SALT',       'b%9TOb$w[ysoA+rxmYOwF(j aW(CGP?rlMrPbP,A6D$9w~iUJq>)n%h2jN%;ef>(' );

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
