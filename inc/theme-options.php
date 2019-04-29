<?php
function proweb_theme_customizer( $wp_customize ) {
	/*Banner Section*/
    $wp_customize->add_section( 'proweb_banner_section' , array(
		'title'       => __( 'Banner Section', 'proweb' ),
		'priority'    => 200,
		'description' => __('Change Banner options here.', 'proweb'),
	) );
	
	$wp_customize->add_setting( 'proweb_banner_banner', array( 'sanitize_callback' => 'esc_url_raw','default' => get_template_directory_uri().'/images/banner.jpg'));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'proweb_banner_banner', array(
		'label'    => __( 'Banner', 'proweb' ),
		'section'  => 'proweb_banner_section',
	)));
	
	$wp_customize->add_setting( 'proweb_banner_active' , array ( 'default' => '1','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_banner_active', array(
	  'label' => __( 'Active', 'proweb' ),
	  'type' => 'checkbox',
	  'section' => 'proweb_banner_section',
	) );
	$wp_customize->add_setting( 'proweb_banner_title' , array ( 'default' => 'High Quality <em>Services</em>','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_banner_title', array(
	  'label' => __( 'Title', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_banner_section',
	) );
	$wp_customize->add_setting( 'proweb_banner_desc' , array ( 'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_banner_desc', array(
	  'label' => __( 'Description', 'proweb' ),
	  'type' => 'textarea',
	  'section' => 'proweb_banner_section',
	) );
	$wp_customize->add_setting( 'proweb_banner_link' , array ( 'default' => '#/','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_banner_link', array(
	  'label' => __( 'Link', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_banner_section',
	) );
	
	/*About Section*/
    $wp_customize->add_section( 'proweb_about_section' , array(
		'title'       => __( 'About Section', 'proweb' ),
		'priority'    => 200,
		'description' => __('Change about options here.', 'proweb'),
	) );
	
	$wp_customize->add_setting( 'proweb_about_active' , array ( 'default' => '1','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_about_active', array(
	  'label' => __( 'Active', 'proweb' ),
	  'type' => 'checkbox',
	  'section' => 'proweb_about_section',
	) );
	$wp_customize->add_setting( 'proweb_about_title' , array ( 'default' => 'About Us','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_about_title', array(
	  'label' => __( 'Title', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_about_section',
	) );
	$wp_customize->add_setting( 'proweb_about_subtitle' , array ( 'default' => 'Welcome to <em>Proweb</em>','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_about_subtitle', array(
	  'label' => __( 'Sub Title', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_about_section',
	) );
	$wp_customize->add_setting( 'proweb_about_desc' , array ( 'default' => ' Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. ','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_about_desc', array(
	  'label' => __( 'Description', 'proweb' ),
	  'type' => 'textarea',
	  'section' => 'proweb_about_section',
	) );
	
	/*Services Section*/
    $wp_customize->add_section( 'proweb_services_section' , array(
		'title'       => __( 'Services Section', 'proweb' ),
		'priority'    => 200,
		'description' => __('Change Services options here.', 'proweb'),
	) );
	
	$wp_customize->add_setting( 'proweb_services_banner', array( 'sanitize_callback' => 'esc_url_raw','default' => get_template_directory_uri().'/images/serviceimg.png'));
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'proweb_services_banner', array(
		'label'    => __( 'Banner', 'proweb' ),
		'section'  => 'proweb_services_section',
	)));
	
	$wp_customize->add_setting( 'proweb_services_active' , array ( 'default' => '1','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_services_active', array(
	  'label' => __( 'Active', 'proweb' ),
	  'type' => 'checkbox',
	  'section' => 'proweb_services_section',
	) );
	$wp_customize->add_setting( 'proweb_services_title' , array ( 'default' => 'What we do','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_services_title', array(
	  'label' => __( 'Title', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_services_section',
	) );
	$wp_customize->add_setting( 'proweb_services_subtitle' , array ( 'default' => 'We are here to <em>Serve you</em>','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_services_subtitle', array(
	  'label' => __( 'Sub Title', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_services_section',
	) );
	$wp_customize->add_setting( 'proweb_services_desc' , array ( 'default' => '','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_services_desc', array(
	  'label' => __( 'Description', 'proweb' ),
	  'type' => 'textarea',
	  'section' => 'proweb_services_section',
	) );
	
	/*Portfolio Section*/
    $wp_customize->add_section( 'proweb_portfolio_section' , array(
		'title'       => __( 'Portfolio Section', 'proweb' ),
		'priority'    => 200,
		'description' => __('Change portfolio options here.', 'proweb'),
	) );
	
	$wp_customize->add_setting( 'proweb_portfolio_active' , array ( 'default' => '1','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_portfolio_active', array(
	  'label' => __( 'Active', 'proweb' ),
	  'type' => 'checkbox',
	  'section' => 'proweb_portfolio_section',
	) );
	$wp_customize->add_setting( 'proweb_portfolio_title' , array ( 'default' => 'Our Portfolio','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_portfolio_title', array(
	  'label' => __( 'Title', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_portfolio_section',
	) );
	$wp_customize->add_setting( 'proweb_portfolio_subtitle' , array ( 'default' => 'Our Creative <em>Works</em>','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_portfolio_subtitle', array(
	  'label' => __( 'Sub Title', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_portfolio_section',
	) );
	$wp_customize->add_setting( 'proweb_portfolio_desc' , array ( 'default' => '','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_portfolio_desc', array(
	  'label' => __( 'Description', 'proweb' ),
	  'type' => 'textarea',
	  'section' => 'proweb_portfolio_section',
	) );
	
	/*Pricing Section*/
    $wp_customize->add_section( 'proweb_pricing_section' , array(
		'title'       => __( 'Pricing Section', 'proweb' ),
		'priority'    => 200,
		'description' => __('Change pricing options here.', 'proweb'),
	) );
	
	$wp_customize->add_setting( 'proweb_pricing_active' , array ( 'default' => '1','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_pricing_active', array(
	  'label' => __( 'Active', 'proweb' ),
	  'type' => 'checkbox',
	  'section' => 'proweb_pricing_section',
	) );
	$wp_customize->add_setting( 'proweb_pricing_title' , array ( 'default' => 'Our Pricing','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_pricing_title', array(
	  'label' => __( 'Title', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_pricing_section',
	) );
	$wp_customize->add_setting( 'proweb_pricing_subtitle' , array ( 'default' => 'Affordable <em>Pricing</em>','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_pricing_subtitle', array(
	  'label' => __( 'Sub Title', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_pricing_section',
	) );
	$wp_customize->add_setting( 'proweb_pricing_desc' , array ( 'default' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_pricing_desc', array(
	  'label' => __( 'Description', 'proweb' ),
	  'type' => 'textarea',
	  'section' => 'proweb_pricing_section',
	) );
	
	/*Shop Section*/
    $wp_customize->add_section( 'proweb_shop_section' , array(
		'title'       => __( 'Shop Section', 'proweb' ),
		'priority'    => 200,
		'description' => __('Change Shop options here.', 'proweb'),
	) );
	
	$wp_customize->add_setting( 'proweb_shop_active' , array ( 'default' => '1','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_shop_active', array(
	  'label' => __( 'Active', 'proweb' ),
	  'type' => 'checkbox',
	  'section' => 'proweb_shop_section',
	) );
	$wp_customize->add_setting( 'proweb_shop_title' , array ( 'default' => 'Our Collection','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_shop_title', array(
	  'label' => __( 'Title', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_shop_section',
	) );
	$wp_customize->add_setting( 'proweb_shop_subtitle' , array ( 'default' => 'Choose the <em>product</em>','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_shop_subtitle', array(
	  'label' => __( 'Sub Title', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_shop_section',
	) );
	$wp_customize->add_setting( 'proweb_shop_desc' , array ( 'default' => '','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_shop_desc', array(
	  'label' => __( 'Description', 'proweb' ),
	  'type' => 'textarea',
	  'section' => 'proweb_shop_section',
	) );
	
	/*Blog Section*/
    $wp_customize->add_section( 'proweb_blog_section' , array(
		'title'       => __( 'Blog Section', 'proweb' ),
		'priority'    => 200,
		'description' => __('Change Blog options here.', 'proweb'),
	) );
	
	$wp_customize->add_setting( 'proweb_blog_active' , array ( 'default' => '1','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_blog_active', array(
	  'label' => __( 'Active', 'proweb' ),
	  'type' => 'checkbox',
	  'section' => 'proweb_blog_section',
	) );
	$wp_customize->add_setting( 'proweb_blog_title' , array ( 'default' => 'Recent Posts','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_blog_title', array(
	  'label' => __( 'Title', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_blog_section',
	) );
	$wp_customize->add_setting( 'proweb_blog_subtitle' , array ( 'default' => 'Find you Through <em>Our Blog</em>','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_blog_subtitle', array(
	  'label' => __( 'Sub Title', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_blog_section',
	) );
	$wp_customize->add_setting( 'proweb_blog_desc' , array ( 'default' => '','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_blog_desc', array(
	  'label' => __( 'Description', 'proweb' ),
	  'type' => 'textarea',
	  'section' => 'proweb_blog_section',
	) );
	
	/*Contact Section*/
    $wp_customize->add_section( 'proweb_contact_section' , array(
		'title'       => __( 'Contact Section', 'proweb' ),
		'priority'    => 200,
		'description' => __('Change Contact options here.', 'proweb'),
	) );
	
	$wp_customize->add_setting( 'proweb_contact_active' , array ( 'default' => '1','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_contact_active', array(
	  'label' => __( 'Active', 'proweb' ),
	  'type' => 'checkbox',
	  'section' => 'proweb_contact_section',
	) );
	$wp_customize->add_setting( 'proweb_contact_title' , array ( 'default' => 'Contact Us','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_contact_title', array(
	  'label' => __( 'Title', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_contact_section',
	) );
	$wp_customize->add_setting( 'proweb_contact_subtitle' , array ( 'default' => 'Get in <em>Touch with Us</em>','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_contact_subtitle', array(
	  'label' => __( 'Sub Title', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_contact_section',
	) );
	$wp_customize->add_setting( 'proweb_contact_desc' , array ( 'default' => '','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_contact_desc', array(
	  'label' => __( 'Description', 'proweb' ),
	  'type' => 'textarea',
	  'section' => 'proweb_contact_section',
	) );
	
	
	/*Site Option Section*/
    $wp_customize->add_section( 'proweb_site_option_section' , array(
		'title'       => __( 'Site Option Section', 'proweb' ),
		'priority'    => 200,
		'description' => __('Change site options here.', 'proweb'),
	) );
	
	$wp_customize->add_setting( 'proweb_blog_layout' , array ( 'default' => 'rightsidebar','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_blog_layout', array(
	  'label' => __( 'Select Blog Layout', 'proweb' ),
	  'type' => 'select',
	  'choices' => array(
		'rightsidebar' => 'Right Sidebar',
		'leftsidebar' => 'Left Sidebar',
		'nosidebar' => 'Full Width',
	  ),
	  'default' => 'Hide',
	  'section' => 'proweb_site_option_section',
	) );
	
	$wp_customize->add_setting( 'proweb_footer_contact_desc' , array ( 'default' => '','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_footer_contact_desc', array(
	  'label' => __( 'Footer Contact Description', 'proweb' ),
	  'type' => 'textarea',
	  'section' => 'proweb_site_option_section',
	) );
	
	$wp_customize->add_setting( 'proweb_formshortcode' , array ( 'default' => '','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_formshortcode', array(
	  'label' => __( 'Contact Form Shortcode ID', 'proweb' ),
	  'type' => 'number',
	  'section' => 'proweb_site_option_section',
	) );
	
	$wp_customize->add_setting( 'proweb_address' , array ( 'default' => '','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_address', array(
	  'label' => __( 'Footer Address', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_site_option_section',
	) );
	
	$wp_customize->add_setting( 'proweb_email' , array ( 'default' => '','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_email', array(
	  'label' => __( 'Footer Email', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_site_option_section',
	) );
	
	$wp_customize->add_setting( 'proweb_telephone' , array ( 'default' => '','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_telephone', array(
	  'label' => __( 'Footer Telephone', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_site_option_section',
	) );
	
	$wp_customize->add_setting( 'proweb_map_address' , array ( 'default' => '','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_map_address', array(
	  'label' => __( 'Footer Map Address', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_site_option_section',
	) );
	
	$wp_customize->add_setting( 'proweb_social_media_fb' , array ( 'default' => '','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_social_media_fb', array(
	  'label' => __( 'Facebook Link', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_site_option_section',
	) );
	
	$wp_customize->add_setting( 'proweb_social_media_tw' , array ( 'default' => '','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_social_media_tw', array(
	  'label' => __( 'Twitter Link', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_site_option_section',
	) );
	
	$wp_customize->add_setting( 'proweb_social_media_in' , array ( 'default' => '','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_social_media_in', array(
	  'label' => __( 'Linkdine Link', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_site_option_section',
	) ); 
	
	$wp_customize->add_setting( 'proweb_social_media_gp' , array ( 'default' => '','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_social_media_gp', array(
	  'label' => __( 'GooglePlus Link', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_site_option_section',
	) ); 
	
	$wp_customize->add_setting( 'proweb_footer_copyright' , array ( 'default' => '','sanitize_callback' => 'esc_html'));
	$wp_customize->add_control( 'proweb_footer_copyright', array(
	  'label' => __( 'Copyright Text', 'proweb' ),
	  'type' => 'text',
	  'section' => 'proweb_site_option_section',
	) );
}
add_action( 'customize_register', 'proweb_theme_customizer' );



?>