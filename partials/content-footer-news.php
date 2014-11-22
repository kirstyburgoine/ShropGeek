<?php 
$args = array(
	'cat' => 5,
	'posts_per_page' => 4
);

$my_query = new WP_Query( $args ); 
if ( $my_query->have_posts() ) : ?>

<div class="grid">

	<div class="news-include pt" role="complementary">

		<div class="container">

			<?php 
			$n = 0;
			while ($my_query->have_posts()) : $my_query->the_post(); 
			$n++;

			?>

			<?php if ( $n > 1 ) :?>--><?php endif; ?><div class="grid__item palm-one-half lap-one-half one-quarter">

				<div class="post">

					<?php 
					if ( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('standard_thumbnail', array('class' => 'img--center')); ?>
					</a>	
					<?php } ?>

					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

					<div class="entry-content">

						<?php the_excerpt();?>

					</div>

				</div>

			</div><!--

			<?php endwhile; ?>
			
			-->
		 	

		</div>
		
	</div>

</div>

<?php endif; wp_reset_query(); ?>