<?php

/*
 * extend the walker_nav_menu class, so that we can add Bootstrap CSS class
 */
class Child_Walker_Top_Menu extends Walker_Nav_Menu  
{  
    /*
     * This method is run when the walker reaches the start of a new "branch" in the tree structure. Generally, this method is used * to add the opening tag of a container HTML element (such as <ol>, <ul>, or <div>) to $output
    */
    function start_lvl( &$output, $depth = 0, $args = array()) {        
        
        $indent = str_repeat("\t", $depth);        
        //echo "<h1>$output</h1>";        
        $output .= "\n$indent<ul class=\"child-ul -".$depth."\">\n";
    }    
   
    /*  
     =======================
        Abstract Methods :: 
        These methods are abstract and should be explicitly defined in the child class, as needed. Also note that $output is passed by reference, so any changes made to the variable within the following methods are automatically handled (no return, echo, or print needed). 
     ===================================
     
     
     end_lvl( &$output, $depth = 0, $args = array() ) 
     ----------------------------------------------
     * "End Level". This method is run when the walker reaches the end of a "branch" in the tree structure. Generally, this method
     * is used to add the closing tag of a container HTML element (such as </ol>, </ul>, or </div>) to $output.
     
     ----------------------
      start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) 
      -------------------------
     * "Start Element". Generally, this method is used to add the opening HTML tag for a single tree item (such as <li>, <span>, or 
     * <a>) to $output.
     
     
      end_el( &$output, $object, $depth = 0, $args = array() ) 
      ---------------------------------------------------
     * "End Element". Generally, this method is used to add any closing HTML tag for a single tree item (such as </li>, </span>, or 
     * </a>) to $output. Note that elements are not ended until after all of their children have been added.
     
     
     =====================================
     PUBLIC METHODS ::
     These methods are defined by the parent class and may be called from within child methods as needed. 
     ===================
     
    
    */
    

    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {	  
        // Generally, this method is used to add the opening HTML tag for a single tree item (such as <li>, <span>, or <a>) to $output.
        
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
            
            $class_names = $value = '';
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            //ORIGINAL:: $classes[] = 'menu-item-' . $item->ID;
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class-one', array_filter( $classes ), $item, $args ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
            //ORIGINAL:: $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            //ORIGINAL:: $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
                        
            $bootstrap_class = '';
            $bootstrap_caret = '';
            $bootstrap_Li = '';
			$topLevel_a = '';
            $bootstrap_Li2  = '';
			$caret = '';
            
            $myArr = get_object_vars($item); //Gets the properties of the given object  
			

            foreach ($myArr as $key => $v) {
						
                if(is_array($v)) {
					
					/*array(9) {
					  [0]=>  string(0) ""
					  [1]=>  string(9) "menu-item"
					  [2]=>  string(24) "menu-item-type-post_type"
					  [3]=>  string(21) "menu-item-object-page"
					  [4]=>  string(14) "menu-item-home"
					  [5]=>  string(17) "current-menu-item"
					  [6]=>  string(9) "page_item"
					  [7]=>  string(12) "page-item-16"
					  [8]=>  string(17) "current_page_item"
					}*/
					
                    //We are searching for the has-children PROPERTY OF $item OBJECT
                    foreach ($v as $k => $j) {   						
					
                        //strcasecmp($str1, $str2) :: Binary safe case-insensitive string comparison; Returns < 0 if str1 is less than str2; > 0 if str1 is greater than str2, and 0 if they are equal. 
                        if(strcasecmp($j, 'menu-item-has-children') == 0) 
						{                                                        
                            // $bootstrap_class .= ' class="dropdown-toggle" data-toggle="dropdown"';                           
                           //  $bootstrap_caret .= ' <b class="caret"></b>';
                            // $bootstrap_Li .= ' class="dropdown1"';
							$topLevel_a .= ' class="dropbtn"';
							// $caret .= '<span id="caret"> &#9660;</span>';
							$caret .= '<span id="caret"> &#8250;</span>';
							
                        }
                        $bootstrap_Li2 = ' class="dropdown" id="irf"';
                    }
					
                }
            }
					
            //====== <li> =============
            //ORIGINAL:: $output .= $indent . '<li' . $id . $value . $class_names .'>';            
            //$output .= $indent . '<li' . $id . $value . $bootstrap_Li. '>';	        
           $output .= $indent . '<li'. $bootstrap_Li2 .  '>';	        
             
            
            
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';        
            
            //============ <a> ================
            $item_output = $args->before;            
            //ORIGINAL::: $item_output .= '<a'. $attributes .'>';
            // $item_output .= '<a'. $attributes. $bootstrap_class .'>';			
			$item_output .= '<a'.$attributes. $topLevel_a. '>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;		            
            // $item_output .= $bootstrap_caret; //Added extra
			$item_output .= $caret; //Added extra
            $item_output .= '</a>';			
            $item_output .= $args->after;
            //$item_output .= '<li>IRFA</li>';
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
             
}


/**
 * Alphina setup.
 *
 * Set up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support post thumbnails.
 */
if ( !function_exists( 'alphina_setup' ) ) {    
    
    function alphina_setup() {    
	
        // Add RSS feed links to <head> for posts and comments.
         add_theme_support( 'automatic-feed-links' );
        
		
		/*
		 * Enable support for Post Thumbnails, and declare two sizes.
		 * Featured images (also sometimes called Post Thumbnails) are images that represent an individual Post, Page, or Custom Post Type
		*/        
		add_theme_support( 'post-thumbnails' );	
        set_post_thumbnail_size( 360, 260, true );   
        
		add_image_size( 'slider-image', 970, 310, true ); //Registers a new image size. This means WordPress will create a copy of the image with the specified dimensions when a new image is uploaded        
        // add_image_size( 'testimonial-image', 500, 310, true ); //Registers a new image size. This means WordPress will create a copy of the image with the specified dimensions when a new image is uploaded        
        
	
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to provide it for us.
		 * 
		 * title-tag support is now required for all themes. We keep a back-compatibility policy of two versions, 
		 * and the title tag feature was added in WordPress 4.1.
		 * you simply need to add a single line within your theme setup function, which would look something like the following.
		 * Make suer the following line is not in your header.php FILE 
		 * =>> <title><?php wp_title( '|', true, 'right' ); 
		*/
		add_theme_support( 'title-tag' );

		
		// By default, excerpts in WordPress are only available for posts
		// We want to add excerpt support for pages as well 
		add_post_type_support( 'page', 'excerpt' );
        
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		// add_theme_support( 'post-thumbnails' );
		// add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );
		// add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );
        
		
		//---------------------
		// MENU AREA
		//-------------------
		register_nav_menus( 
			array(
				'top-menu' => __( 'Top Menu', 'amris' ),                
				'footer-left-menu' => __( 'Footer Left Menu', 'amris' )
			) 
		);
		
        
		//Switch default core markup for search form, comment form, and comments to output valid HTML5.	
		add_theme_support( 'html5', array(
			'search-form', 
			'comment-form', 
			'comment-list', 
			'gallery', 'caption'
		) );
		
		// Add theme support for Custom Logo.
		add_theme_support( 'custom-logo', array(
			'width'       => 180,
			'height'      => 144,
			'flex-width'  => true,
		) );		
        
			
		/* 
			//Enable support for Post Formats. See http://codex.wordpress.org/Post_Formats
			add_theme_support( 'post-formats', array(
				'aside', 
				'image', 
				'video', 'audio', 
				'quote', 'link', 'gallery',
			) );
		*/
        
        
        //-------------------------
        // WIDGET AREAS :: We will set up this in another function below. We could set it here
        // ------------------------
        /*
        register_sidebar( array(
                'name' => __( 'Other Page Right Column', 'xanthi' ),
                'id' => 'other-page-right-column',
                'description' => __( 'The right column on other page.', 'xanthi' ),
                'before_widget' => '<div id="otherpage-right-column" >',
                'after_widget' => '</div>',
                'before_title' => '<h4 class="widget-title">',
                'after_title' => '</h4>'	
        ) );
        */

    }
    
    /*
     * WooCommerce Support     
     */
	 add_theme_support('woocommerce');
	 
	 
	 // WooCommerce Product gallery features (zoom, swipe, lightbox) 
	 // https://docs.woocommerce.com/document/woocommerce-theme-developer-handbook/	  
	 //In versions 3.3+, the gallery is off by default for WooCommerce compatible themes unless they declare support for it (below).	 
	 // To enable the gallery in your theme, you can declare support like this:
	 // add_theme_support( 'wc-product-gallery-zoom' );
	// add_theme_support( 'wc-product-gallery-lightbox' );
	// add_theme_support( 'wc-product-gallery-slider' );

}
add_action( 'after_setup_theme', 'alphina_setup' );




//=======================
//Register widget areas.
//=======================
function xanthi_widgets_init() {
    
	//-------------------------
	// WIDGET AREAS
	// ------------------------
	// Right column widget area on front page (default output on items)
	register_sidebar( array(
			'name' => __( 'Other Page Right Column', 'xanthi' ),
			'id' => 'other-page-right-column',
			'description' => __( 'The right column on other page.', 'xanthi' ),
			'before_widget' => '<div id="otherpage-right-column" >',
			'after_widget' => '</div>',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'	
	) );

	/*
	register_sidebar( array(
			'name'          => __( 'Primary Sidebar', 'twentyfourteen' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Main sidebar that appears on the left.', 'twentyfourteen' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
	) );
	 * 
	 */
        
}
add_action( 'widgets_init', 'xanthi_widgets_init' );

/*
 * If you’re building a theme it may be useful to make this pluggable for other developers. When included in your theme, other developers will be able to customize this function.
 * Change number or prducts per row to 4
 */
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 4; // 3 products per row :: Defines where "first" and "last" CSS CLASS are applied
	}
}


