<?php
/**
 * Proweb functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Proweb
 * @since Proweb 1.0.2
 */


/**
 * Proweb only works in WordPress 4.4 or later.
 */

require get_template_directory() . '/inc/theme-options.php';
require get_template_directory() . '/inc/theme-functions.php';

function custom_excerpt_length( $length ) {
	return 35;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

if ( is_admin() ) {
	require get_template_directory() . '/inc/admin/welcome-screen/welcome-screen.php';
	require get_template_directory() . '/inc/tgm-plugin-activation/tgm-plugin-activation.php';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
 
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'proweb_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own proweb_setup() function to override in a child theme.
 *
 * @since Proweb 1.0
 */
function proweb_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/proweb
	 * If you're building a theme based on Proweb, use a find and replace
	 * to change 'proweb' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'proweb' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since Proweb 1.2
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 1200, 9999 );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'proweb' ),
		'social'  => __( 'Social Links Menu', 'proweb' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio',
		'chat',
	) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // proweb_setup
add_action( 'after_setup_theme', 'proweb_setup' );

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since Proweb 1.0
 */
function proweb_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'proweb_content_width', 840 );
}
add_action( 'after_setup_theme', 'proweb_content_width', 0 );

/**
 * Registers a widget area.
 *
 * @link https://developer.wordpress.org/reference/functions/register_sidebar/
 *
 * @since Proweb 1.0
 */
function proweb_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'proweb' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'proweb' ),
		'before_widget' => '<div class="sidebar_wrap category-detail">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="side_bar_heading"><h6>',
		'after_title'   => '</h6></div>',
	) );
}
add_action( 'widgets_init', 'proweb_widgets_init' );









/*****************************************/
/******          WIDGETS     *************/
/*****************************************/

add_action('widgets_init', 'proweb_register_widgets');

function proweb_register_widgets() {   

	register_widget('proweb_about');
	register_widget('proweb_services');
	register_widget('proweb_portfolio');
	register_widget('proweb_pricing');
	
	$proweb_sidebars = array ( 'sidebar-about' => 'sidebar-about', 'sidebar-services' => 'sidebar-services', 'sidebar-portfolio' => 'sidebar-portfolio', 'sidebar-pricing' => 'sidebar-pricing' );
	
	/* Register sidebars */
	foreach ( $proweb_sidebars as $proweb_sidebar ):
	
		if( $proweb_sidebar == 'sidebar-about' ):
		
			$proweb_name = __('About widget', 'proweb');
			
		elseif( $proweb_sidebar == 'sidebar-services' ):
		
			$proweb_name = __('Services widget', 'proweb');
			
		elseif( $proweb_sidebar == 'sidebar-portfolio' ):
		
			$proweb_name = __('Portfolio widget', 'proweb');
			
		elseif( $proweb_sidebar == 'sidebar-pricing' ):
		
			$proweb_name = __('Pricing widget', 'proweb');
			
		else:
		
			$proweb_name = $proweb_sidebar;
			
		endif;
		
        register_sidebar(
            array (
                'name'          => $proweb_name,
                'id'            => $proweb_sidebar,
                'before_widget' => '',
                'after_widget'  => ''
            )
        );
		
    endforeach;	
}

/**
 * Add default widgets
 */
add_action('after_switch_theme', 'proweb_register_default_widgets');
	
