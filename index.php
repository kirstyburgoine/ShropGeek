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
				// Start the Loop insode the events partial so that events can be counted.


					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
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
