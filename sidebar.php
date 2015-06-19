<?php 

function custom_excerpt_length( $length ) {
	return 32;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '... <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . __( 'Læs mere', 'smamo' ) . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );


$attach_posts = get_post_meta(get_the_ID(),'add_stone',true);
$stone = new WP_Query(array(
    'post_type' => array('post','page','galleri','event'),
    'post__in' => $attach_posts,
    'posts_per_page'    => 5,
));

if ($stone->have_posts()) : while ($stone->have_posts()) : $stone->the_post();


?>

<div class="tf_stone wood_stone">
    <div class="widget-container">
        <div class="widget-title">
            <a href="<?php the_permalink() ?>">
                <h3><?php the_title(); ?></h3>
            </a>
        </div>
        <?php if (has_post_thumbnail()): ?>
        <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('stone') ?>
        </a>
        <?php endif; ?>
        <div class="textwidget">
            <?php the_excerpt() ?>
        </div>
    </div>
    <div class="front-widget-shade"></div>
</div>
<?php endwhile; endif; wp_reset_postdata(); ?>