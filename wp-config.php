<?php

/**
 * Logs all errors. For easier debugging during the setup. 
 */
ini_set( 'display_errors', 1 );
define( 'WP_DEBUG_DISPLAY', true );
define( 'WP_DEBUG', true );

/**
 * Checking and loading .env variables.
 */
if (!file_exists(dirname( __FILE__ ) . "/.env")) {
    throw new Exception('.env file is missing!');
}

$env = [];

$fh = fopen(dirname( __FILE__ ) . '/.env', 'r');
while(!feof($fh)) {
	$var = trim( fgets($fh) );
	if (!empty($var)) {
		putenv( $var );
	}
}

fclose($fh);

/**
 *	Database config.
 */
define('DB_NAME', getenv('DB_NAME', 'dbname') );
define('DB_USER', getenv('DB_USER', 'dbuser') );
define('DB_PASSWORD', getenv('DB_PASS', 'dbpass') );
define('DB_HOST', getenv('DB_HOST', 'localhost') );
define('DB_CHARSET', 'utf8mb4');
define('DB_COLLATE', '');

$http_protocol = ( ! empty( $_SERVER['HTTPS'] ) && 'off' != $_SERVER['HTTPS'] ) ? 'https://' : 'http://';

define( 'WP_SITEURL', $http_protocol . $_SERVER['SERVER_NAME'] . '/wp' );
define( 'WP_HOME', $http_protocol . $_SERVER['SERVER_NAME'] );
define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/content' );
define( 'WP_CONTENT_URL', $http_protocol . $_SERVER['HTTP_HOST'] . '/content' );

/**
 * Reach Front Constants.
 */
define( 'WP_FRONT_HOST', getenv('REACT_HOST', 'localhost'));
define( 'WP_FRONT_PORT', getenv('REACT_PORT', '8080'));

/**
 * Allow Relocate
 */
define('RELOCATE', true);

/**
 * Allow plugin installation.
 */
define('FS_METHOD', 'direct');

/** Allow lengthy operation */
define( 'WP_MAX_MEMORY_LIMIT' , '512M' );

$table_prefix  = 'wp_';

/*
 *	Salts. Get them from https://api.wordpress.org/secret-key/1.1/salt
 */
define('AUTH_KEY',         '?6h69Biq*7cPKUm;+Eb<vd9PRYHTkx?6}36n;&@6+:dt&C,:!0dVDJ-~c>+uih O');
define('SECURE_AUTH_KEY',  'QrE|u>Tx)!JKlH(2+E/pN6NLc1b4kBrwO/)t|(6`Hw9d-<<<Mb3>eT|O~MR}9J!n');
define('LOGGED_IN_KEY',    '}ituFDM**&;(}T-U[QI~[~xa(bjPLy;_GQ8?L>OO*Z#*Ur9q?7.K)L4Wk.FC(Y)z');
define('NONCE_KEY',        '0s)gy!d;$Hg|9YOo$)4%qg~v(^BTF4!z0iUJrmsj82+FdFG=lZox~#>Pn;hTM&/]');
define('AUTH_SALT',        'OK)&#XW1G?EBm~H{NaUEt>-2?+1i*sckZTBjG5E`]CgChWOT$(N^BAvFrVu;7|!=');
define('SECURE_AUTH_SALT', 'v^VjItWNl3j+j;P$rJqT/?eY:IyX<Kl-N1mhA.|U<;lzQgT1yPX=MB46}? ;C!K|');
define('LOGGED_IN_SALT',   's9h#K(Edu+j:AFr|Ue3yb8?KQw6:|Vt8|`-v|v1xY].E*IBj530C-+~+-n+lGzM9');
define('NONCE_SALT',       ',|DC4-zBYB)?1~@k-xfN3?.ihdL-|]iN1&Ml>det{:`FO/nP-ZsQZE35a-h8M@,*');

/**
 * Setup URLS and the custom content directory.
 */
if ( ! isset( $_SERVER['HTTP_HOST'] ) ) {
	$_SERVER['HTTP_HOST'] = ''; // Prevent wp-cli complaining about missing host.
}

if ( ! isset( $_SERVER['SERVER_NAME'] ) ) {
	$_SERVER['SERVER_NAME'] = ''; // Prevent wp-cli complaining about missing host.
}

/**
 * Load WordPress.
 */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/wp/' );
}

/**
 * Define root base path.
 */
if ( ! defined( 'ABSPATHB' ) ) {
	define( 'ABSPATHB', dirname( __FILE__ ) );
}

require_once( ABSPATH . 'wp-settings.php' );
