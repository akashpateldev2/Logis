<?php 
register_post_type( 'industries',
    array(
    'labels'             => array(
    'name'               => __('Industries'            		),
    'singular_name'      => __('Industry'                    ),
    'add_new'            => __('Add Industry'                ),
    'all_items'          => __('All Industries'                ),
    'add_new_item'       => __('Add New Industry'            ),
    'edit_item'          => __('Edit Industry'               ),
    'new_item'           => __('New Industry'                ),
    'view_item'          => __('View Industry'               ),
    'search_items'       => __('Search Industry'             ),
    'not_found'          => __('No Industry found'           ),
    'not_found_in_trash' => __('No Industry found in Trash'  )
    ),
    'public'       => true,
    'has_archive'  => true,
    'menu_icon'    => 'dashicons-building',
    'rewrite'      => array('slug'=>'industries'),
    'supports'     => array( 'title','editor','thumbnail'),
    )
); 
include 'industries_columns.php';
?>