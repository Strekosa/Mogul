<?php
/**
 * Block Name: Slider
 * Description: It is slider block managed with ACF.
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
<section class="slider">
	<div class="slider__main container-boxed column">

		<?php
		if ($title) : ?>
			<h2 class="slider__title text-center"> <?php echo $title; ?></h2>
		<?php endif; ?>

		<?php
		// check if the nested repeater field has rows of data
		if (have_rows('slider_list')):?>

			<div class="slider__list swiper">
				<div class="swiper-wrapper">
					<?php while (have_rows('slider_list')): the_row();
						$image = get_sub_field('image');
						?>
						<div class="slider__item swiper-slide">
							<div class="slider__img ">
								<img class="swiper-lazy" data-src="<?php echo esc_url($image ['url']); ?>" src="<?php echo esc_url($image ['url']); ?>"
									 alt="<?php echo esc_attr($image ['alt']); ?>"/>
								<div class="swiper-lazy-preloader"></div>
							</div>
						</div>
					<?php endwhile; ?>

				</div>
				<!-- If we need pagination -->
				<div class="swiper-pagination"></div>

				<!-- If we need navigation buttons -->
				<div class="swiper-button-prev"></div>
				<div class="swiper-button-next"></div>

				<!-- If we need scrollbar -->
				<div class="swiper-scrollbar"></div>
			</div>

		<?php endif; ?>

	</div>
</section>
