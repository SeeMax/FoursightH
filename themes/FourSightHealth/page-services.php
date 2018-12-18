<?php /* Template Name: Services */ get_header(); ?>
	<main class="services-page" role="main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<section class="insights-category-buttons">
				<div class="content">

				</div>
			</section>
		<?php endwhile; ?><!-- END LOOP -->
	<?php endif;?>
	</main>
<?php get_footer(); ?>
