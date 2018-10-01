	<!-- footer 
	<footer class="footer" role="contentinfo">
		<p class="copyright">
			&copy; <?php // echo date('Y'); ?> Copyright <?php // bloginfo('name'); ?>. <?php // _e('Powered by', 'html5blank'); ?>
			<a href="//wordpress.org" title="WordPress">WordPress</a> &amp; 
			<a href="//html5blank.com" title="HTML5 Blank">HTML5 Blank</a>.
		</p>
	</footer>
	-->
	

 
	<!-- Footer --> 	
    <style type="text/css">
		ul {
			list-style: none;
		}		
		footer ul {
			padding-left: 2px;
		}
			 
				
		section .section-title {
			text-align: center;
			color: #007b5e;
			margin-bottom: 50px;
			text-transform: uppercase;
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
			font-size:large;
			-webkit-transition: .7s all ease;
			-moz-transition: .7s all ease;
			transition: .7s all ease;
		}
		#footer ul.social li:hover a i {
			font-size:250%;
			margin-top:-65%;
		}
		#footer ul.social li a,
		#footer ul.quick-links li a{
			color:#FFF; 
		}
		#footer ul.social li a:hover{
			color:#eeeeee;
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
	</style>
	<footer class="container" id="footer" style="margin-top: 30px; padding:20px; background-color:#4a4a4a;">
			
		<div class="row">			
			<div class="col-4">
				<h5>About Us</h5>
				<ul class="quick-links">
					<li><a href="#"><i class="fa fa-angle-double-right"></i>About</a></li>
					<li><a href=""><i class="fa fa-angle-double-right"></i>Terms & Con</a></li>
				</ul>
			</div>					
			<div class="col-4">
				<h5>Quick links</h5>
				<ul class="quick-links">
					<li><a href="javascript:void(0);"><i class="fa fa-angle-double-right"></i>info@example.com</a></li>
					<li><a href="javascript:void(0);"><i class="fa fa-angle-double-right"></i>About</a></li>							
				</ul>
			</div>
			<div class="col-4">
				<h5>Follow Us</h5>				
				<ul class="quick-links">
					<li> <a href="javascript:void(0);"><i class="fa fa-facebook"></i></a> </li>
					<li> <a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
				</ul>
			</div>
		</div>
		
		<div class="row">
			<div class="col-12 centreit" style="color: #fff; padding: 20px;">
				<div>
					<!-- <small> National  Corporation Ltd </small> -->
					<small>Copyright &copy Example Ltd. All right Reversed.
						<a href="https://www.fanos1.co.uk" target="_blank"><smaller> Website By Irfan</smaller> </a>
					</small>
				</div>				
			</div>
			<hr/>
		</div>	
				
	</footer>
			
	
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>	
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
			
			
			// --------- SLIDER  ----------					
			var slideIndex = 1;
			showSlides(slideIndex);

			function prevAndNext(n) {
			  showSlides(slideIndex += n);
			}

			function currentSlide(n) {
			  showSlides(slideIndex = n); // Reset slide to 1st, 2nd or 3rd image.
			}

			function showSlides(n) {			
			  var i;
			  var slides = document.getElementsByClassName("mySlides");
			  var dots = document.getElementsByClassName("dot");
			  
			  if (n > slides.length) {slideIndex = 1}	// Reset to 1st image. When user click NEXT, slideIndex is Incremented
			  if (n < 1) {slideIndex = slides.length}	// Reset to 3rs Image. slideIndex is decremnted when use clicks PREV. 
			  
			  // First hide all image
			  for (i = 0; i < slides.length; i++) {
				  slides[i].style.display = "none";  
			  }
			  
			  for (i = 0; i < dots.length; i++) {
				  dots[i].className = dots[i].className.replace(" active", "");
			  }
			  
			  slides[slideIndex-1].style.display = "block";  // OnPage Load, slides[0] is displayed		  
			  dots[slideIndex-1].className += " active";	// Add "active" CSS class
			}

			
			
			document.getElementById("irfan").addEventListener("mouseover", myStopFunction);
			document.getElementById("irfan").addEventListener("mouseout", resumeInterval);
					
			var track = 2; // Start from 2nd image. Because when page Loads, we already display 1st image
			
			function myFunction() {
					
				if(track > 3) {
					track = 1; // Reset to 1st. We have only 3 images.
				}			
				showSlides(slideIndex = track); 
				
				track++; 			
				//console.log("Incremented : " + track);
			}
			
			var myVar = setInterval(function() {myFunction();}, 4000);
			
			function myStopFunction() {
				clearInterval(myVar);
			}
			
			function resumeInterval() {
				myVar = setInterval(function() {myFunction();}, 4000);
			}
			// ---------------  End SLIDER --------------------
			
		

			  
		});
	</script>
	

	

	
	<?php wp_footer(); ?>

	
	<!-- analytics -->
	
	

	
</body>
</html>