/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyseventeen_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		// translators: %s: Name of current post 
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );


// Add a pingback url auto-discovery header for singularly identifiable articles. 
function twentyseventeen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'twentyseventeen_pingback_header' );


/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Sixteen 1.0
 */
function twentysixteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentysixteen_javascript_detection', 0 );


/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function amris_scripts() {
			
		// wp_enqueue_style( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
					
		// font awasome
		// wp_enqueue_style( 'amris-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );

		wp_enqueue_style( 'amris-font-awesome', 'https://fonts.googleapis.com/css?family=Quicksand:300,500' );

			
		// Load our main stylesheet.
		wp_enqueue_style( 'amris-main-style', get_stylesheet_uri() );
      
		// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
		if ( is_customize_preview() ) {
			wp_enqueue_style( 'twentyseventeen-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'twentyseventeen-style' ), '1.0' );
			wp_style_add_data( 'twentyseventeen-ie9', 'conditional', 'IE 9' );
		}

		// Load the Internet Explorer 8 specific stylesheet.
		wp_enqueue_style( 'twentyseventeen-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'twentyseventeen-style' ), '1.0' );
		wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );

		// Load the html5 shiv.
		wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
		wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

		wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );
				
		
        // ------ SCRIPTS -----------        
        wp_enqueue_script( 'amris-jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1',  true );
		// wp_enqueue_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array(), '3.1',  true );        
        // CALISMADI: wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js', array(), '3.2.1',  true );
        
        
        /* 
        // Enable (enqueue) the general woocommerce.css file in your active theme.
        add_action('wp_enqueue_scripts', 'woocommerce_style_sheet');
        function woocommerce_style_sheet() {
            wp_enqueue_style( 'amris-woocommerce', get_stylesheet_directory_uri() . '/woocommerce/woocommerce.css' );
        }
        */
		
        if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
				wp_enqueue_script( 'comment-reply' );
		}
	    
}
add_action( 'wp_enqueue_scripts', 'amris_scripts' );


