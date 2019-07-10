<?php get_header(); ?>
	<main class="home-page single-author-page" role="main">
	<?php while ( have_posts() ) : the_post(); ?>

		<section class="featured-section">
			<div class="content">
				<div class="featured-slider">
					<div class="single-featured-slide">

						<div class="single-featured-slide-image c-width-30">
							<?php $image = get_field('author_bio_image');?>
							<img src="<?php echo $image['url'];?>">
						</div>
						<div class="single-featured-slide-content c-width-70">
							<h5>Featured Author</h5>
							<h2><?php the_field('author_bio_name');?></h2>
							<?php the_field('author_bio_description');?>
							<div class="button">
								<?php $linkedAuthor = get_field('author_account_association');?>
								<a class="c-block-fill" href="/author/<?php echo $linkedAuthor['user_nicename'];?>"></a>
								Read Now
							</div>
						</div>

					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?><!-- END LOOP -->
	</main>
<?php get_footer(); ?>