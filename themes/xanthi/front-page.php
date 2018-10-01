<?php
/*
  Template Name: Front Page
 */

get_header(); 
?>    

<!-- ============ NIVO SLIDER =========== -->
<!-- ============ NIVO SLIDER =========== -->
<div class="row">   
    <div class="col-md-12">
        <div class="slider-wrapper theme-default">             
            <div id="slider" class="nivoSlider">
                <?php 
                $slider_query = new WP_Query( array ( 
                    'post_type' => 'kiss_slider', 
                    'posts_per_page' => '7', 
                    'orderby' => 'menu_order', 
                    'order' => 'ASC' ) 
                ); 

                if ($slider_query->have_posts()) { 
                    while ($slider_query->have_posts()) : 
                        $slider_query->the_post(); 
                        $post_thumb_id = get_post_thumbnail_id($post->ID);  
						                      
                        //ORIGINAL:: $slider_img_src = wp_get_attachment_image_src( $post_thumb_id, 'kiss_slider', false, '' );                         
                        //$slider_img_src = wp_get_attachment_image_src( $post_thumb_id, 'post-thumbnails'); //Pass 2nd param
                        
                        $slider_img_src = wp_get_attachment_image_src( $post_thumb_id, 'slider-image');                                              
                        $url = $slider_img_src[0];                                                
                        
                        $target_link = get_post_meta(get_the_ID(), 'slide_target_link', true);                        
                        //echo '<h3>'.$target_link.'</h3>'; //http://localhost/?page_id=19            
                        
                        if(has_post_thumbnail() ) {
                            //var_dump(the_post_thumbnail() ); //null
                            //var_dump(the_post_thumbnail('post-thumbnail') );  //null                      
                        ?>     
                            
                            <!--
                            <a href="<?php //$target_link; ?>" title="<?php //the_title_attribute(); ?>" class="">                            
                                <?php                                     
                                //   the_post_thumbnail('full'); //show img                                    
                                //    the_content(); 
                                ?>                                
                            </a>                            
                            --> 
                            
                            
                            
                            <?php                                                                                   
                            if($slider_img_src[1] < 970 || $slider_img_src[2] < 310 ) { //NIVO image expects ALL images to be same size, DISPLAY IMAGE ONLY IF IT IS 970x310. Else if smaller, display Default image
                                
                                //echo '<img src="'. get_bloginfo('stylesheet_directory'). '/images/mydefault-big.jpg" />';
                                
                            } else { ?>
                            <a href="<?php echo $target_link; ?>" title="<?php the_title(); ?>">
                                    <img src="<?php echo $slider_img_src[0]; ?>" 
                                        data-thumb="<?php echo $slider_img_src[0]; ?>"
                                        alt="<?php the_title(); ?>"    
                                     />
                                </a>
                            <?php } ?>
                            
                            
                                
                            
                            <!--
                            <a href="<?php //echo $target_link; ?>">
                                <img src="<?php //echo $slider_img_src[0]; ?>"                                
                                    alt="<?php //the_title_attribute(); ?>" 
                                    width="<?php //echo $slider_img_src[1]; ?>" 
                                    height="<?php //echo $slider_img_src[2]; ?>"                                     
                                    title="#htmlcaption-<?php //the_ID();?>" />
                            </a>                            
                            -->
                        <?php
                        } else {
                            echo '<img src="'. get_bloginfo('stylesheet_directory'). '/images/mydefault-big.jpg" />';
                        }                    
                    endwhile; 
                    //echo "<h3>str85, TRUE</h3>";
                } else {
                    echo "<h3> NOT TRUE, STR86 DEBUG</h3>";
                }
                
                ?>                
            </div>
        

            <?php   
            /*
            if ($slider_query->have_posts()) { 
                while ($slider_query->have_posts()) {
                    $slider_query->the_post(); 
                    $target_link = get_post_meta(get_the_ID(), 'slide_target_link', true);                          
                    echo 
                    '<div id="htmlcaption-'.the_ID().'" class="nivo-html-caption">
                         <h2><a href="'.$target_link.'">' . the_title(). '</a></h2>'.
                         the_content() .'
                    </div>';               
                }        
            }
             * 
             */         
            ?>

        </div><!-- slider-wrapper --> 
    </div>    
</div>






