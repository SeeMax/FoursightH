<?php get_header(); ?>
	<main class="insights-page archive-page" role="main">
		<?php if( is_category( 'podcasts')):?>
			<section class="insights-category-buttons">
				<div class="content">
				<?php $terms = get_field('podcast_buttons', 'options');
					if( $terms ): ?>
						<?php foreach( $terms as $term ): ?>
							<div class="button">
								<span class="insights-button-term">
									<?php echo $term->name;?>
								</span>
								<span class="insights-button-count">
									<?php echo $term->count; ?>
								</span>
								<a class="c-block-fill" href="<?php echo get_term_link( $term ); ?>"></a>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</div>
			</section>
		<?php else:?>
			<section class="insights-category-title">
				<div class="content">
					<h3><?php single_cat_title(); ?></h3>
				</div>
			</section>
		<?php endif; ?>
		<?php get_template_part( 'partials/_insights-loop' ); ?>
	</main>
<?php get_footer(); ?>
