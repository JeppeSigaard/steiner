<?php 
/*
Template Name: Vi bor her
*/

get_header(); ?>
<nav id="swipe-menu">
	 <?php wp_nav_menu( array( 'theme_location' => 'vbh-menu' ) ); ?>
</nav>
<div id="container">
<div class="wrap-960">
    <section id="content" role="main" class="article-content">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div id="tankefuld_stones">    	
                <div class="tf_stone nav_stone">
                    <nav id="menu" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'vbh-menu' ) ); ?>
                    </nav>
                </div>
                <div class="tf_stone wood_stone big_stone" >
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                 	<h1 class="entry-title"><?php the_title(); ?> </h1> 
                    <section class="entry-content">
                        <?php the_content(); ?>
                        <div class="entry-links"><?php wp_link_pages(); ?></div>
                    </section>
                </article>
                <div class="front-widget-shade"></div>
                </div> <!-- wood_stone  -->
                
                
				 <?php if ( dynamic_sidebar('vbh-widget-1') ) : else : endif; ?>
                
                <div class="tf_stone mob_nav_stone">
                <nav id="btm-menu" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'vbh-menu' ) ); ?>
                </nav>
				</div>
                
                </div>
                <?php endwhile; endif; ?>
    </section>
</div> <!-- wrap-960 -->
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>