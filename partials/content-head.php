<?php
$email_icon = get_field('email_icon', 'option');
$twitter_icon = get_field('twitter_icon', 'option');
$facebook_icon = get_field('facebook_icon', 'option');
$flickr_icon = get_field('flickr_icon', 'option');
$vimeo_icon = get_field('vimeo_icon', 'option');
?>

<div class="grid">

	<div class="header">
	<div class="container">

		<div class="grid__item one-whole">



				<ul class="nav social-menu">
					<?php if ($email_icon) : ?>
						<li><a href="mailto:<?php echo $email_icon;?>" class="ss-social-circle ss-icon">Email</a></li>
					<?php endif; ?>
					<?php if ($twitter_icon) : ?>
						<li><a href="<?php echo $twitter_icon;?>" class="ss-social-circle ss-icon">Twitter</a></li>
					<?php endif; ?>
					<?php if ($facebook_icon) : ?>
						<li><a href="<?php echo $facebook_icon; ?>" class="ss-social-circle ss-icon">Facebook</a></li>
					<?php endif; ?>
					<?php if ($flickr_icon) : ?>
						<li><a href="<?php echo $flickr_icon; ?>" class="ss-social-circle ss-icon">Flickr</a></li>
					<?php endif; ?>
					<?php if ($vimeo_icon) : ?>
						<li><a href="<?php echo $vimeo_icon; ?>" class="ss-social-circle ss-icon">Vimeo</a></li>
					<?php endif; ?>
				</ul>

				<a href="<?php bloginfo('url');?>" class="menu-btn ss-icon">home</a>
				<a href="#" class="sb-toggle-left menu-btn menu-nav"><span class="ss-icon">list</span> <span class="btn-helper-text">Menu</span></a>

		</div>

	</div>
	</div>

</div>