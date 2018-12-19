<?php $post_object = get_sub_field('slider_featured_insight');
  if( $post_object ): $post = $post_object; setup_postdata( $post );?>
    <div class="single-featured-slide-image c-width-40">
      <?php $thumb = get_the_post_thumbnail(get_the_ID());?>
      <?php if (!empty($thumb)) {
        echo the_post_thumbnail('large', ['class' => 'post-image', 'title' => 'Feature image']);
      } else if ( has_post_thumbnail ) {
        echo '<img src="';
        echo catch_that_image();
        echo '" alt="Four Sight Health" />';
      }	;?>
    </div>
    <div class="single-featured-slide-content c-width-60">
      <h5>Featured Article</h5>
      <h2><?php the_title();?></h2>
      <h6 class="preview-author-date">
        By <?php coauthors_posts_links(); ?> | <?php echo get_the_date(); ?>
      </h6>
      <p>
        <?php the_excerpt();?>
      </p>
      <div class="button">
        <a class="c-block-fill" href="<?php the_permalink();?>"></a>
        Read Now
      </div>
    </div>
  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;?>
