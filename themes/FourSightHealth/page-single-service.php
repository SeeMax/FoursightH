<?php /* Template Name: Single Service */ get_header(); ?>
	<main class="services-page single-service" role="main">
		<?php while ( have_posts() ) : the_post(); ?>
			<section class="hero-section">
				<div class="content">
					<div class="background-icon">
						<img src="<?php echo get_template_directory_uri(); ?>/img/services-hero-icon.svg" >
					</div>
					<h1><?php the_title();?></h1>
				</div>
			</section>
			<section class="main-section">
				<div class="content">
					<?php get_template_part( 'partials/_custom-sidebar-two' ); ?>
					<div class="fullbar c-width-75">

						<section class="first-section">
							<div class="content">
								<?php the_content();?>
							</div>
						</section>



					</div><!-- Full Bar -->
				</div><!-- Main Section Content -->
			</section><!-- Main Section -->
		<?php endwhile; ?><!-- END LOOP -->
	</main>
<?php get_footer(); ?>
