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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wp-demo' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost:8889' );

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
define( 'AUTH_KEY',         'wK^t884|kl)BG=Ib#CTS+CH4@<e$*,+/`!)nk:XDn4YA-E3+Cus2j[PZkz|<(Vu@' );
define( 'SECURE_AUTH_KEY',  'g; A5CXBc$@v.%NpXN<2;uy9t2n5S[8P_rb7MEvPtd@e3Uy*aDbmaTL[`;/QZ_E(' );
define( 'LOGGED_IN_KEY',    '%6`=VY{slDp@D9cRc-b9g Ko$0,_YcA$lmM#6r}3&EK=Ux8zT&xE^M`<pakTNFr&' );
define( 'NONCE_KEY',        '2[Jc#hTrbG8vZ+$`v$5z@cvx%K+p54*-7rem:CCUA(b8P]G_11|Kn7fqS@tKXEMs' );
define( 'AUTH_SALT',        'eSLc/2[D-6BJ+rH# ~Htchg-`XDAd2X3|rGCN(@cdM}v+c X_Q{5:h&B6ag[P =*' );
define( 'SECURE_AUTH_SALT', 'lFw7Z;vS+=}NTFp$H7#;[:R(!f%82.HUwx_1rIs,XDp6K,@f:{sL4;%jD{!UU:RC' );
define( 'LOGGED_IN_SALT',   'i_eqVH:Ys6L4&y@)2 dxBZrvnTF+3M>YwD1!zvX^y9Bict+:@.xZv,c=p!SaF1jU' );
define( 'NONCE_SALT',       '#2aA$/u8Gng$fvAu z?.ClUko*ah;A}Rn[7p3&1/gmB6R.Y(]URs(tyAkI8AerSz' );

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
