
    <ul>
        <?php 
        /*
        if(!dynamic_sidebar('right-column') ) {
            echo '<li>please add some widgets</li>';
        }
         * 
         */
        
        
        //The sidebar WIDGET will be displayed only on secondary pages.            
        if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('other-page-right-column')) {
           //IF end user has NOT DROPPED ANY CONTENT INSIDE 'other-page-left-column' WIDGET, display nothing. 
           //This will not display the LEFT-WIDGET on the front page

        } //else {
            //echo '<li>please add some widgets</li>';
        //}
        ?>
    </ul>
