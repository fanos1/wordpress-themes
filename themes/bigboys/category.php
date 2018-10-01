<?php get_header(); ?>
<!-- irfan4 -->

	<main role="main">
		<!-- section :: category.php fILE -->
		<section class="col-12">

			<h1><?php _e( 'Categories for ', 'html5blank' ); single_cat_title(); ?></h1>

			<?php get_template_part('loop'); ?>

			<?php get_template_part('pagination'); ?>

		</section>
		<!-- /section -->
	</main>

<?php // get_sidebar(); ?>

<?php get_footer(); ?>
