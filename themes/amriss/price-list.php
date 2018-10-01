<?php
/*
  Template Name: Price List Page
 */

get_header();
?>
 

<div class="container">	
	<div class="col-12">		
		<img class="img-responsive" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/slide-1.jpg" alt="slider"/>
	</div>
    
</div>


<!-- =============== 3 images ============= -->
<div class="container">    
    <div class="col-2">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/seed-oil-bottle.png" alt="sees oil" />		
		<p>Seed oil</p>            
		<a href="#" class="btn btn-success" title="shop now page">SHOP NOW</a>  
    </div>
	<div class="col-7">		
		<?php 
			while ( have_posts() ) : the_post();
				
				// get_template_part( 'template-parts/content', 'page' );
				
				
				/* 
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				*/

				the_post();
				// the_title( '<h3>', '</h3>' );
				the_content();
				
				/* ======= 
				 to get specific page with id, use apply_filters() 
				 ========================
				$id=47; 
				$post = get_post($id); 
				$content = apply_filters('the_content', $post->post_content); 
				echo $content;  					
				*/
			endwhile;
			
			// get_sidebar( 'content-bottom' ); 
		?>
    </div>
	<div class="col-3">
		<form id="" method="post" action="">
		    <fieldset style="border: 1px solid #eee;">
				<legend style="font-weight: 700;">Request a call back:</legend>
				<br/>
			    <div class="form-group">
					<label class="sr-only" for="phone number">Phone Number</label>
					<input class="form-control" type="text" name="telephone" value="" placeholder="Phone Number"> 
			    </div>
			    <div class="form-group">
					<label class="sr-only" for="Last Name">Last Name</label>
					<input class="form-control" type="text" name="lastname" value="" placeholder="Last Name"> 
			    </div>
				 
				<div class="pull-right">
					<input class="btn btn-success" type="submit" value="Submit">
				</div>				
			</fieldset>                
		</form>         
    </div>
	
</div>    


<?php get_footer(); ?>