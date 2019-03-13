<?php $post_object = get_sub_field('slider_featured_author');
  if( $post_object ): $post = $post_object; setup_postdata( $post );?>
    <div class="single-featured-slide-image c-width-30">
      <?php $image = get_field('author_bio_image');?>
      <img src="<?php echo $image['url'];?>">
    </div>
    <div class="single-featured-slide-content c-width-70">
      <h5>Featured Author</h5>
      <h2><?php the_field('author_bio_name');?></h2>
      <?php the_field('author_bio_description');?>
      <div class="button">
        <?php $linkedAuthor = get_field('author_account_association');?>
        <a class="c-block-fill" href="/author/<?php echo $linkedAuthor['user_nicename'];?>"></a>
        Read Now
      </div>
    </div>
  <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
<?php endif;?>
