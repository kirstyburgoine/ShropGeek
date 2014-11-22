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
$sub_title = get_field('sub_title');
$subject_logo = get_field('subject_logo');
$logo_size = get_field('logo_size');
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
$workshop_details_2 = get_field('workshop_details_column_2');
$workshop_footer_text = get_field('workshop_footer_text');

?>


<div class="container">


	<div class="grid__item one-whole">


		<?php if ( $subject_logo ) : ?>
		<img src="<?php echo $subject_logo['sizes']['subject_logo'];?>" alt="<?php echo $subject_logo['alt'];?>" class="img--center pt">
		<?php endif; ?>

		<h2 class="aligncenter"><?php echo $sub_title; ?></h2>

		<p class="intro"><?php echo $intro_text; ?></p>
		<hr>
		
		<h2 class="event-meta"><?php echo the_time('F jS Y'); ?>  . <span><?php echo $event_time; ?></span> . <?php echo $venue_name; ?></h2>
		
		

	</div>

	
	<div class="grid__item one-half palm-one-whole pt">

		<div class="entry-content">

			<?php echo $text_column_2; ?>
			<?php echo $text_column_3; ?>

		</div>


	</div><!--

	--><div class="grid__item one-half palm-one-whole pt">

		<div class="entry-content">
	     	<?php the_content(); ?>	
	    </div>

	</div>
				   					
	<?php 
	//-----------------------------------------------------------------------------------------------------
	//-----------------------------------------------------------------------------------------------------
	?>

	<?php if ( $booking_link ) : ?>	
	<div class="grid__item one-whole desk-one-fifth mobile-display-none">
	</div><!--

	--><div class="grid__item one-whole desk-three-fifths ptb">

			
				
		<a href="<?php echo $booking_link; ?>" class="btn btn--full btn--book" target="_blank">Tickets: £<?php echo $ticket_price; ?> <span class="grey">Book Your Place Now <span class="ss-directright"></span></span></a>

	</div><!--

	--><div class="grid__item one-whole desk-one-fifth mobile-display-none">
	</div>
	<?php endif; ?>	

	<?php
	// ----------------------------------------------------------------------------------------------------
	// ----------------------------------------------------------------------------------------------------
	// 
	// About the Workshop Starts
	// This uses Repeater Field so columns so that amount of trainers can change in future
			
		// Check if there is a repeater field for the workshop trainers
		if( have_rows('workshop_trainers') ) : ?>


		<div class="grid__item one-whole heading pt">

			<hr>
			
			
		</div>

		<div class="grid__item palm-one-whole lap-one-whole one-half">

			<?php 
			// Workshop details outside of repeater while loop because not part of the repeater 
			if ( $workshop_details ) : ?>
			<div class="entry-content workshop">

				
				<?php echo $workshop_details; ?>



			</div>
			<?php endif; ?>

		</div><!--
		
	
	
		<?php
		$h = 0;
		// Loop through the data for the workshop trainers
		
			while ( have_rows('workshop_trainers') ) : the_row();
			$h++; 

			$trainer_name = get_sub_field('trainer_name');
			$trainer_image = get_sub_field('trainer_image');
			$trainer_bio = get_sub_field('trainer_bio');
			$trainer_website = get_sub_field('trainer_website');
			$trainer_linkedin_account = get_sub_field('trainer_linkedin_account');
			$trainer_twitter = get_sub_field('trainer_twitter_acc');
			?>

			--><div class="grid__item palm-one-whole lap-one-half one-quarter">

				<?php if ( $trainer_bio ) : ?>
				<div class="entry-content">
					
					<h4><strong>About <?php echo $trainer_name; ?></strong></h4>
					
					<img src="<?php echo $trainer_image['sizes']['standard_thumbnail'];?>" alt="<?php echo $trainer_image['alt'];?>" class="img--center speakers">
				

					<ul class="nav social-menu">
						<?php if ( $trainer_website ) : ?><li><a href="<?php echo $trainer_website; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $trainer_name; ?>'s website">Link</a></li><?php endif; ?>
						<?php if ( $trainer_linkedin_account ) : ?><li><a href="<?php echo $trainer_linkedin_account; ?>" class="ss-social-circle ss-icon" title="Link to <?php echo $trainer_name; ?>'s LinkedIn profile">LinkedIn</a></li><?php endif; ?>
						<?php if ( $trainer_twitter ) : ?><li><a href="<?php echo $trainer_twitter;?>" class="ss-social-circle ss-icon" title="Link to <?php echo $trainer_name; ?>'s twitter account">Twitter</a></li><?php endif; ?>
					</ul>

				</div>
				<?php endif; ?>

			</div><!--

			--><div class="grid__item palm-one-whole lap-one-half one-quarter">

				<div class="entry-content">
					<?php echo $trainer_bio; ?>
				</div>
				

			</div>

			<?php 
			// End the repeater field while loop
			endwhile; ?>

			
		<?php 
		// End if workshop trainer repeater field
		endif; ?>





		<div class="grid__item one-whole">

			<?php if ( $workshop_details_2 ) : ?>
				<div class="ptb">

					<?php echo $workshop_details_2; ?>

				</div>
			<?php endif; ?>

			<hr>
			<p class="intro"><?php echo $workshop_footer_text; ?></p>
		
		</div>
		

	<?php if ( $booking_link ) : ?>	
	<div class="grid__item one-whole desk-one-fifth mobile-display-none">
	</div><!--

	--><div class="grid__item one-whole desk-three-fifths ptb">

			
				
		<a href="<?php echo $booking_link; ?>" class="btn btn--full btn--book" target="_blank">Tickets: £<?php echo $ticket_price; ?> <span class="grey">Book Your Place Now <span class="ss-directright"></span></span></a>

	</div><!--

	--><div class="grid__item one-whole desk-one-fifth mobile-display-none">
	</div>
	<?php endif; ?>	

