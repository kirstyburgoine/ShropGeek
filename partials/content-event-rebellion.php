<?php 
// Query to include future posts is in functions.php


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
$subject_logo = get_field('subject_logo');
$sub_title = get_field('sub_title');
$text_column_1 = get_field('text_column_1');
$text_column_2 = get_field('text_column_2');
$intro_text = get_field('intro_text');


$event_time = get_field('event_time');

$venue_name = get_field('venue_name');
$venue_address = get_field('venue_address');
$venue_map = get_field('venue_map');
$venue_tel = get_field('venue_tel');
$venue_website = get_field('venue_website');
$venue_twitter = get_field('venue_twitter');

$booking_link = get_field('booking_link');
$micro_sponsors = get_field('micro_sponsors');



?>


<div class="container">



		<div class="grid__item one-whole">

			<h2 class="event-meta"><?php echo the_time('F jS Y'); ?>  . <span><?php echo $event_time; ?></span> . <?php echo $venue_name; ?></h2>
			<hr>

			<?php if ( $subject_logo ) : ?>
				<img src="<?php echo $subject_logo['sizes']['subject_logo'];?>" alt="<?php echo $subject_logo['alt'];?>" class="img--center pt no-mb">
			<?php endif; ?>

			<?php if ( $sub_title ) : ?>
				<p class="intro"><?php echo $sub_title; ?></p>
			<?php endif; ?>

		</div>


		<div class="grid__item one-half palm-one-whole pt">

			<div class="entry-content">
		    	<?php the_content(); ?>	
			</div>

		</div><!--

		--><div class="grid__item one-half palm-one-whole pt">

			<div class="entry-content">

				<?php echo $text_column_2; ?>

			</div>



		</div>

		<?php if ( $intro_text ) : ?>
		<div class="grid__item one-whole pt">

			<p class="intro"><?php echo $intro_text; ?></p>

		</div>
		<?php endif; ?>	   					

		<?php if ( $booking_link ) : ?>

		<div class="grid__item one-third palm-one-whole pt">
		</div><!--

		--><div class="grid__item one-third palm-one-whole pt">

					
			<a href="<?php echo $booking_link; ?>" class="btn btn--full btn--book">Book Tickets <span class="ss-directright"></span></a>
					


		</div><!--

		--><div class="grid__item one-third palm-one-whole pt">
		</div>

		<?php endif; ?>

		<?php
		// ----------------------------------------------------------------------------------------------------
		// ----------------------------------------------------------------------------------------------------
		// Speakers Section Starts
		// This uses flexible content so that headline speakers / lightning talks and more can be added
		// 
			
		// Check if there is a flexible content field for the headline speakers. This is now the flexible content 
		// for all speaker options. It started out as just headline speakers which is the row name is still that
		if( have_rows('headline_speakers') ) : 

			$h = 0;
			// Loop through the data for the speakers
			while ( have_rows('headline_speakers') ) : the_row();
			$h++; // Count the rows so that html commenting can be used in the grid systems ?>


			<?php
			//------------------------------------------------------------------------------
			//------------------------------------------------------------------------------
			// if the layout type is titles, display the title. 

			if ( get_row_layout() == 'title' ) :
				$section_title = get_sub_field('section_title');
				?>
				
				<div class="grid__item one-whole heading pt">
					<hr>
					<h2><?php echo $section_title;?> </h2>					
				</div>

			
			<?php
			//------------------------------------------------------------------------------
			//------------------------------------------------------------------------------
			// if the layout type is the headline speakers. this is set to show a maximum of 
			// 9 speakers in 3 rows of 3 so that this can be reused for bigger events as well 
			// as the evening Rebellion events

			elseif ( get_row_layout() == 'main_speakers' ) :

				$speaker_name = get_sub_field('hs_speaker_name');
				$speaker_image = get_sub_field('hs_speaker_image');
				$speaker_bio = get_sub_field('hs_speaker_bio');
				$talk_topic = get_sub_field('talk_topic');
				$talk_outline = get_sub_field('hs_talk_outline');
				$speaker_website = get_sub_field('hs_speaker_website');
				$speaker_linkedin_account = get_sub_field('hs_speaker_linkedin_account');
				$speaker_twitter = get_sub_field('hs_speaker_twitter');
				$shropgeek_tv_url = get_sub_field('shropgeek_tv_url');
				

				if ( $h > 1 ) :?>--><?php endif; ?><div class="grid__item palm-one-whole one-third pb">
							      		
					<h4 class="aligncenter"><?php echo $speaker_name; ?></h4>

					<img src="<?php echo $speaker_image['sizes']['standard_thumbnail'];?>" alt="<?php echo $speaker_image['alt'];?>" class="img--center speakers">

					<ul class="nav social-menu">
							<?php if ( $speaker_website ) : ?><li><a href="<?php echo $speaker_website; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s website">Link</a></li><?php endif; ?>
							<?php if ( $speaker_linkedin_account ) : ?><li><a href="<?php echo $speaker_linkedin_account; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s LinkedIn profile">LinkedIn</a></li><?php endif; ?>
							<?php if ( $speaker_twitter ) : ?><li><a href="<?php echo $speaker_twitter;?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s twitter account">Twitter</a></li><?php endif; ?>
					</ul>

					<?php if ( $speaker_bio ) : ?>
					<div class="entry-content">
					
						<?php echo $speaker_bio; ?>

						<?php if ( $talk_topic ) : ?>
							
							<h3 class="talk-title"><span>Talk: </span><?php echo $talk_topic; ?></h3>

							<?php echo $talk_outline; ?>

						<?php endif; ?>

						<?php if ( $shropgeek_tv_url ) : ?>

							<a href="<?php echo $shropgeek_tv_url; ?>" class="btn btn--small btn--book">Watch the talk <span class="ss-directright"></span></a>

						<?php endif; ?>

					</div>
					<?php endif; ?>

				</div>


			<?php
			//------------------------------------------------------------------------------
			//------------------------------------------------------------------------------
			// if the layout type is the lightning talks. This is set to show a maximum of 
			// 6 speakers in 2 rows of 3 so that this can be reused for bigger events as well 
			// as the evening Rebellion events

			elseif ( get_row_layout() == 'lightning_talks' ) :

				$count = count(get_field('lightning_talks'));

				$speaker_name = get_sub_field('lt_speaker_name');
				$talk_topic = get_sub_field('talk_topic');
				$speaker_website = get_sub_field('lt_speaker_website');
				$speaker_linkedin_account = get_sub_field('lt_speaker_linkedin_account');
				$speaker_twitter = get_sub_field('lt_speaker_twitter');

				$featured_lightning_talk = get_sub_field('featured_lightning_talk');
				$speaker_photo = get_sub_field('speaker_photo');
				$speaker_bio = get_sub_field('speaker_bio');
				$talk_sub_title = get_sub_field('talk_sub_title');
				$shropgeek_tv_url = get_sub_field('shropgeek_tv_url');
				
	
				// Used originally for Julia Wenlock's Chocolate Tasting so that photo and bio could be included
				if ( $count == '1' && $featured_lightning_talk  == 'Yes' ) : ?>

					<div class="grid__item one-third palm-one-half ptb">

						<img src="<?php echo $speaker_photo['sizes']['standard_thumbnail'];?>" alt="<?php echo $speaker_photo['alt'];?>" class="img--center speakers">
					
					</div><!--

					--><div class="grid__item one-third palm-one-half ptb">
							<h3 class="aligncenter"><?php echo $speaker_name; ?></h3>
								<h4 class="aligncenter"><?php echo $talk_topic; ?></h4>
								<p class="aligncenter"><?php echo $talk_sub_title; ?></p>
							<ul class="nav social-menu">							
								<?php if ( $speaker_website ) : ?><li><a href="<?php echo $speaker_website; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s website">Link</a></li><?php endif; ?>
								<?php if ( $speaker_linkedin_account ) : ?><li><a href="<?php echo $speaker_linkedin_account; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s LinkedIn profile">LinkedIn</a></li><?php endif; ?>
								<?php if ( $speaker_twitter ) : ?><li><a href="<?php echo $speaker_twitter;?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s twitter account">Twitter</a></li><?php endif; ?>
							</ul>
							<?php if ( $shropgeek_tv_url ) : ?>

								<a href="<?php echo $shropgeek_tv_url; ?>" class="btn btn--small btn--book">Watch the talk <span class="ss-directright"></span></a>

							<?php endif; ?>
					</div><!--

					--><div class="grid__item one-third palm-one-whole ptb">
						
						<div class="entry-content">
							<?php echo $speaker_bio; ?>
						</div>

					</div>

				<?php 	
				//--------------------
				// else this is a standard lighting talk that only displays name / title / contact icons
				else : 

					if ( $h > '1' ) :?>--><?php endif;?><div class="grid__item <?php if ( $count == '1' ) : ?>one-whole palm-one-whole<?php elseif ( $count == '2' ) : ?>one-half palm-one-half<?php elseif ( $count == '3' ) : ?>one-third palm-one-half<?php else : ?>one-quarter palm-one-half<?php endif; ?> pb">

						<h4 class="aligncenter"><?php echo $speaker_name; ?></h4>
							<p class="aligncenter"><?php echo $talk_topic; ?></p>
						<ul class="nav social-menu">							
							<?php if ( $speaker_website ) : ?><li><a href="<?php echo $speaker_website; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s website">Link</a></li><?php endif; ?>
							<?php if ( $speaker_linkedin_account ) : ?><li><a href="<?php echo $speaker_linkedin_account; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s LinkedIn profile">LinkedIn</a></li><?php endif; ?>
							<?php if ( $speaker_twitter ) : ?><li><a href="<?php echo $speaker_twitter;?>" class="ss-social-circle ss-icon" title="Link to <?php echo $speaker_name; ?>'s twitter account">Twitter</a></li><?php endif; ?>
						</ul>

						<?php if ( $shropgeek_tv_url ) : ?>

							<a href="<?php echo $shropgeek_tv_url; ?>" class="btn btn--small btn--book">Watch the talk <span class="ss-directright"></span></a>

						<?php endif; ?>

					</div><?php if ( $h < '2' ) :?><!--<?php endif; ?>

				<?php 	
				endif; // ends if count and featured
				

			
			endwhile; // end the sub field while loop
			
		endif; // end if headlines speakers flexible content field 

		if ( $booking_link ) : ?>
			
			<div class="grid__item one-third palm-one-whole pb">
			</div><!--

			--><div class="grid__item one-third palm-one-whole pb">

				<a href="<?php echo $booking_link; ?>" class="btn btn--full btn--book">Book Tickets <span class="ss-directright"></span></a>
					
			</div><!--

			--><div class="grid__item one-third palm-one-whole pb">
			</div>

		<?php 
		endif; ?>

