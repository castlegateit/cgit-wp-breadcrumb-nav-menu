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
    $breadcrumb = new Cgit\BreadcrumbNavMenu($menu, $sep, $home, $index);

    return $breadcrumb->render();
}
