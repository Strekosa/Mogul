<?php
/**
 * Block Name: Calculator
 * Description: It is calculator ACF Block.
 * Category: common
 * Icon: list-view
 * Keywords: text acf block example
 * Supports: { "align":false, "anchor":true }
 *
 * @package Mogul
 *
 * @var array $block
 */

$slug = str_replace('acf/', '', $block['name']);
$block_id = $slug . '-' . $block['id'];
$align_class = $block['align'] ? 'align' . $block['align'] : '';
$custom_class = isset($block['className']) ? $block['className'] : '';

$title = get_field('title');
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">

<div class="container-boxed column">
		<?php
		if ($title) : ?>
			<h3> <?php echo $title; ?> </h3>
		<?php endif; ?>

	<?php
	$featured_posts = get_field('form');
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
