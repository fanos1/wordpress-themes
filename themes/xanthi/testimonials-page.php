<?php
/*
  Template Name: Testimonials Page
 */
get_header(); 
?>    

<!-- ============ TESTIMONIALS SLIDER =========== -->
<!-- ============ TESTIMONIALS SLIDER =========== -->

    <?php 
    $slider_query = new WP_Query( array ( 
        'post_type' => 'kiss_testimonials', 
        'posts_per_page' => '7', 
        'orderby' => 'menu_order', 
        'order' => 'ASC' ) 
    ); 

    if ($slider_query->have_posts()) {
        
        echo "<h1>What our learner drivers say</h1>";

        while ($slider_query->have_posts()) :
            
            echo '<div class="row">';
        
                $slider_query->the_post(); 
                $post_thumb_id = get_post_thumbnail_id($post->ID);                                    
                $slider_img_src = wp_get_attachment_image_src( $post_thumb_id );                                              
                $url = $slider_img_src[0];                                            
                $target_link = get_post_meta(get_the_ID(), 'testimon_target_link', true);                        

                if(has_post_thumbnail() ) { 
                    echo '<div class="col-md-4">';
                        the_post_thumbnail(); //show img, default size is 'post-thumbnail'                                                
                    echo '</div>';
                    
                    echo '<div class="col-md-8">';
                        the_content();                 
                    echo '</div>';

                } else {
                    echo '<div class="col-md-12">';
                        the_content();                 
                    echo '</div>';
                }               
                
            echo '</div>'; //<div row>
            echo '<hr/>';
            
        endwhile; 
        //echo "<h3>str85, TRUE</h3>";
    } else {
        echo "<h3> testimonials-page STR86 </h3>";
    }


//FOOTER
get_footer(); 
?>


