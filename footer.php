<?php 
if ( ! is_category('5') && ! is_404() ) :

	get_template_part( 'partials/content', 'footer-news' ); 

endif; ?>

<div class="grid">

	<div class="footer-content">

		<div class="container">

		
			<?php if ( ! is_404() ) : ?>

			<!-- These would be widgets //-->
			<div class="grid__item one-third lap-one-third palm-one-whole">

				<div class="widget-area pt">

					<h2>The Team Behind </h2>

					<a href="http://www.shropgeek-revolution.co.uk">
						<img src="<?php bloginfo('template_directory'); ?>/public/assets/img/revolutionconf.png" alt="(R)Evolution 2014" class="rev img--left">
					</a>

				</div>

			</div><!--

			--><div class="grid__item one-third lap-one-third palm-one-whole">

				<div class="widget-area pt">

					<h2>Sign up to our mailing list</h2>

					<form action="http://shropgeek-revolution.createsend.com/t/t/s/tltun/" method="post" class="enews">

						<p>Want to receive guest blogs and exclusive content straight to your inbox a full two weeks before its published on our website? Signup to our mailing list!</p>
					    
					    <p><label for="fieldEmail">Email:</label>
					        
					        <input id="fieldEmail" name="cm-tltun-tltun" type="email" value="Email"  onblur="if(this.value == '') { this.value = 'Email'; }" onfocus="if(this.value == 'Email') { this.value = ''; }" required  />
					    </p>
					    <p>
					        <button type="submit" class="btn btn--small btn--book">Subscribe <span class="ss-directright"></span></button>
					    </p>
					</form>

				</div>

			</div><!--

			--><div class="grid__item one-third lap-one-third palm-one-whole">

				<div class="widget-area pt">

					<h2>Becoming an Ltd...</h2>

					<p>March 2014 saw Shropgeek become a limited company. Hurrah! We are really VERY excited about this, because it is the beginning of a new era for us. But why a limited company?

</p>

					<a href="<?php bloginfo('url'); ?>/shropgeek-becomes-limited-company/" class="btn btn--small btn--book">Find Out More <span class="ss-directright"></span></a>

				</div><!--

			--></div>



				

					<div class="grid__item one-whole border-top the-end">

						<p class="decor">The End</p>

					</div>

			<?php else : ?>	


					<div class="grid__item one-whole border-top the-end">

						<p class="decor error">No Signal</p>
						
						<div class="error">
							<p>We're sorry but the page you are looking for is not here. </p>
							<ul>
								<li>Looking for an event? Try the <a href="<?php bloginfo('url'); ?>/events">events section</a>.</li>
								<li> Looking for an article? Try the <a href="<?php bloginfo('url'); ?>/category/articles">articles section</a>.</li>
							</ul>
						</div>	

					</div>
			
			<?php endif; ?>

			<div class="grid__item one-whole">

				<div class="border-top pb">
					
					<p class="alignleft credits"><a href="http://www.kirstyburgoine.co.uk" title="Link to Kirsty Burgoine's website">Website by Kirsty Burgoine</a></p>
					<p class="alignright credits">© 2014 ~ Shropgeek Ltd. Company No: 8921973<br />
						Made with <a href="http://mixture.io/">Mixture</a> / <a href="http://inuitcss.com/">inuitcss</a> / <a href="http://wordpress.org/">WordPress</a> / And Love!</p>

				</div>

			</div>

		</div>

	</div>

</div>

<?php 
// ---------------------------------------------------------------------------------------------------------
// ---------------------------------------------------------------------------------------------------------
?>

        </div>

    </div>


<?php get_sidebar(); ?>

    
<a href="#" class="scrollup"><i class="ss-icon">navigateup</i></a>  

<div class="access">
	<a class="assistive-text" href="#features_area" title="Back to the homepage features">Back to the homepage features</a>
    <a class="assistive-text" href="#page_top" title="Back to the top of the page">Back to the top of the page</a>
</div>


	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false"></script>
	<?php wp_footer(); ?>
	
</body>
</html>