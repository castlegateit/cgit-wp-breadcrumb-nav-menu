<?php

/**
 * Breadcrumb shortcode
 */
add_shortcode('breadcrumb_nav_menu', function($atts) {
    $defaults = array(
        'menu' => false,
        'sep' => ' / ',
        'home' => false,
        'index' => false,
    );

    $atts = shortcode_atts($defaults, $atts);
    $breadcrumb = new Cgit\BreadcrumbNavMenu(
        $atts['menu'],
        $atts['sep'],
        $atts['home'],
        $atts['index']
    );

    return $breadcrumb->render();
});
