<?php
/**
 * Block Name: Image Block
 * Description: It is image block managed with ACF
 * Category: common
 * Icon: list-view
 * Keywords: image_block acf block example
 * Supports: { "align":false, "anchor":true }
 *
 * @package Mogul
 *
 * @var array $block
 */


$size = get_field('size');
$image = get_field('image');
?>
<section class="image-block">
	<div class="container-boxed flex column align-center">
		<div class="image-block__main ">
			<div class="image-block__image <?php echo $size; ?>">
				<?php
				if ($image) : ?>
					<img src="<?php echo esc_url($image ['url']); ?>"
						 alt="<?php echo esc_attr($image ['alt']); ?>"/>

				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
