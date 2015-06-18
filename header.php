<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title(' | ', true, 'right'); ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style/main.css" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
<header id="header" role="banner">
    <div class="wrap-960 header-wrap">
        <section id="branding">
        	<div class="header-grid">
            <div id="tankefuld_logo">
            	<a href="<?php bloginfo('url'); ?>/">
                	<img src="<?php header_image(); ?>"/>
                </a>
            </div>
            </div>
            <div class="header-grid">
            <div id="site-title"><?php if ( ! is_singular() ) {echo '<h1>';} ?><a href="<?php echo esc_url(home_url('/')); ?>" title="<?php esc_attr_e( get_bloginfo('name'), 'tankefuld' ); ?>" rel="home"><?php echo esc_html( get_bloginfo('name') ); ?></a><?php if ( ! is_singular() ) {echo '</h1>';} ?></div>
            <div id="site-description"><?php bloginfo('description'); ?></div>
            </div>
            <div class="header-grid">
            <div id="tankefuld_kommune">
            </div>
            </div>
        </section>
    </div>
</header>
<a href="#" id="mobile-expand">
<div>
	<img src="<?php bloginfo('url'); ?>/wp-content/uploads/2013/12/menu-wood-btn-in.png"/>
    <img src="<?php bloginfo('url'); ?>/wp-content/uploads/2013/12/menu-wood-btn-out.png"/>
</div>
</a>