function proweb_register_default_widgets() {
	
	$proweb_sidebars = array ( 'sidebar-about' => 'sidebar-about', 'sidebar-services' => 'sidebar-services', 'sidebar-portfolio' => 'sidebar-portfolio', 'sidebar-pricing' => 'sidebar-pricing' );
	
	$active_widgets = get_option( 'sidebars_widgets' );	
	
	/**
     * Default About widgets
     */
	if ( empty ( $active_widgets[ $proweb_sidebars['sidebar-about'] ] ) ):

		$proweb_counter = 1;

        /* about widget #1 */
		$active_widgets[ 'sidebar-about' ][0] = 'proweb-about-widget-' . $proweb_counter;
        $ourfocus_content[ $proweb_counter ] = array ( 'title' => 'Creative Design', 'text' => 'There are many variations of pasasages of Lorem Ipsum available, but the majority have suffered alteration in some form ' );
        update_option( 'widget_proweb-about-widget', $ourfocus_content );
        $proweb_counter++;
		
		/* about widget #2 */
		$active_widgets[ 'sidebar-about' ][] = 'proweb-about-widget-' . $proweb_counter;
        $ourfocus_content[ $proweb_counter ] = array ( 'title' => '100% Responsive', 'text' => 'There are many variations of pasasages of Lorem Ipsum available, but the majority have suffered alteration in some form ' );
        update_option( 'widget_proweb-about-widget', $ourfocus_content );
        $proweb_counter++;
		
		/* about widget #3 */
		$active_widgets[ 'sidebar-about' ][] = 'proweb-about-widget-' . $proweb_counter;
        $ourfocus_content[ $proweb_counter ] = array ( 'title' => 'Excellent Support', 'text' => 'There are many variations of pasasages of Lorem Ipsum available, but the majority have suffered alteration in some form ' );
        update_option( 'widget_proweb-about-widget', $ourfocus_content );
        $proweb_counter++;

		update_option( 'sidebars_widgets', $active_widgets );
		
    endif;
	 
	/**
     * Default Services widgets
     */
	if ( empty ( $active_widgets[ $proweb_sidebars['sidebar-services'] ] ) ):

		$proweb_counter = 1;

        /* services widget #1 */
		$active_widgets[ 'sidebar-services' ][0] = 'proweb-services-widget-' . $proweb_counter;
        $ourfocus_content[ $proweb_counter ] = array ( 'title' => 'Branding', 'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown. ', 'iconclass' => 'icon-tools' );
        update_option( 'widget_proweb-services-widget', $ourfocus_content );
        $proweb_counter++;
		
		/* services widget #2 */
		$active_widgets[ 'sidebar-services' ][] = 'proweb-services-widget-' . $proweb_counter;
        $ourfocus_content[ $proweb_counter ] = array ( 'title' => 'Development', 'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown. ', 'iconclass' => 'icon-video' );
        update_option( 'widget_proweb-services-widget', $ourfocus_content );
        $proweb_counter++;
		
		/* services widget #3 */
		$active_widgets[ 'sidebar-services' ][] = 'proweb-services-widget-' . $proweb_counter;
        $ourfocus_content[ $proweb_counter ] = array ( 'title' => 'Web Design', 'text' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown. ', 'iconclass' => 'icon-mobile' );
        update_option( 'widget_proweb-services-widget', $ourfocus_content );
        $proweb_counter++;

		update_option( 'sidebars_widgets', $active_widgets );
		
    endif;
	
	/**
     * Default Portfolio widgets
     */
	if ( empty ( $active_widgets[ $proweb_sidebars['sidebar-portfolio'] ] ) ):

		$proweb_counter = 1;

        /* portfolio widget #1 */
		$active_widgets[ 'sidebar-portfolio' ][0] = 'proweb-portfolio-widget-' . $proweb_counter;
        $ourfocus_content[ $proweb_counter ] = array ( 'title' => 'Tri Fold Brochure MockUp', 'portfoliotype' => 'graphicdesign', 'image_uri' => get_template_directory_uri()."/images/portfolio1.jpg" );
        update_option( 'widget_proweb-portfolio-widget', $ourfocus_content );
        $proweb_counter++;
		
		/* portfolio widget #2 */
		$active_widgets[ 'sidebar-portfolio' ][] = 'proweb-portfolio-widget-' . $proweb_counter;
        $ourfocus_content[ $proweb_counter ] = array ( 'title' => 'Tri Fold Brochure MockUp', 'portfoliotype' => 'webdevelopment', 'image_uri' => get_template_directory_uri()."/images/portfolio2.jpg" );
        update_option( 'widget_proweb-portfolio-widget', $ourfocus_content );
        $proweb_counter++;
		
		/* portfolio widget #3 */
		$active_widgets[ 'sidebar-portfolio' ][] = 'proweb-portfolio-widget-' . $proweb_counter;
        $ourfocus_content[ $proweb_counter ] = array ( 'title' => 'Tri Fold Brochure MockUp', 'portfoliotype' => 'videoedition', 'image_uri' => get_template_directory_uri()."/images/portfolio3.jpg" );
        update_option( 'widget_proweb-portfolio-widget', $ourfocus_content );
        $proweb_counter++;
		
		/* portfolio widget #4 */
		$active_widgets[ 'sidebar-portfolio' ][] = 'proweb-portfolio-widget-' . $proweb_counter;
        $ourfocus_content[ $proweb_counter ] = array ( 'title' => 'Tri Fold Brochure MockUp', 'portfoliotype' => 'graphicdesign', 'image_uri' => get_template_directory_uri()."/images/portfolio4.jpg" );
        update_option( 'widget_proweb-portfolio-widget', $ourfocus_content );
        $proweb_counter++;
		
		/* portfolio widget #5 */
		$active_widgets[ 'sidebar-portfolio' ][] = 'proweb-portfolio-widget-' . $proweb_counter;
        $ourfocus_content[ $proweb_counter ] = array ( 'title' => 'Tri Fold Brochure MockUp', 'portfoliotype' => 'webdevelopment', 'image_uri' => get_template_directory_uri()."/images/portfolio5.jpg" );
        update_option( 'widget_proweb-portfolio-widget', $ourfocus_content );
        $proweb_counter++;
		
		/* portfolio widget #6 */
		$active_widgets[ 'sidebar-portfolio' ][] = 'proweb-portfolio-widget-' . $proweb_counter;
        $ourfocus_content[ $proweb_counter ] = array ( 'title' => 'Tri Fold Brochure MockUp', 'portfoliotype' => 'videoedition', 'image_uri' => get_template_directory_uri()."/images/portfolio6.jpg" );
        update_option( 'widget_proweb-portfolio-widget', $ourfocus_content );
        $proweb_counter++;
		
		/* portfolio widget #7 */
		$active_widgets[ 'sidebar-portfolio' ][] = 'proweb-portfolio-widget-' . $proweb_counter;
        $ourfocus_content[ $proweb_counter ] = array ( 'title' => 'Tri Fold Brochure MockUp', 'portfoliotype' => 'graphicdesign', 'image_uri' => get_template_directory_uri()."/images/portfolio7.jpg" );
        update_option( 'widget_proweb-portfolio-widget', $ourfocus_content );
        $proweb_counter++;
		
		/* portfolio widget #8 */
		$active_widgets[ 'sidebar-portfolio' ][] = 'proweb-portfolio-widget-' . $proweb_counter;
        $ourfocus_content[ $proweb_counter ] = array ( 'title' => 'Tri Fold Brochure MockUp', 'portfoliotype' => 'webdevelopment', 'image_uri' => get_template_directory_uri()."/images/portfolio8.jpg" );
        update_option( 'widget_proweb-portfolio-widget', $ourfocus_content );
        $proweb_counter++;
		
    endif;
	
	/**
     * Default Pricing widgets
     */
	if ( empty ( $active_widgets[ $proweb_sidebars['sidebar-pricing'] ] ) ):

		$proweb_counter = 1;

        /* pricing widget #1 */
		$active_widgets[ 'sidebar-pricing' ][0] = 'proweb-pricing-widget-' . $proweb_counter;
        $ourfocus_content[ $proweb_counter ] = array ( 'title' => 'Basic Plan', 'text' => '<ul><li>Limited Access</li><li>50 Form Submissions</li><li>200 Bonus Points</li><li>Limited Support</li><li>No Cloud Storage Access</li></ul>', 'discount' => '25', 'price' => '119' );
        update_option( 'widget_proweb-pricing-widget', $ourfocus_content );
        $proweb_counter++;
		
		/* pricing widget #2 */
		$active_widgets[ 'sidebar-pricing' ][] = 'proweb-pricing-widget-' . $proweb_counter;
        $ourfocus_content[ $proweb_counter ] = array ( 'title' => 'Popular Plan', 'text' => '<ul><li>Unlimited Access</li><li>100 Form Submissions</li><li>800 Bonus Points</li><li>Unlimited Support</li><li>Cloud Storage Access</li></ul>', 'discount' => '30', 'price' => '299' );
        update_option( 'widget_proweb-pricing-widget', $ourfocus_content );
        $proweb_counter++;
		
		/* pricing widget #3 */
		$active_widgets[ 'sidebar-pricing' ][] = 'proweb-pricing-widget-' . $proweb_counter;
        $ourfocus_content[ $proweb_counter ] = array ( 'title' => 'Premium Plan', 'text' => '<ul><li>Unlimited Access</li><li>200 Form Submissions</li><li>1000 Bonus Points</li><li>Unlimited Support</li><li>Cloud Storage Access</li></ul>', 'discount' => '15', 'price' => '399' );
        update_option( 'widget_proweb-pricing-widget', $ourfocus_content );
        $proweb_counter++;

		update_option( 'sidebars_widgets', $active_widgets );
		
    endif;

}

/**************************/
/****** about widget */
/************************/

class proweb_about extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'proweb-about-widget',
			__( 'Ministudio - About widget', 'proweb' )
		);
		add_action('admin_enqueue_scripts', array($this, 'widget_scripts'));
	}

	function widget_scripts($hook) {
        if( $hook != 'widgets.php' ) 
            return;
	    wp_enqueue_media();
        wp_enqueue_script('proweb_our_focus_widget_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);
    }

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;
        ?>
		<div class="col-md-4">
			<div class="perweb_m wow animated fadeInUp">	
				<?php if( !empty($instance['title']) ): echo "<h5 class='widget-title'>".apply_filters('widget_title', $instance['title'])."</h5>"; endif; ?>				
				<?php if( !empty($instance['text']) ) { echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text'])); } ?>
			</div>
		</div>
        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance['text'] = stripslashes(wp_filter_post_kses($new_instance['text']));
        $instance['title'] = strip_tags($new_instance['title']);
        
        return $instance;

    }

    function form($instance) {
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'proweb'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Description', 'proweb'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"><?php if( !empty($instance['text']) ): echo htmlspecialchars_decode($instance['text']); endif; ?></textarea>
        </p>
    <?php
    }
}

