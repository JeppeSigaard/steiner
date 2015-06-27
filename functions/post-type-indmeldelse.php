<?php 

add_action( 'init', 'smamo_add_indmeldelse' );

function smamo_add_indmeldelse() {
	register_post_type( 'indmeldelse', array(
		
        'menu_icon' 		 => 'dashicons-email-alt',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'indmeldelse' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 22,
		'supports'           => array( 'title', 'thumbnail','editor'),
        'labels'             => array(
            
            'name'               => _x( 'Indmeldelser', 'post type general name', 'smamo' ),
            'singular_name'      => _x( 'Indmeldelse', 'post type singular name', 'smamo' ),
            'menu_name'          => _x( 'Indmeldelser', 'admin menu', 'smamo' ),
            'name_admin_bar'     => _x( 'Indmeldelser', 'add new on admin bar', 'smamo' ),
            'add_new'            => _x( 'Tilføj ny ', 'indmeldelse', 'smamo' ),
            'add_new_item'       => __( 'Tilføj ny', 'smamo' ),
            'new_item'           => __( 'Ny indmeldelse', 'smamo' ),
            'edit_item'          => __( 'Rediger', 'smamo' ),
            'view_item'          => __( 'Se indmeldelse', 'smamo' ),
            'all_items'          => __( 'Se alle', 'smamo' ),
            'search_items'       => __( 'Find indmeldelse', 'smamo' ),
            'parent_item_colon'  => __( 'Forældre:', 'smamo' ),
            'not_found'          => __( 'Start med at oprette en ny indmeldelse.', 'smamo' ),
            'not_found_in_trash' => __( 'Papirkurven er tom.', 'smamo' ),
            ),
	   )
    );
}

?>