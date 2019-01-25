<?php /* Template Name: Contact */ get_header(); ?>
	<main class="contact-page" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<section class="">
			<div class="content">
			</div>
		</section>
	<?php endwhile; ?><!-- END LOOP -->
	</main>
<?php get_footer(); ?>
