<?php
/*
 * Plugin Name:       Breakdance WooCommerce Search Page Override
 * Description:       Overrides default Wordpress search posts page to search for products.
 * Version:           1.0.1
 * Author:            Andrei Cojocaru
*/

/**
 * This function modifies the main WordPress query to include an array of 
 * post types instead of the default 'post' post type.
 *
 * @param object $query The main WordPress query.
 */

function wpb_change_search_url()
{
  if (is_search() && !empty($_GET['s']) && empty($_GET['post_type'])) {
    $new_url = add_query_arg(
      array(
        'post_type' => 'product'
      ),
      add_query_arg($wp->query_vars, home_url($wp->request))
    );
    wp_redirect($new_url);
    exit();
  }
}
add_action('template_redirect', 'wpb_change_search_url');
