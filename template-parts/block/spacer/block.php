<?php
/**
 * Block Name: Spacer
 * Description: It is spacer ACF Block.
 * Category: common
 * Icon: list-view
 * Keywords: spacer acf block example
 * Supports: { "align":false, "anchor":true }
 *
 * @package Mogul
 *
 * @var array $block
 */

$heightdesk = get_field('space_desktop');
$heightmob = get_field('space_mobile');
?>
<div class="spacer"
	 style="--space-desktop: <?php echo $heightdesk; ?>px;  --space-mobile: <?php echo $heightmob; ?>px">

</div>

