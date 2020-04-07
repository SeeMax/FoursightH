<?php /* Template Name: Home */ get_header(); ?>
	<main class="home-page" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<section class="featured-section">
			<div class="content">
				<div class="featured-arrow featuredPrevArrow"></div>
				<div class="featured-arrow featured-next-arrow featuredNextArrow"></div>
				<div class="featured-slider featuredSlider">
					<?php get_template_part('partials/_homepage_slider');?>
				</div>
			</div>
		</section>

		<section class="believe-section">
			<div class="content">
				<?php if( have_rows('what_we_believe_section') ):
				  while( have_rows('what_we_believe_section') ): the_row();?>
						<h2 class="c-width-27"><?php the_sub_field('headline');?></h2>
						<p class="c-width-70">
							<?php the_sub_field('body');?>
						</p>
				  <?php endwhile; ?>
				<?php endif; ?>
			</div>
		</section>

		<section class="article-section">
			<div class="content">
				<?php if( have_rows('article_highlights_section') ):
				  while( have_rows('article_highlights_section') ): the_row();?>

					<?php $post_objects = get_sub_field('select_insights');
						if( $post_objects ): ?>
							<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
						  <?php setup_postdata($post); ?>
								<div class="single-article-preview c-width-33">
									<a class="c-block-fill" href="<?php the_permalink();?>"></a>
									<h3><?php the_title();?></h3>
									<h6 class="preview-author-date">
										<?php coauthors();?> <span>| <?php echo get_the_date('M j, Y'); ?></span>
									</h6>

									<?php $post_id = get_the_ID();?>
			            <?php if ( get_the_post_thumbnail($post_id) != '' ) {
			              the_post_thumbnail('large', ['class' => 'post-image', 'title' => 'Feature image']);
			            } else {
			              echo '<img src="';
			              echo catch_that_image();
			              echo '" alt="" />';
			            }	;?>
								</div>
						  <?php endforeach; ?>
						  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
						<?php endif;?>

						<div class="article-preview-buttons">
							<div class="button">
								<a href="<?php the_sub_field('read_more_button_destination');?>"></a>
								<?php the_sub_field('read_more_button_text');?>
							</div>
							<div class="button text-button">
								<a href="<?php the_sub_field('signup_button_destination');?>"></a>
								<?php the_sub_field('signup_button_text');?>
							</div>
						</div>
				  <?php endwhile; ?>
				<?php endif; ?>
			</div>
		</section>

		<section class="ask-section">
			<div class="content">
				<?php if( have_rows('ask_dave_section') ):
					while( have_rows('ask_dave_section') ): the_row();?>
						<?php $thisImage = get_sub_field('image');?>
						<div class="ask-image c-width-20">
							<img src="<?php echo $thisImage['url'];?>">
						</div>
						<div class="ask-content c-width-80">
							<h2><?php the_sub_field('headline');?></h2>
							<p>
								<?php the_sub_field('body');?>
							</p>
							<div class="button white-button">
								<a href="<?php the_sub_field('button_destination');?>"></a>
								<?php the_sub_field('button_text');?>
							</div>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</section>

		<section class="sidebar-section">
			<div class="content">
				<div class="custom-sidebar c-width-25">
					<div class="custom-sidebar-box twitter-sidebar">
						<a class="twitter-timeline" data-height="500" data-link-color="#3E8B94" href="https://twitter.com/marketvmedicine?ref_src=twsrc%5Etfw">Tweets by 4SightHealth</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
					</div>
				</div>
				<div class="fullbar c-width-75">
					<div class="fullbar-content">
						<?php if( have_rows('what_we_do_section') ):
							while( have_rows('what_we_do_section') ): the_row();?>
								<h5><?php the_sub_field('preheader'); ?></h5>
								<h2><?php the_sub_field('headline'); ?></h2>
								<?php the_sub_field('body'); ?>
							<?php endwhile; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</section>

	<?php endwhile; ?><!-- END LOOP -->
	</main>
<?php get_footer(); ?>
