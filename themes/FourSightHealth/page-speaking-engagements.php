<?php /* Template Name: Speaking Engagements */ get_header(); ?>
	<main class="speaking-engagements-page" role="main">
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
							<?php $args = array('post_type' => 'speaking',);$the_query = new WP_Query( $args );?>
							<?php if ( $the_query->have_posts() ) :?>
								<?php while ( $the_query->have_posts() ) : $the_query->the_post();?>
									<div class="single-speaking">
										<?php
											$theDate = get_field('speaking_date');
											$eventLocation =  get_field('speaking_location');
											$eventLink =  get_field('speaking_link');
											$eventLinkText =  get_field('speaking_link_text');
										?>
										<?php if($theDate):?>
											<h5><?php echo $theDate;?></h5>
										<?php endif;?>
										<h2><?php the_title();?></h2>
										<?php if($eventLocation):?>
											<h5><?php echo $eventLocation;?></h5>
										<?php endif; ?>
										<?php if($eventLink):?>
											<div class="button white-button">
												<a class="c-block-fill" href='<?php echo $eventLink;?><br />' target="_blank"></a>
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
