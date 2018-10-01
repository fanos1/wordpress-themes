<?php
//This page loads if 'content-page.php' and 'content-single.php' Files fail to load for some reasons.
//We display generic info..
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <header>
        <h2 class="">
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" rel="bookmark">
                <?php the_title(); ?>
            </a>
        </h2>
        <p>Posted on 
            <time datetime="<?php echo get_the_date(); ?>"><?php the_time(); ?></time>
            <?php if(comments_open()) {
                comments_popup_link();//this function alos takes parametres which can be used in case there are no comments etc..
            } ?>
        </p>
        
    </header>
    
    <?php the_content(); ?>
    
</article><!-- #post-## -->


