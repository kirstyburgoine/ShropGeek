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
$text_column_1 = get_field('text_column_1');
$text_column_2 = get_field('text_column_2');


$event_time = get_field('event_time');

$venue_name = get_field('venue_name');
$venue_address = get_field('venue_address');
$venue_map = get_field('venue_map');
$venue_tel = get_field('venue_tel');
$venue_website = get_field('venue_website');
$venue_twitter = get_field('venue_twitter');

$booking_link = get_field('booking_link');

?>

<div class="grid__item one-whole heading">
	<h1 class="reloaded-event-title"><span><?php the_title(); ?></span><br /><?php echo $title_strapline; ?></h1>
	<hr>
</div>

<div class="grid__item one-whole lap-one-half desk-three-quarters">

		<div class="grid">
		   	<div class="grid__item one-whole">
				<h5 class="event-meta"><?php echo the_time('F jS'); ?> . <span><?php echo $event_time; ?></span> . <?php echo $venue_name; ?></h5>
			</div>
		</div>

		<div class="grid">
		   	<div class="grid__item one-whole desk-one-half">

				<div class="entry-content">

				   	<?php the_content(); ?>	

				</div>
			</div><!--

			--><div class="grid__item one-whole desk-one-half">

				<div class="entry-content">

					   	<?php echo $text_column_2; ?>
								    	
								    	
					   	<?php if ( $booking_link ) : ?>
							<a href="<?php echo $booking_link; ?>" class="btn btn--small btn--book">Book Tickets <span class="ss-directright"></span></a>
						<?php endif; ?>

						<a href="<?php the_permalink();?>" class="btn btn--small btn--book">Full Details <span class="ss-directright"></span></a>

				</div>

			</div>
		</div>
</div><!--


--><div class="grid__item one-whole lap-one-half desk-one-quarter">


<?php
// ----------------------------------------------------------------------------------------------------
// ----------------------------------------------------------------------------------------------------
// Speakers Section Starts - Updated Nov 22nd
// This now uses flexible content so that all speaker types are available from one flexible content box
// the repeater field is used to add mutiple speakers to each
// Columns number still needs to change based on the amount of speakers
	
	// Check if there is a flexible content field for the headline speakers
	if( have_rows('headline_speakers') ) : 

		$r = 0;
		// Loop through the data for the speakers
		while ( have_rows('headline_speakers') ) : the_row();
		$r++; // Count the rows so that html commenting can be used in the grid systems 



			if ( get_row_layout() == 'main_speakers' ) :

				$title = get_sub_field('hs_title'); 

				if ( $title ) : ?>
						
					<div class="grid reloaded">
						<div class="grid__item one-whole heading">
							<h2><?php echo $title; ?></h2>
						</div>
					</div>
				<?php endif; ?>
				

				<div class="grid pb">
				<?php
				// -------------------------------------------------------------------------
				// find the repeater field for the main speakers and loop through tha values
				if( have_rows('each_speaker') ) : 

					$last = count( get_sub_field('each_speaker') );

					
					$c = 0;
					while ( have_rows('each_speaker') ) : the_row();
					$c++;

						$speaker_name = get_sub_field('hs_speaker_name');
						$speaker_image = get_sub_field('hs_speaker_image');
						$placeholder_image = get_sub_field('placeholder_images');
						$speaker_bio = get_sub_field('hs_speaker_bio');
						$talk_topic = get_sub_field('talk_topic');
						$talk_outline = get_sub_field('hs_talk_outline');
						$speaker_website = get_sub_field('hs_speaker_website');
						$speaker_linkedin_account = get_sub_field('hs_speaker_linkedin_account');
						$speaker_twitter = get_sub_field('hs_speaker_twitter');
				

						if ( $c > 1 ) :?>--><?php endif; ?><div class="grid__item one-whole">
									      		
							

							<?php if ($speaker_image) : ?>
							<img src="<?php echo $speaker_image['sizes']['standard_thumbnail'];?>" alt="<?php echo $speaker_image['alt'];?>" class="img--center speakers">
							<?php else : ?>
							<img src="<?php echo $placeholder_image;?>" alt="" class="img--center speakers">
							<?php endif; ?>

							<ul class="nav social-menu">
								<?php if ( $speaker_website ) : ?><li><a href="<?php echo $speaker_website; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s website">Link</a></li><?php endif; ?>
								<?php if ( $speaker_linkedin_account ) : ?><li><a href="<?php echo $speaker_linkedin_account; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s LinkedIn Profile">LinkedIn</a></li><?php endif; ?>
								<?php if ( $speaker_twitter ) : ?><li><a href="<?php echo $speaker_twitter;?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s twitter account">Twitter</a></li><?php endif; ?>
							</ul>

						</div><!--
					<?php 
					endwhile; 
				endif; // ends looping through the repeater field ?>
					-->
				
			<?php
			endif; // endsi if the layout is main speakers
			

			
		endwhile; // ends have rows for headliens speakers flexible content

	endif; // ends if have rows for headliens speakers flexible content ?>
</div>
				