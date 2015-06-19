<?php
get_header(); ?>
<nav id="swipe-menu">
	 <?php wp_nav_menu( array( 'theme_location' => 'event-menu' ) ); ?>
</nav>
<div id="container">
<div class="wrap-960">
	<section id="content" class="article-content event" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
 			<div id="tankefuld_stones">    	
                <div class="tf_stone nav_stone">
                    <nav id="menu" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'event-menu' ) ); ?>
                    </nav>
                </div>
                <div class="tf_stone wood_stone big_stone" >
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </header><!-- .entry-header -->
                        <div class="entry-content">
                        <?php if ( has_post_thumbnail() ) { ?>
                        <span class="alignleft"><?php the_post_thumbnail(); ?></span>
                        <?php } ?>
                            <!-- Get event information, see template: event-meta-event-single.php -->
                            <?php eo_get_template_part('event-meta','event-single'); ?>
            
                            <!-- The content or the description of the event-->
                            <?php the_content(); ?>
                        </div><!-- .entry-content -->
                    </article><!-- #post-<?php the_ID(); ?> -->
                    <div class="front-widget-shade"></div>
				</div> <!-- big stone-->
                <?php get_sidebar(); ?>
                <div class="tf_stone mob_nav_stone">
                <nav id="btm-menu" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'event-menu' ) ); ?>
                </nav>
				</div>
			</div>
		<?php endwhile; // end of the loop. ?>
	</section><!-- #content -->
    </div> <!-- .wrap-960-->
</div><!-- #container -->

<!-- Call template footer -->
<?php get_footer(); ?>
