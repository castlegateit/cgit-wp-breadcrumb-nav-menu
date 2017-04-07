<?php

namespace Cgit;

class BreadcrumbNavMenu extends Breadcrumb
{
    /**
     * WordPress navigation menu
     *
     * @var mixed
     */
    private $menu;

    /**
     * Constructor
     *
     * You must specify the WordPress navigation menu that will be used to
     * determine the page structure. This can be the menu name, ID, or slug or
     * the menu location (used to register the navigation menu).
     *
     * @param mixed $menu
     * @param array $args
     * @return void
     */
    public function __construct($menu, $args = [])
    {
        $this->menu = $menu;
        parent::__construct($args);
    }

    /**
     * Amend breadcrumb list: page
     *
     * This replaces the page method in the parent class and uses the specified
     * navigation menu to determine the page structure instead of the underlying
     * page hierarchy.
     *
     * @return void
     */
    protected function isPage()
    {
        global $post;

        // Return the menu items for a particular menu name, ID, or slug
        $items = wp_get_nav_menu_items($this->menu);

        // If that doesn't work, try locations with the same name
        if (!$items) {
            $locations = get_nav_menu_locations();

            // If it still doesn't work, give up
            if (!array_key_exists($this->menu, $locations)) {
                return;
            }

            $items = wp_get_nav_menu_items($locations[$this->menu]);
        }

        // Identify the parent menu item
        $parent_id = 0;

        foreach ($items as $item) {
            if ($item->object_id == $post->ID) {
                $parent_id = $item->menu_item_parent;
                break;
            }
        }

        // Assemble a list of ancestor menu items
        $ancestors = [];

        while ($parent_id) {
            foreach ($items as $item) {
                if ($item->ID == $parent_id) {
                    $ancestors[] = $item;
                    $parent_id = $item->menu_item_parent;
                    break;
                }
            }
        }

        // Reverse the order of the ancestor menu items
        $ancestors = array_reverse($ancestors);

        // Add each ancestor menu item to the breadcrumb list
        foreach ($ancestors as $ancestor) {
            $this->add($ancestor->title, $ancestor->url);
        }

        // Add the current page
        $this->add(get_the_title(), false, true);
    }
}
