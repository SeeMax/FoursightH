<?php get_header(); ?>
	<main class="single-insight-page" role="main">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<section class="full-insight">
			<div class="content">
				<?php get_template_part( 'partials/_custom-sidebar' ); ?>
				<div class="fullbar c-width-75">
					<div class="single-insight">
						<?php $pdfID = get_field('pdf_link');?>
						<?php $pdfIDnew = get_field('pdf_link_new');?>

						<?php if ($pdfID):?>
							<?php $url = wp_get_attachment_url( $pdfID );?>
							<?php if ($url):?>
								<a class="full-article-download oldPDfURL" href="<?php echo $url;?>" target="_blank">
									<i class="fas fa-arrow-to-bottom"></i>
								</a>
							<?php else: ?>
								<a class="full-article-download oldPDFID" href="<?php echo $pdfID;?>" target="_blank">
									<i class="fas fa-arrow-to-bottom"></i>
								</a>
							<?php endif; ?>
						<?php elseif ($pdfIDnew):?>
							<?php $urlnew = wp_get_attachment_url( $pdfIDnew );?>
							<?php if ($urlnew):?>
								<a class="full-article-download newPDFURL" href="<?php echo $urlnew;?>" target="_blank">
									<i class="fas fa-arrow-to-bottom"></i>
								</a>
							<?php else: ?>
								<a class="full-article-download newPDFID" href="<?php echo $pdfIDnew;?>" target="_blank">
									<i class="fas fa-arrow-to-bottom"></i>
								</a>
							<?php endif; ?>
						<?php endif; ?>
					<?php if(get_field('post_sponsor')):?>
            <div class="insight-preview-sponsor-box">
              Sponsored by <?php the_field('post_sponsor');?>
            </div>
          <?php endif;?>
          <!-- IF THERE IS A SELECTED CATEGORY SHOW IT. IF NOT SHOW THE FIRST CATEGORY -->
          <?php
            $term = get_field('preview_featured_category');
          ?>
          <?php if( $term ): ?>
            <h5 class="featured-category-term">
              <a href='<?php echo get_category_link($term);?>'>
                <?php echo $term->name; ?>
              </a>
            </h5>
          <?php endif;?>
          <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
          <div class="insight-author-date">
            <?php if( has_category( $category = 'podcasts') || has_category($category = 'house-calls')):?>
              <?php echo get_the_date(); ?>
            <?php else:?>
							<?php if ( get_field('custom_authors')) :?>
				        By <?php the_field('custom_authors');?> | <?php echo get_the_date(); ?>
				      <?php else:?>
				        By <?php coauthors_posts_links(); ?> | <?php echo get_the_date(); ?>
				      <?php endif; ?>
            <?php endif;?>
          </div>
          <div class="insight-content">
						<div class="insight-category-bar">
							<?php
		            $term = get_field('preview_featured_category');
		            $normalCategory = get_the_category();
		          ?>
							<!-- IF THERE IS A HIGHLIGHTED TERM -->
							<?php if($term):?>
								<?php foreach( $normalCategory as $category ):?>
		            	<?php if($category->name !== 'Podcasts' && $category->name !=='Uncategorized' && $category->name !==$term->name):?>
	              		<h5>
	                		<a href="<?php echo get_category_link( $category->term_id );?>"><?php echo $category->cat_name;?></a>&nbsp;<span class="category-divider">|</span>&nbsp;
	              		</h5>
		            	<?php endif;?>
								<?php endforeach;?>
							<!-- IF THERE IS NOT A HIGHLIGHTED TERM -->
							<?php else:?>
								<?php foreach( $normalCategory as $category ):?>
		            	<?php if($category->name !== 'Podcasts' && $category->name !=='Uncategorized'):?>
	              		<h5>
	                		<a href="<?php echo get_category_link( $category->term_id );?>"><?php echo $category->cat_name;?></a>&nbsp;<span class="category-divider">|</span>&nbsp;
	              		</h5>
		            	<?php endif;?>
								<?php endforeach;?>
							<?php endif;?>
						</div>
						<!-- Get The Posts Date -->
						<?php $thisPostDate = get_the_date('ynd');?>
						<!-- If its a post before 2018 December Third show the forced lead featured image -->
						<?php if ($thisPostDate <= 181203):?>
							<!-- Can Eventually hide the thumbnail based on date -->
						<?php endif;?>
						<?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
				      <?php $wrapCheck = get_field('featured_image_text_wrap');?>
				      <?php if( $wrapCheck && in_array('wrap', $wrapCheck) ): ?>
				        <p class="floated-hero">
				          <?php the_post_thumbnail(); ?>
				        </p>
				      <?php else:?>
				        <?php the_post_thumbnail(); // Fullsize image for the single post ?>
				      <?php endif; ?>
				    <?php endif; ?>

            <?php the_content();?>
						<?php if( has_category( $category = 'podcasts')):?>
							<div class="button">
								<a class="c-block-fill" href='https://itunes.apple.com/us/podcast/4sighthealth-market-corner-conversations/id1302461771?mt=2' target="_blank"></a>
								Listen on Itunes
							</div>
							<div class="button">
								<a class="c-block-fill" href='https://www.stitcher.com/podcast/4sight-health/market-corner-conversations' target="_blank"></a>
								Listen on Stitcher
							</div>
						<?php elseif(has_category($category = 'house-calls')):?>
							<div class="button">
								<a class="c-block-fill" href='https://itunes.apple.com/us/podcast/house-calls/id1483699530?mt=2' target="_blank"></a>
								Listen on Itunes
							</div>
							<div class="button">
								<a class="c-block-fill" href='https://www.stitcher.com/podcast/4sighthealth/house-calls-2' target="_blank"></a>
								Listen on Stitcher
							</div>
						<?php endif;?>
						<!-- Loop The Author Bios If They Are Selected -->
						<?php $post_objects = get_field('author_bios');
						if( $post_objects ): ?>
							<div class="author-bios-section">
								<div class="author-bios-title">
									<h5>About the 4sight Health Author</h5>
								</div>
								<?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
							    <?php setup_postdata($post); ?>
							      <div class="single-author-bio">
											<?php $bioImage = get_field('author_bio_image');?>
											<div class="author-bio-image c-width-20">
												<img src="<?php echo $bioImage['url'];?>">
											</div>
											<div class="author-bio-content c-width-80">
												<h5>
													<?php the_field('author_bio_name'); ?>
													<span class="author-bio-title"><?php the_field('author_bio_title'); ?></span>
												</h5>
												<p>
													<?php the_field('author_bio_description'); ?>
												</p>
											</div>
										</div>
							  <?php endforeach; ?>
								<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
							</div>
						<?php else:?>
						<!-- Show Dave Bio if not a podcast -->
							<?php if( has_category( $category = 'podcasts') || has_category($category = 'house-calls')):?>


							<?php else:?>
								<div class="author-bios-section">
									<div class="author-bios-title">
										<h5>About the 4sight Health Author</h5>
									</div>
						      <div class="single-author-bio">
						        <div class="author-bio-image c-width-20">
											<img src="<?php the_field('daves_image', 'options');?>" alt="David W. Johnson">
										</div>
										<div class="author-bio-content c-width-80">
											<h5>
												David Johnson
												<span class="author-bio-title">CEO 4sightHealth</span>
											</h5>
						        	<p><?php the_field('daves_bio', 'options');?></p>
										</div>
						      </div>
								</div>
							<?php endif;?>

					  <?php endif; ?>
						<!-- Check if there is legal copy for the post -->
						<?php if (get_field('post_legal_copy')): ?>
							<div class="single-insight-legal-copy">
								<?php the_field('post_legal_copy'); ?>
							</div>
						<?php endif;?>

					</div>
					<?php endwhile; ?>

				</div>
			<?php endif; ?>
				</div>
			</div>
		</section>
	</main>
<?php get_footer(); ?>
