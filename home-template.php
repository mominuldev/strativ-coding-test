<?php
/**
 * Template Name: Home Template
 */

get_header();
?>
    <main id="primary" class="site-main">
		<?php get_template_part( 'template-parts/content', 'page-header' ); ?>

		<?php
		while ( have_posts() ) :
			the_post();

			the_content();

		endwhile; // End of the loop.
		?>
    </main><!-- #main -->

<?php
get_sidebar();
get_footer();

