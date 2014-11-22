<?php
/**
 * The main template file
 */



get_header(); 


while ( have_posts() ) : the_post();

?>


	<div class="grid">

		<div id="features_area" class="container">
			
			<div class="grid__item one-whole heading">

				<h1 class="event-title border-bottom" role="heading"><span><?php the_title(); ?></span></h1>

			</div>
	
		</div>

	</div>


	<div class="grid" role="main">

		<div class="container">

			<div class="grid__item palm-one-whole lap-one-whole one-half">

				<?php the_content(); ?>

			</div><!--

		 --><div class="grid__item palm-one-whole lap-one-whole one-half">

				<?php 
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					the_post_thumbnail('about_image', array('class' => 'img--center about'));
				} 
				?>

			</div>

		</div>

	</div>

<?php

endwhile;

get_footer();
