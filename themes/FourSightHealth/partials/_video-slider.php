<?php if( have_rows('slider_featured_video') ):
	while( have_rows('slider_featured_video') ): the_row(); ?>

    <div class="single-featured-slide-content c-width-100">
      <h5>Featured Video</h5>
      <div class="aspect-ratio">
        <?php the_sub_field('embed_code');?>
      </div>
    </div>
  <?php endwhile; ?>
<?php endif; ?>
