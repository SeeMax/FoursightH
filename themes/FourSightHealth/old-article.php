<div id="post-<?php the_ID(); ?>">
  <div class="single-insight-header">
    <div class="insight-date">
      <?php the_date(); ?>
    </div>
    <h1><?php the_title(); ?></h1>
    <div class="insight-author">
      By
      <?php if ( get_field('custom_authors')) :?>
        <?php the_field('custom_authors');?>
      <?php else:?>
        <?php the_author(); ?>
      <?php endif; ?>
      in <?php _e( '', 'html5blank' ); the_category(' / '); // Separated by commas ?>
    </div>
  </div>
  <div class="pdf-link">
  <?php if ( get_field('pdf_link')) :?>
    <a href="<?php the_field('pdf_link');?>" target="_blank">
      <i class="fa fa-download" aria-hidden="true"></i>
      Download as PDF
    </a>
  <?php endif; ?>

</div>
  <div class="single-insight-content">

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
  </div>
  <?php if( has_category( $category = 'podcast') ): ?>
    <div class="button podcast-button">
      <a href='https://itunes.apple.com/us/podcast/4sighthealth-market-corner-conversations/id1302461771?mt=2' target="_blank"></a>
      View on iTunes
    </div>
  <?php endif; ?>
  <!-- <div class="comments"><?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', 'html5blank' ), __( '1 Comment', 'html5blank' ), __( '% Comments', 'html5blank' )); ?></div>
  <div class="single-insight-tags">
    <?php the_tags( __( 'Tags: ', 'html5blank' ), ' / ', '<br>'); // Separated by commas with a line break at the end ?>
  </div> -->
  <!-- <div class="single-insight-edit-link">
    <?php edit_post_link(); // Always handy to have Edit Post Links available ?>
  </div> -->
  <!-- <div class="single-insight-comment">
    <?php comments_template(); ?>
  </div> -->
  Here
  <?php
    $args = array(
    'post_type' => 'authorbios',
    );
    $the_query = new WP_Query( $args );
  ?>
  <?php if ( $the_query->have_posts() ) :
    while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
      <?php $authorBioImage = get_field('author_bio_image');?>
      <img src="<?php $authorBioImage['url'];?>">
      <?php the_field('author_bio_name');?>
      <?php the_field('author_bio_title');?>
      <?php the_field('author_bio_description');?>
    <?php endwhile;?>
    <?php wp_reset_query(); ?>
  <?php endif; ?>



  <?php if ( get_field('daves_bio', 'options')) :?>

    <?php $bioCheck = get_field('hide_daves_bio');?>
    <?php if( $bioCheck && in_array('hideBio', $bioCheck) ): ?>

    <?php else:?>
      <div class="dave-bio-footer">
        <img src="<?php the_field('daves_image', 'options');?>" alt="David W. Johnson">
        <p><?php the_field('daves_bio', 'options');?></p>
      </div>
    <?php endif; ?>

  <?php endif; ?>
