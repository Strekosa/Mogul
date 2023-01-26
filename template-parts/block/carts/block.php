<?php
/**
 * Block Name: Carts
 * Description: It is carts ACF Block.
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
	// check if the nested repeater field has rows of data
	if (have_rows('carts_list')):?>

		<div class="carts__list">
			<?php while (have_rows('carts_list')): the_row();
				$image = get_sub_field('image');
				$text = get_sub_field('text');
				?>
				<div class="carts__item flex">
					<div class="carts__img">
						<?php
						if ($image ) : ?>
							<img src="<?php echo esc_url($image ['url']); ?>"
								 alt="<?php echo esc_attr($image ['alt']); ?>"/>

						<?php endif; ?>
					</div>
					<div class="carts__text">
						<?php
						if ($text) : ?>
							<?php echo $text; ?>
						<?php endif; ?>
					</div>
				</div>
			<?php endwhile; ?>
		</div>

	<?php endif; ?>
	</div>
</section>
