<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook.
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
		/**
		 * woocommerce_before_single_product_summary hook.
		 *
		 * @hooked woocommerce_show_product_sale_flash - 10
		 * @hooked woocommerce_show_product_images - 20
		 */
		 // do_action( 'woocommerce_before_single_product_summary' );
    
        
        //if ( ! function_exists( 'woocommerce_show_product_images' ) ) {
        //    function woocommerce_show_product_images() {
        //        wc_get_template( 'single-product/product-image.php' );
        //    }
        //}
    
        /**
         * Single Product Image
         *
         * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
         *
         * HOWEVER, on occasion WooCommerce will need to update template files and you
         * (the theme developer) will need to copy the new files to your theme to
         * maintain compatibility. We try to do this as little as possible, but it does
         * happen. When this occurs the version of the template file will be bumped and
         * the readme will list any important changes.
         *
         * @see     https://docs.woocommerce.com/document/template-structure/
         * @author  WooThemes
         * @package WooCommerce/Templates
         * @version 3.3.2
         */

        defined( 'ABSPATH' ) || exit;

        // Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
        if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
            return;
        }

        global $product;

        $columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
        $post_thumbnail_id = $product->get_image_id();
        $wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
            'woocommerce-product-gallery',
            'woocommerce-product-gallery--' . ( has_post_thumbnail() ? 'with-images' : 'without-images' ),
            'woocommerce-product-gallery--columns-' . absint( $columns ),
            'images',
        ) );
        ?>

      
        <div class="col-4" >

            <figure class="woocommerce-product-gallery__wrapper">
                <?php
                if ( has_post_thumbnail() ) {
                    $html  = wc_get_gallery_image_html( $post_thumbnail_id, true );
                } else {
                    $html  = '<div class="woocommerce-product-gallery__image--placeholder">';
                    $html .= sprintf( '<img src="%s" alt="%s" class="wp-post-image" />', esc_url( wc_placeholder_img_src() ), esc_html__( 'Awaiting product image', 'woocommerce' ) );
                    $html .= '</div>';
                }

                echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', $html, $post_thumbnail_id );

                do_action( 'woocommerce_product_thumbnails' );
                ?>
                
                
                <p class="price">
                    <?php echo $product->get_price_html(); ?>
                </p>
                
                <?php
                // =========== DISPLAY ADD TO CART HERE =============
                defined( 'ABSPATH' ) || exit;
                global $product;

                if ( ! $product->is_purchasable() ) {
                    return;
                }

                echo wc_get_stock_html( $product ); // WPCS: XSS ok.

                if ( $product->is_in_stock() ) : ?>

                    <?php do_action( 'woocommerce_before_add_to_cart_form' ); ?>

                    <form class="cart" action="<?php echo esc_url( apply_filters( 'woocommerce_add_to_cart_form_action', $product->get_permalink() ) ); ?>" method="post" enctype='multipart/form-data'>
                        <?php do_action( 'woocommerce_before_add_to_cart_button' ); ?>

                        <?php
                        do_action( 'woocommerce_before_add_to_cart_quantity' );

                        woocommerce_quantity_input( array(
                            'min_value'   => apply_filters( 'woocommerce_quantity_input_min', $product->get_min_purchase_quantity(), $product ),
                            'max_value'   => apply_filters( 'woocommerce_quantity_input_max', $product->get_max_purchase_quantity(), $product ),
                            'input_value' => isset( $_POST['quantity'] ) ? wc_stock_amount( wp_unslash( $_POST['quantity'] ) ) : $product->get_min_purchase_quantity(), // WPCS: CSRF ok, input var ok.
                        ) );

                        do_action( 'woocommerce_after_add_to_cart_quantity' );
                        ?>

                        <button type="submit" name="add-to-cart" value="<?php echo esc_attr( $product->get_id() ); ?>" class="single_add_to_cart_button button alt"><?php echo esc_html( $product->single_add_to_cart_text() ); ?></button>

                        <?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
                    </form>

                    <?php do_action( 'woocommerce_after_add_to_cart_form' ); ?>

                <?php endif; ?>

            
            </figure>
            
            
        </div>


        
	

	<div id="irfan" class="col-6" style="padding-right: 16px;">

		<?php
			/**
			 * woocommerce_single_product_summary hook.
			 *
			 * @hooked woocommerce_template_single_title - 5
			 * @hooked woocommerce_template_single_rating - 10
			 * @hooked woocommerce_template_single_price - 10
			 * @hooked woocommerce_template_single_excerpt - 20
			 * @hooked woocommerce_template_single_add_to_cart - 30
			 * @hooked woocommerce_template_single_meta - 40
			 * @hooked woocommerce_template_single_sharing - 50
			 * @hooked WC_Structured_Data::generate_product_data() - 60
			 */
			// do_action( 'woocommerce_single_product_summary' );  // DISABLE, write function direct below. easier to midiry
        
            // 1
            /* 
            if ( ! function_exists( 'woocommerce_template_single_title' ) ) {               
                 // Output the product title.                 
                function woocommerce_template_single_title() {
                    wc_get_template( 'single-product/title.php' );
                }
            }
            */
            if ( ! defined( 'ABSPATH' ) ) {
                exit; // Exit if accessed directly.
            }
            the_title( '<h1 class="product_title entry-title">', '</h1>' );
        
        
            // 2
            /* 
            if ( ! function_exists( 'woocommerce_template_single_rating' ) ) {
                // Output the product rating.
                function woocommerce_template_single_rating() {
                    wc_get_template( 'single-product/rating.php' );
                }
            }
            */
            global $product;

            if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
                return;
            }
            $rating_count = $product->get_rating_count();
            $review_count = $product->get_review_count();
            $average      = $product->get_average_rating();

            if ( $rating_count > 0 ) : ?>
                <div class="woocommerce-product-rating">
                    <?php echo wc_get_rating_html( $average, $rating_count ); ?>
                    <?php if ( comments_open() ) : ?><a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<?php printf( _n( '%s customer review', '%s customer reviews', $review_count, 'woocommerce' ), '<span class="count">' . esc_html( $review_count ) . '</span>' ); ?>)</a><?php endif ?>
                </div>

            <?php endif; ?>
            
        
            
            <?php
            // 3
            /* 
            if ( ! function_exists( 'woocommerce_template_single_price' ) ) {                
                // Output the product price.
                function woocommerce_template_single_price() {
                    wc_get_template( 'single-product/price.php' );
                }
            } 
            */
            ?>
            
        
            
            <?php            
            // 4
            /* 
            if ( ! function_exists( 'woocommerce_template_single_excerpt' ) ) {                
                // Output the product short description (excerpt).
                function woocommerce_template_single_excerpt() {
                    wc_get_template( 'single-product/short-description.php' );
                }
            }
            */
            global $post;
        
            $short_description = apply_filters( 'woocommerce_short_description', $post->post_excerpt );
        
            if ( ! $short_description ) {
                return;
            }
            
            ?>
            <div class="woocommerce-product-details__short-description">
                <?php echo $short_description; // WPCS: XSS ok. ?>
            </div>

            
            <?php       
            // 5 
            /* 
            // I want to UNHOOK woocommerce_template_single_add_to_cart, and add it above BEFORE here
            if ( ! function_exists( 'woocommerce_template_single_add_to_cart' ) ) {
                // Trigger the single product add to cart action.
                function woocommerce_template_single_add_to_cart() {
                    global $product;                    
                    do_action( 'woocommerce_' . $product->product_type . '_add_to_cart' );
                }
            }
            */
            ?>
            
            
            
            <?php 
            // 6            
            if ( ! function_exists( 'woocommerce_template_single_meta' ) ) {               
                // Output the product meta.
                function woocommerce_template_single_meta() {
                    wc_get_template( 'single-product/meta.php' );
                }
            } 
            
        
        
            // 7
            /* 
            if ( ! function_exists( 'woocommerce_template_single_sharing' ) ) {               
                // Output the product sharing
                function woocommerce_template_single_sharing() {
                    wc_get_template( 'single-product/share.php' );
                }
            }
            */
        
            // 8 :: WC_Structured_Data::generate_product_data() 
            // WC_Structured_Data::generate_product_data($product);
            
            
		?>

	</div><!-- .summary -->
    
    <div class="col-2 centreit" style="border: 1px solid #eee;">
        <div> 
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/the-british-herbal-medicine-association.jpg">
            <p>Member of </p>
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/BHMA.jpg"> 
        </div>
        
        <hr/>
        <div>
            <form id="" method="post" action="">
                <fieldset style="border: 1px solid #eee;">
                    <legend style="font-weight: 700;">Request a call back:</legend>
                    <br/>
                    <div class="form-group">
                        <label class="sr-only" for="phone number">Phone Number</label>
                        <input class="form-control" type="text" name="telephone" value="" placeholder="Phone Number"> 
                    </div>
                    <div class="form-group">
                        <label class="sr-only" for="Last Name">Last Name</label>
                        <input class="form-control" type="text" name="lastname" value="" placeholder="Last Name"> 
                    </div>

                    <div class="pull-right">
                        <input class="btn btn-success" type="submit" value="Submit">
                    </div>				
                </fieldset>                
            </form>  
        </div>
    </div>
    
    <div class="clearfix"> </div>

	<?php
		/**
		 * woocommerce_after_single_product_summary hook.
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		do_action( 'woocommerce_after_single_product_summary' );
	?>

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
