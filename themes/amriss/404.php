<?php
get_header(); ?>

<div id="maincontentcontainer" class="container-fluid">
    <div class="row" role="main">
        <div class="col-md-12">

            <article id="post-0" class="post error404 no-results not-found">
                    <header class="entry-header">
                            <h1 class="entry-title">
                                <i class="fa fa-frown-o fa-lg"></i> 
                                    We are sorry! something went wrong
                            </h1>
                    </header>
                    <div class="entry-content">
                            <p> It seems we can&rsquo;t find what you&rsquo;re looking for</p>
                            <?php get_search_form(); ?>
                    </div><!-- /.entry-content -->
            </article><!-- /#post -->

        </div> 
    </div> <!-- /#primary.grid-container.site-content -->
</div> <!-- /#maincontentcontainer -->

<?php get_footer(); ?>
