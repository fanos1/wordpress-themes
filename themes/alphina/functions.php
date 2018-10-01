<?php

/*
 * extend the walker_nav_menu class, so that we can add Bootstrap CSS class
 */
class Child_Walker_Top_Menu extends Walker_Nav_Menu  
{  
    //Override the parent function, we need to add Bootstrap class name to origianal class=sub-menu CLASS.    
    function start_lvl( &$output, $depth = 0, $args = array()) {        
        
        $indent = str_repeat("\t", $depth);        
        //echo "<h1>$output</h1>";        
        $output .= "\n$indent<ul class=\"dropdown-menu -".$depth."\">\n";
    }    
   
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {	  
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
            
            $class_names = $value = '';
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
            //ORIGINAL:: $classes[] = 'menu-item-' . $item->ID;
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
            $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
            //ORIGINAL:: $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
            //ORIGINAL:: $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
                        
            $bootstrap_class = '';
            $bootstrap_caret = '';
            $bootstrap_Li = '';
            
            $myArr = get_object_vars($item); //Gets the properties of the given object            
            foreach ($myArr as $key => $v) {                
                if(is_array($v)) {
                    //We are searching for the has-children PROPERTY OF $item OBJECT
                    foreach ($v as $k => $j) {                        
                        //strcasecmp($str1, $str2) :: Binary safe case-insensitive string comparison; Returns < 0 if str1 is less than str2; > 0 if str1 is greater than str2, and 0 if they are equal. 
                        if(strcasecmp($j, 'menu-item-has-children') == 0) {                                                        
                            $bootstrap_class .= ' class="dropdown-toggle" data-toggle="dropdown"';                           
                            $bootstrap_caret .= ' <b class="caret"></b>';
                            $bootstrap_Li .= ' class="dropdown"';
                        }
                    }
                }
            }    
            //====== <li> =============
            //ORIGINAL:: $output .= $indent . '<li' . $id . $value . $class_names .'>';            
            //$output .= $indent . '<li' . $id . $value . $bootstrap_Li. '>';	        
            $output .= $indent . '<li'. $bootstrap_Li. '>';	        
            
            
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';        
            
            //============ <a> ================
            $item_output = $args->before;            
            //ORIGINAL::: $item_output .= '<a'. $attributes .'>';
            $item_output .= '<a'. $attributes. $bootstrap_class .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;		            
            $item_output .= $bootstrap_caret; //Added extra
            $item_output .= '</a>';
            $item_output .= $args->after;
            //$item_output .= '<li>IRFA</li>';
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
             
}//End class


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
        
        
        // Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );	
        set_post_thumbnail_size( 360, 225, true );   
        
        
	
        /*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
        
        
        
        //---------------------
        // MENU AREA
        //-------------------
        register_nav_menus( 
            array(
                'top-menu' => __( 'Top Menu', 'alphina' ),                
                'my-footer-menu' => __( 'My Footer Menu', 'alphina' )
            ) 
        );
        
	//Switch default core markup for search form, comment form, and comments to output valid HTML5.	
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
        
        
        
	//Enable support for Post Formats. See http://codex.wordpress.org/Post_Formats
	//add_theme_support( 'post-formats', array(
	//	'aside', 'image', 'video', 'audio', 'quote', 'link', 'gallery',
	//) );
        
        
        
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
function alphina_scripts() {
	// Add custom fonts, used in the main stylesheet.
	//wp_enqueue_style( 'twentyfifteen-fonts', twentyfifteen_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	//wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.2' );
    
        // Bootstrap CDN
        wp_enqueue_style( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
        
        //wp_enqueue_script( 'bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css', array('jquery'), '3.3.7', true );
        
        // font awasome
        wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
        

	// Load our main stylesheet.
	wp_enqueue_style( 'main-style', get_stylesheet_uri() );

        // Load OUR CUSTOM woocommerce stylesheet.
	// wp_enqueue_style( 'woocommerce-style', get_template_directory_uri(). '/woocommerce/woocommerce.css' );

        
	// Load the Internet Explorer specific stylesheet.
	//wp_enqueue_style( 'twentyfifteen-ie', get_template_directory_uri() . '/css/ie.css', array( 'twentyfifteen-style' ), '20141010' );
	//wp_style_add_data( 'twentyfifteen-ie', 'conditional', 'lt IE 9' );

        
	// Load the Internet Explorer 7 specific stylesheet.
	//wp_enqueue_style( 'twentyfifteen-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'twentyfifteen-style' ), '20141010' );
	//wp_style_add_data( 'twentyfifteen-ie7', 'conditional', 'lt IE 8' );

        
        /* 
	wp_enqueue_script( 'twentyfifteen-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20141010', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'twentyfifteen-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20141010' );
	}

	wp_enqueue_script( 'twentyfifteen-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20150330', true );
	wp_localize_script( 'twentyfifteen-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
	) );
         * 
         */
        
        
        
}
add_action( 'wp_enqueue_scripts', 'alphina_scripts' );



// ============ WOOCOMMERCE =================

/*
 * This function is defined in /woocommerce/includes/wc-template-function.php FILE, Line 501
 * Functions.php is loaded first, so we will override it here. Normally, PHP throws errors when same function is declared 2 times. 
 * But, in /includes/ dir, this function is within IF !() condition
 */
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




// title-tag support is now required for all themes. We keep a back-compatibility policy of two versions, 
// and the title tag feature was added in WordPress 4.1.
// you simply need to add a single line within your theme setup function, which would look something like the following.
// Make suer the following line is not in your header.php FILE 
// =>> <title><?php wp_title( '|', true, 'right' ); 
// 
// Updated 2016 https://make.wordpress.org/themes/2015/08/25/title-tag-support-now-required/
add_action( 'after_setup_theme', 'theme_slug_setup' );
function theme_slug_setup() {
    add_theme_support( 'title-tag' );
}


// Disabling WooCommerce styles
// If you plan to make major changes, then you may prefer your theme not reference the WooCommerce stylesheet at all. 
// You can tell WooCommerce to not use the default woocommerce.css. 
// But a better solution is to add the following code to your theme’s functions.php file:

/*
 * Remove each style one by one
 
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
	unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
	unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
	unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	return $enqueue_styles;
}
 
// Or just remove them all in one line
// add_filter( 'woocommerce_enqueue_styles', '__return_false' );
 * 
 *  
 */




/*
 * TO MAKE YOUR THEME COMPATIBLE WITH WOOCOMMERCE, SOME LINKS
 * ========================================================================
 * 
 * https://docs.woocommerce.com/document/third-party-theme-compatibility/
 * DISABLING WOOCOMMERCE CSS :: https://docs.woocommerce.com/document/disable-projects-css/
 * https://docs.woocommerce.com/document/css-structure/
 * 
 */





