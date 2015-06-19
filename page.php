<?php get_header(); ?>
<nav id="swipe-menu">
	 <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
</nav>
<div id="container">
<div class="wrap-960">
    <section id="content" role="main" class="article-content">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <div id="tankefuld_stones">    	
                <div class="tf_stone nav_stone">
                    <nav id="menu" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                    </nav>
                </div>
                <div class="tf_stone wood_stone big_stone" >
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                 	<h1 class="entry-title"><?php the_title(); ?> </h1> 
                    <section class="entry-content">
                        <?php the_content(); ?>
                    </section>
                </article>
                <div class="front-widget-shade"></div>
                </div>
                <?php get_sidebar(); ?>
                <div class="tf_stone mob_nav_stone">
                <nav id="btm-menu" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                </nav>
				</div>
                
                </div>
                <?php endwhile; endif; ?>
    </section>
</div> <!-- wrap-960 -->
</div>
<?php get_footer(); ?>