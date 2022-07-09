<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package endow
 */

namespace Endow\Utility;

$footer_class = '';
$endow_options = get_option('endow-options');
if (isset($endow_options['display_footer_bg_image'])) {
	$options = $endow_options['display_footer_bg_image'];
	if ($options == "yes") {
		if (isset($endow_options['footer_bg_image']['url'])) {
			$bgurl = $endow_options['footer_bg_image']['url'];
		}
	}
}
?>

<footer id="colophon" class="footer" <?php if (!empty($bgurl)) { ?> style="background-image: url(<?php echo esc_url($bgurl); ?> ) !important;" <?php } ?>>
	<?php
	get_template_part('template-parts/footer/widget');
	get_template_part('template-parts/footer/info');
	?>
	<!-- === back-to-top === -->
	<div id="back-to-top">
		<a class="top" id="top" href="#top">
		  <i aria-hidden="true" class="fa fa-caret-up"></i>
		</a>
	</div>
	<!-- === back-to-top End === -->
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>

</html>