<?php get_header(); ?>
	<main class="home-page single-book-page" role="main">
	<?php while ( have_posts() ) : the_post(); ?>

		<section class="featured-section">
			<div class="content">
				<div class="featured-slider">
					<div class="single-featured-slide">

						<div class="single-featured-slide-image c-width-30">
							<?php $image = get_field('book_image');?>
							<img src="<?php echo $image['url'];?>">
						</div>
						<div class="single-featured-slide-content c-width-70">
							<h5>Featured Book</h5>
							<h2><?php the_title();?></h2>
							<p>
								<?php the_field('book_description');?>
							</p>
							<div class="button">
								<a class="c-block-fill" href="<?php the_field('book_button_destination');?>"></a>
								<?php the_field('book_button_text');?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?><!-- END LOOP -->
	</main>
<?php get_footer(); ?>
