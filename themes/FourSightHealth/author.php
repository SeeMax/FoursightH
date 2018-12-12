<?php get_header(); ?>
	<main class="insights-page archive-page" role="main">
		<section class="insights-category-title">
			<div class="content">
				<?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));?>
				<h3><?php echo $curauth->display_name; ?></h3>
			</div>
		</section>
		<?php get_template_part( 'partials/_insights-loop' ); ?>
	</main>
<?php get_footer(); ?>
