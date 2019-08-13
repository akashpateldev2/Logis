<?php
add_action( 'init', 'create_post_type' );

function create_post_type()
{	
    include 'custom_post_type/services/services.php';
    include 'custom_post_type/industries/industries.php';
    include 'custom_post_type/testimonials/testimonials.php';
    include 'custom_post_type/people/people.php';    
    include 'custom_post_type/newsletter/newsletter.php';
}
?>