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
define('DB_NAME', 'fresc512_fanis');

/** MySQL database username */
define('DB_USER', 'fresc512_amrisfa');

/** MySQL database password */
define('DB_PASSWORD', 'Nk8uL]=93Qd');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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

define('AUTH_KEY',         '!N[|dvqiPgDqQk];Co=8Fp/D[co:cm=1Q>_z!u3Vcu+{|jZ-MLmXGi0?Sp%RShI.');
define('SECURE_AUTH_KEY',  '00gz=0H<np8)p.L)V2@j/<9qw8[:2Sp=nli@LF7Ru-@Lk~Vtg5G`#c+Vhu*|;tH_');
define('LOGGED_IN_KEY',    'z.?:!-]]>bqq`4cax!I*9h=|yt+ZAPi)ZvF{pRi]n~0}Ya*XpaJ3l~CNuRwl]oXI');
define('NONCE_KEY',        'x/Z!eP3hk3NMdbv:$D/EpLLA!/S^}0vc4CXz]6rU+45|:N.eCcoH=9)]+A%;v +J');
define('AUTH_SALT',        '9M7mN$uat}DK=-%3d. |LBx>NIJ+Bo_+d:$A8~Cc-N6}fc<7n?$;|R9:C7Ms-.M&');
define('SECURE_AUTH_SALT', 'BpII^*.f+|hCl$FOd|iqM%4sP[wf]5lm2f&uw-oX=d#b3&nnFxl|aP-hKE;nh}%b');
define('LOGGED_IN_SALT',   '=JRjV8Hq}mv@|T4ji+:j+o=1t?KYg1iJM4f#ztpsn$qmg?uLU{n+{e+Il4|xaB#l');
define('NONCE_SALT',       '5w@l[&Th,Q-Vi`P+eJNu[N{h|+u)Lpqcn5=6?sJmjTDW7F|)N+|6UatsQA+Av{DD');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'fani_';

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
define('WP_DEBUG', false);

// Disable CACHE
define('WP_CACHE', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
