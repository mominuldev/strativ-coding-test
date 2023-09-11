<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package Strativ
 */

?>

<section class="page-header">
	<div class="container pr">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-title"><?php the_title(); ?></h1>

               <div class="post-filter-wrapper">
                   <ul class="post-filter-menu">
                       <li class="active"><?php echo esc_html__('All', 'strativ') ?></li>
                       <li><?php echo esc_html__('Cotton Candy', 'strativ') ?></li>
                       <li><?php echo esc_html__('Jello', 'strativ') ?></li>
                       <li><?php echo esc_html__('Dark Chocolate', 'strativ') ?></li>
                   </ul>

                   <div class="search-form-wrapper">
                       <?php get_search_form(); ?>
                   </div>
               </div>
			</div>
		</div>
	</div>
</section>
