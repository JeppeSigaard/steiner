<?php
/*
Template Name: Bedre Forside
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
            
            <?php if ( dynamic_sidebar('better-widget-1') ) : else : endif; ?>
            
            
            <div class="tf_stone mob_nav_stone">
                <nav id="btm-menu" role="navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
                </nav>
			</div>
           
        </div>    
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <section class="entry-content">
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
                <?php the_content(); ?>
                <div class="entry-links"><?php wp_link_pages(); ?></div>
            </section>
        </article>
        <?php if ( ! post_password_required() ) comments_template('', true); ?>
        <?php endwhile; endif; ?>
    </section>
    <?php get_sidebar(); ?>
</div> <!-- wrap-960 -->
<?php get_footer(); ?>