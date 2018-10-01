<?php 
/* Template Name: Front Page */ 
get_header(); 
?>

	<main role="main" class="container">
		<!-- section -->
		<section>
            <div class="col-12">            
                
                
                <!-- SLIDER -->
                <style type="text/css">

                    img {vertical-align: middle;}

                    .slideshow-container {
                      max-width: 1170px;
                      position: relative;
                      margin: auto;
                    }

                    /* Hide the images by default */
                    .mySlides {
                        display: none;
                        /* None of images are displayed. When page loads first time, javascript changes 1st image to "display: block" */
                    }

                    .prev, .next {
                      cursor: pointer;
                      position: absolute;
                      top: 50%;
                      width: auto;
                      margin-top: -22px;
                      padding: 16px;
                      color: white;
                      font-weight: bold;
                      font-size: 18px;
                      transition: 0.6s ease;
                      border-radius: 0 3px 3px 0;
                    }

                    /* Position the "next button" to the right */
                    .next {
                      right: 0;
                      border-radius: 3px 0 0 3px;
                    }

                    /* On hover, add a black background color with a little bit see-through */
                    .prev:hover, .next:hover {
                      background-color: rgba(0,0,0,0.8);
                    }

                    /* Caption text */
                    .text {
                      color: #f2f2f2;
                      font-size: 15px;
                      padding: 8px 12px;
                      position: absolute;
                      bottom: 8px;
                      width: 100%;
                      text-align: center;
                    }

                    /* Number text (1/3 etc) */
                    .numbertext {
                      color: #f2f2f2;
                      font-size: 12px;
                      padding: 8px 12px;
                      position: absolute;
                      top: 0;
                    }

                    /* The dots/bullets/indicators */
                    .dot {
                      cursor: pointer;
                      height: 15px;
                      width: 15px;
                      margin: 0 2px;
                      background-color: #bbb;
                      border-radius: 50%;
                      display: inline-block;
                      transition: background-color 0.8s ease;
                    }

                    .active, .dot:hover {
                      background-color: #717171;
                    }

                    /* Fading animation */
                    .fade {
                      -webkit-animation-name: fade;
                      -webkit-animation-duration: 3s;
                      animation-name: fade;
                      animation-duration: 3s;
                    }

                    @-webkit-keyframes fade {
                      from {opacity: .3}
                      to {opacity: 1}
                    }

                    @keyframes fade {
                      from {opacity: .3}
                      to {opacity: 1}
                    }
                </style>

                <div class="slideshow-container" id="irfan">
                    <?php
                        // ------------ 
                        // SLIDER 
                        // -------------
                        $slider_query = new WP_Query( array ( 
                            'post_type' => 'kiss_slider', 
                            'posts_per_page' => '7', 
                            'orderby' => 'menu_order', 
                            'order' => 'ASC' ) 
                        ); 

                        if ($slider_query->have_posts()) 
                        { 
                            while ($slider_query->have_posts() ) 
                            {
                                $slider_query->the_post(); 
                                $post_thumb_id = get_post_thumbnail_id($post->ID); 
                                //ORIGINAL:: $slider_img_src = wp_get_attachment_image_src( $post_thumb_id, 'kiss_slider', false, '' );   
                                //$slider_img_src = wp_get_attachment_image_src( $post_thumb_id, 'post-thumbnails');//Pass 2nd param

                                $slider_img_src = wp_get_attachment_image_src( $post_thumb_id, 'slider-image');                                              
                                $url = $slider_img_src[0]; 

                                $target_link = get_post_meta(get_the_ID(), 'slide_target_link', true); 
                                //echo '<h3>'.$target_link.'</h3>'; //http://localhost/?page_id=19

                                if(has_post_thumbnail() ) 
                                { 
                                    /* 
                                    echo '<a href="'. $target_link .'" title="'. the_title_attribute() .'">';
                                            the_post_thumbnail('full'); // show image
                                            the_content();
                                    echo '</a>';
                                    */
                                   
                                    ?>

                                    <div class="mySlides fade">
                                        <div class="numbertext">1 / 3</div>					  	  	  
                                        <img class="img-responsive" src="<?php echo $slider_img_src[0]; ?>"	alt="<?php the_title(); ?>" />
                                        <div class="text">Caption Text</div>
                                    </div>


                                <?php 
                                }
                                else 
                                {
                                    echo '<img src="'. get_bloginfo('stylesheet_directory'). '/img/mydefault-banner.jpg" />';
                                }

                            } // End While
                        }
                    ?>


                    <a class="prev" onclick="prevAndNext(-1)">&#10094;</a>
                    <a class="next" onclick="prevAndNext(1)">&#10095;</a>

                </div>

                <br>

                <div style="text-align:center">
                    <span class="dot" onclick="currentSlide(1)"></span> 
                    <span class="dot" onclick="currentSlide(2)"></span> 
                    <span class="dot" onclick="currentSlide(3)"></span> 
                </div>      


            </div>
		</section>
		<!-- /section -->
        
        
        
        <!-- FEATURES -->
        <section>
            <div class="col-12">
                
                <style type="text/css">
                    #featured {
                        text-align: center;
                    }
                    #featured .row:first-child {
                        margin-top: 10px;
                    }
                </style>
                <div class="container" id="featured">     
                     <div class="row">
                        <div class="col-12">
                            <h2>Featured</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/categ-pic1.jpg" alt="image" class="img-responsive">
                            <p class="item-title">Product Title Here</p>
                            <div class="btn btn-custom">SHOP NOW</div>
                        </div>
                        <div class="col-4">
                          <img src="<?php echo get_template_directory_uri(); ?>/img/categ-pic2.jpg" alt="image"class="img-responsive">
                            <p class="item-title">Product Title Here</p>
                            <div class="btn btn-custom">SHOP NOW</div>
                        </div>
                        <div class="col-4">
                            <img src="<?php echo get_template_directory_uri(); ?>/img/categ-pic3.jpg" alt="image"class="img-responsive">
                            <p class="item-title">Product Title Here</p>
                            <div class="btn btn-custom">SHOP NOW</div>
                        </div>
                    </div>
                </div>

                
            </div>
        </section>
        
             
	</main>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
