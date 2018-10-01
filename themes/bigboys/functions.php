<?php
/*
 *  skeleton taken from :  URL: html5blank.com | @html5blank
 */

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
			
            //var_dump($myArr);
            //echo '<h3>'.$myArr["menu_order"].'</h3>';  // 1                   
            
            $icon_home = '';            
            if($myArr["menu_order"] == 1) {
                // icon_home will be either empty or the value below. We append $icon_home at end of <a>
                $icon_home = '<i class="fa fa-home" aria-hidden="true"></i>';
            }
            
        
            
            foreach ($myArr as $key => $v) {
                
                
						
                if(is_array($v)) {
					
					
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
							// $caret .= '<span id="caret"> &#8250;</span>';
							$caret .= '&nbsp;<i class="fa fa-sort-down"></i>';
							
                        }
                        $bootstrap_Li2 = ' class="dropdown" id="irf"';
                                               
                    }
					
                }
                 
                $count++;
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
			$item_output .= '<a'.$attributes. $topLevel_a. '>'. $icon_home ;
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;		            
            // $item_output .= $bootstrap_caret; //Added extra
			$item_output .= $caret; //Added extra
            $item_output .= '</a>';			
            $item_output .= $args->after;
            //$item_output .= '<li>IRFA</li>';
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
             
}






/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

if (!isset($content_width))
{
    $content_width = 900;
}

if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    
    /* --------------------------
     * Add Thumbnail Theme Support
     * -----------------------------
     * Enable support for Post Thumbnails, and declare two sizes.
     * Featured images (also sometimes called Post Thumbnails) are images that represent an individual Post, Page, or Custom Post Type
     */        
    add_theme_support( 'post-thumbnails' );	
    // add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );
    // add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );
    // add_image_size( 'testimonial-image', 500, 310, true );
    // add_image_size('large', 700, '', true); // Large Thumbnail
    // add_image_size('medium', 250, '', true); // Medium Thumbnail
    // add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size( 'slider-image', 1170, 434, true ); //Registers a new image size. This means WordPress will create a copy of the image with the specified dimensions when a new image is uploaded     
    // add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');
    

    // Add Support for Custom Backgrounds - Uncomment below if you're going to use
    /*
    add_theme_support('custom-background', array(
	   'default-color' => 'FFF',
	   'default-image' => get_template_directory_uri() . '/img/bg.jpg'
    ));
    */
    

    // Add Support for Custom Header - Uncomment below if you're going to use
    /*
    add_theme_support('custom-header', array(
        'default-image'			=> get_template_directory_uri() . '/img/headers/default.jpg',
        'header-text'			=> false,
        'default-text-color'		=> '000',
        'width'				=> 1000,
        'height'			=> 198,
        'random-default'		=> false,
        'wp-head-callback'		=> $wphead_cb,
        'admin-head-callback'		=> $adminhead_cb,
        'admin-preview-callback'	=> $adminpreview_cb
    ));
    */

    
    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    
    // Add theme support for Custom Logo.
    add_theme_support( 'custom-logo', array(
        'width'       => 180,
        'height'      => 144,
        'flex-width'  => true,
    ) );	
    
    
    /* ------------ 
     * Localisation Support
     * -----------------------
 	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
    load_theme_textdomain('html5blank', get_template_directory() . '/languages');
	// load_theme_textdomain( 'bigboy' );
    
	
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



// HTML5 Blank navigation
function html5blank_nav()
{
	wp_nav_menu(
	array(
		'theme_location'  => 'header-menu',
		'menu'            => '',
		'container'       => 'div',
		'container_class' => 'menu-{menu slug}-container',
		'container_id'    => '',
		'menu_class'      => 'menu',
		'menu_id'         => '',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'items_wrap'      => '<ul>%3$s</ul>',
		'depth'           => 0,
		'walker'          => ''
		)
	);
}

// Load HTML5 Blank scripts (header.php)
function html5blank_header_scripts()
{
    
    if ($GLOBALS['pagenow'] != 'wp-login.php' && !is_admin()) {

    	wp_register_script('conditionizr', get_template_directory_uri() . '/js/lib/conditionizr-4.3.0.min.js', array(), '4.3.0'); // Conditionizr
        wp_enqueue_script('conditionizr'); // Enqueue it!

        wp_register_script('modernizr', get_template_directory_uri() . '/js/lib/modernizr-2.7.1.min.js', array(), '2.7.1'); // Modernizr
        wp_enqueue_script('modernizr'); // Enqueue it!

        wp_register_script('html5blankscripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0'); // Custom scripts
        wp_enqueue_script('html5blankscripts'); // Enqueue it!
    }
}

// Load HTML5 Blank conditional scripts
function html5blank_conditional_scripts()
{
    if (is_page('pagenamehere')) {
        wp_register_script('scriptname', get_template_directory_uri() . '/js/scriptname.js', array('jquery'), '1.0.0'); // Conditional script(s)
        wp_enqueue_script('scriptname'); // Enqueue it!
    }
}

// Load HTML5 Blank styles
function html5blank_styles()
{
    wp_register_style('normalize', get_template_directory_uri() . '/normalize.css', array(), '1.0', 'all');
    wp_enqueue_style('normalize'); // Enqueue it!

    wp_register_style('html5blank', get_template_directory_uri() . '/style.css', array(), '1.0', 'all');
    wp_enqueue_style('html5blank'); // Enqueue it!
}

// Register HTML5 Blank Navigation
function register_html5_menu()
{
    /* 
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'html5blank'), // Main Navigation
        'sidebar-menu' => __('Sidebar Menu', 'html5blank'), // Sidebar Navigation
        'extra-menu' => __('Extra Menu', 'html5blank') // Extra Navigation if needed (duplicate as many as you need!)
    )); 
    */
    
    //---------------------
    // MENU AREA
    //-------------------
    register_nav_menus( 
        array(
            'top-menu' => __( 'Top Menu', 'bigboy' ),                
            'footer-left-menu' => __( 'Footer Left Menu', 'bigboy' )
        ) 
    );
    
}


// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
}

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
}


// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
}


// Add page slug to body class, love this - Credit: Starkers Wordpress Theme
function add_slug_to_body_class($classes)
{
    global $post;
    if (is_home()) {
        $key = array_search('blog', $classes);
        if ($key > -1) {
            unset($classes[$key]);
        }
    } elseif (is_page()) {
        $classes[] = sanitize_html_class($post->post_name);
    } elseif (is_singular()) {
        $classes[] = sanitize_html_class($post->post_name);
    }

    return $classes;
}


// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'html5blank'),
        'description' => __('Description for this widget-area...', 'html5blank'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
    
    
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

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
}


// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function html5wp_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
}


// Custom Excerpts
function html5wp_index($length) // Create 20 Word Callback for Index page Excerpts, call using html5wp_excerpt('html5wp_index');
{
    return 20;
}

// Create 40 Word Callback for Custom Post Excerpts, call using html5wp_excerpt('html5wp_custom_post');
function html5wp_custom_post($length)
{
    return 40;
}

// Create the Custom Excerpts callback
function html5wp_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function html5_blank_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'html5blank') . '</a>';
}

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

// Remove 'text/css' from our enqueued stylesheet
function html5_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
}

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
}

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
}

// Threaded Comments
function enable_threaded_comments()
{
    if (!is_admin()) {
        if (is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
            wp_enqueue_script('comment-reply');
        }
    }
}

// Custom Comments Callback
function html5blankcomments($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
    <!-- heads up: starting < for the html tag (li or div) in the next line: -->
    <<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	<div class="comment-author vcard">
	<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment, $args['180'] ); ?>
	<?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
	</div>
<?php if ($comment->comment_approved == '0') : ?>
	<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation.') ?></em>
	<br />
<?php endif; ?>

	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>">
		<?php
			printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?></a><?php edit_comment_link(__('(Edit)'),'  ','' );
		?>
	</div>

	<?php comment_text() ?>

	<div class="reply">
	<?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php }

/*------------------------------------*\
	Actions + Filters + ShortCodes
\*------------------------------------*/

// Add Actions
add_action('init', 'html5blank_header_scripts'); // Add Custom Scripts to wp_head
add_action('wp_print_scripts', 'html5blank_conditional_scripts'); // Add Conditional Page Scripts
add_action('get_header', 'enable_threaded_comments'); // Enable Threaded Comments
add_action('wp_enqueue_scripts', 'html5blank_styles'); // Add Theme Stylesheet
add_action('init', 'register_html5_menu'); // Add HTML5 Blank Menu
add_action('init', 'create_post_type_html5'); // Add our HTML5 Blank Custom Post Type
add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()
add_action('init', 'html5wp_pagination'); // Add our HTML5 Pagination

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// Add Filters
add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
add_filter('body_class', 'add_slug_to_body_class'); // Add slug to body class (Starkers build)
add_filter('widget_text', 'do_shortcode'); // Allow shortcodes in Dynamic Sidebar
add_filter('widget_text', 'shortcode_unautop'); // Remove <p> tags in Dynamic Sidebars (better!)
add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation
// add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes (Commented out by default)
// add_filter('nav_menu_item_id', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected ID (Commented out by default)
// add_filter('page_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> Page ID's (Commented out by default)
add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute
add_filter('the_excerpt', 'shortcode_unautop'); // Remove auto <p> tags in Excerpt (Manual Excerpts only)
add_filter('the_excerpt', 'do_shortcode'); // Allows Shortcodes to be executed in Excerpt (Manual Excerpts only)
add_filter('excerpt_more', 'html5_blank_view_article'); // Add 'View Article' button instead of [...] for Excerpts
add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar
add_filter('style_loader_tag', 'html5_style_remove'); // Remove 'text/css' from enqueued stylesheet
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

