<?php

/**
 * Function to return breadcrumb
 *
 * @param string $menu Menu name, ID, or slug
 * @param string $sep Breadcrumb link separator
 * @param string|bool $home Home link text
 * @param string|bool $index Posts index link text
 * @return string Rendered HTML output
 */
function cgit_breadcrumb_nav_menu(
    $menu,
    $sep = ' / ',
    $home = false,
    $index = false
) {
    $args = [];

    if ($home) {
        $args['home'] = $home;
    }

    if ($index) {
        $args['index'] = $index;
    }

    $crumb = new Cgit\BreadcrumbNavMenu($menu, $args);

    return $crumb->render($sep);
}
