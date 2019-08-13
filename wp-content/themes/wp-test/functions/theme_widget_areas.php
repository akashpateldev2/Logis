<?php 
if (function_exists('register_sidebar')) {
    register_sidebar(array(
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
        'name' => 'Search',
        'id' => 'search'
    ));
    
    register_sidebar(array(
        'before_widget' => '',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="title">',
        'after_title' => '</h2><div class="sidebar">',
        'name' => 'Sidebar',
        'id' => 'sidebar'
    ));
    register_sidebar(array(
        'before_widget' => '',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="footer-heading mb-4">',
        'after_title' => '</h2><div class="sidebar">',
        'name' => 'Footer 1',
        'id' => 'footer_1'
    ));
    register_sidebar(array(
        'before_widget' => '',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="footer-heading mb-4">',
        'after_title' => '</h2><div class="sidebar">',
        'name' => 'Footer 2',
        'id' => 'footer_2'
    ));
    register_sidebar(array(
        'before_widget' => '',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="footer-heading mb-4">',
        'after_title' => '</h2><div class="sidebar">',
        'name' => 'Footer 3',
        'id' => 'footer_3'
    ));
    register_sidebar(array(
        'before_widget' => '',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="footer-heading mb-4">',
        'after_title' => '</h2><div class="sidebar">',
        'name' => 'Footer 4',
        'id' => 'footer_4'
    ));
}
?>