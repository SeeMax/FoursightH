<?php /* Template Name: 4sight Fridays */ get_header(); ?>
	<main class="speaking-engagements-page 4sight-friday-page" role="main">
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
						<section class="speaking-section">
							<?php $args = array('post_type' => 'foursight-friday',);$the_query = new WP_Query( $args );?>
							<?php if ( $the_query->have_posts() ) :?>
								<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
									<div class="single-speaking">
										<?php
											$eventLink =  get_field('speaking_link');
											$eventLinkText =  get_field('speaking_link_text');
										?>
										<h5><?php the_date();?></h5>
										<h2><?php the_title();?></h2>
										By&nbsp;<?php coauthors_posts_links(); ?>
										<?php the_content();?>
										<?php if($eventLink):?>
											<div class="button white-button">
												<a class="c-block-fill" href='<?php echo $eventLink;?>' target="_blank"></a>
												<?php echo $eventLinkText;?>
											</div>
										<?php endif; ?>
									</div>
								<?php endwhile;?>
							<?php endif; ?>
							<?php wp_reset_query(); ?><!-- END SPEAKING LOOP -->
						</section>

					</div><!-- Full Bar -->
				</div><!-- Main Section Content -->
			</section><!-- Main Section -->
		<?php endwhile; ?><!-- END LOOP -->
	</main>
<?php get_footer(); ?>
