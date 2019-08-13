<?php 
/*newsletter colum*/
function add_newsletter_columns($columns) {
  
	$new_columns['cb'] = '<input type="checkbox" />';
	$new_columns['title'] = _x('Name', 'column name');
	$new_columns['subscribe_email'] = __('Email');
	$new_columns['date'] = _x('Date', 'column name');
	
	return $new_columns;
}
add_filter('manage_newsletter_posts_columns' , 'add_newsletter_columns');

add_action('manage_posts_custom_column', 'show_newsletter_column_for_listing_list',10,2);
function show_newsletter_column_for_listing_list( $columns,$post_id ) {
    global $typenow;
    if ($typenow=='newsletter') 
    { 
        switch ($columns) 
        {
            case 'subscribe_email':
                echo get_field('subscribe_email', $post_id);	
            break;
        }
    }
}
/*end of newsletter Colum*/

?>