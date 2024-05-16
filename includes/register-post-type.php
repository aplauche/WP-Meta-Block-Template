<?php
/**
 * Register a property CPT and attach meta
 */
function fsd_property_post_type(){
  $labels = array(
		'name'                  => _x( 'Properties', 'Post type general name', 'fsd' ),
		'singular_name'         => _x( 'Property', 'Post type singular name', 'fsd' ),
		'menu_name'             => _x( 'Properties', 'Admin Menu text', 'fsd' ),
		'name_admin_bar'        => _x( 'Property', 'Add New on Toolbar', 'fsd' ),
		'add_new'               => __( 'Add New', 'fsd' ),
		'add_new_item'          => __( 'Add New Property', 'fsd' ),
		'new_item'              => __( 'New Property', 'fsd' ),
		'edit_item'             => __( 'Edit Property', 'fsd' ),
		'view_item'             => __( 'View Property', 'fsd' ),
		'all_items'             => __( 'All Properties', 'fsd' ),
		'search_items'          => __( 'Search Properties', 'fsd' ),
		'parent_item_colon'     => __( 'Parent Properties:', 'fsd' ),
		'not_found'             => __( 'No Properties found.', 'fsd' ),
		'not_found_in_trash'    => __( 'No Properties found in Trash.', 'fsd' ),
		'featured_image'        => _x( 'Property Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'fsd' ),
		'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'fsd' ),
		'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'fsd' ),
		'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'fsd' ),
		'archives'              => _x( 'Property archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'fsd' ),
		'insert_into_item'      => _x( 'Insert into Property', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'fsd' ),
		'uploaded_to_this_item' => _x( 'Uploaded to this Property', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'fsd' ),
		'filter_items_list'     => _x( 'Filter Properties list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'fsd' ),
		'items_list_navigation' => _x( 'Properties list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'fsd' ),
		'items_list'            => _x( 'Properties list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'fsd' ),
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'show_in_rest'       => true, 
		'query_var'          => true, 
		'rewrite'            => array( 'slug' => 'properties', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 20,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'custom-fields'),
    'description'        => __('A custom property post type', 'fsd'),
    'template' => array(
      array('fsd/property-meta-details', array(
        'lock' => array(
          'remove' => true,
        ),
      ))
    )
	);

	register_post_type( 'property', $args );




	register_post_meta(
		'property',
		'squareFootage',
		array(
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'integer',
		)
	);

	register_post_meta(
		'property',
		'bedrooms',
		array(
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'number',
		)
	);

	register_post_meta(
		'property',
		'bathrooms',
		array(
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'number',
		)
	);

	register_post_meta(
		'property',
		'price',
		array(
			'show_in_rest' => true,
			'single'       => true,
			'type'         => 'number',
		)
	);

}

add_action( 'init', 'fsd_property_post_type' );
