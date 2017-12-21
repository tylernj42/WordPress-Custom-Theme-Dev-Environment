<?php

/* Add menu theme support */
function register_my_menu(){
    register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_my_menu' );

/* Add featured image theme support */
function add_thumbnails_support(){
    add_theme_support('post-thumbnails', array('post'));
}
add_action( 'init', 'add_thumbnails_support' ); 

/* Add Options Page */
if(function_exists('acf_add_options_page')){
    acf_add_options_page(array(
        'page_title'    => 'Theme Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));
}

/* Enqueue Scripts */
function enqueue_scripts(){
    if(!is_admin()){
        wp_deregister_script('jquery');
        wp_register_script('jquery', "https://code.jquery.com/jquery-3.2.1.slim.min.js", array(), false);
    }
    wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js', array('jquery'), false, true);
    wp_enqueue_script('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js', array('jquery', 'popper'), false, true);
    wp_enqueue_script('scripts', get_template_directory_uri().'/js/bundle.js', array('jquery', 'bootstrap'), false, true);
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');