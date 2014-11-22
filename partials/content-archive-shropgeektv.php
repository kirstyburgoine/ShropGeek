<?php 
$i = 0;

	while ( have_posts() ) : the_post();
		
		$i++;
		$vimeo_url = get_field('vimeo_url');
		$presenter_name = get_field('presenter_name');
		$event_name = get_field('event_name');
		$event_date = get_field('event_date');
		$event = get_field('related_event');
?>


<?php 
// For the inuit grid to work white space needs to be commented out but not on first and last events on the page
// If not first box end white commenting out
if ( $i > 1 ) :?>--><?php endif; ?><div class="grid__item palm-one-whole lap-one-half one-third">

	<div class="tv-container" role="main">

		<div class="tv">
			<?php echo apply_filters('the_content', $vimeo_url); ?>
		</div> 
		
		<?php 

		if( $event ): 

			foreach( $event as $e ) : ?>

					<h3><span class="event-type"><?php echo $presenter_name; ?></span> <a href="<?php the_permalink(); ?>"><?php echo $e->post_title; ?> - <?php echo date('F jS Y', strtotime($e->post_date)); ?> </a></h3>

		<?php 
			endforeach;

		endif; ?>
	
	</div>

</div><?php 
// If not the last post (This could be different than the max 12 per page) show the start of white space commenting out
if ( $i < $wp_query->post_count ) :?><!--<?php endif; ?>

<?php endwhile; wp_reset_postdata(); ?>
<!-- //-->

