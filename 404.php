<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Proweb
 * @since Proweb 1.0.2
 */

get_header(); ?>
<div class="not_fond_error">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="error_msg text-center wow animated fadeInUp">
	                <div class="error_heading">
                    	4<img src="<?php echo get_template_directory_uri();?>/images/errow_img.png" alt="error-image">4
                    </div>
                	<h3><?php _e( 'It looks like nothing was found at this location.', 'proweb' ); ?></h3>
                    <a href="<?php echo home_url(); ?>" class="btn">Go Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>
