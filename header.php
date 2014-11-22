<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">


		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

		<link rel="shortcut icon" type="image/ico" href="<?php bloginfo('template_directory'); ?>/favicon.png" />
        <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.png"> 
        <link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/apple-touch-icon.png">


        <script type="text/javascript" src="//use.typekit.net/clx8qli.js"></script>
        <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

        <!-- Shims -->
        <!--[if lt IE 9]>
            <script src="<?php bloginfo('template_directory'); ?>/public/assets/js/html5shiv.min.js"></script>
            <script src="<?php bloginfo('template_directory'); ?>/public/assets/js/respond.min.js"></script>
        <![endif]-->
	

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php 
if ( is_home() ) :
$comments = get_field('comments', 'option'); 
else : 
$comments = get_field('comments');
endif; ?>

<!--<?php echo $comments; ?>
If you spotted this content, tweet @shropgeek and let us know! -->


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-11291544-1', 'shropgeek.co.uk');
  ga('send', 'pageview');

</script>

<?php
$accessibility_h1 = get_field('accessibility_h1', 'option');
$accessibility_description = get_field('accessibility_description', 'option');
?>

    <div class="access">
    
        <a name="page_top"></a>            
        <a class="assistive-text" href="#top_nav" title="Skip to main navigation">Skip to main navigation</a>
        
        
        <?php 
        if ( is_home() ) : ?>
            <h1><?php echo $accessibility_h1; ?></h1>
            <p><?php echo $accessibility_description; ?> </p>
        <?php 
        else : 
            if ( have_posts() ) : ?>
                <h1><?php the_title(); ?></h1>
                <?php the_excerpt(); ?> 
                <p>Read more in the main content area.</p>
            <?php endif;
        endif;     
        ?>

        <a class="assistive-text" href="#features_area" title="Skip to main page content">Skip to main page content</a>
                    
    </div>

    <div id="sb-site">

        <div class="grid">
        
            

				<?php get_template_part( 'partials/content', 'head' ); ?>

