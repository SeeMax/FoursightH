<?php get_header(); ?>
	<main class="single-insight-page" role="main">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>
		<section class="full-insight">
			<div class="content">
				<?php get_template_part( 'partials/_custom-sidebar' ); ?>
				<div class="fullbar c-width-75">
					<div class="single-insight">
						<?php if ( get_field('pdf_link')) :?>
							<a class="full-article-download" href="<?php the_field('pdf_link');?>" target="_blank">
								<i class="fas fa-arrow-to-bottom"></i>
							</a>
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
            <h5>
              <a href='<?php echo get_category_link($term);?>'>
                <?php echo $term->name; ?>
              </a>
            </h5>
          <?php endif;?>
          <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
          <div class="insight-author-date">
            <?php if( has_category( $category = 'podcasts')):?>
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
	            <?php foreach( $normalCategory as $category ):?>
	              <?php if($category->name !== 'Podcasts' && $category->name !=='Uncategorized'):?>
	                <h5>
	                  <a href="<?php echo get_category_link( $category->term_id );?>"><?php echo $category->cat_name;?></a>&nbsp;<span class="category-divider">|</span>&nbsp;
	                </h5>
	              <?php endif;?>
	            <?php endforeach;?>
						</div>
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

						author_bios
					</div>

					<?php endwhile; ?>

				</div>
			<?php endif; ?>
				</div>
			</div>
		</section>
	</main>
<?php get_footer(); ?>
