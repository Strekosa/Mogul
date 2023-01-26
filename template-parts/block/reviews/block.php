<?php
/**
 * Block Name: Reviews
 * Description: It is reviews block managed with ACF.
 * Category: common
 * Icon: list-view
 * Keywords: reviews acf block example
 * Supports: { "align":false, "anchor":true }
 *
 * @package Mogul
 *
 * @var array $block
 */

$title = get_field('title');
?>
<section class="reviews">
	<div class="reviews__main container-boxed ">

		<?php
		if ($title) : ?>
			<h2 class="reviews__title text-center"> <?php echo $title; ?></h2>
		<?php endif; ?>

			<?php
			// check if the nested repeater field has rows of data
			if (have_rows('reviews_list')):?>

				<div class="reviews__list reviews-slider">
					<?php while (have_rows('reviews_list')): the_row();
						$text = get_sub_field('text');
						?>
						<div class="reviews__item flex column text-center">

							<?php echo $text; ?>
						</div>
					<?php endwhile; ?>
				</div>

			<?php endif; ?>

	</div>
</section>
