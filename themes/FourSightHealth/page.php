<?php get_header(); ?>

	<main class="standard-page" role="main">
		<!-- section -->
		<section class="<?php the_title(); ?>-page">
			<div class="content">
				<h1><?php the_title(); ?></h1>
				<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php the_content(); ?>
						<?php comments_template( '', true ); // Remove if you don't want comments ?>
					</article>
				<?php endwhile; ?><?php endif; ?>
			</div>
		</section>
	</main>
<?php get_footer(); ?>