/**************************/
/****** services widget */
/************************/

class proweb_services extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'proweb-services-widget',
			__( 'Ministudio - Services widget', 'proweb' )
		);
		add_action('admin_enqueue_scripts', array($this, 'widget_scripts'));
	}

	function widget_scripts($hook) {
        if( $hook != 'widgets.php' ) 
            return;
	    wp_enqueue_media();
        wp_enqueue_script('proweb_our_focus_widget_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);
    }

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;
		$service_icon_class = $instance['iconclass'];
        ?>
		<div class="service_detail">
			<span> <i class="<?php echo $service_icon_class;?>"> </i> </span> 
			<?php if( !empty($instance['title']) ): echo "<h5>".apply_filters('widget_title', $instance['title'])."</h5>"; endif; ?>				
			<?php if( !empty($instance['text']) ) { echo "<p>"; echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text'])); echo "</p>"; } ?>
		</div>
        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance['text'] = stripslashes(wp_filter_post_kses($new_instance['text']));
        $instance['title'] = strip_tags($new_instance['title']);
		$instance['iconclass'] = strip_tags($new_instance['iconclass']);

        return $instance;
    }

    function form($instance) {
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'proweb'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Description', 'proweb'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"><?php if( !empty($instance['text']) ): echo htmlspecialchars_decode($instance['text']); endif; ?></textarea>
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('iconclass'); ?>"><?php _e('Icon Class', 'proweb'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('iconclass'); ?>" id="<?php echo $this->get_field_id('iconclass'); ?>" value="<?php if( !empty($instance['iconclass']) ): echo $instance['iconclass']; endif; ?>" class="widefat">
        </p>
    <?php

    }
}