</div>
<?php // closes container so that the map section below can be full screen width ?>
 	
		
		<?php 
		// Setup the map from the acf google map field 
 		$venue_name = get_field('venue_name');
		$venue_address = get_field('venue_address');
		$location = get_field('venue_map');
		//print_r($location);
		 
		if( !empty($location) ):
		?>
		<div class="map">
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
				
				<p><?php if ( $venue_name ) : ?><strong>Venue: <?php echo $venue_name; ?></strong> <?php endif; ?>
				<?php if ( $venue_name && $venue_address ) : ?><br /><?php endif; ?>
				<?php if ( $venue_address ) : ?><?php echo $venue_address; ?><?php endif; ?></p>

				<p><?php echo $venue_tel; ?> - <a href="http://www.twitter.com/<?php echo $venue_twitter; ?>">@<?php echo $venue_twitter; ?></a> <br />
				<a href="http://<?php echo $venue_website; ?>"><?php echo $venue_website; ?></a></p>
						
				
			</div>
		</div>
		<?php endif; ?>

		
<div class="container">

		<?php 
		// ----------------------------------------------------------------------------------------------------
		// ----------------------------------------------------------------------------------------------------
		// Check if there is a repeater field for the sponsors
		if( have_rows('main_sponsors') ) : ?>
	
			<!-- Sponsors on a new row //-->
			<div class="grid__item one-whole heading pt">
				<h3>Sponsors</h3>
			</div>

			<?php
			$s = 0;
			// Loop through the data for the lightning talks
			while ( have_rows('main_sponsors') ) : the_row();

			$count = count ( get_field ( 'main_sponsors' ) );

			$s++;

			$sponsor_image = get_sub_field('sponsor_image');
			$sponsor_link = get_sub_field('sponsor_link');
			 

			/* if ( $s > 1 ) :?>--><?php endif; ?><div class="grid__item <?php if ( $count == "2" ) : ?>one-half<?php else : ?>one-third<?php endif; ?>">*/
			if ( $s > 1 ) :?>--><?php endif; ?><div class="grid__item <?php if ( $count == '1' ) : ?>one-whole palm-one-whole<?php elseif ( $count == '2' ) : ?>one-half palm-one-half<?php elseif ( $count == '3' ) : ?>one-third palm-one-half<?php else : ?>one-quarter palm-one-half<?php endif; ?>">

				<?php if ( $sponsor_link ) : ?><a href="<?php echo $sponsor_link; ?>" rel="nofollow">
					 <img src="<?php echo $sponsor_image['sizes']['sponsor_logo'];?>" alt="<?php echo $sponsor_image['alt'];?>" class="img--center" />
				</a><?php endif; ?>

			</div><!--

			<?php endwhile; ?>
			-->

		<?php
		endif; ?>

		<?php if ( $micro_sponsors ) : ?>
			<div class="grid__item one-whole heading micro-sponsors pt">
				<hr>
				<h3>Micro Sponsors</h3>
			   	<div class="aligncenter"><?php echo $micro_sponsors; ?></div>
			</div>
		<?php endif; ?>

</div>