// Remove the wordpress version from <head> section
remove_action('wp_head', 'wp_generator');





/* 
//  Dequeue jQuery Migrate script in WordPress.
function isa_remove_jquery_migrate( &$scripts) { 
    
    if(!is_admin()) {
        $scripts->remove( 'jquery');
        // $scripts->add( 'jquery', false, array( 'jquery-core' ), '1.12.4' );
        // wp_enqueue_script( 'my-jquery', get_template_directory_uri() . '/js/functions.js', '20150330', true );
         
    } 
    
}
add_filter( 'wp_default_scripts', 'isa_remove_jquery_migrate' ); 
 * 
 */

 
/* JETPACKS share button appears at the very bottom of the SINGLE PRODUCT PAGE. TO MOVe it up the page */
add_action( 'woocommerce_share', 'patricks_woocommerce_social_share_icons', 10 );
function patricks_woocommerce_social_share_icons() {
    if ( function_exists( 'sharing_display' ) ) {
        remove_filter( 'the_content', 'sharing_display', 19 );
        remove_filter( 'the_excerpt', 'sharing_display', 19 );
        echo sharing_display();
    }
	// TO MOVE SHARING BUTTONS AROUND :: https://jetpack.com/2013/06/10/moving-sharing-icons/
}

// ============ 
// WOOCOMMERCE 
// =================

