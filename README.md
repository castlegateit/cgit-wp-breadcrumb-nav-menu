# Castlegate IT WP Breadcrumb Nav Menu #

Castlegate IT WP Breadcrumb adds a simple breadcrumb navigation to WordPress. It works with WordPress Nav Menus defined in the `Appearance` tab of WordPress. The function `cgit_breadcrumb_nav_menu($menu, $sep, $home, $index)` will return a complete breadbrumb navigation, with each item separated by `$sep`. The default separator is ` / `. The `$home` argument is optional and can be used to specify the name of the home page (default "Home"). The `$index` argument is optional and can be used to specify the name of the posts index (default "Posts"). The $menu option is required and is a menu ID to fetch from. The plugin also provides a shortcode:

    [breadcrumb_nav_menu sep=" / " home="Home" index="News"]

The separator, home, and index arguments are optional.
