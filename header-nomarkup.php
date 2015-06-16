<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title(' | ', true, 'right'); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>
<script type="text/javascript" src="<?php bloginfo('url')?>/wp-includes/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('url')?>/wp-includes/js/masonry.js"></script>
<script type="text/javascript" src="<?php bloginfo('url')?>/wp-includes/js/touchSwipe.js"></script>
<script type="text/javascript" src="<?php bloginfo('url')?>/wp-includes/js/tairy.js"></script>
</head>