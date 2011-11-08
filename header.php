<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<!--[if IE]><![endif]-->

	<title><?php wp_title(''); ?></title>
	<meta name="author" content="Marcus Mo">

	<?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."css/inuit.css") ?>
	<?php versioned_stylesheet($GLOBALS["TEMPLATE_RELATIVE_URL"]."css/style.css") ?>
	<!--[if lte IE 6]>
		<style type="text/css" media="screen">
			label {
					background: #fff;
			}
		</style>
	<![endif]-->

	<!-- Wordpress Head Items -->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_head(); ?>

</head>

<!--[if lt IE 7 ]> <body <?php body_class('wrapper ie6'); ?>> <![endif]-->
<!--[if IE 7 ]>    <body <?php body_class('wrapper ie7'); ?>> <![endif]-->
<!--[if IE 8 ]>    <body <?php body_class('wrapper ie8'); ?>> <![endif]-->
<!--[if IE 9 ]>    <body <?php body_class('wrapper ie9'); ?>> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <body <?php body_class('wrapper ie6'); ?>> <!--<![endif]-->

	<header id="banner" class="grids grid-16">
		<h1><a href="<?php echo get_option('home'); ?>/" id="logo"><?php bloginfo('name'); ?></a></h1>
    <?php 
        wp_nav_menu(array(
          "theme_location" => "main_menu",
          "container" => false,
          "menu_id" => "nav",
          "menu_class" => "centered"
        ));
    ?>
	</header>