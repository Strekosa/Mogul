<?php
/**
 * Block Name: Columns
 * Description: It is columns ACF Block.
 * Category: common
 * Icon: list-view
 * Keywords: text acf block example
 * Supports: { "align":false, "anchor":true }
 *
 * @package Mogul
 *
 * @var array $block
 */

$columncout = get_field('column_count');
$columnwidth = get_field('column_width');
$title = get_field('title');
$text = get_field('text');
?>
<section class="columns container-boxed column align-center">
	<div class="columns__main">
		<?php
		if ($title) : ?>
			<h3 class="columns__title"> <?php echo $title; ?></h3>
		<?php endif; ?>

		<?php
		if ($text) : ?>
			<div class="columns__text"
				 style="--column-count: <?php echo $columncout; ?> ; --column-width: <?php echo $columnwidth; ?>px; ">
				<?php echo $text; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
