<?php
/*this file contains all the necessary code for the sidebar. We could have created several sidebars here, 
* but there is really no need. The code separates the various sidebar views with conditional tags. 
*/ 
?>

<div id="right-sidebar-container">
	<?php    
		
		 
				
	  /*------------------------------------------------------------- 
	  Deleted some part, ORIGINAL sidebar.php FILE 
		
	  is_page():		When any Page is being displayed. 
	  is_home():		When the main blog page is being displayed.
	  is_front_page():	When the front of the site is displayed, whether it is posts or a Page. 
	  is_singel():		When any single Post (or attachment, or custom Post Type) page is being displayed.
	  is_singular():	checks if a singular page is being displayed. Singular page is when any of the following return true: 
	  					is_single(), is_page() or is_attachment(). with is_singular() you can get to both single posts and single pages. 
	  is_archive():		checks if any type of Archive page is being displayed. An Archive is a Category, Tag, Author or a Date based pages.
	  is_search():		checks if search result page archive is being displayed. NOTE: is_search()  is located in wp-includes/query.php. 	
	  -----------------------------------------------------------*/
		
		// We want to show the right sidebar for the right area
		if ( is_front_page() ) {	
			//if no content in 'front-page-right-column' exists, display nothing		
    		if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('front-page-right-column') ) {
			
			}  
						
		} 
		/*---------- 
		NO NEED TO DISPLAY THE BLOG CONTENT IN THE RIGHT-COLUMN IF USER IS VISITING THE BLOG PAGE.
		-------------
		elseif ( is_category('news') || in_category('news') ) {
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('news-right-column') ) {}
			
		} elseif ( is_category('blog') || in_category('blog') ) {
			// if it is related to the Blog category, widget empty by default
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('blog-right-column') ) : endif; 
			
		} 
		*/
		elseif ( is_page() ) {
			//if no content in 'pages-column' exists, display nothing
			//if no content in 'otherpage-right-column' exists, display nothing
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('pages-column') ) : endif; 
			
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('otherpage-right-column') ) : endif; 
			
		} else {
			//if no content in 'right-column-fallback' exists, display nothing
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('right-column-fallback') ) : endif; 
		}												
								
		 
		/*
		// Showing latest NEWS posts on front page Only 
		if ( is_front_page() ) { ?>
        
			<div class="irfan-box widget">
				<h3>News</h3>
				<ul>
					<?php
					// Let's get the latest News posts with a loop
					$news_query = new WP_Query( array(
						'category_name' => 'news', 
						'posts_per_page' => 2)
					);  										
					// Any posts? get them
					if ($news_query->have_posts()) { 						
						while ($news_query->have_posts()) :
							$news_query->the_post(); //does not return value, but need to be called to prepare next pst ?>
							<li class="latest-box-story">
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<?php the_excerpt(); ?>
							</li>
						<?php endwhile;  ?>                        
					<?php } //if() ?>
				</ul>
			</div><!-- end .irfan-box -->
		<?php }//if() 
		*/
		
		
		/*--
		// Showing latest Blog posts on front page Only
		if ( is_front_page() ) { ?>
			<div class="irfan-box widget">
				<h3>Latest blog posts</h3>
				<ul>
				<?php
					// Let's get the latest News posts with a loop
					$news_query = new WP_Query(array(
						'category_name' => 'blog', 
						'posts_per_page' => 2)
					); ?>
					<?php 
						// Any posts? Yay, let's loop 'em!
						if ($news_query->have_posts()) { ?>
						<?php while ($news_query->have_posts()) : 
								$news_query->the_post(); ?>
								<li class="latest-box-story">
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
								<?php the_excerpt(); ?>
								</li>
						<?php endwhile; // Loop ends ?>
					<?php } ?>
				</ul>
			</div><!-- end .irfan-box -->
		<?php }//if() 
		--*/
		?>
    
	<!-- external link -->

</div><!-- end #right-sidebar-container -->
