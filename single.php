<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Proweb
 * @since Proweb 1.0.2
 */

get_header(); ?>
<?php
$proweb_blog_layout = get_theme_mod('proweb_blog_layout','rightsidebar');
$mainclass = "col-md-12 no-pad";
if($proweb_blog_layout=="rightsidebar") { $mainclass = "col-md-8 no-pad"; }
if($proweb_blog_layout=="leftsidebar") { $mainclass = "col-md-8 no-pad pull-right"; }
if($proweb_blog_layout=="nosidebar") { $mainclass = "col-md-12 no-pad"; }
?>
<div id="primary" class="content-area">
	<div class="<?php echo $mainclass;?>">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}

			// End of the loop.
		endwhile;
		?>
	</div>
	<?php if($proweb_blog_layout!="nosidebar"){ get_sidebar('blog'); }?>
</div><!-- .content-area -->
<?php get_footer(); ?>