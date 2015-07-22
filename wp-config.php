<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'tapestry');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'L,b6R2+87jhRhhdx;UnkU09fN+C<8FwL#Y %!CJuB(JMc-,}:W~QXAPo+[#t<#kk');
define('SECURE_AUTH_KEY',  'ja7q@tsso$2fJuc1q9,1kcfRBjbP0RdHS3|)Q~Zx90Ywiht0?f{-!I_qP_>7;Eg<');
define('LOGGED_IN_KEY',    '__#b-eJ:+p 1UJE^m|+h%Jt/A7kKDy =;mV;1Jp(zACTI T*cmf1p+/-UE+79#nK');
define('NONCE_KEY',        ')-:C>iu`dQ*RQj>b/#p4,hN3_K!J<hEry80ADHbp@9-;[?p6)Rg85 ~R.9(H1B%a');
define('AUTH_SALT',        'ZKrpz~_G3*@zh==BoQ>v:6v@Ccq*r`*4&%g }?<gRvhET<yR)E(F/J{}ACBPey@q');
define('SECURE_AUTH_SALT', 'k@nO<NQn3^&AK2n4uzZpvp3$1]gj2xbAcX3Tn6<+jgr#1mqYC0`!+u*d& Wy3 m7');
define('LOGGED_IN_SALT',   '~ZfnU|rhtU}Wki]z}QOw7o!uaH[H%mg3`o9G%srD5|9YcGqY}CiaA4]z(9-p-Zo+');
define('NONCE_SALT',       ' rV:&.bYK|T+VHK7VmI.!#n;?9@2)2N!``j2p/|EMZ%@bpvlS0+tq%j.DI4 ><]V');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');