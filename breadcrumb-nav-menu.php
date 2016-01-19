<?php

namespace Cgit;

class BreadcrumbNavMenu extends Breadcrumb
{
    /**
     * Constructor
     */
    public function __construct(
        $menu,
        $sep = ' / ',
        $home = false,
        $index = false
    ) {
        // Call parent constructor
        parent::__construct($sep, $home, $index);

        // Set navigation menu
        $this->menu = $menu;
    }

    /**
     * Page
     */
    public function isPage()
    {
        $pages = wp_get_nav_menu_items($this->menu);

        if ($pages) {
            foreach($pages as $page) {
                _wp_menu_item_classes_by_context($pages);

                if ($page->current_item_ancestor) {
                    $item = '<a href="' . $page->url . '">' . $page->title
                        . '</a>';

                    array_splice($this->breadcrumb, 1, 0, $item);
                }
            }
        }

        $this->breadcrumb[] = get_the_title();
    }
}