// Remove Filters
remove_filter('the_excerpt', 'wpautop'); // Remove <p> tags from Excerpt altogether

// Shortcodes
add_shortcode('html5_shortcode_demo', 'html5_shortcode_demo'); // You can place [html5_shortcode_demo] in Pages, Posts now.
add_shortcode('html5_shortcode_demo_2', 'html5_shortcode_demo_2'); // Place [html5_shortcode_demo_2] in Pages, Posts now.

// Shortcodes above would be nested like this -
// [html5_shortcode_demo] [html5_shortcode_demo_2] Here's the page title! [/html5_shortcode_demo_2] [/html5_shortcode_demo]


/*------------------------------------*\
	Custom Post Types
\*------------------------------------*/

// Create 1 Custom Post type for a Demo, called HTML5-Blank
/* 
function create_post_type_html5()
{
    register_taxonomy_for_object_type('category', 'html5-blank'); // Register Taxonomies for Category
    register_taxonomy_for_object_type('post_tag', 'html5-blank');
    register_post_type('html5-blank', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('HTML5 Blank Custom Post', 'html5blank'), // Rename these to suit
            'singular_name' => __('HTML5 Blank Custom Post', 'html5blank'),
            'add_new' => __('Add New', 'html5blank'),
            'add_new_item' => __('Add New HTML5 Blank Custom Post', 'html5blank'),
            'edit' => __('Edit', 'html5blank'),
            'edit_item' => __('Edit HTML5 Blank Custom Post', 'html5blank'),
            'new_item' => __('New HTML5 Blank Custom Post', 'html5blank'),
            'view' => __('View HTML5 Blank Custom Post', 'html5blank'),
            'view_item' => __('View HTML5 Blank Custom Post', 'html5blank'),
            'search_items' => __('Search HTML5 Blank Custom Post', 'html5blank'),
            'not_found' => __('No HTML5 Blank Custom Posts found', 'html5blank'),
            'not_found_in_trash' => __('No HTML5 Blank Custom Posts found in Trash', 'html5blank')
        ),
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        'taxonomies' => array(
            'post_tag',
            'category'
        ) // Add Category and Post Tags support
    ));
} 
*/


//IF YOU HAVE MORE THAN 1 CUSTOM POST TYPE, WRAP THEM IN A FUNCTION, AND CALL THE add_action(init)
function irfan_create_post_types() {
    
    // ---- 1st Custom Post Type :: SLIDER ---
    //$labels = array('name'=>'Post Type 4 Slider', 'menu_name'=>'Kiss Slider');	
    $args = array(
        'labels'            => array('name'=>'Kiss Post Type Slider', 'menu_name'=>'slider'),        
        'public'            => true,        
        'show_ui'           => true,
        'show_in_menu'      => true,
        'capability_type'   => 'post',
        'hierarchical'      => false,        
        'supports'          => array('title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields' )        
    );    
    register_post_type('kiss_slider', $args);
        

    // ---- 2nd Custom Post Type :: TESTIMONIAL ---
    /* 
    $args = array (
        'labels'            => array('name'=>'Kiss Post Type Testimonials', 'menu_name'=>'testimonials'),        
        'public'            => true,        
        'show_ui'           => true,
        'show_in_menu'      => true,
        'capability_type'   => 'post',
        'hierarchical'      => false,        
        'supports'          => array('title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields' )        
    );    
    register_post_type('kiss_testimonials', $args);                
    */
    
}
add_action( 'init', 'irfan_create_post_types' );



/*------------------------------------*\
	ShortCode Functions
\*------------------------------------*/

// Shortcode Demo with Nested Capability
function html5_shortcode_demo($atts, $content = null)
{
    return '<div class="shortcode-demo">' . do_shortcode($content) . '</div>'; // do_shortcode allows for nested Shortcodes
}

// Shortcode Demo with simple <h2> tag
function html5_shortcode_demo_2($atts, $content = null) // Demo Heading H2 shortcode, allows for nesting within above element. Fully expandable.
{
    return '<h2>' . $content . '</h2>';
}


// ============================== 
// irfan WOOCOOMMERCE OVERWRITES
// ================================

/**
 * wrap id="primary" div within <div class="contianer">
 */
add_action('woocommerce_before_main_content', 'open_container_div', 5); 
function open_container_div() {
    echo '<div class="container">';
}

/**
 * Closing div for our container wrapper
 */
add_action('woocommerce_after_main_content', 'close_container_div', 50);
function close_container_div() {
    echo '</div>';
}







?>