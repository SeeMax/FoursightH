<?php /* Template Name: Services */ get_header(); ?>
	<main class="services-page" role="main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<section class="insights-category-buttons">
				<div class="content">

					<section class="clients-section clientTrigger">
						<div class="client-top clientTop">
							<svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1660 97.0999756" preserveAspectRatio="none">
								<polygon class="section-topper-polygon" points="1660,0 1660,97.0999756 825.5479736,27.0999756 0,97.0999756 0,0 "/>
							</svg>
						</div>
						<div class="content">
							<h2><?php the_field('clients_header'); ?></h2>
							<div class="hr-container"><hr></div>

							<div class="client-carousel clientCarousel">
								<?php $args = array( 'post_type' => 'clients', 'posts_per_page' => -1 );
								$loop = new WP_Query( $args );
								while ( $loop->have_posts() ) : $loop->the_post(); ?>
								  <div class="single-client">
								  <a href="<?php the_field('link'); ?>" target="_blank">
									  <?php $image = get_field('logo'); if( !empty($image) ): ?>
											<img class="client-image" src="<?php echo $image; ?>" alt="<?php echo $image['alt']; ?>" />
										<?php endif; ?>
										<div class="hr-container"><hr></div>
										<div class="client-title">
											<?php the_title(); ?>
										</div>
										<div class="client-description">
											<?php the_field('description'); ?>
										</div>
										</a>
									</div>
									<? wp_reset_postdata(); ?>
								<?php endwhile;?>
							</div>
							<div class="client-dots clientDots"></div>

						</div>
					</section>

				</div>
			</section>
		<?php endwhile; ?><!-- END LOOP -->
	<?php endif;?>
	</main>
<?php get_footer(); ?>
