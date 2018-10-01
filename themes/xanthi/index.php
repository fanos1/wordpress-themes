<?php
/*
 * Fallback page. If page.php doesnt exists, Wordpress will load index.php. We will have page.php in our theme. 
 * But, having index.php is mandatory. So, we have it here just in case
 */

get_header();
?>

<div id="main-content" class="main-content">

    <?php    
    /*
    if ( is_front_page() && xanthi_has_featured_posts() ) {
            // Include the featured content template.
            get_template_part( 'featured-content' );
    }
     * 
     */
    ?>

<div class="container" role="main">
    
    <div class="row">
        <?php
        if (have_posts()) :                
            while (have_posts()) : the_post();

                /*
                 * Include the post format-specific template for the content. If you want to
                 * use this in a child theme, then include a file called called content-___.php
                 * (where ___ is the post format) and that will be used instead.
                 * ---------
                 * get_post_format() looks for content-X.php to include, where X is the post format, fetched with get_post_formt()
                 * if the post in question is a regular post, it will just default to content.php. But, if it is as Gallery format
                 * the function will look for 'content-gallery.php' file. And should that not exist, it will default to 'content.php'
                 */
                get_template_part('content', get_post_format()); //i will have only content.php for everything

            endwhile;
            
        else :                
            //get_template_part('content', 'none'); //If more specific error needed create 'content-none.php' and include 
            echo "<h4>Sorry, but no posts found.</h4> <p>Please use our serch box to find content</p>";
            get_search_form();
        endif;
        ?>
    </div><!-- row -->


    
    <?php get_sidebar('content'); ?>
</div>

<?php
get_sidebar();
get_footer();
