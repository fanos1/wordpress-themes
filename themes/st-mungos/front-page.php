<?php
/*
Template Name: Front Page
*/


/*
* FRONT page will have a bit different HTML structure than ohter pages. So, we create another template for it. 
* All other pages will be served via the combination of index.php and 'loop.php' pages. index will get the 
* header, and loop will fetch content for the other pages. However, for front page, all that is done by this template.
*/
get_header(); ?>


<div id="sidebar-left-forfrontpage">
	<?php 
	if(is_front_page() ) {		
		 //dynamic_sidebar('xx') :: calls each of the active widget callbacks in order, which prints the markup for the sidebar		 
		if( !function_exists('dynamic_sidebar') || !dynamic_sidebar('front-page-left-column') ) {	
			//IF end user has NOT DROPPED ANY CONTENT INSIDE 'front-page-left-column' WIDGET, display nothing. 
			//This will not display the LEFT-WIDGET on the front page
		} 
	}//End if(is_front_page() ?>	
<p><a href="http://www.mungos.org/">
	<img src="<?php echo bloginfo('template_directory'); ?>/img/go-to-st-mungos.jpg" alt="go to st mungos main site" /></a></p> 
</div>




<div id="content-frontpage">
        
		<?php
        //echo "<h1>this is the index front page</h1>"; //outputs TRUE
            // The front page loop
            while ( have_posts() ) : the_post(); ?>                    
                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>                                                                
                   <!-- <h6 class="poststitle"><?php //the_title(); ?></h6> -->
                    <div class="entry entry-content">
                        <?php the_content(); ?>
                    </div>
                </div>
        <?php endwhile; ?>
        
</div><!-- #content-frontpage -->



<?php get_sidebar(); //the sidebar is floated to RIGHT, sidebar.php will hold the content of right column ?>
<div class="clearFloat"></div>
<?php get_footer(); ?>