/**************************/
/****** portfolio widget */
/************************/

class proweb_portfolio extends WP_Widget {
	public function __construct() {
		parent::__construct(
			'proweb-portfolio-widget',
			__( 'Ministudio - Portfolio widget', 'proweb' )
		);
		add_action('admin_enqueue_scripts', array($this, 'widget_scripts'));
	}

	function widget_scripts($hook) {
        if( $hook != 'widgets.php' ) 
            return;
	    wp_enqueue_media();
        wp_enqueue_script('proweb_our_focus_widget_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);
    }

    function widget($args, $instance) {

        extract($args);

        echo $before_widget;
		$portfolio_type = $instance['portfoliotype'];
        ?>
		<?php if( !empty($instance['image_uri']) ): ?>
		<div class="element-item <?php echo $portfolio_type;?>">
			<div class="portfolio_wrap">
				<div class="portfolio_img">
					<a href="#"><img src="<?php echo esc_url($instance['image_uri']); ?>"/></a>	
				</div>
				<div class="portfolio_hover">
					<?php if( !empty($instance['title']) ): echo "<h5>".apply_filters('widget_title', $instance['title'])."</h5>"; endif; ?>
					<?php if( !empty($instance['portfoliotype']) ): echo "<p>".apply_filters('widget_title', $instance['portfoliotype'])."</p>"; endif; ?>
				</div>
			</div>
		</div>
		<?php endif; ?>
        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
		$instance['portfoliotype'] = strip_tags($new_instance['portfoliotype']);
        $instance['image_uri'] = strip_tags($new_instance['image_uri']);
		$instance['custom_media_id'] = strip_tags($new_instance['custom_media_id']);

        return $instance;

    }

    function form($instance) {
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'proweb'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('portfoliotype'); ?>"><?php _e('Portfolio Type', 'proweb'); ?></label><br/>
            <select name="<?php echo $this->get_field_name('portfoliotype'); ?>" id="<?php echo $this->get_field_id('portfoliotype'); ?>" class="widefat">
				<option value="graphicdesign" <?php if($instance['portfoliotype']=="graphicdesign"){ echo "selected"; }?>>Graphic Design</option>
				<option value="videoedition" <?php if($instance['portfoliotype']=="videoedition"){ echo "selected"; }?>>Video Edition</option>
				<option value="webdevelopment" <?php if($instance['portfoliotype']=="webdevelopment"){ echo "selected"; }?>>Web Development</option>
			</select>
		
		</p>
        <p>
            <label for="<?php echo $this->get_field_id('image_uri'); ?>"><?php _e('Image', 'proweb'); ?></label><br/>
            <?php
            if ( !empty($instance['image_uri']) ) :
                echo '<img class="custom_media_image" src="' . $instance['image_uri'] . '" style="margin:0;padding:0;max-width:100px;float:left;display:inline-block" alt="'.__( 'Uploaded image', 'proweb' ).'" /><br />';
            endif;
            ?>

            <input type="text" class="widefat custom_media_url" name="<?php echo $this->get_field_name('image_uri'); ?>" id="<?php echo $this->get_field_id('image_uri'); ?>" value="<?php if( !empty($instance['image_uri']) ): echo $instance['image_uri']; endif; ?>" style="margin-top:5px;">

            <input type="button" class="button button-primary custom_media_button" id="custom_media_button" name="<?php echo $this->get_field_name('image_uri'); ?>" value="<?php _e('Upload Image','proweb'); ?>" style="margin-top:5px;"/>
        </p>
		
		<input class="custom_media_id" id="<?php echo $this->get_field_id( 'custom_media_id' ); ?>" name="<?php echo $this->get_field_name( 'custom_media_id' ); ?>" type="hidden" value="<?php if( !empty($instance["custom_media_id"]) ): echo $instance["custom_media_id"]; endif; ?>" />
		
    <?php

    }

}

/**************************/
/****** pricing widget */
/************************/

class proweb_pricing extends WP_Widget {
	
