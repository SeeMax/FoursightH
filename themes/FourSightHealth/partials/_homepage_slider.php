<?php if( have_rows('home_page_slider') ):
  while( have_rows('home_page_slider') ): the_row();?>
  <?php
    $field = get_sub_field_object('single_featured_slide');
    $value = $field['value'];
  ?>
  <div class="single-featured-slide">


    <?php if ($value == 'Article'):?>
      <?php get_template_part('partials/_insight-slider');?>
    <?php endif; ?>

    <?php if ($value == 'Author'):?>
      <?php get_template_part('partials/_author-slider');?>
    <?php endif; ?>

    <?php if ($value == 'Podcast'):?>
      <?php get_template_part('partials/_podcast-slider');?>
    <?php endif; ?>

    <?php if ($value == 'Book'):?>
      <?php get_template_part('partials/_book-slider');?>
    <?php endif; ?>

    <?php if ($value == 'Video'):?>
      <?php get_template_part('partials/_video-slider');?>
    <?php endif; ?>
  </div>

  <?php endwhile; ?>
<?php endif; ?>
