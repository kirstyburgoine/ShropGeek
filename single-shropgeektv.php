<?php
get_header(); 

global $post;

		$vimeo_url = get_field('vimeo_url');
		$presenter_name = get_field('presenter_name');
		$event_name = get_field('event_name');
		$event_date = get_field('event_date');
		$event = get_field('related_event');

	

?>

<div class="grid">

	<div class="container">


		<div class="grid__item one-whole heading">

			<h1 class="event-title border-bottom" role="heading"><span>Shropgeek TV</span></h1>

		</div>

		<div id="features_area" class="center-column" role="main">

		<?php

		//print_r($event);	
		while ( have_posts() ) : the_post();
		// ------------------------------------------------------------------------------------------------------------
		?>

			<div class="grid__item palm-one-whole one-whole">

					<article class="post border-bottom tv-container single">

						<h2><?php the_title();?></h2>

						<?php 
						/*
						if( $event ): 

							$event_ids = array();

						foreach( $event as $post):
							setup_postdata( $post ); 

							$event_ids[] = get_the_ID();
							?>
								<h3><span class="event-type"><?php echo $presenter_name; ?></span> <a href="<?php the_permalink(); ?>"><?php the_title(); ?> - <?php echo the_time('F jS Y'); ?> </a></h3>

							<?php 
						endforeach;
							wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
						endif; */?>

						<h3>By <span class="event-type"><?php echo $presenter_name; ?></span></h3>
						
						<div class="tv">
							<?php echo apply_filters('the_content', $vimeo_url); ?>
						</div> 

						<div class="entry-content">

							<?php the_content(); ?>

						</div>

					</article>

					<?php
					if ( $sponsor_banner ) : ?>

					<div class="border-bottom">

						<h3>Event Sponsor</h3>

						<a href="<?php echo $sponsor_link;?>" target="_blank">
							<img src="<?php echo $sponsor_banner['sizes']['sponsor_banner'];?>" alt="<?php echo $sponsor_banner['alt']; ?>" class="sponsor_banner" />
						</a>

						<?php if ( $sponsor_bio ) : ?>
							<p><?php echo $sponsor_bio; ?></p>
						<?php endif; ?>

					</div>

					<?php
					endif; ?>


			</div>

		<?php			
		// ------------------------------------------------------------------------------------------------------------
		endwhile; ?>


			<?php 
			/*
			 *  Query posts for a relationship value.
			 

			//print_r($event_ids);

			$tv = get_posts( array(
				'post_type' => 'shropgeektv',
				'meta_query' => array(
					array(
						'key' => 'related_event', // name of custom field
						'value' => '"' . get_the_ID() . '"', // matches exaclty "123", not just 123. This prevents a match for "1234"
						'compare' => 'LIKE'
						)
					)
				) );

			var_dump($tv);

			if( $tv ): 
			$n = 0; ?>

				<div class="grid__item palm-one-whole one-whole">

					<h3>More Videos from <?php  ?></h3>

				</div>

			<?php
				//while ($tv_query->have_posts()) : $tv_query->the_post(); 

					$vimeo_url = get_field('vimeo_url');
					$presenter_name = get_field('presenter_name');
					$event_name = get_field('event_name');
					$event_date = get_field('event_date');
					$event_url = get_field('event_url');
				
				$n++;
				?>

					<?php if ( $n > 1 ) :?>--><?php endif; ?><div class="grid__item palm-one-half lap-one-half one-quarter">
					
							<div class="tv-container" role="main">

								<div class="tv">
									<?php echo apply_filters('the_content', $vimeo_url); ?>
								</div> 
								
								
								<h3><span class="event-type"><?php echo $presenter_name; ?></span> <?php echo $event_name; ?> - <?php echo $event_date; ?></h3>

							
							</div>

					</div><!--

				<?php // endwhile; ?>
					-->
			<?php endif; // wp_reset_query(); */ ?>



		</div>

		<div class="grid__item one-whole">

			<nav id="nav-single">

					<?php 
					$prev_post = get_previous_post();
					if (!empty( $prev_post )): ?>
						<span class="nav-previous">
							<a href="<?php echo get_permalink( $prev_post->ID ); ?>"><span class="meta-nav">&larr; Previous</span><br /><span class="prev-title"><?php echo $prev_post->post_title; ?></span></a>
						</span>
					<?php endif; ?>


					<?php
					$next_post = get_next_post();
					if (!empty( $next_post )): ?>
						<span class="nav-next">
						  <a href="<?php echo get_permalink( $next_post->ID ); ?>"><span class="meta-nav">Next &rarr;</span><br /><span class="next-title"><?php echo $next_post->post_title; ?></span></a>
						</span>
					<?php endif; ?>
        
	        <div class="seperator"></div>
	                        
			</nav>


		</div>



	</div>

</div>

<?php
wp_reset_query(); 

get_footer();
