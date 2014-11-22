<?php
// Query for events to include future posts is in functions.php 
// as well as function to change future posts from scheduled to 
// published so that pagination and othe features work as normal

get_header(); ?>

<div class="grid">

<div class="content-even">

<div id="features_area" class="container">

	<?php 

		if ( have_posts() ) : ?>

		<div class="grid__item one-whole heading">
			<h1 class="event-title border-bottom" role="heading">
				<span>Shropgeek TV</span>
			</h1>
		</div>




		<?php
			// Start the Loop inside the include so post counts work.
				get_template_part( 'partials/content', 'archive-shropgeektv' );



		else :
		// If no content, include the "No posts found" template.
		get_template_part( 'content', 'none' );

		endif; wp_reset_query();
		?>
		

</div>

</div>

</div>



 <?php get_footer(); ?>