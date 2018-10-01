<?php
/*
  Template Name: Testimonials
 */

get_header(); 


/*==========================
Retrieve X number of posts per category via WP_Query
https://wordpress.org/ideas/topic/retrieve-x-number-of-posts-per-category-via-wp_query

$query = new WP_Query('cat=1,2,3,4,5&posts_per_category=5');
This query would retrieve the 5 latest posts from each category passed to the 'cat' parameter. In this case, 
5 categories with 5 posts each would return 25 posts.
Example: http://codex.wordpress.org/Class_Reference/WP_Query
 * 
 */
?>  

<!--  
<div class="row">   
    <?php  
    /* 
    $query2 = new WP_Query('cat=3');  

    while($query2->have_posts() ) 
    { 
        $query2->the_post();   ?>
         <article class="col-md-4">
             <a href="<?php the_permalink(); ?>" title="<?php //the_title_attribute(); ?>" class="box1">
                 <h1 style="font-size:26px;"><?php the_title(); ?></h1>                     
             </a>  
             <?php  //the_excerpt(); ?>   
        </article>  
    <?php         
    } 
    //wp_reset_postdata();
     * 
     */
    ?>        
</div>  
-->


<hr />


<?php
$query1 = new WP_Query('cat=7'); //Testimonial Category

if ($query1->have_posts()) { 

    while ($query1->have_posts()) {     
        
        $query1->the_post();  
        
        $post_thumbnail_id = get_post_thumbnail_id($post->ID);               
        $thumb = wp_get_attachment_image_src( $post_thumbnail_id, 'medium');            
        $url = $thumb[0];    ?>

        <div class="row"> 
            <div  class="col-md-12">    
                <?php
                //if ( has_post_thumbnail() ) {
                    echo "<h3>hiiiii</h3>";
                    the_post_thumbnail();   ?> 
                    <span style="text-align:left;">
                        <img class="irfan" src="<?php echo $url; ?>" alt="">
                    </span>

                <?php //} ?>

                <span style="text-align:left;">                                                
                    <?php //the_permalink(); ?>
                    <?php the_content(); ?>
                </span>

            </div>
        </div><!-- row -->    
<?php }//while ?>

<?php 
} else {echo "<h3>No post found</h3>";}    
wp_reset_postdata(); 
?>






<?php 
get_footer(); 
//FRONT PAGE FOOTER HAS JAVASCRIP LIBRARY, WHICH WE DON'T WANT INCLUDED IN 2NDERY 
//PAGES.
//OS HARD CODE FOOTER HERE INSTEAD OF INCLUDING FOOTER
?>


