<?php
/**
 * Block Name: Text
 * Description: It is text ACF Block.
 * Category: common
 * Icon: list-view
 * Keywords: text acf block example
 * Supports: { "align":false, "anchor":true }
 *
 * @package Mogul
 *
 * @var array $block
 */

$width = get_field('width');
$title = get_field('title');
$text = get_field('text');
?>
<section class="text container-boxed column align-center">
	<div class="text__main <?php echo $width; ?>">
		<?php
		if ($title) : ?>
			<h3 class="text__title"> <?php echo $title; ?></h3>
		<?php endif; ?>

		<?php
		if ($text) : ?>
			<div class="text__text">  <?php echo $text; ?></div>
		<?php endif; ?>
	</div>
</section>
