<?php 
register_post_type( 'services',
    array(
    'labels'             => array(
    'name'               => __('Services'            		),
    'singular_name'      => __('Service'                    ),
    'add_new'            => __('Add Service'                ),
    'all_items'          => __('All Services'                ),
    'add_new_item'       => __('Add New Service'            ),
    'edit_item'          => __('Edit Service'               ),
    'new_item'           => __('New Service'                ),
    'view_item'          => __('View Service'               ),
    'search_items'       => __('Search Service'             ),
    'not_found'          => __('No Service found'           ),
    'not_found_in_trash' => __('No Service found in Trash'  )
    ),
    'public'       => true,
    'has_archive'  => true,
    'menu_icon'    => 'dashicons-list-view',
    'rewrite'      => array('slug'=>'services'),
    'supports'     => array( 'title','editor','excerpt'),
    )
); 
include 'services_columns.php';
?>