	public function __construct() {
		parent::__construct(
			'proweb-pricing-widget',
			__( 'Ministudio - Pricing widget', 'proweb' )
		);
		add_action('admin_enqueue_scripts', array($this, 'widget_scripts'));
	}

	function widget_scripts($hook) {
        if( $hook != 'widgets.php' ) 
            return;
	    wp_enqueue_media();
        wp_enqueue_script('proweb_our_focus_widget_script', get_template_directory_uri() . '/js/widget.js', false, '1.0', true);
    }
    function widget($args, $instance) {

        extract($args);

        echo $before_widget;
		
		$pricing_discount = $instance['discount'];
		$pricing_price = $instance['price'];
        ?>
		<div class="col-md-4 col-sm-4">
			<div class="price_table wow animated fadeInUp">	
				<?php if($pricing_price){?><h5> <?php echo apply_filters('widget_title', $instance['title']);?>  <span class="pricing"> $ <?php echo $pricing_price;?> / <?php _e( 'mo', 'proweb' ); ?> </span> </h5><?php } ?> 
				<?php if( !empty($instance['text']) ) { echo '<p>'; echo htmlspecialchars_decode(apply_filters('widget_title', $instance['text'])); echo '</p>'; } ?>
				<a class="btn" href="#"><?php _e( 'Buy Now', 'proweb' ); ?></a>
			</div>
		</div>
        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {

        $instance = $old_instance;
        $instance['text'] = stripslashes(wp_filter_post_kses($new_instance['text']));
        $instance['title'] = strip_tags($new_instance['title']);
		$instance['discount'] = strip_tags($new_instance['discount']);
		$instance['price'] = strip_tags($new_instance['price']);


        return $instance;

    }

    function form($instance) {
        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'proweb'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php if( !empty($instance['title']) ): echo $instance['title']; endif; ?>" class="widefat">
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Description', 'proweb'); ?></label><br/>
            <textarea class="widefat" rows="8" cols="20" name="<?php echo $this->get_field_name('text'); ?>" id="<?php echo $this->get_field_id('text'); ?>"><?php if( !empty($instance['text']) ): echo htmlspecialchars_decode($instance['text']); endif; ?></textarea>
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('discount'); ?>"><?php _e('Discount', 'proweb'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('discount'); ?>" id="<?php echo $this->get_field_id('discount'); ?>" value="<?php if( !empty($instance['discount']) ): echo $instance['discount']; endif; ?>" class="widefat">
        </p>
		<p>
            <label for="<?php echo $this->get_field_id('price'); ?>"><?php _e('Price', 'proweb'); ?></label><br/>
            <input type="text" name="<?php echo $this->get_field_name('price'); ?>" id="<?php echo $this->get_field_id('price'); ?>" value="<?php if( !empty($instance['price']) ): echo $instance['price']; endif; ?>" class="widefat">
        </p>
		
    <?php

    }

}


//create the homepage on activation
if (isset($_GET['activated']) && is_admin()){

        $new_page_title = 'Home'; //page title
        $new_page_content = ''; //add here the content of the page
        $new_page_template = 'front-page.php'; //page template. (ex. template-custom.php) Leave blank if you don't want a custom page template.

        //don't change the code bellow, unless you know what you're doing

        $page_check = get_page_by_title($new_page_title);
        $new_page = array(
                'post_type' => 'page', 
                'post_title' => $new_page_title,
                'post_content' => $new_page_content,
                'post_status' => 'publish',
                'post_author' => 1,
        );
        if(!isset($page_check->ID)){
                $new_page_id = wp_insert_post($new_page);
                if(!empty($new_page_template)){
                        update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
                }
        }

}

function themename_after_setup_theme() {
	$home = get_page_by_title( 'Home' );
	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $home->ID );
}
add_action( 'after_setup_theme', 'themename_after_setup_theme' );











if ( ! function_exists( 'proweb_fonts_url' ) ) :
/**
 * Register Google fonts for Proweb.
 *
 * Create your own proweb_fonts_url() function to override in a child theme.
 *
 * @since Proweb 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function proweb_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'proweb' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'proweb' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'proweb' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Proweb 1.0
 */
function proweb_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'proweb_javascript_detection', 0 );

