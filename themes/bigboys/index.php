<?php get_header(); ?>
<!-- irfan5 -->

	<main role="main" class="container">
		<!-- section -->
		<section class="col-12">

			<h1><?php _e( 'Latest Posts', 'html5blank' ); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php // get_sidebar(); // SideBar includes the SEARCH <FORM> ?>

<?php get_footer(); ?>
