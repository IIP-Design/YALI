<?php

/** autoload files **/
require_once(__DIR__ . '/vendor/autoload.php');

// ** MySQL settings ** //
/** The name of the database for WordPress */
define('DB_NAME', getenv('YALI_DB_NAME'));
//define('DB_NAME', 'yali_rebuild');

/** MySQL database username */
define('DB_USER', getenv('YALI_DB_USER'));
//define('DB_USER', 'wordpress');

/** MySQL database password */
define('DB_PASSWORD', getenv('YALI_DB_PASSWORD'));
//define('DB_PASSWORD', 'wordpress');

/** MySQL hostname */
define('DB_HOST', getenv('YALI_DB_HOST'));
//define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

define('AUTH_KEY',         getenv('YALI_AUTH_KEY'));
define('SECURE_AUTH_KEY',  getenv('YALI_SECURITY_AUTH_KEY'));
define('LOGGED_IN_KEY',    getenv('YALI_LOGGED_IN_KEY'));
define('NONCE_KEY',        getenv('YALI_NONCE_KEY'));
define('AUTH_SALT',        getenv('YALI_AUTH_SALT'));
define('SECURE_AUTH_SALT', getenv('YALI_SECURE_AUTH_SALT'));
define('LOGGED_IN_SALT',   getenv('YALI_LOGGED_IN_SALT'));
define('NONCE_SALT',       getenv('YALI_NONCE_SALT'));

/** AWS S3 Uploads directory **/
if ( isset( $_SERVER['YALI_S3_UPLOADS_BUCKET'] ) ) {
  define('S3_UPLOADS_BUCKET', getenv('YALI_S3_UPLOADS_BUCKET'));
}

if ( isset( $_SERVER['YALI_S3_UPLOADS_KEY'] ) ) {
  define('S3_UPLOADS_KEY', getenv('YALI_S3_UPLOADS_KEY'));
}

if ( isset( $_SERVER['YALI_S3_UPLOADS_SECRET'] ) ) {
  define('S3_UPLOADS_SECRET', getenv('YALI_S3_UPLOADS_SECRET'));
}

if ( isset( $_SERVER['YALI_S3_UPLOADS_REGION'] ) ) {
  define('S3_UPLOADS_REGION', getenv('YALI_S3_UPLOADS_REGION'));
}
if ( isset( $_SERVER['YALI_S3_UPLOADS_BUCKET_URL'] ) ) {
  define('S3_UPLOADS_BUCKET_URL', getenv('YALI_S3_UPLOADS_BUCKET_URL'));
}

$table_prefix = 'wp_';

define( 'WP_DEBUG', false );
define( 'WP_DEBUG_LOG', false );
define( 'FORCE_SSL_ADMIN', false );
define( 'SAVEQUERIES', false );

define('WP_CONTENT_DIR', __DIR__ . '/wp-content');

/*
 * ALLOW ALL FILE TYPE UPLOADS
 */
define( 'ALLOW_UNFILTERED_UPLOADS', true );

/*
 * Fix for using WP CLI
 */
if( defined('WP_CLI') && WP_CLI && !isset($_SERVER['SERVER_NAME']) ) {
  $_SERVER['SERVER_NAME'] = 'yali.rebuild.local';
}

if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) and $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
    define('WP_CONTENT_URL', 'https://' . $_SERVER['SERVER_NAME'] . '/wp-content');
    define('WP_SITEURL', 'https://' . $_SERVER['SERVER_NAME'] . '/');
    define('WP_HOME', 'https://' . $_SERVER['SERVER_NAME']);
        $_SERVER['HTTPS']='on';
} else {
    define('WP_CONTENT_URL', 'http://' . $_SERVER['SERVER_NAME'] . '/wp-content');
    define('WP_SITEURL', 'http://' . $_SERVER['SERVER_NAME'] . '/');
    define('WP_HOME', 'http://' . $_SERVER['SERVER_NAME']);
}

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true);
define('MULTISITE', true);
define('SUBDOMAIN_INSTALL', true);
define('DOMAIN_CURRENT_SITE', getenv('YALI_DOMAIN_CURRENT_SITE'));
define('PATH_CURRENT_SITE', '/');

define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

//  /* wordpress-mu-domain-mapping activation*/
define('SUNRISE', 'on');

define('WP_DEFAULT_THEME', 'corona');

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
