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

Copyright (c) 2019 Castlegate IT. All rights reserved.

This program is free software: you can redistribute it and/or modify it under the terms of the GNU Affero General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Affero General Public License for more details.

You should have received a copy of the GNU Affero General Public License along with this program. If not, see <https://www.gnu.org/licenses/>.
