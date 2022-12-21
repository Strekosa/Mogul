<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Mogul
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="header">
	<div class="header__container flex container-boxed ">

		<a class="header__brand brand" href="<?php echo esc_url(home_url()); ?>">
			<?php if (get_header_image()) : ?>
				<img class="brand__img" src="<?php echo(get_header_image()); ?>" alt="<?php bloginfo('name'); ?>"/>
			<?php
			else :
				bloginfo('name');
			endif;
			?>
		</a><!-- /.brand -->

		<button class="nav-tgl show-on-mobile" type="button" aria-label="toggle menu">
			<!-- Three dividers in the hamburger button--><span aria-hidden="true"></span>
		</button>
		<nav class="header-menu">
			<?php wp_nav_menu(array(
					'theme_location' => 'primary',
					'menu_id' => 'primary-menu',
					'container_class' => 'collapse navbar-collapse',
					'container_id' => 'primaryNavBar',
					'menu_class' => 'menu flex',
					'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'walker' => new Mogul_Navwalker(),

			)); ?>
		</nav>

	</div>

	<!-- /.header__row -->
	<!-- /.header__container -->
</header><!-- .banner -->
<main id="content" class="site-content">