/**
 * Enqueues scripts and styles.
 *
 * @since Proweb 1.0
 */
function proweb_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'proweb-fonts', proweb_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'proweb-style', get_stylesheet_uri() );
	
	// Bootstrap Min stylesheet.
	wp_enqueue_style( 'proweb-bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.4.1' );
	
	// Main stylesheet.
	wp_enqueue_style( 'proweb-main-css', get_template_directory_uri() . '/css/style.css', array(), '3.4.1' );
	
	// Font Awesome stylesheet.
	wp_enqueue_style( 'proweb-font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '3.4.1' );
	
	// Etline Icon stylesheet.
	wp_enqueue_style( 'proweb-font-etline', get_template_directory_uri() . '/css/etline-icon.css', array(), '3.4.1' );
	
	// Animate Min stylesheet.
	wp_enqueue_style( 'proweb-animate', get_template_directory_uri() . '/css/animate.min.css', array(), '3.4.1' );
	
	// Testimonial Slider Carousel stylesheet.
	wp_enqueue_style( 'proweb-carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '3.4.1' );
	
	// Testimonial Slider Transitions stylesheet.
	wp_enqueue_style( 'proweb-transitions', get_template_directory_uri() . '/css/owl.transitions.css', array(), '3.4.1' );
	
	// Google Fonts.
	wp_enqueue_style( 'proweb-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,900' );
	wp_enqueue_style( 'proweb-google-fonts2', 'https://fonts.googleapis.com/css?family=Dancing+Script:400,700' );
	
	//Custom JS Starts
	
	// Jquery.
	wp_enqueue_script( 'jquery');
	
	// Bootstrap Min.
	wp_enqueue_script( 'proweb-bootstrap-min', get_template_directory_uri() . '/js/bootstrap.min.js', array( 'jquery' ), '20160412', true );
	
	// Interface.
	wp_enqueue_script( 'proweb-interface', get_template_directory_uri() . '/js/interface.js', array( 'jquery' ), '20160412', true );
	
	// Isotops.
	wp_enqueue_script( 'proweb-isotops', get_template_directory_uri() . '/js/isotope-docs.min.js', array( 'jquery' ), '20160412', true );
	
	// Owl Carousel.
	wp_enqueue_script( 'proweb-jquery', get_template_directory_uri() . '/js/owl.carousel.min.js', array( 'jquery' ), '20160412', true );
	
	// Wow Min.
	wp_enqueue_script( 'proweb-jquery', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery' ), '20160412', true );
	
	//Custom JS Ends

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_localize_script( 'proweb-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'proweb' ),
		'collapse' => __( 'collapse child menu', 'proweb' ),
	) );
}
add_action( 'wp_enqueue_scripts', 'proweb_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since Proweb 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function proweb_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}

	// Adds a class of group-blog to sites with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of no-sidebar to sites without active sidebar.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'proweb_body_classes' );

/**
 * Converts a HEX value to RGB.
 *
 * @since Proweb 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
function proweb_hex2rgb( $color ) {
	$color = trim( $color, '#' );

	if ( strlen( $color ) === 3 ) {
		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
	} else if ( strlen( $color ) === 6 ) {
		$r = hexdec( substr( $color, 0, 2 ) );
		$g = hexdec( substr( $color, 2, 2 ) );
		$b = hexdec( substr( $color, 4, 2 ) );
	} else {
		return array();
	}

	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
}

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since Proweb 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function proweb_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'proweb_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since Proweb 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function proweb_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'proweb_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since Proweb 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
function proweb_widget_tag_cloud_args( $args ) {
	$args['largest'] = 1;
	$args['smallest'] = 1;
	$args['unit'] = 'em';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'proweb_widget_tag_cloud_args' );

/**
 * Redirect users after add to cart.
 */
function proweb_add_to_cart_redirect( $url ) {
	$url = WC()->cart->get_cart_url();
	return $url;
}
add_filter( 'woocommerce_add_to_cart_redirect', 'proweb_add_to_cart_redirect' );