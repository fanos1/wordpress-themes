<?php
/*
  Template Name: Front Page
 */

get_header();
?>

    <!-- Animated slider1 
    <div class="container-fluid hide-it">        
        <div class="row" id="slider-row">
            <div class="col-md-12" id="anim-container" >                                                
                <div class="panel">                              
                  <div class="title" id="title1">Extra Virgin</div>
                  <div class="title" id="title2">Greek Olive Oil</div>
                  <div id="olive-img"><img src="<?php //echo get_stylesheet_directory_uri(); ?>/img/olive-oil.png" alt="olive oil"/></div> 
                  <div id="olive-img2"><img src="<?php //echo get_stylesheet_directory_uri(); ?>/img/olive-oil-liokarpi03.png" alt="olive oil greek"/></div>
                </div>
            </div>
        </div>
    </div> 
    -->            

<div class="container">	
	<div class="col-12">
		<!-- <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/slide-1.jpg" alt="slider"/> -->
        <img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner1-1165x436.jpg" alt="slider"/>
        
	</div>
    
</div>



<div class="container">    
	<div class="col-12 centreit">
		<small>Amris Seeds Oil Limite</small> <br/>
		<small>Address number 2, N15 3BT - London</small> <br/>
		<small>Company No:</small>
	</div>
</div>


<!-- =============== 3 images ============= -->
<div class="container centreit">    
	<?php	
		// [featured_products per_page="12" columns="3"]	
		 echo do_shortcode('[featured_products per_page="3" columns="3"]'); // To use shortcode from template
	?>
</div>    

<br/>

	


 
<div class="container" id="aboutus">
	<hr/>
	<div class="col-2 centreit" style="border: 1px solid #eee;">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/coconut%20bottle.png">
		<h4>Virgin Oil</h4>            
		<a href="#" class="btn btn-success">Shop Now</a>
	</div>
	<div class="col-7" style="padding: 5px 22px 0px 22px;">
		
	
		<?php 
			// Display Page Excerpts Manually
			// Note, enable page excerpt in function.php File. By default, only post_type is enabled
			$args = array(
				'post_type' => array( 'page' ),
				'posts_per_page' => 10,
			); 
			// The Query
			$the_query = new WP_Query( $args );
						
			if ( $the_query->have_posts() ) 
			{
				while ( $the_query->have_posts() ) {
					$the_query->the_post();
					
					if(get_the_title() == "About Us") {						
						echo '<h3>'. get_the_title() . '</h3>';
						echo '<p>'. the_excerpt() . '</p>';
					}
				}
				
				wp_reset_postdata();
			} else {
				// no posts found
			}
			
		
		?>
		
	</div>
	<div class="col-3 centreit" style="border: 1px solid #eee;">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/the-british-herbal-medicine-association.jpg">
		<p>Member of </p>
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/BHMA.jpg">             
	</div>
	
</div>





<?php
get_footer();
//FRONT PAGE FOOTER HAS JAVASCRIP LIBRARY, WHICH WE DON'T WANT INCLUDED IN 2NDERY 
?>