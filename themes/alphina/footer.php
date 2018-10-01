

            <!-- FOOTER -->             
            <style type="text/css" scoped>
                footer a {
                    color: #fff;
                }
                div.form-group {
                    padding: 1em 0.5em 0 0.5em;
                }
                span.glyphicon {
                    color: #677E52;
                }
            </style>
                        
            <div class="row text-center" style="margin: 1em 0 1em 0;">                
                <div class="col-lg-4">
                    <span class="glyphicon glyphicon-grain"></span>
                    <span>FRESH NUTS</span>
                </div>
                <div class="col-lg-4">
                    <span class="glyphicon glyphicon-gbp"></span>
                    <span>WHOLESALE PRICES!</span>
                </div>                
                <div class="col-lg-4">
                    <span class="glyphicon glyphicon-heart"></span>                    
                    <span>HEALTHY EATING!</span>
                </div>
            </div>

            
            <div class="container-fluid text-left">                
                <div class="row" style="margin-top: 1em;">
                    <div class="col-md-12">                    
                        <img src="<?php echo get_stylesheet_directory_uri().'/img/banner2.jpg'; ?>" alt="greek farmer" style="max-width: 100%;" />
                    </div>
                </div> 
            </div><!-- continer fludi -->
            
            
            <footer>
                <div class="row" style="background-color: #677E52; color: #fff; padding: 1em 0 1em 0; margin-top: 1em;">   
                    <?php //  [irf_contact_form]; //DIDNT WORK.  ?>
                    <?php echo do_shortcode("[irf_contact_form]");  ?>
                    <!-- 
                    <div class="col-md-6">                                            
                        <form class="form-inline">                            
                            <div class="form-group">
                              <label for="exampleInputName2" class="sr-only">Name</label>
                              <input type="text" class="form-control" id="exampleInputName2" placeholder="Your Name">
                            </div>
                            <div class="form-group">
                              <label for="exampleInputEmail2" class="sr-only">Email</label>
                              <input type="email" class="form-control" id="exampleInputEmail2" placeholder="name.doe@example.com">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="3" cols="51"></textarea>
                            </div>
                            <br/>
                            <div class="form-group"><button type="submit" class="btn btn-default">Send </button> </div>
                        </form>
                    </div>
                    --> 
                    <div class="col-md-3">
                        <h5>INFORMATION</h5>
                        <ul class="list-unstyled">
                            <li>
                                <a href=" http://www.alphina.co.uk/about-us/"><i class="fa fa-caret-right padit"></i>About Us</a>
                            </li>                            
                            <li>
                                <a href="http://www.alphina.co.uk/privacy-notice/"><i class="fa fa-caret-right padit"></i>Privacy Notice</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3">
                        <h5>CONTACT US</h5>
                        <p>
                            <i class="fa fa-map-marker pull-left"></i> 
                            160 Commercial Road <br />
                            E1 1NL<br />
                            London, UK<br />                                
                        </p>
                        <p>
                            <i class="fa fa-envelope-o"></i>
                            <a href="#">info@alphina.co.uk</a>
                        </p>  
                    </div>                
                </div><!-- row -->
            
                <div class="row" style="background-color: black; color: #fff; padding: 5px 0 5px 0;">                
                    <div class="col-lg-12">
                        <small class="copyright"> Copyright @ 2016 Alphina Ltd.</small>
                        <span class="pull-right"><small>Site by irfan</small></span>
                    </div>
                </div>        
                
            </footer>
         
            

        </div><!-- MAIN CONTAINER -->


        
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script> 
        <?php  if( is_front_page() ) { ?>
                <script src="//cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js"></script>        
                <script type="text/javascript">                            
                //jQuery( document ).ready(function() {
                jQuery(document).ready(function($){     //Wordprees - pass ($) as param

                        var $container = $("#anim-container"),
                            width = $container.width(),
                            height = $container.height()
                            $thumbsImg = $(".thumbnail img")
                        ;
                        /*
                         * Call function at specified time. 
                         * --------------------------------
                         * If you don't care if the code within the timer may take longer than your interval, use setInterval()
                         * - setInterval(function, delay)

                         function myFunction() {
                             alert('hell');                 
                         }             
                         setInterval(myFunction, 3000); //Call myFunction() at every 3scnd
                         */                          

                        /*  
                        function first() {                    
                            var $titles = $(".title");                
                            var $oliveImg = $("#olive-img");  
                            var $oliveImg2 = $("#olive-img2");  
                            var $thumbs = $(".thumbnail");  

                            tl = new TimelineMax();
                            //tl = new TimelineLite( {onComplete:reverseHandler, onCompleteParams:['{self}'] } );
                            tl.staggerFrom($titles, 3, {scale:0, opacity:0, xPercent:-50, ease:SlowMo.ease.config(0.1, 1.2)}, 0.3, 0)                    
                              .from("#olive-img", 2, {x:800, scale:0,  ease:Back.easeOut } ) 
                              .from($oliveImg2, 1, {xPercent:100, scale:0, opacity:0,  ease:Back.easeOut } ) 
                              //.from($thumbs, 1, {xPercent:100, opacity:0, scale:0, ease:Back.easeOut}, 0.3, "-=2" )
                              .from($thumbs, 1, {opacity:0, scale:0, ease:Back.easeOut}, 0.3, "-=2" )

                              //Reverse animations
                              //.staggerTo([$titles, $oliveImg], 1, {x:-500, autoAlpha:0}, 0.3 )
                              //.staggerTo([$titles, $oliveImg, $oliveImg2], 1, {cycle:{x:[-500, 800, 800]}, autoAlpha:0}, 0.3, 10 ) //Delay 10scnds
                            ;                    
                            return tl;    
                        }
                        */
                       

                        function first() {                    
                            var $titles = $(".title");                
                            var $oliveImg = $("#olive-img");  
                            var $oliveImg2 = $("#olive-img2");  
                            var $thumbs = $(".thumbnail");  
                            //tl = new TimelineLite( { onComplete:completeHander} );

                            //tl = new TimelineLite();
                            tl = new TimelineMax();


                            //tl = new TimelineLite( {onComplete:reverseHandler, onCompleteParams:['{self}'] } );
                            tl.staggerFrom($titles, 2, {scale:0, opacity:0, xPercent:-100, ease:Back.easeIn}, 0.3, 0)                    
                              .from("#title2", 1, { x:5, ease:RoughEase.ease.config({strength:5, points:50}) }, "+=1")                              
                              .from($thumbs, 1, {opacity:0, scale:0, ease:Back.easeOut}, 0.3, "-=2" )

                              //Reverse animations
                            ;                    
                            return tl;    
                        }

                        var mainTimeline = new TimelineLite();
                        //var mainTimeline = new TimelineLite( {yoyo:true} );
                            mainTimeline
                                .from($container, 0.5, {autoAlpha:0})
                                .add(first(), "panel2")

                        
                        
                        //$( "#dataTable tbody tr" ).on( "click", function() {
                        $(".thumbnail img").on("hover", function() {
                            console.log( $( this ).text() );
                            //TweenLite.to(".thumbs img", 1, {scale:2, ease:Power1.easeOut} );
                        });


                    });    

                </script>
        <?php } ?>        
   
        
        <?php 
        // Difference between [wp_footer() and get_footer() ] 
        // These two functions accomplish two different things. wp_footer() is a hook used in your footer.php template file to ensure that 
        // the right code is inserted (from the core/plugins/etc) into the right place. get_footer() is used in your other template files to call 
        // for the code in your footer.php template file. So in simpler words wp_footer() gets other code that you most likely don't produce (but need)
        wp_footer(); 
        ?>
            
            
    </body>
</html>
