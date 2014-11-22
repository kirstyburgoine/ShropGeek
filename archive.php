<?php
get_header(); ?>

            

<div class="grid">

<div class="event-content">

<div id="features_area" class="container">

		<?php
		global $query_string;
		$my_query = new WP_Query( $query_string.'&posts_per_page=5' );
		
		if ( have_posts() ) : ?>

		<div class="grid__item one-whole heading">
			<h1 class="event-title border-bottom" role="heading">
				<span><?php single_cat_title(); ?></span>
			</h1>
		</div>


		<div class="grid__item one-whole">

			<div class="center-column" role="main"> 

		<?php
			// Start the Loop inside the include so post counts work.
				get_template_part( 'partials/content', 'archive' );



		else :
		// If no content, include the "No posts found" template.
		get_template_part( 'content', 'none' );

		endif; wp_reset_query(); 
		?>
		
			</div>

		</div>

</div>

</div>

</div>



 <?php get_footer(); ?>