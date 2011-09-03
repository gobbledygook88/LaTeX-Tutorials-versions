<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<meta charset="UTF-8">

	<!--[if IE]><![endif]-->

	<title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">

	<!-- Place favicon.ico and apple-touch-icon.png in the root of your domain and delete these references -->
	<link rel="shortcut icon" href="/favicon.ico">
	<link rel="apple-touch-icon" href="/apple-touch-icon.png">

	<?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."css/inuit.css") ?>
	<?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."css/style.css") ?>

	<?php versioned_javascript($GLOBALS["TEMPLATE_RELATIVE_URL"]."js/modernizr-1.5.min.js") ?>

	<!-- Wordpress Head Items -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>

</head>

<!--[if lt IE 7 ]> <body <?php body_class('ie6'); ?>> <![endif]-->
<!--[if IE 7 ]>    <body <?php body_class('ie7'); ?>> <![endif]-->
<!--[if IE 8 ]>    <body <?php body_class('ie8'); ?>> <![endif]-->
<!--[if IE 9 ]>    <body <?php body_class('ie9'); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body <?php body_class('wrapper ie6'); ?>> <!--<![endif]-->

	<div id="leftcol" class="grid-4 left">
		<header>
			<h1><a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
			<p class="description"><?php bloginfo('description'); ?></p>
		</header>
	
		<nav>
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Clients</a></li>
			<li><a href="#">Contact Us</a></li>
		</nav>
		
		<?php get_sidebar(); ?>
	</div>