
<?php
/**
 * this page will display POSTs. For example, we have a post for intensive course. We also have a page for intensive course.
 * The page is displayed with page.php and the post is displayed with this file (sinlge.php)
 */
get_header();
?>

<div class="row">        
	<div class="col-md-12">                          
		<?php        
		while (have_posts()) : the_post();
			//get_template_part('content', get_post_format());             
			//get_template_part('content', 'single'); //include 'content-single.php'                 
			
			//echo '<h1>'. the_title(). '</h1>';
			
			/*
			if(is_single() ) {             

				// If comments are open or we have at least one comment, load up the comment template.            
				if (comments_open() || get_comments_number()) {
					// The comment template will be 'comments.php' File, which we use to style our comments
					comments_template();
				}

				//Show categories and tags on sigle posts
				if(is_singular()) {
					echo 'Filed in '; 
					the_category(', ');
					the_tags(' and tagged with ', ', ', '');
				}

			}
			* 
			*/
			the_content();
		endwhile;
		?>
	</div>
	
</div>
    


<?php
get_footer();
