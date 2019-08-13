<?php
/* include theme commun codes */
include("functions/theme_commun_code.php");
/* end of include theme commun codes */

/* include theme widget area */
include("functions/theme_widget_areas.php");
/* end of include theme widget area */

/* include the Menu Registration page */
include("functions/register_menus.php");
/* end of include the Menu Registration page */

/* include the option page */
include("functions/theme_option_page.php");
/* end of include the option page */

/* Include the custom post type */
include("functions/custom_post_type.php");
/*end ov Include the custom post type*/

/* Include the theme's custom functions */
include("functions/theme_custom_functions.php");
/*end of theme's custom functions */

/* Include the theme's custom widgets */
include("functions/widgets.php");
/*end of theme's custom widgets */

/* Include the theme's custom users */
include("functions/custom_users.php");
/*end of theme's custom users */

/* Include the theme's custom users */
include("functions/theme_comments.php");
/*end of theme's custom users */
register_nav_menus(array(
    'primary_one' => __('Primary Menu', 'My_First_WordPress_Theme'),    
));

class BootstrapNavMenuWalker extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = array()) {
        $indent = str_repeat("\t", $depth);
        //$output .= "\n$indent<ul class=\"sub-menu\">\n";
  
        // Change sub-menu to dropdown menu
        $output .= "\n$indent<ul class=\"dropdown\">\n";
    }
    
   
    function start_el ( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        // Most of this code is copied from original Walker_Nav_Menu
        global $wp_query, $wpdb;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
    
        $class_names = $value = '';
    
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = ($args->walker->has_children) ? 'has-children' : '';
        $classes[] = ($item->current || $item->current_item_anchestor) ? 'active' : '';
        $classes[] = 'menu-item-' . $item->ID;
        if( $depth && $args->walker->has_children ){
            $classes[] = 'dropdown-submenu';
        }
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';
    
        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';
    
        $table_postmeta = $wpdb->base_prefix.'postmeta';
        $has_children = $wpdb->get_var("SELECT COUNT(meta_id)
                                FROM $table_postmeta
                                WHERE meta_key='_menu_item_menu_item_parent'
                                AND meta_value='".$item->ID."'");
    
        $output .= $indent . '<li' . $id . $value . $class_names .'>';
    
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    
        // Check if menu item is in main menu
        if ( $depth == 0 && $has_children > 0  ) {
            // These lines adds your custom class and attribute
            $attributes .= ' class="dropdown-toggle"';
            $attributes .= ' data-toggle="dropdown"';
        }
    
        $item_output = $args->before;
        $item_output .= '<a class="nav-link" '. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    
        // Add the caret if menu level is 0
        if ( $depth == 0 && $has_children > 0  ) {
            $item_output .= ' <b class="caret"></b>';
        }
    
        $item_output .= '</a>';
        $item_output .= $args->after;
    
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
	
}

/**
 * send contact mail
 */
function sendContactFormToSiteAdmin () {
    try {
        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
            throw new Exception('Bad form parameters. Check the markup to make sure you are naming the inputs correctly.');
        }
        if (!is_email($_POST['email'])) {
            throw new Exception('Email address not formatted correctly.');
        }
        $reason = $_POST['subject'];
        $subject = 'Logis Contact details : '.$reason;
        $headers = 'From: Contact Form <logis@wordpress.org>';
        $send_to = "testineed1@mydemoserver.site";
        $subject = "Contact Form ($reason): ".$_POST['name'];
        $message = "Message from ".$_POST['name'].": \n\n Message". $_POST['message'] . " \n\n Reply to: " . $_POST['email'];
    
        if (wp_mail($send_to, $subject, $message, $headers)) {
            echo json_encode(array('status' => 'success', 'message' => 'Your contact request has been saved successfully.'));
            exit;
        } else {
            throw new Exception('Failed to send email. Check AJAX handler.');
        }
    } catch (Exception $e) {
        echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
        exit;
    }
}
add_action("wp_ajax_contact_send", "sendContactFormToSiteAdmin");
add_action("wp_ajax_nopriv_contact_send", "sendContactFormToSiteAdmin");
/**
 * store newsletter data
 */
function storeNewsletterToSiteAdmin () {
    try {
        if (empty($_POST['newsletter_email'])) {
            throw new Exception('Bad form parameters. Check the markup to make sure you are naming the inputs correctly.');
        }
        if (!is_email($_POST['newsletter_email'])) {
            throw new Exception('Email address not formatted correctly.');
        }
        $email = $_POST['newsletter_email'];
        $total = wp_count_posts('newsletter')->publish;
        if($total>0){
            $args = array(
                'numberposts'	=> -1,
                'post_type'		=> 'newsletter',
                'meta_key'		=> 'subscribe_email',
                'meta_value'	=> $email
            );
            $the_query = new WP_Query( $args );
            $count = count($the_query->posts);
        }else{
            $count = 0;
        }
        if($count==0){
            $title = 'subscriber '.($total+1);
            $post_id = wp_insert_post(array(
                'post_title'=>$title, 
                'post_type'=>'newsletter',
                'post_status'=>'publish',
            ));
            
            if ($post_id) {
                update_field('subscribe_email', $email, $post_id);
                echo json_encode(array('status' => 'success', 'message' => 'Your data has been stored successfully.'));
                exit;
            } else {
                throw new Exception('Some error occured, please try again later.');
            }
        }else{
            throw new Exception('Email already exist');
        }
        
    } catch (Exception $e) {
        echo json_encode(array('status' => 'error', 'message' => $e->getMessage()));
        exit;
    }
}
add_action("wp_ajax_newsletter_send", "storeNewsletterToSiteAdmin");
add_action("wp_ajax_nopriv_newsletter_send", "storeNewsletterToSiteAdmin");

?>