<?php /* Template Name: About */ get_header(); ?>
	<main class="about-page" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<section class="hero-section">
			<div class="content">
				<div class="background-icon">
					<img src="<?php echo get_template_directory_uri(); ?>/img/about-hero-icon.svg" >
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
							<?php the_content();?>
						</div>
					</section>

					<section class="reach-section">
						<div class="content">
							<?php $reachGroup = get_field('reach_out');
							if( $reachGroup ): ?>
								<h3><?php echo $reachGroup['headline']; ?></h3>
								<div class="button">
									<a class="c-block-fill" href="mailto:<?php echo $reachGroup['button_text']; ?>"></a>
									<?php echo $reachGroup['button_text']; ?>
								</div>
							<?php endif; ?>
						</div>
					</section>

					<section class="team-section">
						<div class="content">
							<?php $teamGroup = get_field('team');
							if( $teamGroup ): ?>
								<h2><?php echo $teamGroup['headline']; ?></h2>
							<?php endif; ?>

							<div class="bios-section">
								<?php
									$args = array(
									'post_type' => 'bio',
									'posts_per_page' => -1
									);
									$the_query = new WP_Query( $args );
								?>
								<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
									<div class="single-bio singleBio c-width-50">
										<h3><?php the_title(); ?>, <span class="bio-title"><?php the_field('title'); ?></span></h3>
										<a class="bio-email" href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
										<div class="bio-image">
											<?php $bioImage = get_field('image'); if( !empty($bioImage) ): ?>
												<img class="c-width-33" src="<?php echo $bioImage; ?>">
											<?php endif; ?>
										</div>


										<h4 class="bio-focus"><?php the_field('focus'); ?></h4>
										<div class="bio-excerpt bioExcerpt">
											<?php the_excerpt(); ?> <span class="read-more-link readMore">Read More</span>
										</div>
										<div class="bio-fullcerpt bioFullcerpt">
											<?php the_content(); ?> <span class="read-less-link readLess">Read Less</span>
										</div>
									</div>
								<?php endwhile; else: ?> <p>Sorry, there are no doctors to display.</p> <?php endif; ?>
								<?php wp_reset_query(); ?>

							</div>
						</div>
					</section>

					<section class="industry-section">
						<div class="content">
							<?php if( have_rows('industry') ):
								while( have_rows('industry') ): the_row();?>
									<h2><?php the_sub_field('headline'); ?></h2>
									<?php the_sub_field('body'); ?>
									<div class="partners-group">
										<?php if( have_rows('partners') ):
											while( have_rows('partners') ): the_row();?>
												<?php $image = get_sub_field('partner_image'); ?>
												<div class="single-industry-partner c-width-30">
													<img src="<?php echo $image['url'];?>">
													<div class="partner-content">
														<?php the_sub_field('partner_title'); ?>
														<div class="partner-label">
															<?php the_sub_field('partner_label'); ?>
														</div>
													</div>
												</div>
											<?php endwhile; ?>
										<?php endif; ?>
									</div>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</section>
				</div>
			</div>
		</section>
		<section class="book-highlight-section">
			<div class="content">

				<?php	$post_object = get_field('book_highlight');
				if( $post_object ): $post = $post_object; setup_postdata( $post );?>
					<?php $bookImage = get_field('book_image');?>
					<div class="book-image c-width-25">
						<img src="<?php echo $bookImage['url'];?>">
					</div>
					<div class="book-content c-width-75">
					<h2><?php the_title();?></h2>
					<div class="book-author">
						<?php the_field('book_author');?>
					</div>
					<?php the_field('book_description');?>
					<div class="button white-button">
						<a class="c-block-fill" href="<?php the_field('book_button_destination');?>"></a>
						<?php the_field('book_button_text');?>
					</div>

				<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>

			</div>
		</section>
	<?php endwhile; ?><!-- END LOOP -->
	</main>
<?php get_footer(); ?>
