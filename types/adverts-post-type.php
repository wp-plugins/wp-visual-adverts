<?php

function rpadv_adverts_init() {
  $labels = array(
    'name'               => __('Adverts', 'rpadv'), 
    'singular_name'      => __('Advert', 'rpadv'),
    'add_new'            => __('Add New', 'rpadv'),
    'add_new_item'       => __('Add New Advert', 'rpadv'),
    'edit_item'          => __('Edit Advert', 'rpadv'),
    'new_item'           => __('New Advert', 'rpadv'),
    'all_items'          => __('Adverts', 'rpadv'),
    'view_item'          => __('View Advert', 'rpadv'),
    'search_items'       => __('Search Advert', 'rpadv'),
    'not_found'          => __('No Adverts Found', 'rpadv'),
    'not_found_in_trash' => __('No Adverts Found in Trash', 'rpadv'),
    'parent_item_colon'  => '',
    'menu_name'          => __('WP Visual Adverts', 'rpadv')
  );

  $args = array(
    'labels'             => $labels, 
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => 'adverts',
    'show_in_nav_menus'  => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' =>  _x( 'adverts', 'URL slug'),  'with_front' => false ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 2,
    'supports'           => array( 
        'title', 
        'editor',
        'thumbnail',
    ),
  );

  register_post_type( 'adverts', $args );
  
  flush_rewrite_rules();    
}
add_action( 'init', 'rpadv_adverts_init' );
