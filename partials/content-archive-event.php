<?php 

$today = getdate();
//print_r ( $today );

$today_args = array(
	'post_type' => 'events',
	'date_query' => array(
		array(
			'after'    => array(
				'year'  => $today['year'],
				'month' => $today['mon'],
				'day'   => $today['mday'],
			),
			'inclusive' => true,
		),
	),
	'posts_per_page' => -1,
	'order' => 'ASC'
);



$today_query = new WP_Query( $today_args );

$i = 0;

	while ( $today_query->have_posts() ) : $today_query->the_post();
		
		$i++;
		$booking_link = get_field('booking_link');
		$subject_logo = get_field('subject_logo');
		$logo_size = get_field('logo_size');
		$logo_background = get_field('logo_background');
		if ( $logo_background == '' ) : $logo_background = "#fff"; endif;
		$sub_title = get_field('sub_title');
?>


<?php 
// For the inuit grid to work white space needs to be commented out but not on first and last events on the page
// If not first box end white commenting out
if ( $i > 1 ) :?>--><?php endif; ?><div class="grid__item palm-one-whole lap-one-half one-third">

	<div class="event" role="main">

		<div class="tab tab-<?php echo $i;?>">
			<h3><?php the_date('F jS Y'); ?></h3>
		</div>

		<div class="entry-content">

			<h2 <?php if ( $subject_logo ) : ?>class="no-margin"<?php endif;?>><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>

			<?php if ( $subject_logo ) : ?>
				<img src="<?php echo $subject_logo['sizes']['subject_logo'];?>" alt="<?php echo $subject_logo['alt'];?>" class="img--center no-mb" style="max-width: <?php echo $logo_size;?>%;background: <?php echo $logo_background; ?>;">
				<p class="intro pt-half"><?php echo $sub_title; ?></p>
			<?php else : ?>
				<?php the_excerpt(); ?>
			<?php endif; ?>

			<?php if ( $booking_link ) : ?>
			<a href="<?php echo $booking_link; ?>" class="btn btn--small btn--book">Book Tickets <span class="ss-directright"></span></a>
			<?php endif; ?>

			<a href="<?php the_permalink();?>" class="btn btn--small btn--book">Full Details <span class="ss-directright"></span></a>

		</div>

	</div>

</div><?php 
// If not the last post (This could be different than the max 12 per page) show the start of white space commenting out
if ( $i < $wp_query->post_count ) :?><!--<?php endif; ?>

<?php endwhile; wp_reset_postdata(); ?>
<!-- //-->


<?php
//--------------------------------------------------------------------------------------------------------------
//--------------------------------------------------------------------------------------------------------------
//-------------------------------------------------------------------------------------------------------------- ?>


<div class="grid__item one-whole heading">
	<h1 class="event-title border-bottom">
		<span>Past Rebellion Events</span>
	</h1>	
</div>


<?php
$past_args = array(
	'post_type' => 'events',
	'event_type' => 'rebellion',
	'date_query' => array(
		array(
			'before'    => array(
				'year'  => $today['year'],
				'month' => $today['mon'],
				'day'   => $today['mday'],
			),
			'inclusive' => true,
		),
	)
);

$past_query = new WP_Query( $past_args );
$i = 0;

	while ( $past_query->have_posts() ) : $past_query->the_post();
		
		$i++;
		$booking_link = get_field('booking_link'); 
		$subject_logo = get_field('subject_logo');





// For the inuit grid to work white space needs to be commented out but not on first and last events on the page
// If not first box end white commenting out
if ( $i > 1 ) :?>--><?php endif; ?><div class="grid__item palm-one-whole lap-one-half one-third">

	<div class="event" role="main">

		<div class="tab tab-<?php echo $i;?>">
			<h3><?php the_date('F jS Y'); ?></h3>
		</div>

		<div class="entry-content">

			<h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>

			<?php if ( $subject_logo ) : ?>
				<img src="<?php echo $subject_logo['sizes']['subject_logo'];?>" alt="<?php echo $subject_logo['alt'];?>" class="img--center">
			<?php else : ?>
				<?php the_excerpt(); ?>
			<?php endif; ?>

			<?php if ( $booking_link ) : ?>
			<a href="<?php echo $booking_link; ?>" class="btn btn--small btn--book">Book Tickets <span class="ss-directright"></span></a>
			<?php endif; ?>

			<a href="<?php the_permalink();?>" class="btn btn--small btn--book">Full Details <span class="ss-directright"></span></a>

		</div>

	</div>

</div><?php 
// If not the last post (This could be different than the max 12 per page) show the start of white space commenting out
if ( $i < $wp_query->post_count ) :?><!--<?php endif; ?>

<?php endwhile; wp_reset_postdata(); ?>
<!-- //-->






