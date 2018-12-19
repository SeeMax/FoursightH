<?php $post_object = get_sub_field('slider_featured_book');
  if( $post_object ): $post = $post_object; setup_postdata( $post );?>
  <div class="single-featured-slide-image c-width-40">
    <?php $image = get_field('book_image');?>
    <img src="<?php echo $image[url];?>">
  </div>
  <div class="single-featured-slide-content c-width-60">
    <h5>Featured Book</h5>
    <h2><?php the_title();?></h2>
    <p>
      <?php the_field('book_description');?>
    </p>
    <div class="button">
      <a class="c-block-fill" href="<?php the_field('book_button_destination');?>"></a>
      <?php the_field('book_button_text');?>
    </div>
  </div>
  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;?>
