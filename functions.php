<?php

/**
 * Function to return breadcrumb
 */
function cgit_breadcrumb_nav_menu(
    $menu,
    $sep = ' / ',
    $home = false,
    $index = false
) {
    $breadcrumb = new Cgit\BreadcrumbNavMenu($menu, $sep, $home, $index);

    return $breadcrumb->render();
}
