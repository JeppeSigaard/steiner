<?php 
$parent = get_post_ancestors(get_the_ID());
$parent_id = (isset($parent[0])) ? $parent[0]: get_the_ID();

// Tilføj forældre //
if($parent_id !== get_the_ID()) {

    $parent_query = new WP_Query(array(
        'post_type' => 'page',
        'post__in' => array($parent_id),
    ));

    if ($parent_query->have_posts()) { 
        while ($parent_query->have_posts()) { 
            $parent_query->the_post();
            get_template_part('modules/content','stone');

        }
    }
    wp_reset_postdata();

}


// Tilføj søskende // 
$tree_items = new WP_Query(array(
    'post_type' => 'page',
    'post_parent' => $parent_id,
    'posts_per_page'    => 5,
    'post__not_in'   => array(get_the_ID()),
));

if ($tree_items->have_posts()) { 
    while ($tree_items->have_posts()) { 
        $tree_items->the_post();
        get_template_part('modules/content','stone');
    }
}

wp_reset_postdata();

?>