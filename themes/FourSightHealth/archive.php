<?php get_header(); ?>
	<main class="insights-page archive-page" role="main">
		<section class="insights-category-title">
			<div class="content">
				<h3><?php the_archive_title();?></h3>
			</div>
		</section>
		<?php get_template_part( 'partials/_insights-loop' ); ?>
	</main>
<?php get_footer(); ?>
