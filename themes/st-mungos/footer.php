<?php
/* First thing we check for the menu like in header.php. if there's a header, you output it. You can reach it by 
* by applying a Custom Menu to the Bottom Menu area in the admin panel
*/
?>
	<div id="footer">						
			<div class="footer-left">
				<ul>
					<?php
					// The Footer Left Side widget area
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-left-side') ) 
					{ ?>
						<li class="widget widget-area-empty">You can drop widget here if you like</li>
					  <?php 
					}//endif; ?>
				</ul>
                
                                
                <ul id="socialmedia">
                	<li id="followus"><strong>Follow us:</strong></li>
                    <li><a id="facebook" href="https://www.facebook.com/StMungosUK" title="to our facebook page">facebook</a></li>
                    <li><a id="twitter" href="https://twitter.com/StMungos" title="to our twitter page">twitter</a></li>
                    <li><a id="youtube" href="http://www.youtube.com/StMungosUK" title="to youtube video">yahoo</a></li>
                </ul><!-- UL#socialmedia -->                                   
			</div><!-- footer-left -->
			
			
			<div class="footer-right">                                                     			                
				<ul>
				<?php
					// The Footer Right Side widget area
					if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-right-side') ) : ?>
						<li class="widget widget-area-empty">You can drop some widgets here</li>
				<?php endif; ?>
				</ul>                                	
			</div><!-- #footer-right -->			                        
            
			<p class="clearFloat"></p>        
            <p>	<?php bloginfo('title'); ?> is proudly powered by 
                <a href="http://wordpress.org" title="WordPress">WordPress</a>
            </p>						              		
	</div><!-- #footer -->				
	
	<p class="clearFloat"></p>
</div><!--  ends #wrap -->

<?php wp_footer(); //required, a must  ?>
</body>
</html>