<?php
/*
  Template Name: Front Page
 */

get_header();
?>


    <!-- slider 
    <div class="container-fluid">
        <div class="row" id="slider-row" style="padding: 0 1em 1em 0.5em;  ">
            <div class="col-sm-6 col-md-6" style="margin-top: 2em;">                    
                <h1>Extra Virgin</h1>
                <h2>Greek Olive Oil</h2>                    
            </div>
            <div class="col-sm-6 col-md-6">
                <img src="<?php //echo get_stylesheet_directory_uri(); ?>/img/slider5.jpg" alt="slider"/>
            </div>
        </div>
    </div> 
    -->
    
    

    <!-- Animated slider1 
    <div class="container-fluid hide-it">        
        <div class="row" id="slider-row">
            <div class="col-md-12" id="anim-container" >                                                
                <div class="panel">                              
                  <div class="title" id="title1">Extra Virgin</div>
                  <div class="title" id="title2">Greek Olive Oil</div>
                  <div id="olive-img"><img src="<?php //echo get_stylesheet_directory_uri(); ?>/img/olive-oil.png" alt="olive oil"/></div> 
                  <div id="olive-img2"><img src="<?php //echo get_stylesheet_directory_uri(); ?>/img/olive-oil-liokarpi03.png" alt="olive oil greek"/></div>
                </div>
            </div>
        </div>
    </div> 
    -->            

    <!-- Animated slider2 -->
    <div class="container-fluid hide-it">        
        <div class="row" id="slider-row">
            <div class="col-md-12" id="anim-container">                                                                
                <div class="panel">                              
                  <div class="title" id="title1">FRESH NUTS</div>
                  <div class="title" id="title2">WHOLESALE PRICES</div>                  
                </div>
            </div>
        </div>
    </div> 




<!-- =============== 3 images ============= -->
<div class="container-fluid text-center bg-grey">
    
    <h2>Products</h2>
    <div class="row text-center">

        <div class="col-sm-4">
            <div class="thumbnail">
                <a href="http://www.alphina.co.uk/product-category/wholesale-nuts/" title="shop cheap greek nuts">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/walnuts-wholesale-jute-bag.jpg" alt="nuts greek cheap">
                </a>                
                <h3><strong>Organic Nuts</strong></h3>
                <p>Fresh and Organic Nuts</p>
                <a class="btn btn-success" href="http://www.alphina.co.uk/product-category/wholesale-nuts/" title="shop greek nuts"> SHOP NOW </a>
                <!--  <button type="button" class="btn btn-success">SHOP NOW</button>  -->
            </div>
        </div>
        <div class="col-sm-4">
            <div class="thumbnail">
                <a href="http://www.alphina.co.uk/product-category/greek-olive-oil/" title="shop greek olive oil">
                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/olive-oil-wholesale.jpg" alt="olive oil" />                    
                </a>                
                <h3><strong>Greek Olive Oil</strong></h3>
                <p>Extra Virgin Olive Oil</p>
                <a class="btn btn-success" href="http://www.alphina.co.uk/product-category/greek-olive-oil/" title="shop olive oil"> SHOP NOW </a>                
            </div>
        </div>
        <div class="col-sm-4">
            <div class="thumbnail">
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/greek-coffee-fresh.jpg" alt="Greek Fresh coffee" />                
                <h3><strong>Greek Coffee</strong></h3>
                <p>Fresh daily roasted kafekoptio coffee</p>                
                <button type="button" class="btn btn-success">SHOP NOW</button>  
            </div>
        </div>
    </div>
</div>    





<div class="container-fluid text-center bg-grey" id="front-page-texthumb">
    <hr />
    <!-- ========= text boxes =========== -->
    <div class="row text-center" id="content">
        <div class="col-sm-4">
            <div class="thumbnail">
                <h2>Wholesale  Olive Oil</h2>
                <p>We supply the best quality Greek olive oil in the UK. All our olive oils have less than 0.3 Acidity level.
                    Please get in touch if you need to order bulk quantity of quality olive oil. We promise the best quality.
                </p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="thumbnail">
                <h2>Wholesale Prices</h2>
                <p>All our products are offered to you with cheap wholesale prices. We never compromise from quality. Our products are 
                the best quality you can find. You save money by buying in bulk.</p>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="thumbnail">
                <h3>0.3 Acidity Level</h3>
                <p> Olive oil from Greece is superior to other olive oils because it contains a portion of good quality extra virgin olive oil.</p>
            </div>
        </div>
    </div>
</div>





<?php
get_footer();
//FRONT PAGE FOOTER HAS JAVASCRIP LIBRARY, WHICH WE DON'T WANT INCLUDED IN 2NDERY 
?>