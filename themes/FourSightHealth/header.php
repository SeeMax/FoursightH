<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
    <link href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" rel="shortcut icon">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-108573336-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', 'UA-108573336-1');
		</script>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
    </script>

	</head>
	<body <?php body_class(); ?>>
		<!-- wrapper -->
		<div class="wrapper">
			<div id="preloader">
				<img src="<?php echo get_template_directory_uri(); ?>/img/loader2.svg" >
			</div>
			<header class="header clear" role="banner">
				<div class="pre-header">
					<?php the_field('pre_header_copy','options');?>
				</div>
				<div class="menu-toggle menuToggle">
					<span class="hamTop"></span>
					<span class="hamMid"></span>
					<span class="hamBot"></span>
				</div>
				<div class="content">
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Logo" class="logo-img">
						</a>
					</div>
					<nav class="nav" role="navigation">
						<?php main_theme_nav(); ?>
					</nav>
				</div>
				<!-- search -->
				<form class="search searchToggle" method="get" action="<?php echo home_url(); ?>" role="search">
					<input class="search-input" type="search" name="s" placeholder="<?php _e( 'Search Terms', 'html5blank' ); ?>">
					<button class="button search-submit" type="submit" role="button"><?php _e( 'Search', 'html5blank' ); ?></button>
				</form>
				<!-- /search -->
			</header>