/*
 * This function is defined in /woocommerce/includes/wc-template-function.php FILE, Line 501
 * Functions.php is loaded first, so we will override it here. Normally, PHP throws errors when same function is declared 2 times. 
 * But, in /includes/ dir, this function is within IF !() condition
 
if (!function_exists( 'woocommerce_template_loop_category_title' ) ) {
    
	//show the subcategory title in the product loop.	 
	function woocommerce_template_loop_category_title( $category ) {
            ?>
            <h3>
                <?php
                    echo $category->name;

                    if ( $category->count > 0 )
                        //ORIGINAL fanos: echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ')</mark>', $category );
                        echo apply_filters( 'woocommerce_subcategory_count_html', ' <mark class="count">(' . $category->count . ' items)</mark>', $category );

                ?>
            </h3>
            <?php
	}
}
*/




// Disabling WooCommerce styles
// If you plan to make major changes, then you may prefer your theme not reference the WooCommerce stylesheet at all. 
// You can tell WooCommerce to not use the default woocommerce.css. 
// But a better solution is to add the following code to your theme’s functions.php file:

/*
 * Remove each style one by one
 
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );		// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );			// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;									
}  
*/



// Add Bootstrap CSS class to fields
// public function addBootstrapToCheckoutFields($fields) {
function addBootstrapToCheckoutFields($fields) {
    
    foreach ($fields as &$fieldset) {
        foreach ($fieldset as &$field) {
            // if you want to add the form-group class around the label and the input
            $field['class'][] = 'form-group';             
            
            // add form-control to the actual input
            $field['input_class'][] = 'form-control';
        }
    }
    return $fields;
} 
add_filter('woocommerce_checkout_fields', 'addBootstrapToCheckoutFields' );


// Remove things from Billing Address
/*  
function irf_filter_billing_fields($fields) {
  //  unset( $fields["billing_country"] );
    unset( $fields["billing_company"] );
    //unset( $fields["billing_address_1"] );
    unset( $fields["billing_address_2"] );
    //unset( $fields["billing_city"] );    
    unset( $fields["billing_state"] ); // County
    //unset( $fields["billing_postcode"] );
    //unset( $fields["billing_phone"] );
    
   // $fields['billing']['billing_city']['placeholder'] = 'My new placeholder';
   // $fields["billing_phone"]["required"] = true;
    return $fields;
}
add_filter( 'woocommerce_billing_fields', 'irf_filter_billing_fields' );
 

// Remove some form fields from 
function irf_filter_shipping_fields($fields) {
  //  unset( $fields["shipping_country"] );
    unset( $fields["shipping_company"] );
     unset( $fields["shipping_state"] ); // County
     
      $fields["shipping_phone"]["required"] = true;
    
    return $fields;
}
add_filter( 'woocommerce_shipping_fields', 'irf_filter_shipping_fields' );
*/

 
/**
 * Remove the breadcrumbs 
 */
