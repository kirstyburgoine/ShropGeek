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
	<h1 class="event-title"><span><?php the_title(); ?></span><br /><?php echo $title_strapline; ?></h1>
	<hr>
</div>


<div class="grid__item one-whole desk-two-thirds">


<?php
			// ----------------------------------------------------------------------------------------------------
			// ----------------------------------------------------------------------------------------------------
			// Speakers Section Starts
			// This uses flexible content so columns need to change based on the amount of speakers
			
			// Check if there is a flexible content field for the headline speakers
			if( have_rows('headline_speakers') ) : ?>


			<div class="grid">
				<div class="grid__item one-whole heading">
					<h2>The Speakers</h2>
				</div>
			</div>
			

			<div class="grid pb">

				
				<?php
				$h = 0;
				// Loop through the data for the headline speakers
				while ( have_rows('headline_speakers') ) : the_row();
				$h++; 

				$speaker_name = get_sub_field('hs_speaker_name');
				$speaker_image = get_sub_field('hs_speaker_image');
				$speaker_bio = get_sub_field('hs_speaker_bio');
				$talk_topic = get_sub_field('talk_topic');
				$talk_outline = get_sub_field('hs_talk_outline');
				$speaker_website = get_sub_field('hs_speaker_website');
				$speaker_linkedin_account = get_sub_field('hs_speaker_linkedin_account');
				$speaker_twitter = get_sub_field('hs_speaker_twitter');
				

				if ( $h > 1 ) :?>--><?php endif; ?><div class="grid__item palm-one-half one-third">
							      		
					<h4 class="aligncenter"><?php echo $speaker_name; ?></h4>

					<img src="<?php echo $speaker_image['sizes']['standard_thumbnail'];?>" alt="<?php echo $speaker_image['alt'];?>" class="speakers">

					<ul class="nav social-menu">
						<?php if ( $speaker_website ) : ?><li><a href="<?php echo $speaker_website; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s website">Link</a></li><?php endif; ?>
						<?php if ( $speaker_linkedin_account ) : ?><li><a href="<?php echo $speaker_linkedin_account; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s LinkedIn Profile">LinkedIn</a></li><?php endif; ?>
						<?php if ( $speaker_twitter ) : ?><li><a href="<?php echo $speaker_twitter;?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s twitter account">Twitter</a></li><?php endif; ?>
					</ul>

				</div><!--

				

				<?php 
				endwhile; ?>
				-->
			</div>
			
			<?php 
			endif; 

			// ----------------------------------------------------------------------------------------------------
			// ----------------------------------------------------------------------------------------------------
			// Lightning talks on new row
			// Check if there is a flexible content field for the lightning talks 

			if( have_rows('lightning_talks') ) : ?>
			
			<div class="grid">

				<div class="grid__item one-whole heading">
					<hr>
					<h3>Lightning Talks</h3>
				</div>

			</div>

			<div class="grid">

				<div class="grid__item one-quarter palm-one-half lap-none">
				</div><!--

				<?php
				$l = 0;
				// Loop through the data for the lightning talks
				while ( have_rows('lightning_talks') ) : the_row();
				$l++; 

				$speaker_name = get_sub_field('lt_speaker_name');
				$talk_topic = get_sub_field('talk_topic');
				$speaker_website = get_sub_field('lt_speaker_website');
				$speaker_linkedin_account = get_sub_field('lt_speaker_linkedin_account');
				$speaker_twitter = get_sub_field('lt_speaker_twitter');

				$count = count(get_field('lightning_talks'));
				?>

				--><div class="grid__item <?php if ( $count == '1' ) : ?>one-half palm-one-half<?php else : ?>one-quarter palm-one-half<?php endif; ?> ">

				<?php if ($speaker_name) : ?><p class="aligncenter"><?php echo $speaker_name; ?></p><?php endif; ?>
				<?php if ( $speaker_website || $speaker_linkedin_account || $speaker_twitter ) : ?>
						<ul class="nav social-menu">
							<?php if ( $speaker_website ) : ?><li><a href="<?php echo $speaker_website; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s website">Link</a></li><?php endif; ?>
							<?php if ( $speaker_linkedin_account ) : ?><li><a href="<?php echo $speaker_linkedin_account; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s LinkedIn profile">LinkedIn</a></li><?php endif; ?>
							<?php if ( $speaker_twitter ) : ?><li><a href="<?php echo $speaker_twitter;?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s twitter account">Twitter</a></li><?php endif; ?>
						</ul>
				<?php endif; ?>
						
				</div><!--

				<?php
				endwhile; ?>

				--><div class="grid__item one-quarter palm-one-half lap-none">
				</div><!--
				-->

			</div>

			<?php 
			endif; ?>

				</div><!--

				 --><div class="grid__item one-whole desk-one-third">

					    <div class="grid">
					     	<div class="grid__item one-whole">
					   			<h5 class="event-meta"><?php echo the_time('F jS'); ?> . <span><?php echo $event_time; ?></span> . <?php echo $venue_name; ?></h5>
					   		</div>
					   	</div>

					   	<div class="entry-content">

					     	<?php the_content(); ?>	

					      	<?php echo $text_column_2; ?>
					    	
					    	
					    	<?php if ( $booking_link ) : ?>
								<a href="<?php echo $booking_link; ?>" class="btn btn--small btn--book">Book Tickets <span class="ss-directright"></span></a>
							<?php endif; ?>

							<a href="<?php the_permalink();?>" class="btn btn--small btn--book">Full Details <span class="ss-directright"></span></a>

				    	</div>

					</div>
				