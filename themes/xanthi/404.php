<?php
get_header();
?>


<div class="container">
    <div>

        <header class="page-header">
            <h1 class="page-title"><?php _e('Not Found', 'xanthi'); ?></h1>
        </header>

        <div class="page-content">
            <p class="lead"><?php _e('It looks like nothing was found at this location. Maybe try a search?', 'xanthi'); ?></p>
            <?php //get_search_form(); ?>
        </div><!-- .page-content -->

    </div><!-- #content -->
    
</div><!-- #primary -->

<?php
//get_sidebar('content');

get_sidebar();//Includes the sidebar.php template file
get_footer();
