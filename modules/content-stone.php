<div class="tf_stone wood_stone post_id_<?php the_ID() ?>">
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