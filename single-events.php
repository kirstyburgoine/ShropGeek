<?php
get_header(); 

global $post;

$i = 0;
while ( have_posts() ) : the_post();
$i++;
// ------------------------------------------------------------------------------------------------------------

$event_date = get_field('event_date');

	$y = substr($event_date, 0, 4);
	$m = substr($event_date, 4, 2);
	$d = substr($event_date, 6, 2);
	 
	// create UNIX
	$time = strtotime("{$d}-{$m}-{$y}");

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
//print_r($types);


// Different classes in here for layouts and colours
?>
<div class="event-content <?php if ( $types[0] == "Rebellion") : echo " content-odd"; elseif ( $types[0] == "Workshop" ) : echo " content-mid"; elseif ($types[0] == "Reloaded") : echo " content-even reloaded"; else : echo " content-even"; endif; ?>">

<div class="grid">

	<div class="grid__item one-whole">

		<div class="intro-bg">



				<a href="<?php bloginfo('url'); ?>" title="Go to home">
					<img src="<?php bloginfo('template_directory');?>/public/assets/img/shropgeek-presents.png" alt="" class="img--center logo-event-single">
				</a>

				<div id="features_area" class="grid__item one-whole heading">

					<?php if ( $types[0] == "Rebellion" || $types[0] == "Workshop" || $types[0] == "Reloaded") : ?>

						<h1 class="event-title" role="heading"><span><?php the_title(); ?></span><br /><?php echo $title_strapline; ?></h1>
					
					<?php endif; ?>
				
				</div>



		</div>

	</div>

	
	<?php 
	// ------------------------------------------------------------------------------------------------------------
	// ------------------------------------------------------------------------------------------------------------
	// If Social use social layout
	if ( $types[0] == "Social") :

	//print_r($types);
	?>
	
	<div class="grid__item one-whole" role="main">

		<div class="container">

			<?php
			// alternate between left and right image layout 
			if ( $i % 2 == 0 ) : 

				get_template_part( 'partials/content', 'social-left' );

			else : 

				get_template_part( 'partials/content', 'social-right' );

			endif; ?>

		</div>

		<?php 
		// Setup the map from the acf google map field 
 		$venue_name = get_field('venue_name');
		$venue_address = get_field('venue_address');
		$location = get_field('venue_map');
		//print_r($location);
		 
		if( !empty($location) ) :
		?>
		<div class="map">
			<div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>">
				
				<?php if ( $venue_name ) : ?><strong>Venue: <?php echo $venue_name; ?></strong> <?php endif; ?>
				<?php if ( $venue_name && $venue_address ) : ?><br /><?php endif; ?>
				<?php if ( $venue_address ) : ?><?php echo $venue_address; ?><?php endif; ?>
				
			</div>
		</div>
		<?php endif; ?>

	</div>

	<?php 
	// ------------------------------------------------------------------------------------------------------------
	// ------------------------------------------------------------------------------------------------------------
	// ElseIf workshops use workshops layout layout
	elseif ( $types[0] == "Workshop") : ?>

	<div class="grid__item one-whole" role="main">
		test

		<?php	
		get_template_part( 'partials/content', 'event-workshop' ); ?>


	</div>

		

	<?php 
	// ------------------------------------------------------------------------------------------------------------
	// ------------------------------------------------------------------------------------------------------------
	// ElseIf Reloaded use reloaded layout 
	elseif ( $types[0] == "Reloaded") : ?>

	<div class="grid__item one-whole" role="main">

		<?php	
		get_template_part( 'partials/content', 'event-reloaded' ); ?>


	</div>

		


	<?php
	// ------------------------------------------------------------------------------------------------------------
	// Else get the main page layout for the Rebellion / Reloaded events
	else : ?>

	<div class="grid__item one-whole" role="main">


		<?php	
		get_template_part( 'partials/content', 'event-rebellion' ); ?>


	</div>



	<?php	
	endif; // End which event type
	// ------------------------------------------------------------------------------------------------------------ 
	// ------------------------------------------------------------------------------------------------------------ 
	// Events Previous and next is the same no matter which event 
	// Extra grid__item to get plus margins right on mobile devices ?>
	
	<div class="grid__item one-whole">

		<div class="container">	

			<div class="grid__item one-whole">

				<nav id="nav-single">

					<?php 
					$prev_post = get_previous_post();
					if (!empty( $prev_post )): ?>
						<span class="nav-previous">
							<a href="<?php echo get_permalink( $prev_post->ID ); ?>"><span class="meta-nav">&larr; Previous</span><br /><span class="prev-title"><?php echo $prev_post->post_title; ?> - <?php echo mysql2date('F Y', $prev_post->post_date, TRUE) ?></span></a>
						</span>
					<?php endif; ?>


					<?php
					$next_post = get_next_post();
					if (!empty( $next_post )): ?>
						<span class="nav-next">
						  <a href="<?php echo get_permalink( $next_post->ID ); ?>"><span class="meta-nav">Next &rarr;</span><br /><span class="next-title"><?php echo $next_post->post_title; ?> - <?php echo mysql2date('F Y', $next_post->post_date, TRUE) ?></span></a>
						</span>
					<?php endif; ?>
        
	           		<div class="seperator"></div>
	                        
				</nav>

			</div>	

		</div>

	</div>

	<?php
	// ------------------------------------------------------------------------------------------------------------
	// ------------------------------------------------------------------------------------------------------------
	?>

</div>
</div>
<?php
// ------------------------------------------------------------------------------------------------------------
endwhile;

get_footer();
?>