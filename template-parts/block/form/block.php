<?php
/**
 * Block Name: Form
 * Description: Form block managed with ACF.
 * Category: common
 * Icon: list-view
 * Keywords: form acf block example
 * Supports: { "align":false, "anchor":true }
 *
 * @package Mogul
 *
 * @var array $block
 */
?>
<section class="form wrapper ">
	<div class="form__main container-boxed flex column align-center">

		<?php
		$title = get_sub_field('title');
		if (!empty($title)): ?>
			<h2 class="form__title"><?php echo $title; ?></h2>
		<?php endif; ?>

		<?php
		$featured_posts = get_sub_field('forms');
		if ($featured_posts):?>
			<div class="form__inner">
				<?php foreach ($featured_posts as $p):
					// Setup this post for WP functions (variable must be named $post).
					setup_postdata($p); ?>
					<div class="flex flex-wrap justify-center  flex-xs-column">

						<?php
						$cf7_id = $p->ID;
						echo do_shortcode('[contact-form-7 id="' . $cf7_id . '" ]');
						?>

					</div>
				<?php
				endforeach; ?>
			</div>
			<?php
			// Reset the global post object so that the rest of the page works correctly.
			wp_reset_postdata();
			?>

		<?php endif; ?>

	</div>
</section>

