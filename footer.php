<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Mogul
 */

?>

</main><!-- #content -->

<footer id="footer-container" class="site-footer" role="contentinfo">
	<div class="container-boxed flex-md-column ">
		<nav class="nav-footer">
			<?php
			if (has_nav_menu('footer_menu')) :
				wp_nav_menu(
						[
								'theme_location' => 'footer_menu',
								'menu_id' => 'footer-menu',
								'walker' => new mogul_navwalker(),
						]
				);
			endif;
			?>
		</nav><!-- .nav-primary -->

		<div class="site-footer__info flex column  align-start w-100-m-down align-center-m-down">
			<div class="site-footer__info-main text-center flex column">
				<?php
				$title = get_field('info_title', 'options');
				if ($title) : ?>
					<p class="site-footer__title"><?php echo $title; ?></p>
				<?php endif; ?>

				<?php
				$text = get_field('info_text', 'options');
				if ($text) : ?>
					<p class="site-footer__subtitle"><?php echo $text; ?></p>
				<?php endif; ?>
			</div>
		</div>

		<div class="site-footer__contact flex column align-center text-center w-100-m-down ">

			<?php
			$title = get_field('contact_title', 'options');
			if ($title) : ?>
				<p class="site-footer__title"> <?php echo $title; ?></p>
			<?php endif; ?>

			<?php
			$text = get_field('contact_text', 'options');
			if ($text) : ?>
				<p class="site-footer__subtitle"><?php echo $text; ?></p>
			<?php endif; ?>

			<div class="site-footer__contact-list flex  flex-wrap justify-center align-center">
				<?php
				$link = get_field('address', 'options');
				if ($link):
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<a class="flex site-footer__contact-item flex align-center" href="<?php echo esc_url($link_url); ?>"
					   target="<?php echo esc_attr($link_target); ?>">
						<?php
						$icon = get_field('address_icon', 'options');
						if ($icon) : ?>
							<div class="site-footer__contact-img flex align-center">
								<img src="<?php echo esc_url($icon ['url']); ?>"
									 alt="<?php echo esc_attr($icon ['alt']); ?>"/>
							</div>
						<?php endif; ?>
						<?php echo esc_html($link_title); ?></a>
				<?php endif; ?>

				<?php
				$link = get_field('email', 'options');
				if ($link): ?>
					<a class="flex site-footer__contact-item flex align-center" href="mailto:<?php echo $link; ?>">
						<?php
						$icon = get_field('email_icon', 'options');
						if ($icon) : ?>
							<div class="site-footer__contact-img flex align-center">
								<img src="<?php echo esc_url($icon ['url']); ?>"
									 alt="<?php echo esc_attr($icon ['alt']); ?>"/>
							</div>
						<?php endif; ?>
						<?php echo $link; ?></a>
				<?php endif; ?>

				<?php if ($field = get_field('phone', 'options')): ?>
					<a class="flex site-footer__contact-item flex align-center" href="tel:<?php echo($field) ?>">
						<?php
						$icon = get_field('phone_icon', 'options');
						if ($icon) : ?>
							<div class="site-footer__contact-img flex align-center">
								<img src="<?php echo esc_url($icon ['url']); ?>"
									 alt="<?php echo esc_attr($icon ['alt']); ?>"/>
							</div>
						<?php endif; ?>
						<?php echo $field ?></a>
				<?php endif; ?>
			</div>
		</div>

		<div class="site-footer__socials flex column align-end w-100-m-down align-center-m-down">
			<div class="site-footer__socials-main text-center">
				<?php
				$title = get_field('socials_title', 'options');
				if ($title) : ?>
					<p class="site-footer__title"> <?php echo $title; ?></p>
				<?php endif; ?>

				<?php
				$text = get_field('socials_text', 'options');
				if ($text) : ?>
					<p class="site-footer__subtitle"><?php echo $text; ?></p>
				<?php endif; ?>

				<?php
				if (have_rows('socials_list', 'options')): ?>
					<div class="site-footer__socials-list flex justify-center align-center">
						<?php while (have_rows('socials_list', 'options')): the_row();
							$icon = get_sub_field('social_icon');
							$link = get_sub_field('social_link');
							?>
							<?php if ($link):
								$link_url = $link['url'];
								?>
								<a class="site-footer__socials-item flex align-center justify-center"
								   href="<?php echo esc_url($link_url); ?>"
								   target="_blank">
									<img src="<?php echo esc_url($icon ['url']); ?>"
										 alt="<?php echo esc_attr($icon ['alt']); ?>"/>
								</a>
							<?php endif; ?>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->

<?php wp_footer(); ?>
</body>
</html>
