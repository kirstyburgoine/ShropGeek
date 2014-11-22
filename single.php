<?php
get_header(); 

global $post;

$guest_author = get_field('author');
$guest_author_bio = get_field('author_bio');
$guest_author_website = get_field('author_website');
$guest_author_twitter = get_field('author_twitter');
$sponsor_banner = get_field('sponsor_banner');
$sponsor_bio = get_field('sponsor_bio');
$sponsor_link = get_field('sponsor_link');
$reading_time = get_field('reading_time');

?>

<div class="grid">

	<div class="container">


		<div class="grid__item one-whole heading">

			<h1 class="event-title border-bottom" role="heading"><span>Articles</span></h1>

		</div>

		<div id="features_area" class="center-column" role="main">

		<?php
		while ( have_posts() ) : the_post();
		// ------------------------------------------------------------------------------------------------------------


		$title_strapline = get_field('title_strapline');
		?>

			<div class="grid__item palm-one-whole three-quarters">

					<article class="post border-bottom">

						<h2><?php the_title();?></h2>
						
						<?php if ( $reading_time ) : echo '<span class="estimate">Estimated Reading Time: ' . $reading_time . '</span>'; endif; ?>

						<div class="entry-content">

							<?php the_content(); ?>

						</div>

					</article>

					<?php
					if ( $sponsor_banner ) : ?>

					<div class="border-bottom">

						<h3>This Weeks Sponsor</h3>

						<a href="<?php echo $sponsor_link;?>" target="_blank">
							<img src="<?php echo $sponsor_banner['sizes']['sponsor_banner'];?>" alt="<?php echo $sponsor_banner['alt']; ?>" class="sponsor_banner" />
						</a>

						<?php if ( $sponsor_bio ) : ?>
							<p><?php echo $sponsor_bio; ?></p>
						<?php endif; ?>

					</div>

					<?php
					endif; 

					// If is guest blogs category
					if ( in_category('9') ) : ?>

						
					<h3>Sign up to our mailing list</h3>

					<form action="http://shropgeek-revolution.createsend.com/t/t/s/tltun/" method="post" class="enews">

						<p>Want to receive these guest blogs straight to your inbox a full two weeks before its published on our website? Signup to our mailing list!</p>
					    
					    <p><label for="fieldEmail">Email:</label>
					        
					        <input id="fieldEmail" name="cm-tltun-tltun" type="email" value="Email"  onblur="if(this.value == '') { this.value = 'Email'; }" onfocus="if(this.value == 'Email') { this.value = ''; }" required  />
					    </p>
					    <p>
					        <button type="submit" class="btn btn--small btn--book">Subscribe <span class="ss-directright"></span></button>
					    </p>
					</form>


					<?	endif;
					?>

			</div><!--

			--><div class="grid__item palm-one-whole one-quarter">

				<div class="news-meta">

					<?php 
					if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
						the_post_thumbnail('standard_thumbnail', array('class' => 'img--center'));
					} 
					?>
					
					<div class="news-meta-inner">

					<?php 
					if ( $guest_author ) : ?>
					
						<p class="heading">Written By: <?php echo $guest_author; ?></br>Posted on: <?php the_time('jS M Y'); ?></p>
						<?php echo '<p class="bio">' . $guest_author_bio . "</p>"; ?>

						<ul class="author-links">
							<li><a href="http://<?php echo $guest_author_website; ?>" target="_blank" class="ss-social-circle ss-icon">link</a></li>
							<li><a href="http://<?php echo $guest_author_twitter; ?>" target="_blank" class="ss-social-circle ss-icon">twitter</a></li>
						</ul>


					<?php else : ?> 
						Written By: <?php the_author(); ?></br>Posted on: <?php the_time('jS M Y'); ?>
						
					
					<?php endif; ?>

					</div>

					<h3>Categories</h3>

					<ul>
						<?php wp_list_categories('orderby=name&child_of=5&title_li='); ?> 
					</ul>
					
				</div>


			</div>

		<?php			
		// ------------------------------------------------------------------------------------------------------------
		endwhile; ?>

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
