<?php
/*
Template Name: Forside
*/
get_header(); ?>
<nav id="swipe-menu">
	 <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
</nav>
<div id="container">
<div class="wrap-960">
    <section id="content" role="main">
		<div id="tankefuld_stones">    	
            <div class="tf_stone nav_stone">
                <nav id="menu" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                </nav>
			</div>
            <?php get_sidebar(); ?>
            <?php if ( dynamic_sidebar('front-widget-1') ) : else : endif; ?>
            
            <div class="tf_stone mob_nav_stone">
                <nav id="btm-menu" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                </nav>
			</div>
           
        </div>
    </section>
</div> <!-- wrap-960 -->
<?php get_footer(); ?>