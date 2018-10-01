<?php
/*this file acts as a fallback because it is mandatory, and will work well enough for things like search, 404 etc.. 
* wordpress will output index.php file if there is no page.php file. page.php file outputs content of all pages 
* this will be our default TEMPLATE, which will be used for ALL PAGES EXCEPT THE index page. For index page, i will
* use another template (front-page.php) 
*/
get_header(); 
get_sidebar('left'); //sidebar-left.php displays some menu items, nothing much in that file	?>


<div id="content">
	<?php  
		//'loop.php' gets content from database, content will be wrapped within #content div
		get_template_part('loop', 'index'); 
	   /*
		* above function calls the loop-index.php file. We don't have such file, so it'll revert to 
		* loop.php instead, you don't actually need loop.php to output content, you can hardcode the 
		* while() inside index to show content
		*/
	?>
</div><!-- #content -->



<!-- we will include the #sidebar after the #content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>