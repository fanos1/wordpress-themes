<?php
/*
 * if the theme doesnt have SEARCH.PHP file, the index.php file will be used.
 * This page displayes results to user who searched.
 */

get_header();
?>

<div class="container">

    <?php 
    if ( have_posts() ) { ?>
    
        <header class="page-header">
            <h1 class="page-title">
                <?php 
                //get_search_query() :: Retrieve the contents of the search WordPress query variable.
                printf( __( 'Search Results for: %s', 'xanthi' ), get_search_query() );                 
                ?>
            </h1>
        </header> 
    
    <?php 
        while ( have_posts() ) : 
            the_post();    
            get_template_part( 'content', get_post_format() );    
            
            //get_template_part( 'content', 'search' );
			
        endwhile;

        // Previous/next post navigation.
       //xanthi_paging_nav();    
        
    } else {
	echo 'No data returned';
    }

    get_sidebar();
    ?>    
    
</div><!-- container -->


<?php 
get_footer(); 


/*
 * if we dont use search.php page, add following script to index.php file
 * if() //if it is search result
 * {
 *     the_search_query();
 * }
 */
?>
