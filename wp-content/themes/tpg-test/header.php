<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" />
	<?php wp_head(); ?>
</head>
<body>
	<!-- BEGIN HEADER -->
	<header class="header header-v1 stricky clearfix">
		<div class="logo">
			<a href="index.html"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" alt=""></a>
		</div>
		<?php wp_nav_menu( array(
		'theme_location'  => 'top',
		'container_class' => 'main-menu',
		'menu_class' => 'menu',
		) ); ?>
		<div class="bars open">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
		<div class="mobile-menu">
			<nav class="nav-holder">
				<?php wp_nav_menu( array(
				'theme_location'  => 'top',
				'container' => false,
				) ); ?>
			</nav>
		</div>
	</header>