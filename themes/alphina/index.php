<?php get_header(); 
//index.php is the defacto fallback for all template files WordPress might look for. All the rest are entirely optional 
?>


        <!-- slider -->
        <div class="container-fluid">
            <div class="row" id="slider-row" style="padding: 0 1em 1em 0.5em; ">
                <div class="col-sm-6 col-md-6" style="margin-top: 2em;">                    
                    <h1>Extra Virgin</h1>
                    <h2>Greek Olive Oil</h2>                    
                </div>
                <div class="col-sm-6 col-md-6">
                    <img src="./img/slider5.jpg" alt="slider"/>
                </div>
            </div>
        </div> 
    
            



        <div class="container-fluid text-center bg-grey" id="front-page-texthumb">

            <div class="row text-center">
                <div class="col-sm-12">
                    <?php
                        if (have_posts()) :                
                            while (have_posts()) : the_post();
                                /*
                                 * get_post_format() looks for content-X.php to include, where X is the post format, fetched with get_post_formt()
                                 * if the post in question is a regular post, it will just default to content.php. But, if it is as Gallery format
                                 * the function will look for 'content-gallery.php' file. And should that not exist, it will default to 'content.php'
                                 */
                                // get_template_part('content', get_post_format()); //i will have only content.php for everything
                        
                                the_post();
                                the_title( '<h3>', '</h3>' );
                                the_content();
                            endwhile;

                        else :                
                            //get_template_part('content', 'none'); //If more specific error needed create 'content-none.php' and include 
                            echo "<h4>Sorry, but no posts found.</h4> <p>Please use our serch box to find content</p>";
                            // get_search_form();
                        endif;
                    ?>
                </div>
            </div>

        </div>


           

<?php  
get_sidebar();
get_footer(); 
?>