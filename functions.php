<?php
add_action('after_setup_theme', 'tankefuld_setup');
function tankefuld_setup(){
    load_theme_textdomain('tankefuld', get_template_directory() . '/languages');
    add_theme_support('automatic-feed-links');
    add_theme_support('post-thumbnails');
    global $content_width;
    if ( ! isset( $content_width ) ) $content_width = 640;
    register_nav_menus(
    array( 	'main-menu' => __( 'Forsidens Menu', 'tankefuld' ),
            'event-menu' => __( 'Event Menu', 'tankefuld' )
    ));
}


add_filter('the_title', 'tankefuld_title');
function tankefuld_title($title) {
    if ($title == '') {
        return '&rarr;';
    } 
    else {
        return $title;
    }
}

add_filter('wp_title', 'tankefuld_filter_wp_title');
function tankefuld_filter_wp_title($title){
    return $title . esc_attr(get_bloginfo('name'));
}


require 'functions/custom-header.php';
require 'functions/post-type-gallery.php';
require 'functions/post-type-indmeldelse.php';
require 'functions/meta-box.php';
require 'functions/images.php';