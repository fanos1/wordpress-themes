<?php
// we will keep most of our loops in this file (loop.php template). All get_template_part() calls, which 
// are used to include the loop, (much like get_sidebar() is used to include the sidebar.php template file), are
// pointing to a specific loop template file for each template respectively. 

// IN other words, the index.php template points to loop-index.php, whereas page.php points to loop-page.php, and so on.
// whenever the specific loop template file is missing, WordPress will try loop.php, and that's what we have in here.
// we are doing this in this way to make it easy to pinpoint specific template file loops in child themes.

/* IF no posts to show, the famous 404 error message */
if ( ! have_posts() ) :  ?>
	<div id="post-0" class="post error404 not-found">
		<h5 class="entry-title"><?php __( 'Page Not Found', 'semi-static' ); ?></h5>
		<div class="entry-content">
			<p><?php
				// Error message output (localized)
				__( 'There is nothing here, besides this page which will tell you no more than that. 
					Why not try and search for whatever it was you were looking for?', 'semi-static' );?>
            </p>
			<?php //get_search_form(); ?>
		</div><!-- .entry-content -->
	</div>
<?php endif; 



/*
* I am using different template for the FRONT PAGE (front-page.php). 
* So, this while loop below is for the  other pages. The FRONT page has its 
* own while() loop which gets content from database(see the front-page.php file)
*/
if( !is_front_page() ) 
{ 	
  while ( have_posts() ) : 
  
	  the_post();//Iterate the post index in The Loop. Retrieves the next post, sets up the post, sets the 'in the loop' property to true.
	  //NOTE: if you don't have the_post() @ this point, the while() loop continues to loop infinitely
	  
	  /*-------------------------------------------------------------------
	   DELETED A LOT OF CODE HERE, SEE THE ORIGINAL loop.php file
	  --------------------------------------------------------------------*/	
	  
	  /*-----------------------------
	  is_page():	When any Page is being displayed. 
	  is_home():	When the main blog page is being displayed.
	  is_front_page():	When the front of the site is displayed, whether it is posts or a Page. 
	  is_singel():	When any single Post (or attachment, or custom Post Type) page is being displayed.
	  is_singular():	checks if a singular page is being displayed. Singular page is when any of the following return true: is_single(), is_page() or is_attachment().
	  is_archive():	checks if any type of Archive page is being displayed. An Archive is a Category, Tag, Author or a Date based pages.
	  is_search():	checks if search result page archive is being displayed. NOTE: is_search()  is located in wp-includes/query.php. 	
	  ------------------------------*/ ?>	
    
      <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              
              <!-- 
              WE DON'T WANT TITLES, USER WILL INPUT THEM VIA text editor Plugin
              <h1 class="poststitle"><?php //the_title(); ?></h1>
			  -->
              
              <div class="postscontent">
				  <?php the_content(); 				 
					/*--------------------------------------
						I HAVE DELETED wp_link_pages() HERE
					--------------------------------------- */ 
				  ?>
              </div><!-- .postscontent -->
              
              
              <?php // Let's check to see if the comments are open
              if (comments_open()) { ?>             	
                  <div class="posts-meta">
                      <span class="comments-link">
                      <?php echo __('There are:', 'simple-static'); ?> 
					  <?php comments_popup_link( __( 'no comments - pitch in!', 'semi-static' ), __( '1 comment', 'semi-static' ), __( '% comments', 'semi-static' ) ); ?>
                      </span><!-- .comments-link -->
                      
                      <?php 
					  /**
					  * @edit_post_link(): 
					  * Displays a link to edit the current post, if a user is logged in and 
					  * allowed to edit the post. It must be within The Loop. 
					  */
					  edit_post_link( 
					  		__( 'Edit', 'semi-static' ), 
							'<span class="meta-sep">|</span> <span class="edit-link">', '</span>' 
						); 
					  ?>
                  </div><!-- .posts-meta -->
              <?php } ?>
              
       </div><!-- #post-ID  also .post_class() -->



	  	<?php
		//If the comments are open we'll need the comments template. taken from TwentyEleve temp
		if (comments_open()) {
			comments_template( '', true );
		}
		
		//comments_template( '', true );
		
	endwhile;  
	
}//end if()	?>



