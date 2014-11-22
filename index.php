<?php
/**
 * The main template file
 * Template Name: Home
 */

get_header(); 

?>

	<div class="grid__item one-whole">

		<div class="intro-bg">
			
			<div class="logo-container">
				<h1 class="logo">
					Shropgeek Presents
				</h1>
			</div>

		</div>

	</div>


<div id="features_area" class="grid__item one-whole" role="main">


	<div id="accordion-resizer" class="ui-widget-content">

		<div id="accordion">

			<?php
			$args = array(
				'post_type' => 'events',
				'post_status' => array('publish', 'future'),
				'posts_per_page' => 6
			);

			query_posts( $args );

			if ( have_posts() ) :
				// Start the While Loop inside the events partial so that events can be counted.

					// The main container file for the events on the homepage
					get_template_part( 'partials/content', 'home-events' );



			else :
				// If no content, include the "No posts found" template.
				get_template_part( 'content', 'none' );

			endif; wp_reset_query();
			?>

	  	</div>

	</div>

</div>

<?php

get_footer();
