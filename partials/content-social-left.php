<?php
$title_strapline = get_field('title_strapline');
$text_column_1 = get_field('text_column_1');
$text_column_2 = get_field('text_column_2');

$event_time = get_field('event_time');
$photo_credit = get_field('photo_credit');

$venue_name = get_field('venue_name');
$venue_tel = get_field('venue_tel');
$venue_website = get_field('venue_website');
$venue_twitter = get_field('venue_twitter');

?>			

			<div class="grid__item palm-one-whole one-third pt mobile-display-none">

				<?php 
				if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
					the_post_thumbnail('social_image', array('class' => 'img--left'));
				} 
				?>
				  		
			</div><!--

			--><div class="grid__item palm-one-whole lap-one-whole two-thirds">

				<div class="grid">
					<div class="grid__item one-whole heading">
						<h1 class="event-title alignright"><span><?php the_title();?></span><br/><?php echo $title_strapline; ?></h1>
						<hr>
					</div> 
				</div>

				<div class="grid">

					<div class="grid__item palm-one-whole one-third">

						<h5 class="event-meta social"><?php the_time('F jS Y'); ?> <br /><span><?php echo $event_time; ?></span></h5>

						<?php 
						if ( is_single() ) : ?>
						<p class="social">
							<strong>Venue:</strong> <?php echo $venue_name; ?> <br />
							<?php echo $venue_tel; ?> <br />
							<a href="http://www.twitter.com/<?php echo $venue_twitter; ?>">@<?php echo $venue_twitter; ?></a><br />
							<a href="http://<?php echo $venue_website; ?>"><?php echo $venue_website; ?></a> 
						</p>
						<?php endif; ?>

						<?php if ( ! is_single() ) : ?>
						<a href="<?php the_permalink(); ?>" class="btn btn--small btn--book">Full Details <span class="ss-directright"></span></a>
						<?php endif; ?>

						<?php if ( $photo_credit ) : ?>
						<p class="mobile-display-none credits"><?php echo $photo_credit; ?></p>
						<?php endif; ?>


					</div><!--

					--><div class="grid__item palm-one-whole one-third">

						<div class="entry-content">
							<?php the_content(); ?>
						</div>

					</div><!--
					      		
			     	--><?php if ( $text_column_2 ) : ?><div class="grid__item palm-one-whole one-third">
								      		
						<div class="entry-content">
					 		<?php echo $text_column_2; ?>
					 	</div>

		      		</div><?php endif; ?>

	      		</div>
			     		
			</div>