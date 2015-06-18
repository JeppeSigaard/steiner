<?php
add_action('after_setup_theme', 'tankefuld_setup');
function tankefuld_setup()
{
load_theme_textdomain('tankefuld', get_template_directory() . '/languages');
add_theme_support('automatic-feed-links');
add_theme_support('post-thumbnails');
global $content_width;
if ( ! isset( $content_width ) ) $content_width = 640;
register_nav_menus(
array( 	'main-menu' => __( 'Forsidens Menu', 'tankefuld' ),
		'bitf-menu' => __( 'Bo i tankefuld Menu', 'tankefuld' ),
		'vbh-menu' => __( 'Vi bor her Menu', 'tankefuld' ),
		'event-menu' => __( 'Event Menu', 'tankefuld' )
));
}
add_action('wp_enqueue_scripts', 'tankefuld_load_scripts');
function tankefuld_load_scripts()
{
wp_enqueue_script('jquery');
}
add_action('comment_form_before', 'tankefuld_enqueue_comment_reply_script');
function tankefuld_enqueue_comment_reply_script()
{
if (get_option('thread_comments')) { wp_enqueue_script('comment-reply'); }
}
add_filter('the_title', 'tankefuld_title');
function tankefuld_title($title) {
if ($title == '') {
return '&rarr;';
} else {
return $title;
}
}
add_filter('wp_title', 'tankefuld_filter_wp_title');
function tankefuld_filter_wp_title($title)
{
return $title . esc_attr(get_bloginfo('name'));
}
add_action('widgets_init', 'tankefuld_widgets_init');
function tankefuld_widgets_init()
{

/* Forside widget-område */
register_sidebar( array (
	'name' => __('Forside Widgets', 'tankefuld'),
	'id' => 'front-widget-1',
	'before_widget' => '<div class="tf_stone wood_stone"><div id="%1$s" class="widget-container %2$s">',
	'after_widget' => "</div><div class='front-widget-shade'></div></div>",
	'before_title' => '<div class="widget-title"><h3>',
	'after_title' => '</h3></div>',
) );


/* Bo i tankefuld widget-område */
register_sidebar( array (
	'name' => __('Bo i Tankefuld Widgets', 'tankefuld'),
	'id' => 'bitf-widget-1',
	'before_widget' => '<div class="tf_stone wood_stone"><div id="%1$s" class="widget-container %2$s">',
	'after_widget' => "</div><div class='front-widget-shade'></div></div>",
	'before_title' => '<div class="widget-title"><h3>',
	'after_title' => '</h3></div>',
	) );
	
/* Vi bor her widget-område */
register_sidebar( array (
	'name' => __('Vi bor her Widgets', 'tankefuld'),
	'id' => 'vbh-widget-1',
	'before_widget' => '<div class="tf_stone wood_stone"><div id="%1$s" class="widget-container %2$s">',
	'after_widget' => "</div><div class='front-widget-shade'></div></div>",
	'before_title' => '<div class="widget-title"><h3>',
	'after_title' => '</h3></div>',
	) );

/* Events widget-omrpde */
register_sidebar( array (
	'name' => __('Event Widgets', 'tankefuld'),
	'id' => 'event-widget-1',
	'before_widget' => '<div class="tf_stone wood_stone"><div id="%1$s" class="widget-container %2$s">',
	'after_widget' => "</div><div class='front-widget-shade'></div></div>",
	'before_title' => '<div class="widget-title"><h3>',
	'after_title' => '</h3></div>',
	) );
	
}

function tankefuld_custom_pings($comment)
{
$GLOBALS['comment'] = $comment;
?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php 
}
add_filter('get_comments_number', 'tankefuld_comments_number');
function tankefuld_comments_number($count)
{
if (!is_admin()) {
global $id;
$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
return count($comments_by_type['comment']);
} else {
return $count;
}
}

require 'functions/custom-header.php';