	
	<div id="top_nav" class="sb-slidebar sb-left">

    	<img src="<?php bloginfo('template_directory'); ?>/public/assets/img/shropgeek-logo.png" alt="" class="img--center">
            

            <?php
            wp_nav_menu( 
                array( 
                    'container' => '',
                    'menu_class' => 'nav nav--stacked menu',
                    'theme_location' => 'primary' 
                ) 
            ); ?>

            

        <?php 
        if ( is_active_sidebar( 'sidebar-1' ) ) : 
            dynamic_sidebar( 'sidebar-1' ); 
        endif; ?>

    </div>