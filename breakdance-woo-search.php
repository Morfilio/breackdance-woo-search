<?php
/*
 * Plugin Name:       Breakdance WooCommerce Search Page Override
 * Description:       Overrides default Wordpress search posts page to search for products.
 * Version:           1.0.0
 * Author:            Andrei Cojocaru
*/

/**
 * This function modifies the main WordPress query to include an array of 
 * post types instead of the default 'post' post type.
 *
 * @param object $query The main WordPress query.
 */
function tg_include_custom_post_types_in_search_results($query)
{
  if ($query->is_main_query() && $query->is_search() && !is_admin()) {
    $query->set('post_type', array('products'));
  }
}
add_action('pre_get_posts', 'tg_include_custom_post_types_in_search_results');
