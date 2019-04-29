<?php
/**
 * Template Name: Front Page
 *
 * @package WordPress
 * @subpackage Proweb
 * @since Proweb 1.0.2
 */

get_header('home'); ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php proweb_fun_home_banner(); ?>
<?php endwhile; ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php proweb_fun_welcome_section(); ?>
<?php endwhile; ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php //proweb_fun_progressbar_section(); ?>
<?php endwhile; ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php proweb_fun_services(); ?>
<?php endwhile; ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php //proweb_fun_facts(); ?>
<?php endwhile; ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php proweb_fun_portfolio(); ?>
<?php endwhile; ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php proweb_fun_pricing(); ?>
<?php endwhile; ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php proweb_fun_blog(); ?>
<?php endwhile; ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php proweb_fun_latest_product(); ?>
<?php endwhile; ?>

<?php while ( have_posts() ) : the_post(); ?>
<?php proweb_fun_contact_section(); ?>
<?php endwhile; ?>

<?php
get_footer('home');
