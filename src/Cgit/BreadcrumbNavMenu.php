<?php

namespace Cgit;

class BreadcrumbNavMenu extends Breadcrumb
{
    /**
     * Constructor
     *
     * @param string $menu Menu name, ID, or slug
     * @param string $sep Breadcrumb link separator
     * @param string|bool $home Home link text
     * @param string|bool $index Posts index link text
     * @return void
     */
    public function __construct(
        $menu,
        $sep = ' / ',
        $home = false,
        $index = false
    ) {
        // Set navigation menu
        $this->menu = $menu;

        // Call parent constructor
        parent::__construct($sep, $home, $index);
    }

    /**
     * Page
     *
     * @return void
     */
    public function isPage()
    {
        $pages = wp_get_nav_menu_items($this->menu);

        if ($pages) {
            foreach ($pages as $page) {
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
