<?php
/* 
* this file supports all the features that we need, as well as for widget area declarations 
* some of the code is taken from default wordpress Twenty Ten theme
*/

// We need a textdomain for localization support,
// with language files in the /lang folder
load_theme_textdomain( 'simple-static', TEMPLATEPATH . '/lang' );

// This is the default content width, 600 px
if ( ! isset( $content_width ) )	$content_width = 600;
	
// Adding theme support for post thumbnails
add_theme_support( 'post-thumbnails' );

// Adding theme support for custom backgrounds
add_custom_background();

// Telling WordPress to use editor-style.css for the visual editor
add_editor_style();	

// Adding feed links to header
add_theme_support( 'automatic-feed-links' );


//------------------
// CUSTOM HEADER
//------------------
// Adding theme support for custom headers
add_custom_image_header( '', 'simple-static_admin_header_style' );

// Remove header text and null the text color
define( 'NO_HEADER_TEXT', true );
define( 'HEADER_TEXTCOLOR', '');

// Default header image, using 'stylesheet_directory' so that child themes will work
define( 'HEADER_IMAGE', get_bloginfo('stylesheet_directory') . '/img/default-header.jpg' );

// Header width and height, 920x200 px
define( 'HEADER_IMAGE_WIDTH', 950 );
define( 'HEADER_IMAGE_HEIGHT', 234 );

// Adding post thumbnail support (same size as custom header images)
set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );


//---------------------
// MENU AREA
//-------------------
// Adding and defining the Menu area found in the header.php file
register_nav_menus( 
	array(
	'top-menu' => __( 'Top Menu', 'simple-static' ),
	'topcommonlinks-menu' => __( 'Topcommonlinks Menu', 'simple-static' )
	) 
);


//-------------------------
// WIDGET AREAS
// ------------------------
// Right column widget area on front page (default output on items)
register_sidebar( array(
	'name' => __( 'Front Page Right Column', 'simple-static' ),
	'id' => 'front-page-right-column',
	'description' => __( 'The right column on the front page.', 'simple-static' ),
	'before_widget' => '<div id="frontpage-right-column" >',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'	
) );


// Right column widget area on the News/Press category
register_sidebar( array(
	'name' => __( 'Front Page Left Column', 'simple-static' ),
	'id' => 'front-page-left-column',
	'description' => __( 'The Front Page Left Column.', 'simple-static' ),
	'before_widget' => '<div id="frontpage-left-widget" >',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'
) );

// Right column widget area on front page (default output on items)
register_sidebar( array(
	'name' => __( 'Other Page Right Column', 'simple-static' ),
	'id' => 'otherpage-right-column',
	'description' => __( 'The right column on other pages.', 'simple-static' ),
	'before_widget' => '<div id="otherpage-right-column" >',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>'	
) );


register_sidebar( array(
	'name' => __( 'Pages Column', 'simple-static' ),
	'id' => 'pages-column',
	'description' => __( 'The  column on Pages.', 'simple-static' ),
	'before_widget' => '<li id="%1$s" class="widget pages %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>',
) );


// Left column in the footer
register_sidebar( array(
	'name' => __( 'Footer Left Side', 'simple-static' ),
	'id' => 'footer-left-side',
	'description' => __( 'The left hand side of the footer.', 'simple-static' ),
	'before_widget' => '<li id="%1$s" class="widget footer %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>',
) );


// Right column in the footer
register_sidebar( array(
	'name' => __( 'Footer Right Side', 'simple-static' ),
	'id' => 'footer-right-side',
	'description' => __( 'The right hand column in the footer.', 'simple-static' ),
	'before_widget' => '<li id="%1$s" class="widget footer %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>',
) );

// Right column fallback widget area
register_sidebar( array(
	'name' => __( 'Right Column Fallback', 'simple-static' ),
	'id' => 'right-column-fallback',
	'description' => __( 'The right column fallback area for those non-posts and pages.', 'simple-static' ),
	'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget' => '</li>',
	'before_title' => '<h2 class="widgettitle">',
	'after_title' => '</h2>',
) );


/*extend the walker_nav_menu class, so that we can add | and other customisation if necessary */
class Child_Walker_Nav_Menu extends Walker_Nav_Menu  
{ 	
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {	  
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		//ORIGINAL:: $output .= $indent . '<li' . $id . $value . $class_names .'>';
		$output .= $indent . '<li' . $id . $value . '>';		

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;		
		$item_output .= '</a>|';
		$item_output .= $args->after;
				
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
	
}//End class


class Child_Walker_Top_Menu extends Walker_Nav_Menu
{
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) 
	{	  
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		//ORIGINAL:: $output .= $indent . '<li' . $id . $value . $class_names .'>';
		$output .= $indent . '<li' . $id . $value . '>';		

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;		
		$item_output .= '</a>';
		$item_output .= $args->after;
				
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}//End top_nav_menu


?>