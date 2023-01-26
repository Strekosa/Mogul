<?php
/**
 * Block Name: Top Banner
 * Description: Top banner block managed with ACF.
 * Category: common
 * Icon: format-image
 * Keywords: top-banner acf block example
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

$height = get_field('height');
?>
<section id="<?php echo $block_id; ?>" class="<?php echo $slug; ?> <?php echo $align_class; ?> <?php echo $custom_class; ?>">

	<div class="top-banner__image <?php echo $height; ?>">
		<?php
		$image = get_field('image');
		if ($image ) : ?>
			<img src="<?php echo esc_url($image ['url']); ?>"
				 alt="<?php echo esc_attr($image ['alt']); ?>"/>

		<?php endif; ?>
	</div>

</section>
