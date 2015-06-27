<?php 

function custom_excerpt_length( $length ) {
	return 32;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '... <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Læs mere', 'smamo' ) . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

$childarray = array();
$parent = get_post_ancestors(get_the_ID());
$parent_id = (isset($parent[0])) ? $parent[0]: get_the_ID();
$children = get_page_children($parent_id,get_posts(array('post_type' => 'page','numberposts' => -1)));
foreach($children as $child){
    
    $childarray[] = $child->ID;
    
}

$attach_posts = get_post_meta(get_the_ID(),'add_stone',true);
$stone = new WP_Query(array(
    'post_type' => array('post','page','galleri','event'),
    'post__in' => $attach_posts,
    'posts_per_page' => 5,
));

if ($stone->have_posts()) : while ($stone->have_posts()) : $stone->the_post();


if(!in_array(get_the_ID(),$childarray)){

    get_template_part('modules/content','stone'); 

}

endwhile; 
endif; 

wp_reset_postdata(); ?>

<?php get_template_part('modules/tree','items'); ?>