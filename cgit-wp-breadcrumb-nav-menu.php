<?php

/*

Plugin Name: Castlegate IT WP Breadcrumb Nav Menu
Plugin URI: http://github.com/castlegateit/cgit-wp-breadcrumb-nav-menu
Description: Simple breadcrumb navigation for WordPress using WordPress Nav Menus.
Version: 3.1
Author: Castlegate IT
Author URI: http://www.castlegateit.co.uk/
License: AGPL

*/

if (!defined('ABSPATH')) {
    wp_die('Access denied');
}

add_action('cgit_breadcrumb_loaded', function () {
    require_once __DIR__ . '/classes/autoload.php';
    require_once __DIR__ . '/functions.php';

    do_action('cgit_breadcrumb_nav_menu_loaded');
});
