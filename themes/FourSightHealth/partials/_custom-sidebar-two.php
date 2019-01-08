<div class="custom-sidebar c-width-25">
  <div class="custom-sidebar-box podcast-sidebar">
    <?php $group = get_field('podcast_sidebar', 'options'); if( $group ): ?>
	    <h3><?php echo $group['title']; ?></h3>
    <?php endif; ?>
    <p>
      <?php echo $group['text'];?>
    </p>
    <div class="button text-button">
      <?php if ( have_rows( 'podcast_sidebar', 'options' ) ) : ?>
        <?php while ( have_rows( 'podcast_sidebar', 'options' ) ) : the_row();?>
          <?php $podcastCategory = get_sub_field( 'link_destination' );?>
          <a class="c-block-fill" href='<?php echo get_category_link($podcastCategory);?>'></a>
          Listen Now
        <?php endwhile; ?>
      <?php endif; ?><!-- End Sub Repeater -->
    </div>
  </div>
  <div class="custom-sidebar-box ask-dave-sidebar">
    <?php $group = get_field('ask_sidebar', 'options'); if( $group ): ?>
	    <h3><?php echo $group['title']; ?></h3>
    <?php endif; ?>

    <p>
      <?php echo $group['text'];?>
    </p>
    <div class="button text-button">
      <a class="c-block-fill" href="<?php echo $group['link_destination'];?>"></a>
      <?php echo $group['link_text'];?>
    </div>
  </div>
  <div class="custom-sidebar-box subscribe-sidebar">
    <?php $group = get_field('subscribe_sidebar', 'options'); if( $group ): ?>
	    <h3><?php echo $group['title']; ?></h3>
    <?php endif; ?>

    <p>
      <?php echo $group['text'];?>
    </p>
    <div class="button text-button">
      <a class="c-block-fill" href="<?php echo $group['link_destination'];?>"></a>
      <?php echo $group['link_text'];?>
    </div>
  </div>
  <div class="custom-sidebar-box articles-sidebar">
    <?php $group = get_field('article_sidebar', 'option'); if( $group ): ?>
	    <h3><?php echo $group['title']; ?></h3>
    <?php endif; ?>
    <!-- Loop Articles Sidebar -->
    <?php if ( have_rows( 'article_sidebar', 'option' ) ) : ?>
      <?php while ( have_rows( 'article_sidebar', 'option' ) ) : the_row();?>
        <!-- Get Featured Articles Inside Article Sidebar -->
      	<?php if ( have_rows( 'featured_articles' ) ) : ?>
          <?php while ( have_rows( 'featured_articles' ) ) : the_row();?>
            <!-- Setup the looped posts objects -->
            <?php
              $thisArticle = get_sub_field( 'single_article' );
              $thisCategory = get_sub_field( 'featured_article_category' );
            ?>
            <div class="single-featured-article">
              <a class="featured-category" href='<?php echo get_category_link($thisCategory);?>'>
                <?php echo $thisCategory->name; ?>
              </a>
              <!-- Setup The looped post as the WP Post for one second to call WP objects like the_title -->
              <?php if( $thisArticle ): $post = $thisArticle; setup_postdata( $post );?>
                <h3><a href="<?php the_permalink(); ?>">
                  <?php the_title(); ?>
                </a></h3>
                <!-- Call Co Authors from Co Authors Pro pluggin -->
                <div class="featured-authors">
                  by <?php coauthors(); ?>
                </div>
              </div>
              <!-- IMPORTANT - reset the $post object so the rest of the page works correctly -->
              <?php wp_reset_postdata();?>
            <?php endif; ?><!-- End Post Data -->
    		  <?php endwhile; ?>
    		<?php endif; ?><!-- End Sub Repeater -->
    	<?php endwhile; ?>
    <?php endif; ?><!-- End Sidebar Loop -->
  </div>
</div>
