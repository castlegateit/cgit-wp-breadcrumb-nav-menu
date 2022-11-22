# Castlegate IT WP Breadcrumb Nav Menu #

Extends the [Castlegate IT WP Breadcrumb](http://github.com/castlegateit/cgit-wp-breadcrumb) plugin to use a WordPress navigation menu for page structure instead of the underlying page hierarchy. Usage is similar to `Cgit\Breadcrumb`, but the constructor requires an additional argument that specifies the name, ID, slug, or location of the navigation menu:

~~~ php
$crumb = new Cgit\BreadcrumbNavMenu($menu, $args = []);
~~~

For backwards compatibility, the plugin also provides a function for rendering a breadcrumb navigation, equivalent to the `render` method provided by the parent `Cgit\Breadcrumb` class:

~~~ php
$foo = cgit_breadcrumb_nav_menu($menu, $sep, $home, $index);
~~~

## License

Released under the [MIT License](https://opensource.org/licenses/MIT). See [LICENSE](LICENSE) for details.
