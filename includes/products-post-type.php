<?php
add_action( 'init', 'products_init' );

function products_init() {
    $labels = array(
        'name'               => _x( 'Games', 'post type general name', 'your-plugin-textdomain' ),
        'singular_name'      => _x( 'Game', 'post type singular name', 'your-plugin-textdomain' ),
        'menu_name'          => _x( 'Games', 'admin menu', 'your-plugin-textdomain' ),
        'name_admin_bar'     => _x( 'Game', 'add new on admin bar', 'your-plugin-textdomain' ),
        'add_new'            => _x( 'Add New', 'product', 'your-plugin-textdomain' ),
        'add_new_item'       => __( 'Add New Game', 'your-plugin-textdomain' ),
        'new_item'           => __( 'New Product', 'your-plugin-textdomain' ),
        'edit_item'          => __( 'Edit Game', 'your-plugin-textdomain' ),
        'view_item'          => __( 'View Game', 'your-plugin-textdomain' ),
        'all_items'          => __( 'All Games', 'your-plugin-textdomain' ),
        'search_items'       => __( 'Search Games', 'your-plugin-textdomain' ),
        'parent_item_colon'  => __( 'Parent Games:', 'your-plugin-textdomain' ),
        'not_found'          => __( 'No products found.', 'your-plugin-textdomain' ),
        'not_found_in_trash' => __( 'No products found in Trash.', 'your-plugin-textdomain' )
    );

    $args = array(
        'labels'             => $labels,
                'description'        => __( 'Description.', 'your-plugin-textdomain' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'products' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'comments' ),
        'taxonomies'         => array( 'post_tag', 'category' ),
        'register_meta_box_cb' => 'wpt_add_products__metaboxes',
    );

    register_post_type( 'products', $args );
}