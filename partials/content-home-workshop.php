<?php

// Get all of the custom terms for the events post
$terms = get_the_terms($post->ID, 'event_type');
// of there are terms and no errors
if ( $terms && ! is_wp_error( $terms ) ) : 
	// Create an array to store specific terms for each post
	$types = array();

	foreach ( $terms as $term ) {
		// populate that array for use throughout the event details
		$types[] = $term->name;
	}

endif;

$title_strapline = get_field('title_strapline');
$sub_title = get_field('sub_title');
$subject_logo = get_field('subject_logo');
$intro_text = get_field('intro_text');
$text_column_2 = get_field('text_column_2');
$text_column_3 = get_field('text_column_3');


$event_time = get_field('event_time');

$venue_name = get_field('venue_name');
$venue_address = get_field('venue_address');
$venue_map = get_field('venue_map');
$venue_tel = get_field('venue_tel');
$venue_website = get_field('venue_website');
$venue_twitter = get_field('venue_twitter');

$ticket_price = get_field('ticket_price');
$booking_link = get_field('booking_link');
$workshop_details = get_field('workshop_details');
$workshop_details_2 = get_field('workshop_details_2');
$workshop_footer_text = get_field('workshop_footer_text');

/*
 * Main .grid div is opened and closed in partials/content-home-events.php
 *
 */

?>



	<div class="grid__item one-whole heading">

		<h1 class="event-title"><span><?php the_title(); ?></span><br /><?php echo $title_strapline; ?></h1>
		<hr>

		
			
		
	</div>



	<div class="grid__item palm-one-whole lap-one-whole one-third pt">

		<?php if ( $subject_logo ) : ?>
		<img src="<?php echo $subject_logo['sizes']['subject_logo'];?>" alt="<?php echo $subject_logo['alt'];?>" class="img--center pt">
		<?php endif; ?>

		<h4 class="aligncenter"><?php echo $sub_title; ?></h4>




	</div><!--

	--><div class="grid__item palm-one-whole lap-one-whole two-thirds">




		<div class="grid">

			<div class="grid__item palm-one-whole lap-one-third one-third pt">

				<div class="entry-content">

					<p><?php echo $intro_text; ?></p>
					
				</div>
				

			</div><!--
			
			--><div class="grid__item palm-one-whole lap-one-third one-third pt">

				<div class="entry-content">
					<?php echo $text_column_2; ?>
				</div>

			</div><!--

			--><div class="grid__item palm-one-whole lap-one-third one-third pt">

				<div class="entry-content">
					<?php echo $text_column_3; ?>
				</div>

			</div>

	<?php
	/*
	// ----------------------------------------------------------------------------------------------------
	// ----------------------------------------------------------------------------------------------------
	// Trainers Section Starts
	// This uses repeatable fields so that columns can change in future based on the amount of speakers
				
	// Check if there is a repeater field for the trainers
	if( have_rows('workshop_trainers') ) : 

		$h = 0;
		// Loop through the data for the headline speakers
		while ( have_rows('workshop_trainers') ) : the_row();
		$h++; 

		$trainer_name = get_sub_field('trainer_name');
		$trainer_image = get_sub_field('trainer_image');
		$trainer_bio = get_sub_field('trainer_bio');
		$trainer_website = get_sub_field('trainer_website');
		$trainer_linkedin_account = get_sub_field('trainer_linkedin_account');
		$trainer_twitter = get_sub_field('trainer_twitter_acc'); ?>


			--><div class="grid__item palm-one-whole lap-one-half one-third pt">
				
				<h4 class="aligncenter"><?php echo $trainer_name; ?></h4>

				<img src="<?php echo $trainer_image['sizes']['standard_thumbnail'];?>" alt="<?php echo $trainer_image['alt'];?>" class="img--center speakers">

				

				
				<ul class="nav social-menu">
					<?php if ( $trainer_website ) : ?><li><a href="<?php echo $trainer_website; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $trainer_name; ?>'s website">Link</a></li><?php endif; ?>
					<?php if ( $trainer_linkedin_account ) : ?><li><a href="<?php echo $trainer_linkedin_account; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $trainer_name; ?>'s LinkedIn profile">LinkedIn</a></li><?php endif; ?>
					<?php if ( $trainer_twitter ) : ?><li><a href="<?php echo $trainer_twitter;?>" class="ss-social-circle ss-icon" title="Link to <?php echo $trainer_name; ?>'s twitter account">Twitter</a></li><?php endif; ?>
				</ul>
				

			</div>

		<?php 
		endwhile; 
	endif; */ ?>

		</div>

	</div>			





	<div class="grid__item one-whole pb aligncenter">

			<hr>
			<h5 class="event-meta aligncenter"><?php echo the_time('F jS Y'); ?> . <span><?php echo $event_time; ?></span> . <?php echo $venue_name; ?></h5>
	
	

			<?php if ( $booking_link ) : ?>
				<a href="<?php echo $booking_link; ?>" class="btn btn--small btn--book">Book Tickets <span class="ss-directright"></span></a>
			<?php endif; ?>

			<a href="<?php the_permalink();?>" class="btn btn--small btn--book">Full Details <span class="ss-directright"></span></a>

	</div>



				 
				