<?php

/*

Plugin Name: Castlegate IT WP Breadcrumb Nav Menu
Plugin URI: http://github.com/castlegateit/cgit-wp-breadcrumb-nav-menu
Description: Simple breadcrumb navigation for WordPress using WordPress Nav Menus.
Version: 3.0
Author: Castlegate IT
Author URI: http://www.castlegateit.co.uk/
License: MIT

*/

/**
 * Load plugin
 */
add_action('plugins_loaded', function () {
    if (!class_exists('Cgit\Breadcrumb')) {
        add_action('admin_notices', function () {
            ?>
            <div class="error">
                <p><strong>Error:</strong> the <a href="http://github.com/castlegateit/cgit-wp-breadcrumb-nav-menu">Breadcrumb Nav Menu plugin</a> requires the <a href="http://github.com/castlegateit/cgit-wp-breadcrumb">Breadcrumb plugin</a>.</p>
            </div>
            <?php
        });

        return;
    }

    require_once __DIR__ . '/classes/autoload.php';
    require_once __DIR__ . '/functions.php';
}, 20);
