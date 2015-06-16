<?php
/**
 * The template is used for displaying a single event details.
 */
?>

<span class="entry-meta eventorganiser-event-meta">
	<!-- Choose a different date format depending on whether we want to include time -->
	<?php if( eo_is_all_day() ){
		$date_format = 'j\.\ F Y'; 
		$time_format = '';
			}else{
		$date_format = 'j\.\ F Y' ;
		$time_format = 'H:i'; 
	} 
	
	?>
	<!-- Event details -->
		<strong>
        <p>EVENT:</p>
        <h3><?php echo get_the_title(); ?></h3>
		</strong>
		<!-- Is event recurring or a single event -->
		<?php if( eo_reoccurs() ):?>
			<!-- Event reoccurs - is there a next occurrence? -->
			<?php $next =   eo_get_next_occurrence($date_format);?>

			<?php if($next): ?>
				<!-- If the event is occurring again in the future, display the date -->
				<?php printf('<p>'.__('This event is running from %1$s until %2$s. It is next occurring on %3$s','eventorganiser').'.</p>', eo_get_schedule_start('j F Y'), eo_get_schedule_last('j F Y'), $next);?>
	
			<?php else: ?>
				<!-- Otherwise the event has finished (no more occurrences) -->
				<?php printf('<p>'.__('This event finished on %s','eventorganiser').'.</p>', eo_get_schedule_last('d F Y',''));?>
			<?php endif; ?>
		<?php endif; ?>

	<p>

		<?php if( !eo_reoccurs() ){ ?>
				<!-- Single event -->
				<p class="date_info_item"><strong class="event-date-span"><?php eo_the_start($date_format); ?></strong></p>
                <?php if (!eo_is_all_day()){?>
                <p class="date_info_item"><strong class="event-date-span"><?php eo_the_start($time_format); ?> - <?php eo_the_end($time_format); ?></strong></p>
				<?php } ?>
				<?php
		 } ?>

		<?php if( eo_get_venue() ){ ?>
			<p><strong><?php _e('Venue','eventorganiser'); ?>:</strong> <a href="<?php eo_venue_link(); ?>"> <?php eo_venue_name(); ?></a></p>
		<?php } ?>


		<?php if( get_the_terms(get_the_ID(),'event-category') ){ ?>
			<p><strong><?php _e('Categories','eventorganiser'); ?>:</strong> <?php echo get_the_term_list( get_the_ID(),'event-category', '', ', ', '' ); ?></p>
		<?php } ?>

	
		<?php if( get_the_terms(get_the_ID(),'event-tag') && !is_wp_error( get_the_terms(get_the_ID(),'event-tag') ) ){ ?>
			<p><strong><?php _e('Tags','eventorganiser'); ?>:</strong> <?php echo get_the_term_list( get_the_ID(),'event-tag', '', ', ', '' ); ?></p>
		<?php } ?>

		<?php if( eo_reoccurs() ){ 			
				//Event reoccurs - display dates. 
				$upcoming = new WP_Query(array(
					'post_type'=>'event',
					'event_start_after' => 'today',
					'posts_per_page' => -1,
					'event_series' => get_the_ID(),
					'group_events_by'=>'occurrence'//Don't group by series
				));
	
				if( $upcoming->have_posts() ): ?>

					<li><strong><?php _e('Upcoming Dates','eventorganiser'); ?>:</strong>
						<ul id="eo-upcoming-dates">
							<?php while( $upcoming->have_posts() ): $upcoming->the_post(); ?>
									<li> <?php eo_the_start($date_format) ?></li>
							<?php endwhile; ?>
						</ul>
					</li>
 
					<?php 
					wp_reset_postdata(); 
					//With the ID 'eo-upcoming-dates', JS will hide all but the next 5 dates, with options to show more.
					wp_enqueue_script('eo_front');
					?>
				<?php endif; ?>
		<?php } ?>

	</p>

	<!-- Does the event have a venue? -->
	<?php if( eo_get_venue() ): ?>
		<!-- Display map -->
		<div id="test" style="width:45%;float:right;">
		<?php echo eo_get_venue_map(eo_get_venue(),array('width'=>'100%')); ?>
		</div>
	<?php endif; ?>

</span><!-- .entry-meta -->
