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
						
					<div class="grid">
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
						$speaker_bio = get_sub_field('hs_speaker_bio');
						$talk_topic = get_sub_field('talk_topic');
						$talk_outline = get_sub_field('hs_talk_outline');
						$speaker_website = get_sub_field('hs_speaker_website');
						$speaker_linkedin_account = get_sub_field('hs_speaker_linkedin_account');
						$speaker_twitter = get_sub_field('hs_speaker_twitter');
				

						if ( $c > 1 ) :?>--><?php endif; ?><div class="grid__item palm-one-half one-third">
									      		
							<h4 class="aligncenter"><?php echo $speaker_name; ?></h4>

							<img src="<?php echo $speaker_image['sizes']['standard_thumbnail'];?>" alt="<?php echo $speaker_image['alt'];?>" class="speakers">

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
			

			//------------------------------------------------------------------------------
			//------------------------------------------------------------------------------
			// if the layout type is the lightning talks. 
			// This has two settings. Depending on display options for the main event page 
			// these will either be displayed from a repeater field or standard fields.
			if ( get_row_layout() == 'lightning_talks' ) :

				$title = get_sub_field('lt_title');
				$featured_lightning_talk = get_sub_field('featured_lightning_talk'); ?>

				<?php if ( $title ) : ?>
				<div class="grid">

					<div class="grid__item one-whole heading">
						<hr>
						<h3><?php echo $title; ?></h3>
					</div>

				</div>
				<?php endif; ?>


				<div class="grid">
				<?php
					// -----------------------------------------------------------------------------
					// If this is a featured lightning talk use the standard fields
					if ( $featured_lightning_talk  == 'Yes' ) : 

						$speaker_name = get_sub_field('lt_speaker_name');
						$talk_topic = get_sub_field('talk_topic');
						$speaker_website = get_sub_field('lt_speaker_website');
						$speaker_linkedin_account = get_sub_field('lt_speaker_linkedin_account');
						$speaker_twitter = get_sub_field('lt_speaker_twitter');

					
						?>
						<div class="grid__item one-quarter palm-one-half lap-none">
						</div><!--

						--><div class="grid__item one-half palm-one-half">

						<?php if ($speaker_name) : ?><p class="aligncenter"><?php echo $speaker_name; ?></p><?php endif; ?>
						<?php if ( $speaker_website || $speaker_linkedin_account || $speaker_twitter ) : ?>
							<ul class="nav social-menu">
								<?php if ( $speaker_website ) : ?><li><a href="<?php echo $speaker_website; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s website">Link</a></li><?php endif; ?>
								<?php if ( $speaker_linkedin_account ) : ?><li><a href="<?php echo $speaker_linkedin_account; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s LinkedIn profile">LinkedIn</a></li><?php endif; ?>
								<?php if ( $speaker_twitter ) : ?><li><a href="<?php echo $speaker_twitter;?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s twitter account">Twitter</a></li><?php endif; ?>
							</ul>
						<?php endif; ?>
							
						</div><!--

						--><div class="grid__item one-quarter palm-one-half lap-none">
						</div>

					<?php 
					// -----------------------------------------------------------------------------
					// Else we have to pull the same information from the repeater field instead
					else :

						if( have_rows('each_talk') ) : 

					
						$l = 0;
						while ( have_rows('each_talk') ) : the_row();
						$l++;

							$speaker_name = get_sub_field('r_speaker_name');
							$talk_topic = get_sub_field('r_talk_topic');
							$speaker_website = get_sub_field('r_speaker_website');
							$speaker_linkedin_account = get_sub_field('r_speaker_linkedin_account');
							$speaker_twitter = get_sub_field('r_speaker_twitter');
							$shropgeek_tv_url = get_sub_field('r_shropgeek_tv_url');

							// Change the classes applied based on how many talks there area. There is a maxiimum of 4 here.
							if ( $l > '1' ) :?>--><?php endif;?><div class="grid__item <?php if ( $l == '0' ) : ?>one-whole palm-one-whole<?php elseif ( $l == '1' ) : ?>one-half palm-one-half<?php elseif ( $l == '2' ) : ?>one-third palm-one-half<?php else : ?>one-quarter palm-one-half<?php endif; ?> <?php echo $l;?> pb">

								<h4 class="aligncenter"><?php echo $speaker_name; ?></h4>
									<p class="aligncenter"><?php echo $talk_topic; ?></p>
								<ul class="nav social-menu">							
									<?php if ( $speaker_website ) : ?><li><a href="<?php echo $speaker_website; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s website">Link</a></li><?php endif; ?>
									<?php if ( $speaker_linkedin_account ) : ?><li><a href="<?php echo $speaker_linkedin_account; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s LinkedIn profile">LinkedIn</a></li><?php endif; ?>
									<?php if ( $speaker_twitter ) : ?><li><a href="<?php echo $speaker_twitter;?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s twitter account">Twitter</a></li><?php endif; ?>
								</ul>

								<?php if ( $shropgeek_tv_url ) : ?>

									<a href="<?php echo $shropgeek_tv_url; ?>" class="btn btn--small btn--book watch-video">Watch the talk <span class="ss-directright"></span></a>

								<?php endif; ?>

							</div><!--
							

						<?php 	
						endwhile; endif; // ends the while loop for the repeater field ?>
						-->
					<?php 	
					endif; // ends if this is a featured lightning talk or not ?>	

				</div> <?php // closes grid ?>

			<?php
			endif; // closes if layout is lightning talks ?>


	<?php 
		endwhile; // ends have rows for headliens speakers flexible content

	endif; // ends if have rows for headliens speakers flexible content ?>
</div>
			
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
				