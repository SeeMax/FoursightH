<?php /* Template Name: Insights */ get_header(); ?>
	<main class="insights-page" role="main">
	<?php if ( have_posts() ) : ?>
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
					<?php get_template_part( 'partials/_custom-sidebar' ); ?>
					<div class="fullbar c-width-75">
						<!-- CUSTOM PAGINATION QUERY -->
						<?php $temp = $wp_query; $wp_query = null; $wp_query = new WP_Query();
						  $wp_query->query('showposts=5&post_type=post&category__not_in=229'.'&paged='.$paged);
						  while ($wp_query->have_posts()) : $wp_query->the_post();
						?>
							<div class="single-insight">
								<!-- IF THERE IS A SPONSOR SHOW THE SPONSOR TAB -->
								<?php if(get_field('post_sponsor')):?>
									<div class="insight-preview-sponsor-box">
										Sponsored by <?php the_field('post_sponsor');?>
									</div>
								<?php endif;?>
								<!-- IF THERE IS A SELECTED CATEGORY SHOW IT. IF NOT SHOW THE FIRST CATEGORY -->
								<?php
									$term = get_field('preview_featured_category');
									$normalCategory = get_the_category();
									$firstNormalCategory = $normalCategory[0]->cat_name;
									$firstCatLink = $normalCategory[0]->cat_link;
								?>
								<?php if( $term ): ?>
									<h5 class="featured-category-term">
										<a href='<?php echo get_category_link($term);?>'>
											<?php echo $term->name; ?>
										</a>
									</h5>
								<?php else: ?>
									<?php foreach( $normalCategory as $category ):?>
										<?php if($category->name !== 'podcast' && $category->name !=='Uncategorized'):?>
											<h5 class="featured-category-term">
												<a href="<?php echo get_category_link( $category->term_id );?>"><?php echo $category->cat_name;?></a>&nbsp;&nbsp;<span class="category-divider">|</span>&nbsp;&nbsp;
											</h5>
										<?php endif;?>
									<?php endforeach;?>
								<?php endif;?>
								<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
								<div class="insight-author-date">
									<?php if( has_category( $category->name = 'podcast') || has_category($category->name = 'house-calls')):?>
			              <?php echo get_the_date(); ?>
			            <?php else:?>
			              By <?php coauthors_posts_links(); ?> | <?php echo get_the_date(); ?>
			            <?php endif;?>
								</div>
								<div class="insight-content c-width-66">
									<hr />
									<p class="insight-excerpt">
										<?php the_excerpt();?>
									</p>
									<div class="preview-links-area">
										<?php if( has_category( $category->name = 'podcast')):?>
				              <div class="button">
												<a class="c-block-fill" href='https://itunes.apple.com/us/podcast/4sighthealth-market-corner-conversations/id1302461771?mt=2' target="_blank"></a>
												Listen on Itunes
											</div>
											<div class="button">
												<a class="c-block-fill" href='https://www.stitcher.com/podcast/4sight-health/market-corner-conversations' target="_blank"></a>
												Listen on Stitcher
											</div>
				            <?php elseif(has_category($category->name = 'house-calls')):?>
				              <div class="button">
												<a class="c-block-fill" href='https://podcasts.apple.com/us/podcast/house-calls/id1483699530' target="_blank"></a>
												Listen on Itunes
											</div>
											<div class="button">
												<a class="c-block-fill" href='https://www.stitcher.com/podcast/4sighthealth/house-calls-2' target="_blank"></a>
												Listen on Stitcher
											</div>
				            <?php else:?>
											<div class="button">
					              Read More
												<a class="c-block-fill" href="<?php the_permalink();?>"></a>
											</div>
											<div class="pdf-link">

												<?php $pdfID = get_field('pdf_link');?>
												<?php $pdfIDnew = get_field('pdf_link_new');?>

												<?php if ($pdfID):?>
													<?php $url = wp_get_attachment_url( $pdfID );?>
													<?php if ($url):?>
														<a class="oldID" href="<?php echo $url;?>" target="_blank">
															Download <i class="far fa-arrow-to-bottom"></i>
														</a>
													<?php else: ?>
														<a class="oldURL" href="<?php echo $pdfID;?>" target="_blank">
															Download <i class="far fa-arrow-to-bottom"></i>
														</a>
													<?php endif; ?>
												<?php elseif ($pdfIDnew):?>
													<?php $urlnew = wp_get_attachment_url( $pdfIDnew );?>
													<?php if ($urlnew):?>
														<a class="newURL" href="<?php echo $urlnew;?>" target="_blank">
															Download <i class="far fa-arrow-to-bottom"></i>
														</a>
													<?php else: ?>
														<a class="newID" href="<?php echo $pdfIDnew;?>" target="_blank">
															Download <i class="far fa-arrow-to-bottom"></i>
														</a>
													<?php endif; ?>
												<?php endif; ?>


											</div>
					           <?php endif;?>
									</div>
								</div>
								<?php $post_id = get_the_ID();?>
								<div class="insight-preview-image c-width-33">
									<a class="c-block-fill" href='<?php echo the_permalink();?>'></a>
									<?php if ( get_the_post_thumbnail($post_id) != '' ) {
										the_post_thumbnail('large', ['class' => 'post-image', 'title' => 'Feature image']);
									} else {
										echo '<img src="';
										echo catch_that_image();
										echo '" alt="" />';
									}	;?>
								</div>

							</div>
						<?php endwhile; ?>

						<div class="custom-pagination">
							<?php html5wp_pagination();?>
						</div>
						<!-- RESET FOR PAGINATION -->
						<?php $wp_query = null; $wp_query = $temp;  // Reset?>
					</div>
				</div>
			</section>
		<?php endwhile; ?><!-- END LOOP -->
	<?php endif;?>
	</main>
<?php get_footer(); ?>