<?php 
/*==========================
 * 3 front page posts
 * ===============
Retrieve X number of posts per category via WP_Query
https://wordpress.org/ideas/topic/retrieve-x-number-of-posts-per-category-via-wp_query

$query = new WP_Query('cat=1,2,3,4,5&posts_per_category=5');
This query would retrieve the 5 latest posts from each category passed to the 'cat' parameter. In this case, 
5 categories with 5 posts each would return 25 posts.
Example: http://codex.wordpress.org/Class_Reference/WP_Query
 * 
 */
?>  
<div class="row"  id="post-<?php the_ID(); ?>">   
    <?php  
    //OFFSETMEDIA::  $query2 = new WP_Query('cat=5');  
    //lOCAL SERVER:: $query2 = new WP_Query('cat=7'); 
    $query2 = new WP_Query('cat=3');  //SITEGROUND:: CategoryName: front page block1

    while($query2->have_posts() ) 
    { 
        $query2->the_post();   ?>
         <article class="col-md-4">
             <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="box1">
                 <h1 style="font-size:26px;"><?php the_title(); ?></h1>                     
             </a>  
             <?php  the_excerpt(); ?>   
        </article>  
    <?php         
    } 
    wp_reset_postdata();
    ?>        

</div>


<hr />

<!-- 
======================
3 images start here
====================
-->
<div class="row">
    
        
    
    <style type="text/css">
            /* thumbanil box */
            .box {
                    width:310px;
                    float:left;  		   
                    margin:0.5em;
                    border: 5px solid #CCC;
                    box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.1);
            }
            .parent {
                    position:relative;
                    width:300px;
                    height:220px;
                    z-index:1;
                    overflow:hidden;                   
            }
            .childbox {
                    opacity:0; /* visibility:hidden; */
                    position:absolute;
                    width:300px;			
                    margin-top:-100px;
                    background:#fff;	
                    z-index:2; /* this div should be on top of the parent, in this way we can apply :hover on this */

                    top:0px;
                    left:0px;
                    transition: all 1s;	
            }
            .parent:hover .childbox {
                    opacity:1; /* OPACITY is like :visibility or :hidden. Unlike :visibility, opacity  property can be transitioned */
                    margin-top:0;
                    height:200px;		
            }

            </style>
            
    <?php
    //$query1 = new WP_Query('cat=2');    
    $query1 = new WP_Query('cat=2'); //SITEGROUND

    if ($query1->have_posts()) { 

        while ($query1->have_posts()) {            
            $query1->the_post();  
            $post_thumbnail_id = get_post_thumbnail_id($post->ID);               
            $thumb = wp_get_attachment_image_src( $post_thumbnail_id, 'medium');            
            $url = $thumb[0];            
            
            
            if ( has_post_thumbnail() ) {  
                //the_post_thumbnail();
            ?> 
                <div  class="col-md-4">                

                        <div class="parent center-block">            
                            <p style="text-align:center;">
                                <a href="#"><img src="<?php echo $url; ?>" alt=""></a>
                            </p>

                            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                <div class="childbox" style="text-align:center;">                    
                                    <p style="text-align: left; padding: 1em;">                                    
                                        <?php echo substr(get_the_excerpt(), 0,300); ?>
                                    </p>                                               
                                </div>                
                            </a>                            
                        </div>
                        
                    <div class="center-block" style="position: relative; overflow: hidden; width: 300px; z-index: 1; "> 
                               <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"> 
                                <h4 style="background-color: red; text-align:center; color: #fff; width: 300px; padding: 0.5em;"><?php the_title() ?></h4> 
                            </a>     
                        </div>
                        

                </div>
            
            <?php } else { 
                    echo '<img src="' . get_bloginfo( 'stylesheet_directory' ) . '/images/mydefault.jpg" />';              
            } ?>
            

        <?php }//while ?>

    <?php 
    } else {echo "<h3>No post found</h3>";}    
    wp_reset_postdata(); 
    ?>
 
</div><!-- row -->     






<?php 
get_footer(); 
//FRONT PAGE FOOTER HAS JAVASCRIP LIBRARY, WHICH WE DON'T WANT INCLUDED IN 2NDERY 
//PAGES.
//OS HARD CODE FOOTER HERE INSTEAD OF INCLUDING FOOTER
?>


