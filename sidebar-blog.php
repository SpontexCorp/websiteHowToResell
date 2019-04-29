<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Proweb
 * @since Proweb 1.0.2
 */
?>
<?php
$proweb_blog_layout = get_theme_mod('proweb_blog_layout','rightsidebar');
if($proweb_blog_layout!="nosidebar") {
?>
<aside class="col-md-4 wow  fadeInUp animated">
	<div class="side_blog_bg">
		<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
			<aside id="secondary" class="sidebar widget-area" role="complementary">
				<?php dynamic_sidebar( 'sidebar-1' ); ?>
			</aside><!-- .sidebar .widget-area -->
		<?php endif; ?>
	</div>
</aside>
<?php } ?>
