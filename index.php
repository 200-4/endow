<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package endow
 */

namespace Endow\Utility;

$endow_options = get_option('endow-options');
$is_sidebar = endow()->is_primary_sidebar_active();
$post_section = endow()->post_style();
get_header();
$endow_layout = '';
if (isset($endow_options['blog_setting'])) {
	$endow_layout = $endow_options['blog_setting'];
}
?>
<div class="site-content-contain">
	<div id="content" class="site-content">
		<div id="primary" class="content-area">
			<main id="main" class="site-main">
				<div class="container">
					<div class="row <?php echo esc_attr($post_section['row_reverse']); ?>">
						<?php if ($is_sidebar) {
							echo '<div class="col-xl-8 col-sm-12 endow-blog-main-list">';
						} else if ($endow_layout != '2' && $endow_layout != '3') {
							echo '<div class="col-lg-12 col-sm-12 endow-blog-main-list">';
						}
						if (have_posts()) {

							while (have_posts()) { ?>
								<?php the_post();
								get_template_part('template-parts/content/entry', get_post_type(), $post_section['post']);
								?>
						<?php }

							if (!is_singular()) {
								if (isset($endow_options['display_pagination'])) {
									$options = $endow_options['display_pagination'];
									if ($options == "yes") {
										get_template_part('template-parts/content/pagination');
									}
								} else {
									get_template_part('template-parts/content/pagination');
								}
							}
						} else {
							get_template_part('template-parts/content/error');
						}
						?>
						<?php if ($is_sidebar || $endow_layout != '2' && $endow_layout != '3') {
							echo '</div>';
						}
						get_sidebar(); ?>
					</div>
				</div>
			</main><!-- #primary -->
		</div>
	</div>
</div>
<?php
get_footer();
