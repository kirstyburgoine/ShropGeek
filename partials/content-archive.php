<?php 
while ( have_posts() ) : the_post();
$guest_author = get_field('author');
?>

	<article class="post border-bottom articles">

		<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
		<div class="news-meta">
			<?php if ( $guest_author ) : ?>

				Guest Blog by <?php echo $guest_author; ?> / <?php the_time('F jS Y'); ?> 

			<?php else : ?>
			
				By <?php the_author(); ?> / <?php the_time('F jS Y'); ?>

			<?php endif; ?>

		</div>
		<div class="entry-content">

			<?php the_content('',FALSE,''); ?>

		</div>

		<a href="<?php the_permalink();?>" title="<?php the_title_attribute();?>" class="more">Read More</a>

	</article>

<?php endwhile; ?>