
	<style type="text/css">
		
		#footer ul {
			padding: 0px;
		}
		#footer li {
			list-style: none;		
		}
		.list-inline-item {
			display: inline-block;
		}
		
		#footer section {
			padding: 60px 0;
		}		
		#footer {
			/* background: #056839 !important; */
			background: #acc837!important;
		}		
		#footer h5{
			padding-left: 10px;
			border-left: 3px solid #eeeeee;
			padding-bottom: 6px;
			margin-bottom: 20px;
			color:#ffffff;
		}		
		#footer a {
			color: #ffffff;
			text-decoration: none !important;
			background-color: transparent;
			-webkit-text-decoration-skip: objects;
		}
		#footer ul.social li{
			padding: 3px 0;
		}
		#footer ul.social li a i {
			margin-right: 5px;
			font-size:25px;
			-webkit-transition: .5s all ease;
			-moz-transition: .5s all ease;
			transition: .5s all ease;
		}
		#footer ul.social li:hover a i {
			font-size:30px;
			margin-top:-10px;
		}
		#footer ul.social li a,
		#footer ul.quick-links li a{
			color:#ffffff;
		}		
		#footer ul.quick-links li{
			padding: 3px 0;
			-webkit-transition: .5s all ease;
			-moz-transition: .5s all ease;
			transition: .5s all ease;
		}
		#footer ul.quick-links li:hover{
			padding: 3px 0;
			margin-left:5px;
			font-weight:700;
		}
		#footer ul.quick-links li a i{
			margin-right: 5px;
		}
		#footer ul.quick-links li:hover a i {
			font-weight: 700;
		}
		/* 
		@media (max-width:767px) {
			#footer h5 {
				padding-left: 0;
				border-left: transparent;
				padding-bottom: 0px;
				margin-bottom: 10px;
			}
		}
		*/

	</style>
		
	<section id="footer" class="container">
		<div class="col-3">
			<h5>Quick links</h5>
			<nav  id="footer-left"> 
				<?php
				//wp_nav_menu( array('theme_location'=>'footer-menu') ); 

				if (has_nav_menu('footer-left-menu')) {                    
					wp_nav_menu( array(
						'theme_location'=>'footer-left-menu',
						// 'after' => ' |',
						'link_before' => ' <i>&raquo;</i> ',
						//'menu' => 'Top Menu',
						//'container' => 'div',
						//'container_class' => 'top-menu'
						//'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s<li><a href="http://www.mungos.org/">ST MUNGO\'S</a></li></ul>'
						'items_wrap' => '<ul id="%1$s" class="quick-links">%3$s</ul>'
					) );                    
				}
				?> 
			</nav>		
		</div>
		<div class="col-3" id="footer-middle">
			<h5>Quick links</h5>
			<ul class="quick-links">
				<li><a href="javascript:void();"><i class="">&raquo;</i> Home</a></li>
				<li><a href="javascript:void();"><i>&raquo;</i> About</a></li>
			</ul>
		</div>
		<div class="col-3">
			<h5>Quick links</h5>
			<ul class="quick-links">
				<li><a href="javascript:void();"><i>&raquo;</i> Home</a></li>
				<li><a href="javascript:void();"><i>&raquo;</i> About</a></li>
			</ul>
		</div>
		<div class="col-3"> 	
			<h5>Social </h5>
			<ul class="quick-links">
				<li> <a href="javascript:void();"><i>&raquo;</i> facebook</a> </li>
				<li> <a href="javascript:void();"> <i class="fa fa-twitter"></i></a></li>
			</ul>
		</div>
		<!-- 
		<div class="row">
			<div class="col-12">
				<ul class="social" style="text-align: center;">
					<li class="list-inline-item">
						<a href="javascript:void();"> 
							<svg class="icon icon-cart" style="font-size: 12px; font-style: italic;"><use xlink:href="#icon-cart"></use></svg>  						
						</a>
					</li>
					<li class="list-inline-item"><a href="javascript:void();"><i class="fa fa-twitter"></i></a></li>
				</ul>
			</div>
			</hr>
		</div>	
		-->
		
		<div class="row">
			<hr/>
			<div class="col-12" style="text-align: center; color: #fff;">				
				<p>&copy All right Reversed. Amrisseedsoil</p>
			</div>
			</hr>
		</div>	
		
	</section>
		
    

</div><!-- PAGE  -->
        
       


		<script type="text/javascript">
        
		    jQuery(document).ready(function($) {
				
				// MOBILE NAV
				$("ul#myTopnav li:has(ul)").click(function() {
					
					$e = $(this).find(".child-ul");                                         
					$e.toggle(500);
				});
					
                
                // =============== NAVIGATION ===========
                var navElmnt = document.getElementById("myTopnav");
                var $icon = document.getElementsByClassName("icon")[0];
                console.log(navElmnt); // topnav clearfix

                var tracker = "hidden"; // default

                $icon.onclick = function() {

                    // NAV <div> is hidden with MEDIA QUERY. 1st time user clicks ICON, tracker VAR emulates NAV, start it from Hidden
                    if (tracker == "hidden") {						
                        navElmnt.style.display = "block";					
                        tracker = "showing";
                    } else if (tracker == "showing") { // if user clicks the ICON, and tracker=showing, she/he wants to hide NAV menu					
                        navElmnt.style.display = "none";
                        tracker = "hidden";
                    }	

                };        
                
                
                
                // https://www.wpexample.com/jetpack-sharedaddy-social-share-shows-twice/
			    // remove jetpack social media sharing. it displayes it twice
			    var body = $( 'body' );
			    body.find('.sharedaddy').last().remove();
                              
              
		    });

		</script>		
                
        
        <?php  
        if( is_front_page() ) {  
            
            if (wp_is_mobile() ) {
                // if mobile Do nothing
                // We want to include the animation js Greensock library only on Desktops      ?>  				
                <script type="text/javascript">
                    
                </script>
        <?php
            } else {   ?>
                
                <script defer src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>        
                
        <?php } } 
        
        // Difference between [wp_footer() and get_footer() ] 
        // These two functions accomplish two different things. wp_footer() is a hook used in your footer.php template file to ensure that 
        // the right code is inserted (from the core/plugins/etc) into the right place. get_footer() is used in your other template files to call 
        // for the code in your footer.php template file. So in simpler words wp_footer() gets other code that you most likely don't produce (but need)
        wp_footer(); 
        ?>
            
            
    </body>
</html>
