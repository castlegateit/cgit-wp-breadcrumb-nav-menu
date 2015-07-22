<?php

/*

Plugin Name: Castlegate IT WP Breadcrumb Nav Menu
Plugin URI: http://github.com/castlegateit/cgit-wp-breadcrumb-nav-menu
Description: Simple breadcrumb navigation for WordPress using WordPress Nav Menus.
Version: 1.0
Author: Castlegate IT
Author URI: http://www.castlegateit.co.uk/
License: MIT

*/

/**
 * Generate breadcrumb
 */
function cgit_breadcrumb_nav_menu ($menu, $sep = ' / ', $home = FALSE, $index = FALSE) {

    global $post;

    $home_url   = esc_url( home_url('/') );
    $home_name  = $home ?: 'Home';
    $posts_obj  = get_post_type_object('post');
    $posts_name = $index ?: $posts_obj->labels->name;
    $links      = array( "<a href='$home_url'>$home_name</a>" );

    if ( is_front_page() ) {

        // do nothing

    } elseif ( is_home() ) {

        $links[] = $posts_name;

    } elseif ( is_page() ) {

        $pages = wp_get_nav_menu_items($menu);

        foreach($pages as $page) {
            _wp_menu_item_classes_by_context($pages);
            if ($page->current_item_ancestor) {
                array_splice($links, 1, 0, "<a href='$page->url'>$page->title</a>");
            }
        }

        $links[] = get_the_title();

    } elseif ( is_singular() ) {

        if ( get_option('show_on_front') == 'page' ) {

            $type    = get_post_type($post);
            $object  = get_post_type_object($type);
            $url     = $type == 'post' ? get_permalink( get_option('page_for_posts') ) : get_post_type_archive_link($type);
            $name    = $type == 'post' ? $posts_name : $object->labels->name;
            $links[] = "<a href='$url'>$name</a>";

        }

        $links[] = get_the_title();

    } elseif ( is_category() ) {

        $links[] = 'Category';
        $links[] = single_cat_title('', FALSE);

    } elseif ( is_tag() ) {

        $links[] = 'Tag';
        $links[] = single_tag_title('', FALSE);

    } elseif ( is_tax() ) {

        $tax     = get_taxonomy( get_query_var('taxonomy') );
        $term    = get_term_by('slug', get_query_var('term'), $tax->name);
        $links[] = $tax->labels->name;
        $links[] = $term->name;

    } elseif ( is_search() ) {

        $links[] = 'Search results';

    } elseif ( is_day() ) {

        $links[] = get_the_date();

    } elseif ( is_month() ) {

        $links[] = get_the_date('F Y');

    } elseif ( is_year() ) {

        $links[] = get_the_date('Y');

    } elseif ( is_post_type_archive() ) {

        $links[] = post_type_archive_title('', FALSE);

    } elseif ( is_archive() ) {

        $links[] = 'Archive';

    } elseif ( is_404() ) {

        $links[] = 'Page not found';

    }

    return implode($sep, $links);

}

/**
 * Breadcrumb shortcode
 */
function cgit_breadcrumb_nav_menu_shortcode ($atts) {

    $defaults = array(
        'sep'   => ' / ',
        'home'  => FALSE,
        'index' => FALSE,
    );

    $atts = shortcode_atts($defaults, $atts);

    return cgit_breadcrumb_nav_menu($atts['sep'], $atts['home'], $atts['index']);

}

add_shortcode('breadcrumb_nav_menu', 'cgit_breadcrumb_nav_menu_shortcode');
