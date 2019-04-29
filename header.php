<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Proweb
 * @since Proweb 1.0.2
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> id="inner_pages">
<!--Navbar Section-->
<!--Navbar Section-->
<?php proweb_fun_navbar_inner(); ?>

<?php if( is_page()) {?>
<section class="page_heading_wrap p_60m fourth-bg">
	<div class="container">
    	<div class="row">
            <div class="col-md-6 col-sm-7 wow  fadeInUp animated">
                <h1 class="heading"><?php the_title();?></h1>
            </div>
            <div class="col-md-6 col-sm-5 wow  fadeInUp animated">
                <div class="breadcrumb text-right">
                    <ul class="breadcrumbs">
                        <li><a title="<?php _e( 'Home', 'proweb' ); ?>" href="<?php echo home_url();?>"><?php _e( 'Home', 'proweb' ); ?></a></li>
                        <li class="separator"> / </li>
                        <li class="item-current"><?php the_title();?></li>
                    </ul>    
            </div>
           </div>
        </div>
    </div>
</section>
<?php } ?>

<?php if(is_archive()) {?>
<section class="page_heading_wrap p_60m fourth-bg">
	<div class="container">
    	<div class="row">
            <div style="visibility: visible; animation-name: fadeInUp;" class="col-md-6 col-sm-7 wow  fadeInUp animated">
                <h1 class="heading"><?php the_archive_title();?></h1>
            </div>
            <div style="visibility: visible; animation-name: fadeInUp;" class="col-md-6 col-sm-5 wow  fadeInUp animated">
                <div class="breadcrumb text-right">
                    <ul class="breadcrumbs">
                        <li><a title="<?php _e( 'Home', 'proweb' ); ?>" href="<?php echo home_url();?>"><?php _e( 'Home', 'proweb' ); ?></a></li>
                        <li class="separator"> / </li>
                        <li class="item-current"><?php the_archive_title();?></li>
                    </ul>    
            </div>
           </div>
        </div>
    </div>
</section>
<?php } ?>

<?php if(is_search()) {?>
<section class="page_heading_wrap p_60m fourth-bg">
	<div class="container">
    	<div class="row">
            <div style="visibility: visible; animation-name: fadeInUp;" class="col-md-6 col-sm-7 wow  fadeInUp animated">
                <h1 class="heading"><?php printf( __( 'Search Results for: %s', 'proweb' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h1>
            </div>
        </div>
    </div>
</section>
<?php } ?>

<?php if(is_404()) {?>
<section class="page_heading_wrap p_60m fourth-bg">
	<div class="container">
    	<div class="row">
            <div style="visibility: visible; animation-name: fadeInUp;" class="col-md-6 col-sm-7 wow  fadeInUp animated">
                <h1 class="heading"><?php _e( '404 Error', 'proweb' ); ?></h1>
            </div>
            <div style="visibility: visible; animation-name: fadeInUp;" class="col-md-6 col-sm-5 wow  fadeInUp animated">
                <div class="breadcrumb text-right">
                    <ul class="breadcrumbs">
                        <li><a title="<?php _e( 'Home', 'proweb' ); ?>" href="<?php echo home_url();?>"><?php _e( 'Home', 'proweb' ); ?></a></li>
                        <li class="separator"> / </li>
                        <li class="item-current"><?php _e( '404', 'proweb' ); ?></li>
                    </ul>    
            </div>
           </div>
        </div>
    </div>
</section>
<?php } ?>

<section class="post_blog_bg">
	<div class="container">
		<div class="row">