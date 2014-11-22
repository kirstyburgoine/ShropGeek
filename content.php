<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<header class="entry-header">

		<?php
			the_title( '<h1 class="entry-title">', '</h1>' );
		?>

		
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->


	<footer class="entry-meta"></footer>


</article><!-- #post-## -->