<?php $args = array('posts_per_page' => -1, 'post_type' => 'mailchimpforms');
$the_query = new WP_Query( $args );?>
<?php if ( $the_query->have_posts() ) :?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
    <div data-form="<?php the_field('mailchimp_form_link_name');?>" class="module-popup-card mailchimp-popup-card drop-shadow mailChimpCard">
      <?php the_field('mailchimp_embed_form');?>
    </div>
  <?php endwhile;?>
  <?php wp_reset_query(); ?>
<?php endif; ?>
