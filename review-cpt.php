<?php

/**
 *
 * @link              ivorpad.com
 * @since             0.0.1
 * @package           Review_Cpt
 *
 * @wordpress-plugin
 * Plugin Name:       Envato Market Proofing Enhanced
 * Plugin URI:        envato.com
 * Description:       Envato Market Proofing Enhanced
 * Version:           0.1.0
 * Author:            Ivor Padilla
 * Author URI:        ivorpad.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       envato
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Register Custom Post Type
function proofing_post_type() {

  $labels = array(
    'name'                  => _x( 'Review Snippets', 'Review Snippets', 'envato' ),
    'singular_name'         => _x( 'Review Snippet', 'Review Snippet', 'envato' ),
    'menu_name'             => __( 'Snippets', 'envato' ),
    'name_admin_bar'        => __( 'Snippets', 'envato' ),
    'archives'              => __( 'Snippets Archives', 'envato' ),
    'attributes'            => __( 'Snippets Attributes', 'envato' ),
    'parent_item_colon'     => __( 'Parent:', 'envato' ),
    'all_items'             => __( 'All Snippets', 'envato' ),
    'add_new_item'          => __( 'Add New Snippet', 'envato' ),
    'add_new'               => __( 'Add New', 'envato' ),
    'new_item'              => __( 'New Snippet', 'envato' ),
    'edit_item'             => __( 'Edit Snippet', 'envato' ),
    'update_item'           => __( 'Update Snippet', 'envato' ),
    'view_item'             => __( 'View Snippet', 'envato' ),
    'view_items'            => __( 'View Snippets', 'envato' ),
    'search_items'          => __( 'Search Snippet', 'envato' ),
    'not_found'             => __( 'Not found', 'envato' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'envato' ),
    'featured_image'        => __( 'Featured Image', 'envato' ),
    'set_featured_image'    => __( 'Set featured image', 'envato' ),
    'remove_featured_image' => __( 'Remove featured image', 'envato' ),
    'use_featured_image'    => __( 'Use as featured image', 'envato' ),
    'insert_into_item'      => __( 'Insert into item', 'envato' ),
    'uploaded_to_this_item' => __( 'Uploaded to this item', 'envato' ),
    'items_list'            => __( 'Items list', 'envato' ),
    'items_list_navigation' => __( 'Items list navigation', 'envato' ),
    'filter_items_list'     => __( 'Filter items list', 'envato' ),
  );
  $args = array(
    'label'                 => __( 'Review Snippet', 'envato' ),
    'description'           => __( 'Envato Market Snippets', 'envato' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'editor' ),
    'hierarchical'          => false,
    'public'                => true,
    'show_ui'               => true,
    'show_in_menu'          => true,
    'menu_position'         => 5,
    'show_in_admin_bar'     => true,
    'show_in_nav_menus'     => false,
    'can_export'            => true,
    'has_archive'           => false,   
    'exclude_from_search'   => true,
    'publicly_queryable'    => true,
    'capability_type'       => 'page',
    'show_in_rest'          => true,
    'rest_base'             => 'snippets',
    'rest_controller_class' => 'WP_REST_Posts_Controller',
  );
  register_post_type( 'envato_snippets', $args );

}
add_action( 'init', 'proofing_post_type', 0 );


function tf_review_marketplace_snippets_taxonomy() {  

    $labels = array(
      'name'                       => _x( 'Marketplaces', 'taxonomy general name', 'envato' ),
      'singular_name'              => _x( 'Marketplace', 'taxonomy singular name', 'envato' ),
      'search_items'               => __( 'Search Marketplaces', 'envato' ),
      'popular_items'              => __( 'Popular Marketplaces', 'envato' ),
      'all_items'                  => __( 'All Marketplaces', 'envato' ),
      'parent_item'                => null,
      'parent_item_colon'          => null,
      'edit_item'                  => __( 'Edit Marketplace', 'envato' ),
      'update_item'                => __( 'Update Marketplace', 'envato' ),
      'add_new_item'               => __( 'Add New Marketplace', 'envato' ),
      'new_item_name'              => __( 'New Snippet Type Name', 'envato' ),
      'separate_items_with_commas' => __( 'Separate marketplaces with commas', 'envato' ),
      'add_or_remove_items'        => __( 'Add or remove marketplaces', 'envato' ),
      'not_found'                  => __( 'No marketplaces found.', 'envato' ),
      'menu_name'                  => __( 'Marketplaces', 'envato' ),
    );

    register_taxonomy(  
        'marketplaces', 
        'envato_snippets',
        array(  
            'hierarchical' => true,  
            'labels' => $labels,
            'query_var' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'marketplaces',
                'with_front' => false
            )
        )  
    );  
}  
add_action( 'init', 'tf_review_marketplace_snippets_taxonomy');

function tf_review_snippet_type_taxonomy() {  

    $labels = array(
        'name'                       => _x( 'Snippet Types', 'taxonomy general name', 'envato' ),
        'singular_name'              => _x( 'Snippet Type', 'taxonomy singular name', 'envato' ),
        'search_items'               => __( 'Search Snippet Types', 'envato' ),
        'popular_items'              => __( 'Popular Snippet Types', 'envato' ),
        'all_items'                  => __( 'All Snippet Types', 'envato' ),
        'parent_item'                => null,
        'parent_item_colon'          => null,
        'edit_item'                  => __( 'Edit Snippet Type', 'envato' ),
        'update_item'                => __( 'Update Snippet Type', 'envato' ),
        'add_new_item'               => __( 'Add New Snippet Type', 'envato' ),
        'new_item_name'              => __( 'New Snippet Type Name', 'envato' ),
        'separate_items_with_commas' => __( 'Separate snippet types with commas', 'envato' ),
        'add_or_remove_items'        => __( 'Add or remove snippet types', 'envato' ),
        'choose_from_most_used'      => __( 'Choose from the most used snippet types', 'envato' ),
        'not_found'                  => __( 'No snippet types found.', 'envato' ),
        'menu_name'                  => __( 'Snippet Types', 'envato' ),
    );


    register_taxonomy(  
        'snippet_types', 
        'envato_snippets',
        array(  
            'hierarchical' => false,  
            'labels' => $labels,
            'query_var' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'rewrite' => array(
                'slug' => 'types',
                'with_front' => false
            )
        )  
    );  
}  
add_action( 'init', 'tf_review_snippet_type_taxonomy');

// Remove autop from the Snippets.

remove_filter('the_content','wpautop');

//decide when you want to apply the auto paragraph

add_filter('the_content','tf_review_custom_formatting');

function tf_review_custom_formatting($content){
if(get_post_type()=='envato_snippets') 
    return $content;//no autop
else
 return wpautop( $content );
}

// Remove 100 max per_page posts from custom endpoint.
add_filter( 'rest_endpoints', function( $endpoints ){
    if ( ! isset( $endpoints['/wp/v2/envato_snippets'] ) ) {
        return $endpoints;
    }
    unset( $endpoints['/wp/v2/envato_snippets'][0]['args']['per_page']['maximum'] );
    return $endpoints;
});


