<?php /* Template Name: Insights */ get_header(); ?>
	<main class="insights-page" role="main">
	<?php while ( have_posts() ) : the_post(); ?>
		<section class="insights-category-buttons">
			<div class="content">
			<?php $terms = get_field('insight_highlights');
				if( $terms ): ?>
					<?php foreach( $terms as $term ): ?>
						<div class="button">
							<span class="insights-button-term">
								<?php echo $term->name;?>
							</span>
							<span class="insights-button-count">
								<?php echo $term->count; ?>
							</span>
							<a class="c-block-fill" href="<?php echo get_term_link( $term ); ?>"></a>
						</div>
					<?php endforeach; ?>
				<?php endif; ?>
			</div>
		</section>
		<section class="insight-posts-section">
			<div class="content">

				<div class="custom-sidebar c-width-25">
					<div class="search-bar-box">
						<h3>Search Insights</h3>
						<form class="search" method="get" action="<?php echo home_url(); ?>" role="search">
							<input class="search-input" type="search" name="s" placeholder="<?php _e( 'Search Terms', 'html5blank' ); ?>">
							<button class="search-submit" type="submit" role="button"><?php _e( 'Search', 'html5blank' ); ?></button>
						</form>
					</div>
				</div>

				<div class="fullbar c-width-75">
					<?php $args = array(
		        'post_type' => 'post',
		        'posts_per_page' => 5,
		        'order' => 'DESC',
		        'orderby' => 'date'
		      ); $the_query = new WP_Query($args);?>
		      <?php if ($the_query->have_posts()) : ?>
		        <?php while ($the_query->have_posts()) : $the_query->the_post();?>

							<div class="single-insight-preview">
								<div class="insight-preview-sponsor-box">
									Sponsored by Cain Brothers
								</div>
								<?php $category = get_the_category();?>
								<?php $firstCategory = $category[0]->cat_name;?>
								<h5><?php echo $firstCategory;?></h5>
								<h2><?php the_title();?></h2>

								<div class="insight-preview-content c-width-66">
									<div class="insight-author-date">

										By <?php coauthors_posts_links(); ?> | <?php echo get_the_date(); ?>



									</div>
									<hr />
									<p class="insight-excerpt">
										<?php the_excerpt();?>
									</p>
									<div class="preview-links-area">
										<div class="button">
											<?php if( has_category( $category = 'podcast') ) {
												echo "Listen";
											} else {
												echo "Read More";
											}	;?>
											<a class="c-block-fill" href="<?php the_permalink();?>"></a>
										</div>
										<div class="pdf-link">

											Download <i class="fa fa-download" aria-hidden="true"></i>
											<i class="fas fa-user"></i> <!-- uses solid style -->
											<i class="far fa-user"></i> <!-- uses regular style -->
											<i class="fal fa-user"></i> <!-- uses light style -->

											<?php if ( get_field('pdf_link')) :?>
												<a href="<?php the_field('pdf_link');?>" target="_blank">
													Download <i class="fa fa-download" aria-hidden="true"></i>
												</a>
											<?php endif; ?>
										</div>
									</div>
								</div>

								<div class="insight-preview-image c-width-33">
									<?php if ( get_the_post_thumbnail($post_id) != '' ) {
										echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
											the_post_thumbnail('large', ['class' => 'post-image', 'title' => 'Feature image']);
										echo '</a>';
									} else {
										echo '<img src="';
										echo catch_that_image();
										echo '" alt="" />';
									}	;?>
								</div>

							</div>
						<?php endwhile; ?>
	        <?php wp_reset_query(); ?>
	      <?php endif; ?>
				</div>
			</div>
		</section>
	<?php endwhile; ?><!-- END LOOP -->
	</main>
<?php get_footer(); ?>
