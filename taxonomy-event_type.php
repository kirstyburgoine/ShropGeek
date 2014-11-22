<?php
get_header(); ?>

            

<div class="grid">

<div class="event-content content-odd">

<div class="container">

		<?php 
		if ( have_posts() ) : ?>

		<div class="grid__item one-whole heading">
			<h1 class="event-title border-bottom">
				<span>Upcoming Events</span>
			</h1>
		</div>




		<?php
			// Start the Loop inside the include so post counts work.
			

				/*
				 * Include the post format-specific template for the content. If you want to
				 * use this in a child theme, then include a file called called content-___.php
				 * (where ___ is the post format) and that will be used instead.
				 */
				get_template_part( 'partials/content', 'archive-event' ); 
		


		else :
		// If no content, include the "No posts found" template.
		get_template_part( 'content', 'none' );

		endif; wp_reset_query();



		?>





</div>

</div>

</div>



 <?php get_footer(); ?>