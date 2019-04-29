<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Proweb
 * @since Proweb 1.0.2
 */
?>
<?php 
$category_id = get_the_category(get_the_ID())[0]->term_id;
$category_name = get_the_category(get_the_ID())[0]->name;
?>
<article class="blog_post wow animated fadeInUp">
	<h3> <a href="<?php the_permalink();?>"><?php the_title();?></a> </h3>
		
	<div class="blog_text">
		<ul> 
			<li><?php the_date();?></li>
			<li> /  </li>
			<li> <a href="<?php echo get_category_link( $category_id ); ?>"><?php echo $category_name; ?></a> </li>
			<li> /  </li>
			<li> <?php comments_number( '0 Comments', '1 Comment', '% Comments' ); ?>  </li>
		</ul>
	</div>	
	
	<div class="blog_post_img">
		<a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
		
		<div class="cetegory_section">
			<a href="<?php echo get_category_link( $category_id ); ?>"> <?php echo $category_name; ?> </a>
		</div>
	</div>
		
		
	<?php the_excerpt(); ?>
	<a href="<?php the_permalink();?>" class="read_more"><?php _e( 'Read More.', 'proweb' ); ?></a>
</article>
