<?php /* Template Name: Services */ get_header(); ?>
	<main class="services-page" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<section class="hero-section">
				<div class="content">
					<div class="background-icon">
						<img src="<?php echo get_template_directory_uri(); ?>/img/services-hero-icon.svg" >
					</div>
					<?php $heroGroup = get_field('hero');
					if( $heroGroup ): ?>
						<h1><?php echo $heroGroup['headline']; ?></h1>
						<?php echo $heroGroup['body']; ?>
					<?php endif; ?>
				</div>
			</section>
			<section class="main-section">
				<div class="content">
					<?php get_template_part( 'partials/_custom-sidebar-two' ); ?>
					<div class="fullbar c-width-75">

						<section class="first-section">
							<div class="content">
								<?php the_field('lead_section');?>
							</div>
						</section>

						<section class="reach-section">
							<div class="content">
								<?php $reachGroup = get_field('reach_out');
								if( $reachGroup ): ?>
									<h3><?php echo $reachGroup['headline']; ?></h3>
									<div class="button">
										<a class="c-block-fill" href="<?php echo $reachGroup['button_text']; ?>"></a>
										<?php echo $reachGroup['button_text']; ?>
									</div>
								<?php endif; ?>
							</div>
						</section>

						<section class="clients-section">
							<div class="content">
								<?php if( have_rows('clients_section') ):
									while( have_rows('clients_section') ): the_row();?>
										<h2><?php the_sub_field('headline'); ?></h2>
										<?php the_sub_field('body'); ?>
										<div class="clients-group">
											<?php if( have_rows('clients') ):
												while( have_rows('clients') ): the_row();?>
													<?php $image = get_sub_field('client_image'); ?>
													<div class="single-client">
														<a class="c-block-fill" href="<?php the_sub_field('client_url');?>" target="_blank"></a>
														<img src="<?php echo $image['url'];?>">
														<div class="client-name">
															<?php the_sub_field('client_name'); ?>
														</div>
													</div>
												<?php endwhile; ?>
											<?php endif; ?>
										</div>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
						</section>


					</div><!-- Full Bar -->
				</div><!-- Main Section Content -->
			</section><!-- Main Section -->
		<?php endwhile; ?><!-- END LOOP -->
	</main>
<?php get_footer(); ?>
