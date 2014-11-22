<?php
/*
 * This include decides which layout is used on the homepage for each event so that all have their own layout 
  * and the socials alternate between the pic on the left or the right
 */
$i = 0;

while ( have_posts() ) : the_post(); 
$i++;

global $wp_query;

// Get all of the custom terms for the events post
$terms = get_the_terms($post->ID, 'event_type');
// if there are terms and no errors
if ( $terms && ! is_wp_error( $terms ) ) : 
	// Create an array to store specific terms for each post
	$types = array();

	foreach ( $terms as $term ) {
		// populate that array for use throughout the event details
		$types[] = $term->name;
	}

endif;


//echo $wp_query->post_count . "count";
?>


<div class="tab tab-<?php echo $i;?>">
	<div class="container">
		
		<h3>
			<span class="event-type"><span class="ss-standard <?php if ( $i == "2" ) : ?>ss-dropdown<?php else : ?>ss-directright<?php endif;?>"></span><?php echo $types[0]; ?> </span> <?php the_date('F jS Y'); ?>
		</h3>
	
	</div>
</div>


<div class="event-content event-content-<?php echo $i; if ( $types[0] == "Rebellion" ) { echo " content-odd"; } else { echo " content-even"; } ?>">


	<div class="container">

		<div class="grid">



			<?php
			// If the socials we want the layout to alternate 
			if ( $types[0] == "Social") :

				if ( $i % 2 == 0 ) { 

					get_template_part( 'partials/content', 'social-left' );

				} else { 

					get_template_part( 'partials/content', 'social-right' );

				}

			elseif ( $types[0] == "Workshop") :

				get_template_part( 'partials/content', 'home-workshop' );

			else :

				get_template_part( 'partials/content', 'home-rebellion' );

			endif;
			?>


		</div>

	</div>

</div>		

<?php endwhile; ?>
