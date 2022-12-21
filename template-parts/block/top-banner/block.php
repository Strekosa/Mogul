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

$height = get_sub_field('height');
?>
<section class="top-banner">

	<div class="top-banner__image <?php echo $height; ?>">
		<?php
		$image = get_sub_field('image');
		if ($image ) : ?>
			<img src="<?php echo esc_url($image ['url']); ?>"
				 alt="<?php echo esc_attr($image ['alt']); ?>"/>

		<?php endif; ?>
	</div>

</section>
