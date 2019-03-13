<?php $post_object = get_sub_field('slider_featured_podcast');
  if( $post_object ): $post = $post_object; setup_postdata( $post );?>
    <div class="single-featured-slide-image c-width-40">
      <?php $post_id = get_the_ID();?>
      <?php if ( get_the_post_thumbnail($post_id) != '' ) {
        the_post_thumbnail('large', ['class' => 'post-image', 'title' => 'Feature image']);
      } else {
        echo '<img src="';
        echo catch_that_image();
        echo '" alt="Four Sight Health" />';
      }	;?>
    </div>
    <div class="single-featured-slide-content c-width-60">
      <h5>Featured Podcast</h5>
      <h2><?php the_title();?></h2>
      <h6 class="preview-author-date">
        <?php the_author();?> <span>| <?php echo get_the_date('M j, Y'); ?></span>
      </h6>
      <p>
        <?php the_excerpt();?>
      </p>
      <div class="button">
        <a class="c-block-fill" href="<?php the_permalink();?>"></a>
        Listen Now
      </div>
    </div>
  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;?>