</div>
 	
		
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

				<p><?php echo $venue_tel; ?> <br />
				<a href="http://<?php echo $venue_website; ?>"><?php echo $venue_website; ?></a> - <a href="http://www.twitter.com/<?php echo $venue_twitter; ?>">@<?php echo $venue_twitter; ?></a></p>
						
				
			</div>
		</div>
		<?php endif; ?>

		
<div class="container">

		<?php 
		// ----------------------------------------------------------------------------------------------------
		// ----------------------------------------------------------------------------------------------------
		// Check if there is a repeater field for the sponsors
		if( have_rows('sponsors') ) : ?>
	
			<!-- Sponsors on a new row //-->
			<div class="grid__item one-whole heading pt">
				<h3>Sponsors</h3>
			</div>

			<?php
			$s = 0;
			// Loop through the data for the sponsors
			while ( have_rows('sponsors') ) : the_row();

			$count = count ( get_field ( 'sponsors' ) );

			$s++;

			$sponsor_image = get_sub_field('sponsor_image');
			$sponsor_link = get_sub_field('sponsor_link');
			 

			if ( $s > 1 ) :?>--><?php endif; ?><div class="grid__item <?php if ( $count == "2" ) : ?>one-half<?php else : ?>one-third<?php endif; ?>">
				
				<?php if ( $sponsor_link ) : ?><a href="<?php echo $sponsor_link; ?>" rel="nofollow">
					 <img src="<?php echo $sponsor_image['sizes']['sponsor_logo'];?>" alt="<?php echo $sponsor_image['alt'];?>" class="img--center" />
				</a><?php endif; ?>
			
			</div><!--

			<?php endwhile; ?>
			-->

		<?php
		endif; ?>

		<?php if ( $micro_sponsors ) : ?>
			<div class="grid__item one-whole heading pt micro-sponsors">
				<hr>
				<h3>Micro Sponsors</h3>
			   	<div class="aligncenter"><?php echo $micro_sponsors; ?></div>
			</div>
		<?php endif; ?>


				<?php 
		// ----------------------------------------------------------------------------------------------------
		// ----------------------------------------------------------------------------------------------------
		// Check if there is a repeater field for FAQs
		if( have_rows('ticket_faqs') ) : ?>
	
			
			<div class="grid__item one-whole heading ptb">
				<h3>Frequently Asked Questions</h3>
				<hr>
			</div>

			<?php
			$s = 0;
			// Loop through the data for the lightning talks
			while ( have_rows('ticket_faqs') ) : the_row();

			$count = count ( get_field ( 'ticket_faqs' ) );

			$s++;

			$question = get_sub_field('question');
			$answer = get_sub_field('answer');
			 

			if ( $s > 1 ) :?>--><?php endif; ?><div class="grid__item palm-one-whole <?php if ( $count == "2" ) : ?>one-half<?php else : ?>one-third<?php endif; ?> pb">
				
				<h4 class="strong"><?php echo $question; ?></h4>
				<div class="workshop"><?php echo $answer; ?></div>
			
			</div><!--

			<?php endwhile; ?>
			-->

		<?php
		endif; ?>

</div>