<?php get_header(); ?>
	<main class="home-page single-general-page" role="main">
	<?php while ( have_posts() ) : the_post(); ?>

		<section class="featured-section">
			<div class="content">
				<div class="featured-slider">
					<div class="single-featured-slide">

						<div class="single-featured-slide-image c-width-40">
					    <?php $image = get_field('general_image');?>
					    <img src="<?php echo $image['url'];?>">
					  </div>
					  <div class="single-featured-slide-content c-width-60">
					    <h5><?php the_title();?></h5>
					    <h2><?php the_field('general_title');?></h2>
					    <p>
					      <?php the_field('general_description');?>
					    </p>
					    <div class="button">
					      <a class="c-block-fill" href="<?php the_field('general_button_destination');?>"></a>
					      <?php the_field('general_button_text');?>
					    </div>
					  </div>

					</div>
				</div>
			</div>
		</section>
	<?php endwhile; ?><!-- END LOOP -->
	</main>
<?php get_footer(); ?>
