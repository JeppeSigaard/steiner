<?php get_header(); ?>
<nav id="swipe-menu">
	 <?php wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); ?>
</nav>
<div id="container">
<div class="wrap-960">
    <section id="content" role="main" class="article-content">
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <?php $gallery_items = get_post_meta(get_the_ID(),'smamo_gallery',false); ?>
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
                        <div class="smamo_gallery">
                            <?php foreach($gallery_items as $item): ?>
                            <?php $image_url = wp_get_attachment_image_src($item, 'smamo-gallery' );?>
                            <?php $image_url_large = wp_get_attachment_image_src($item, 'full' );?>
                            <a data-lightbox="gallery-<?php the_ID(); ?>" href="<?php echo $image_url_large[0] ?>" class="item">
                                <img src="<?php echo $image_url[0] ?>">
                            </a>
                            <?php endforeach; ?>
                        </div>
                        <?php the_content(); ?>
                        <div class="entry-links"><?php wp_link_pages(); ?></div>
                    </section>
                </article>
                <div class="front-widget-shade"></div>
                </div> <!-- wood_stone  -->
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