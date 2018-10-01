


   
   
    
   
     <hr/>
    <footer class="row">
        <div class="col-md-12">
            <nav> 
                <?php
                //wp_nav_menu( array('theme_location'=>'footer-menu') ); 

                if (has_nav_menu('my-footer-menu')) {                    
                    wp_nav_menu( array(
                        'theme_location'=>'my-footer-menu',
                        'after' => ' |'
                        //'menu' => 'Top Menu',
                        //'container' => 'div',
                        //'container_class' => 'top-menu'
                        //'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s<li><a href="http://www.mungos.org/">ST MUNGO\'S</a></li></ul>'
                        //'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>'
                    ) );                    
                }
                ?> 
            </nav>
        </div>        
    </footer>
     
    
     
    <hr/>    
    <div class="row">
        <div class="col-md-4" style="text-align: center;">
            <a href="http://www.dsa.gov.uk/" target="_blank">                
                    <img title="Driving Standars Agency Approved" alt="dsa_logo" src="<?php echo get_template_directory_uri(); ?>/images/dsa_logo.png"> 
                </a>
            </div>
            <div class="col-md-4"  style="text-align: center;">
                <a href="http://www.theadifederation.org.uk/" target="_blank">                
                    <img title="Driving Standars Agency Approved" alt="dsa_logo" src="<?php echo get_template_directory_uri(); ?>/images/adi_logo.png"> 
                </a>
            </div>
            <div class="col-md-4" style="text-align: center;">
                 <a href="https://www.gov.uk/pass-plus/overview" target="_blank">                
                        <img title="Driving Standars Agency Approved" alt="dsa_logo" src="<?php echo get_template_directory_uri(); ?>/images/pass_logo.png"> 
                    </a>
            </div>
                         
    </div><!-- row -->
    
    
    <div class="row">  
        <div class="col-md-12" style="padding-bottom: 1em; padding-top: 1em; text-align: center;">            
            <small>
                Copyright &copy; <?php echo date('Y'); ?>            
                <?php 
                    //echo '<a href="'.home_url().'" title="'.  bloginfo('name').'"> </a>'; 
                    //echo '<h3>'. home_url() . '</h3> //outpout::www.declondon.com ';
                ?>        
                <span>website by irfan</span>                
            </small>            
            <div>
                    <a href="https://plus.google.com/107710335377090820789/about">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/google-plus2.png" alt="google plus" />
                    </a>
            </div>
        </div>
    </div>  



        
</div><!-- main container -->   
        

    
    
    
    
    
    
    



    <!-- NIVO SLIDER -->
    <script type="text/javascript">       
        jQuery(window).load(function() {        
            jQuery('#slider').nivoSlider();
        });                
    </script>

<?php wp_footer(); ?>
</body>
</html>