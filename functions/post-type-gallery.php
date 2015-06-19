<?php 

add_action( 'init', 'smamo_add_galleries' );

function smamo_add_galleries() {
	register_post_type( 'galleri', array(
		
        'menu_icon' 		 => 'dashicons-camera',
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'galleri' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 22,
		'supports'           => array( 'title', 'thumbnail','editor'),
        'labels'             => array(
            
            'name'               => _x( 'Gallerier', 'post type general name', 'smamo' ),
            'singular_name'      => _x( 'Galleri', 'post type singular name', 'smamo' ),
            'menu_name'          => _x( 'Gallerier', 'admin menu', 'smamo' ),
            'name_admin_bar'     => _x( 'Gallerier', 'add new on admin bar', 'smamo' ),
            'add_new'            => _x( 'Tilføj ny ', 'galleri', 'smamo' ),
            'add_new_item'       => __( 'Tilføj ny', 'smamo' ),
            'new_item'           => __( 'Ny galleri', 'smamo' ),
            'edit_item'          => __( 'Rediger', 'smamo' ),
            'view_item'          => __( 'Se galleri', 'smamo' ),
            'all_items'          => __( 'Se alle', 'smamo' ),
            'search_items'       => __( 'Find galleri', 'smamo' ),
            'parent_item_colon'  => __( 'Forældre:', 'smamo' ),
            'not_found'          => __( 'Start med at oprette et nyt galleri.', 'smamo' ),
            'not_found_in_trash' => __( 'Papirkurven er tom.', 'smamo' ),
            ),
	   )
    );
}
?>