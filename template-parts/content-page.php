<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Proweb
 * @since Proweb 1.0.2
 */
?>
<div class="col-md-12">
<article id="post-<?php the_ID(); ?>" class="blog_post single_detail_blog wow  fadeInUp animated">
	<?php the_title( '<h3 class="entry-title">', '</h3>' ); ?>

	<?php proweb_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		the_content();

		wp_link_pages( array(
			'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'proweb' ) . '</span>',
			'after'       => '</div>',
			'link_before' => '<span>',
			'link_after'  => '</span>',
			'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'proweb' ) . ' </span>%',
			'separator'   => '<span class="screen-reader-text">, </span>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php
		edit_post_link(
			sprintf(
				/* translators: %s: Name of current post */
				__( 'Edit<span class="screen-reader-text"> "%s"</span>', 'proweb' ),
				get_the_title()
			),
			'<footer class="entry-footer"><span class="edit-link">',
			'</span></footer><!-- .entry-footer -->'
		);
	?>

</article><!-- #post-## -->
</div>
