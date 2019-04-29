<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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
		<?php if ( have_posts() ) : ?>

			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'post' );

			// End the loop.
			endwhile;
			?>
			<div class="col-md-12">
			<?php
			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( '<<', 'proweb' ),
				'next_text'          => __( '>>', 'proweb' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( '', 'proweb' ) . ' </span>',
			) );
			?>
			</div>
			<?php


		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>
	</div><!-- .content-area -->
	<?php if($proweb_blog_layout!="nosidebar"){ get_sidebar('blog'); }?>
</div>
<?php get_footer(); ?>
