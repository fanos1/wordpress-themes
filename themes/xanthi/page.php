<?php
/**
 * The template for displaying all pages
 * When user clicks a menu item such as HOME, which is of page format, WP will load page.php file. The URL for page request looks like: http://localhost/?page_id=2
 * If user requests a post, which is of pst format, WP will load single.php. The URL for post looks like: http://localhost/?p=4
 * -------------------
 * First, check if user is requesting the FRONT PAGE, which has different styling. 
 * if true, {load front-page.php} else {use page-content.php} for all other pages.
 */
get_header();
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            
            <?php        
            while (have_posts()) : the_post();            
                //get_template_part('content', 'page');
                //==============================
                //We display All pages from here, no need  for 'conten-page.php' file
                //========================================  
            
                //Titles will be inserted manually in every post, so titles are not outputted with the_title()
                //the_title( '<header class="entry-header"><h1>', '</h1></header>' );
                
                
                    the_content();
                
                
                /*
                wp_link_pages(array(
                    'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:', 'xanthi') . '</span>',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                ));
                 * 
                 */
                ?>

                <div><?php the_post_thumbnail(); //display featured image ?></div>
                

                <?php 
                // If comments are open or we have at least one comment, load up the comment template.
                /*******************
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }
                 * ****************
                 */
            endwhile;
            ?>
            
        </div>
        
        <!-- 
        <div class="col-md-3">
            <?php //get_sidebar();  ?>
        </div>        
        -->

    </div>        
</div><!-- containeer  -->



<?php   get_footer(); ?>
        
