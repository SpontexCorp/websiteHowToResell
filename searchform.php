<?php
/**
 * Template for displaying search forms in Proweb
 *
 * @package WordPress
 * @subpackage Proweb
 * @since Proweb 1.0.2
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search', 'placeholder', 'proweb' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit btn btn-sm"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'proweb' ); ?></span></button>
</form>
