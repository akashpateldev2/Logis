<?php 
/*people colum*/
function add_people_columns($columns) {
  
	$new_columns['cb'] = '<input type="checkbox" />';
	$new_columns['title'] = _x('People Name', 'column name');
	$new_columns['image'] = __('Image');
	$new_columns['date'] = _x('Date', 'column name');
	
	return $new_columns;
}
add_filter('manage_people_posts_columns' , 'add_people_columns');

add_action('manage_posts_custom_column', 'show_people_column_for_listing_list',10,2);
function show_people_column_for_listing_list( $columns,$post_id ) {
    global $typenow;
    if ($typenow=='people') 
    { 
        switch ($columns) 
        {
            case 'image':
                echo get_the_post_thumbnail( $post_id, array(50,50) );	
            break;
        }
    }
}
/*end of people Colum*/
?>