add_action( 'init', 'woo_remove_wc_breadcrumbs' );
function woo_remove_wc_breadcrumbs() {
    remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0 );
}


/*
 * Hooking into the  woocommerce_checkout_fields filter lets you override any field
 * https://docs.woocommerce.com/document/tutorial-customising-checkout-fields-using-actions-and-filters/
 
// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     $fields['billing']['billing_comments']['placeholder'] = 'My new placeholder';
     $fields['billing']['billing_comments']['label'] = 'My new label';
     return $fields;
}

add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' ); // Hook in
*/


/* 
function sv_require_wc_company_field( $fields ) {
    $fields['company']['required'] = true;
    return $fields;
}
add_filter( 'woocommerce_default_address_fields', 'sv_require_wc_company_field' );
 * 
 */
 
 
/* =========== 
 SOCIAL LINKS Links :: No Plugins
 ============

function crunchify_social_sharing_buttons($content) { // This will add sharing button at the bottom of the post.

	global $post;
	if(is_singular() || is_home() || is_product() || is_shop() ){ // is_product() - Returns true when viewing a single product. :: https://docs.woocommerce.com/document/conditional-tags/
	
		// Get current page URL 
		$crunchifyURL = urlencode(get_permalink());
 
		// Get current page title
		$crunchifyTitle = str_replace( ' ', '%20', get_the_title());
		
		// Get Post Thumbnail for pinterest
		$crunchifyThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
 
		// Construct sharing URL without using any script
		$twitterURL = 'https://twitter.com/intent/tweet?text='.$crunchifyTitle.'&amp;url='.$crunchifyURL.'&amp;via=Crunchify';
		$facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$crunchifyURL;
		$googleURL = 'https://plus.google.com/share?url='.$crunchifyURL;
		$bufferURL = 'https://bufferapp.com/add?url='.$crunchifyURL.'&amp;text='.$crunchifyTitle;
		$whatsappURL = 'whatsapp://send?text='.$crunchifyTitle . ' ' . $crunchifyURL;
		$linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$crunchifyURL.'&amp;title='.$crunchifyTitle;
 
		// Based on popular demand added Pinterest too
		$pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$crunchifyURL.'&amp;media='.$crunchifyThumbnail[0].'&amp;description='.$crunchifyTitle;
		
		//the_content : displays the contents of the current post/page.
		// Add sharing button at the end of page/page content
		$content .= '<!-- Crunchify.com social sharing. Get your copy here: http://crunchify.me/1VIxAsz -->';
		$content .= '<div class="crunchify-social">';
		$content .= '<h5>SHARE ON</h5> <a class="crunchify-link crunchify-twitter" href="'. $twitterURL .'" target="_blank">Twitter</a>';
		$content .= '<a class="crunchify-link crunchify-facebook" href="'.$facebookURL.'" target="_blank">Facebook</a>';
		// $content .= '<a class="crunchify-link crunchify-whatsapp" href="'.$whatsappURL.'" target="_blank">WhatsApp</a>';
		// $content .= '<a class="crunchify-link crunchify-googleplus" href="'.$googleURL.'" target="_blank">Google+</a>';
		// $content .= '<a class="crunchify-link crunchify-buffer" href="'.$bufferURL.'" target="_blank">Buffer</a>';
		// $content .= '<a class="crunchify-link crunchify-linkedin" href="'.$linkedInURL.'" target="_blank">LinkedIn</a>';
		$content .= '<a class="crunchify-link crunchify-pinterest" href="'.$pinterestURL.'" data-pin-custom="true" target="_blank">Pin It</a>';
		$content .= '</div>';
		
		return $content;
	}else{
		// if not a post/page then don't include sharing button
		return $content;
	}
};
add_filter( 'the_content', 'crunchify_social_sharing_buttons');
 */