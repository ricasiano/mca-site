<?php
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
define('WP_USE_THEMES', true);

/** Load the main config file, plugins will also access the DB*/
require('mainconfig.php');

/** Database connection and APIs */
require('libraries/Database.php');
require('libraries/APIRequest.php');
require('libraries/MCA.php');
require('libraries/ClientCatalog.php');
$mca = new MCA();
$client_catalog = new ClientCatalog();
$client_catalog->host = CONFIG_DATABASE_HOST;
$client_catalog->username = CONFIG_DATABASE_USER;
$client_catalog->password = CONFIG_DATABASE_PASSWORD;
$client_catalog->database_name = CONFIG_DATABASE_NAME;

/** Loads the WordPress Environment and Template */
require('./wp-blog-header.php');
