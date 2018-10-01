
<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package storefront
 */

get_header(); 

// Posts use this file to display
?>


            




	<div class="row">
		
			<?php
				if (have_posts()) :                
					while (have_posts()) : the_post();
						/*
						 * get_post_format() looks for content-X.php to include, where X is the post format, fetched with get_post_formt()
						 * if the post in question is a regular post, it will just default to content.php. But, if it is as Gallery format
						 * the function will look for 'content-gallery.php' file. And should that not exist, it will default to 'content.php'
						 */
						// get_template_part('content', get_post_format()); //i will have only content.php for everything
				
						the_post();
						the_title( '<h3>', '</h3>' );
						the_content();
					endwhile;

				else :                
					//get_template_part('content', 'none'); //If more specific error needed create 'content-none.php' and include 
					echo "<h4>Sorry, but no posts found.</h4> <p>Please use our serch box to find content</p>";
					// get_search_form();
				endif;
			?>
		
	</div>




<?php  
// get_sidebar();
get_footer(); 
?>