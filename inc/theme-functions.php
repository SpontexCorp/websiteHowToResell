<?php
function proweb_fun_navbar()
{	
$front_services_active = get_theme_mod('proweb_services_active','1');
$front_portfolio_active = get_theme_mod('proweb_portfolio_active','1');
$front_pricing_active = get_theme_mod('proweb_pricing_active','1');
$front_product_active = get_theme_mod('proweb_shop_active','1');
$front_blog_active = get_theme_mod('proweb_blog_active','1');
$front_contact_active = get_theme_mod('proweb_contact_active','1');
?>
<header class="navbar navfixedhide">
	<div class="container">
    	<div class="row">
            <div class="header_top">
        		<div class="col-md-2 col-md-2 col-xs-9">
            		<div class="logo_img">
						<a href="<?php echo home_url();?>"><?php proweb_the_custom_logo(); ?></a>
					</div>
				</div>
					
				<div class="col-md-10">
					<div class="menu_bar">	
						 <nav class="navbar navbar-default">
							<div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                  <span class="sr-only"><?php _e( 'Toggle navigation', 'proweb' ); ?></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                </button>
							   </div>
							   
							   <div id="navbar" class="navbar-collapse collapse">
									<ul class="nav navbar-nav">
									  <li class="active"><a href="#home" class="js-target-scroll"><?php _e( 'Home', 'proweb' ); ?></a></li>
									  <?php if($front_services_active){?><li><a href="#our_services" class="js-target-scroll"><?php _e( 'Services', 'proweb' ); ?></a></li><?php } ?>
									  <?php if($front_portfolio_active){?><li><a href="#our_portfolio" class="js-target-scroll"><?php _e( 'Portfolio', 'proweb' ); ?></a></li><?php } ?>
									  <?php if($front_pricing_active){?><li><a href="#pricing" class="js-target-scroll"><?php _e( 'Pricing', 'proweb' ); ?></a></li><?php } ?>
									  <?php if($front_blog_active){?><li><a href="#blog" class="js-target-scroll"><?php _e( 'Blog', 'proweb' ); ?></a></li><?php } ?>
									  <?php if($front_product_active){?><li><a href="#shop" class="js-target-scroll"><?php _e( 'Shop', 'proweb' ); ?></a></li><?php } ?>
                                      <?php if($front_contact_active){?><li><a href="#contact_us" class="js-target-scroll"><?php _e( 'Contact', 'proweb' ); ?></a></li><?php } ?>
									</ul>  

                          	</div>
						</nav>
					</div>
    	        </div>
			 </div>
              
			</div>
		</div>
</header>
<?php
}
?>
<?php
function proweb_fun_navbar_inner()
{	
$front_services_active = get_theme_mod('proweb_services_active','1');
$front_portfolio_active = get_theme_mod('proweb_portfolio_active','1');
$front_pricing_active = get_theme_mod('proweb_pricing_active','1');
$front_product_active = get_theme_mod('proweb_shop_active','1');
$front_blog_active = get_theme_mod('proweb_blog_active','1');
$front_contact_active = get_theme_mod('proweb_contact_active','1');
?>
<header class="navbar navfixedhide">
	<div class="container">
    	<div class="row">
            <div class="header_top">
        		<div class="col-md-2 col-md-2 col-xs-9">
            		<div class="logo_img">
						<a href="<?php echo home_url();?>"><?php proweb_the_custom_logo(); ?></a>
					</div>
				</div>
					
				<div class="col-md-10">
					<div class="menu_bar">	
						 <nav class="navbar navbar-default">
							<div class="navbar-header">
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                  <span class="sr-only"><?php _e( 'Toggle navigation', 'proweb' ); ?></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                  <span class="icon-bar"></span>
                                </button>
							   </div>
							   
							   <div id="navbar" class="navbar-collapse collapse">
									<?php if ( has_nav_menu( 'primary' ) ) : ?>
										<?php
											wp_nav_menu( array(
												'theme_location' => 'primary',
												'menu_class'     => 'nav navbar-nav',
											 ) );
										?>	
									<?php endif; ?>
                          	</div>
						</nav>
					</div>
    	        </div>
			 </div>
              
			</div>
		</div>
</header>
<?php
}
?>
<?php
function proweb_fun_home_banner()
{
$front_banner_active = get_theme_mod('proweb_banner_active','1');
$front_banner_banner = get_theme_mod('proweb_banner_banner',get_template_directory_uri().'/images/banner.jpg');
$front_banner_title = get_theme_mod('proweb_banner_title','High Quality <em>Services</em>');
$front_banner_description = get_theme_mod('proweb_banner_desc','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.');
$front_banner_button_link = get_theme_mod('proweb_banner_link','#/');

if($front_banner_active):
?>
<main class="masthead peroweb_bg" <?php if($front_banner_banner){?>style="background: hsla(0, 0%, 0%, 0) url(<?php echo $front_banner_banner;?>) no-repeat scroll center center / cover"<?php } ?>>
    <div class="mouse">
	</div>
    <div class="opener">
        <div class="container rel-1">
			<div class="row">
				<div class="text-center col-lg-10 col-lg-offset-1 banner_text">
					<?php if($front_banner_title){ echo '<h1>'.$front_banner_title.'</h1>'; } ?>
					<div class="lead wow fadeIn">
						<?php if($front_banner_description){ echo '<p class="lead-text">'.$front_banner_description.'</p>'; } ?>
					</div>
					<?php if($front_banner_button_link){?><a class="btn banner_btn" href="<?php echo $front_banner_button_link;?>"><?php _e( 'Read More', 'proweb' ); ?></a><?php } ?>
					<div class="banner_bottom_btn">
						<a href="#welcome_proweb" class="js-target-scroll"> <img src="<?php echo get_template_directory_uri();?>/images/banner_botton_btn.png" alt="button"> </a>                	
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<?php
endif;
}
?>
<?php
function proweb_fun_welcome_section()
{
$front_about_us_active = get_theme_mod('front_about_us_active','1');
$front_about_us_title = get_theme_mod('front_about_us_title','About Us');
$front_about_us_sub_title = get_theme_mod('front_about_us_sub_title','Welcome to <em>Proweb</em>');
$front_banner_description = get_theme_mod('front_banner_description','Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.');

if($front_about_us_active):
?>
<section id="welcome_proweb" class="about_us">
	<div class="container">
    	<div class="row">
        	<div class="col-md-12">
            	<div class="section_heading wow animated fadeInUp">
                	<?php if($front_about_us_title){ echo '<h2 class="section_title">'.$front_about_us_title.'</h2>'; } ?>
                    <?php if($front_about_us_sub_title){ echo '<h2>'.$front_about_us_sub_title.'</h2>'; } ?>
                </div>
				<div class="section_text">
					<?php if($front_banner_description){ echo '<p>'.$front_banner_description.'</p>'; } ?>
				</div>
				<?php
				if ( is_active_sidebar( 'sidebar-about' ) ) :
					dynamic_sidebar( 'sidebar-about' );
				endif;
				?>
            </div>
        </div>
    </div>
</section>
<?php 
endif;
} 
?>
<?php
function proweb_fun_services()
{
$front_services_active = get_theme_mod('proweb_services_active','1');
$front_services_title = get_theme_mod('proweb_services_title','What we do');
$front_services_sub_title = get_theme_mod('proweb_services_subtitle','We are here to <em>Serve you</em>');
$front_services_description = get_theme_mod('proweb_services_desc');
$front_services_banner = get_theme_mod('proweb_services_banner',get_template_directory_uri().'/images/serviceimg.png');
if($front_services_active):
?>
<section id="our_services" class="serve_you">
	<div class="container">
    	<div class="row">
        	<div class="section_heading wow animated fadeInUp">
				<?php if($front_services_title){ echo '<h2 class="section_title">'.$front_services_title.'</h2>'; } ?>
                <?php if($front_services_sub_title){ echo '<h2>'.$front_services_sub_title.'</h2>'; } ?>
			</div>
			<div class="section_text">
				<?php if($front_services_description){ echo '<p>'.$front_services_description.'</p>'; } ?>
			</div>
             
			<div class="col-md-6 pull-right">
				<div class="service_detail_m wow animated fadeInUp">
					<?php
					if ( is_active_sidebar( 'sidebar-services' ) ) :
						dynamic_sidebar( 'sidebar-services' );
					endif;
					?>
				</div>
			</div>
                
            <div class="col-md-6">
                <div class="service_img">
                	<?php if($front_services_banner){?><img src="<?php echo $front_services_banner;?>"><?php } ?>
                </div>
  			</div>      
		</div>
    </div>
</section>
<?php
endif;
}
?>
<?php
function proweb_fun_portfolio()
{
$front_portfolio_active = get_theme_mod('proweb_portfolio_active','1');
$front_portfolio_title = get_theme_mod('proweb_portfolio_title','Our Portfolio');
$front_portfolio_sub_title = get_theme_mod('proweb_portfolio_subtitle','Our Creative <em>Works</em>');
$front_portfolio_description = get_theme_mod('proweb_portfolio_desc');

$proweb_portfolio_layout = get_theme_mod('proweb_portfolio_layout','style1');

if($front_portfolio_active):
?>
<section id="our_portfolio" class="portfolio">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="section_heading wow animated fadeInUp">
					<?php if($front_portfolio_title){ echo '<h2 class="section_title">'.$front_portfolio_title.'</h2>'; } ?>
					<?php if($front_portfolio_sub_title){ echo '<h2>'.$front_portfolio_sub_title.'</h2>'; } ?>
				</div>
				<div class="section_text">
					<?php if($front_portfolio_description){ echo '<p>'.$front_portfolio_description.'</p>'; } ?>
				</div>
			</div>
		</div>
	</div>
	
	<div class="" data-js-module="hero-demo">
		<div class="filters button-group js-radio-button-group">
			<button class="button is-checked" data-filter="*"><?php _e( 'All', 'proweb' ); ?></button>
			<button class="button" data-filter=".graphicdesign"><?php _e( 'Graphic Design', 'proweb' ); ?></button>
			<button class="button" data-filter=".videoedition"><?php _e( 'Video Edition', 'proweb' ); ?></button>
			<button class="button" data-filter=".webdevelopment"><?php _e( 'Web Development', 'proweb' ); ?></button>
		</div>
		
		<?php if($proweb_portfolio_layout=="style1") { ?> 
			<div class="all_portfolio grid">
				<?php
				if ( is_active_sidebar( 'sidebar-portfolio' ) ) :
					dynamic_sidebar( 'sidebar-portfolio' );
				endif;
				?>
			</div> 
		<?php } elseif($proweb_portfolio_layout=="style2") { ?>
			<div class="all_portfolio grid portfolio_style2">
				<?php
				if ( is_active_sidebar( 'sidebar-portfolio' ) ) :
					dynamic_sidebar( 'sidebar-portfolio' );
				endif;
				?>
			</div>
		<?php } else { ?>
			<div class="all_portfolio grid portfolio_style3">
				<?php
				if ( is_active_sidebar( 'sidebar-portfolio' ) ) :
					dynamic_sidebar( 'sidebar-portfolio' );
				endif;
				?>
			</div>
		<?php } ?>
    </div>                
</section>
<?php
endif;
}
?>
<?php
function proweb_fun_pricing()
{
$front_pricing_active = get_theme_mod('proweb_pricing_active','1');
$front_pricing_title = get_theme_mod('proweb_pricing_title','Our Pricing');
$front_pricing_sub_title = get_theme_mod('proweb_pricing_subtitle','Affordable <em>Pricing</em>');
$front_pricing_description = get_theme_mod('proweb_pricing_desc','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.');

$proweb_pricing_layout = get_theme_mod('proweb_pricing_layout','style1');

if($front_pricing_active):
?>
<section id="pricing" class="our_pricing">
	<div class="container">
    	<div class="row">	
			<div class="section_heading wow animated fadeInUp">
				<?php if($front_pricing_title){ echo '<h2 class="section_title">'.$front_pricing_title.'</h2>'; } ?>
				<?php if($front_pricing_sub_title){ echo '<h2>'.$front_pricing_sub_title.'</h2>'; } ?>
			</div>
			<div class="section_text">
				<?php if($front_pricing_description){ echo '<p>'.$front_pricing_description.'</p>'; } ?>
			</div>
			<?php
			if ( is_active_sidebar( 'sidebar-pricing' ) ) :
				dynamic_sidebar( 'sidebar-pricing' );
			endif;
			?>
		</div>
	</div>
</section>
<?php
endif;
}
?>
<?php
function proweb_fun_latest_product()
{
$front_product_active = get_theme_mod('proweb_shop_active','1');
$front_product_title = get_theme_mod('proweb_shop_title','Our Collection');
$front_product_sub_title = get_theme_mod('proweb_shop_subtitle','Choose the <em>product</em>');
$front_product_description = get_theme_mod('proweb_shop_desc');
if($front_product_active):
?>
<section id="shop" class="product">
	<div class="container">
    	<div class="row">		
			<div class="section_heading wow animated fadeInUp">
				<?php if($front_product_title){ echo '<h2 class="section_title">'.$front_product_title.'</h2>'; } ?>
				<?php if($front_product_sub_title){ echo '<h2>'.$front_product_sub_title.'</h2>'; } ?>
			</div>
			<div class="section_text">
				<?php if($front_product_description){ echo '<p>'.$front_product_description.'</p>'; } ?>
			</div>
			<?php
			$args = array( 'post_type' => 'product', 'posts_per_page' => 8 );
			$loop = new WP_Query( $args );
			$count=1;
			while ( $loop->have_posts() ) : $loop->the_post();
			$regular_price = get_post_meta( get_the_ID(), '_regular_price');
			$sale_price = get_post_meta( get_the_ID(), '_sale_price');
			global $product;
			$price_symbol = get_woocommerce_currency_symbol(  );
			?>
			<div class="col-md-3 col-sm-6">
				<div class="product_detail wow animated fadeInUp">
					<div class="product_image">
						<?php the_post_thumbnail(); ?>
						<div class="view_detail">
							<a href="#" class="btn" data-toggle="modal" data-target="#product_detail_<?php echo $count;?>"><?php _e( 'Quick View', 'proweb' ); ?></a>
						</div>
					</div>
					<h6> <a href="<?php the_permalink();?>"><?php the_title();?></a></h6>
					<p><?php echo $price_symbol.$regular_price[0];?></p>
				</div>
			</div>
		    <!-- start-product-popup-Div-->
			<div class="modal fade bs-example-modal-lg" id="product_detail_<?php echo $count;?>">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="col-md-4">
								<div class="product_image">
									<?php the_post_thumbnail(); ?>
								</div>
							</div>
							<div class="col-md-8">
								<h3><?php the_title();?></h3>
								<p class="product_price"><?php echo $price_symbol.$regular_price[0];?></p>
								<div class="product_des">
									<?php the_excerpt();?>
								</div>
								<a href="<?php echo do_shortcode('[add_to_cart_url id="'.get_the_ID().'"]');?>" class="btn"><?php _e( 'Order Now', 'proweb' ); ?></a>
							</div>
							<div class="clearfix"></div>
						</div>
                    </div>
                </div>
			</div> 
			<!-- end-product-popup-Div-->
			<?php
			$count++;
			endwhile;
			?>  
			
		</div>
	</div>
</section>
<?php
endif;
}
?>
<?php
function proweb_fun_blog()
{
$front_blog_active = get_theme_mod('proweb_blog_active','1');
$front_blog_title = get_theme_mod('proweb_blog_title','Recent Posts');
$front_blog_sub_title = get_theme_mod('proweb_blog_subtitle','Find you Through <em>Our Blog</em>');
$front_blog_desciption = get_theme_mod('proweb_blog_desc');
if($front_blog_active):
?>
<section id="blog" class="recent_post">
	<div class="container">
    	<div class="row">
			<div class="section_heading wow animated fadeInUp">
				<?php if($front_blog_title){ echo '<h2 class="section_title">'.$front_blog_title.'</h2>'; } ?>
				<?php if($front_blog_sub_title){ echo '<h2>'.$front_blog_sub_title.'</h2>'; } ?>
			</div>
			<div class="section_text">
				<?php if($front_blog_desciption){ echo '<p>'.$front_blog_desciption.'</p>'; } ?>
			</div> 
			<?php
			$args = array( 'post_type' => 'post', 'posts_per_page' => 6 );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post();
			$category_id = get_the_category(get_the_ID())[0]->term_id;
			$category_name = get_the_category(get_the_ID())[0]->name;
			?>
			<div class="col-md-6">
				<div class="recent_post_detail wow animated fadeInUp">
					<div class="recent_img_section">
						<div class="recent_img">
							<a href="<?php the_permalink();?>"><?php the_post_thumbnail(); ?></a>
						</div>                
						<div class="cetegory_section">
							<a href="<?php echo get_category_link( $category_id ); ?>"><?php echo $category_name; ?></a>
						</div>
					</div>
					<div class="recent_text">
						<p class="date"> <?php the_time('j M y'); ?> </p>
						<h6> <a href="<?php the_permalink();?>"><?php the_title();?></a> </h6>
						<?php the_excerpt();?>
						<a href="<?php the_permalink();?>"> <?php _e( 'Read More', 'proweb' ); ?> </a>
					</div>
				</div>
			</div>				
			<?php
			endwhile;
			?>
		</div>
	</div>
</section>
<?php
endif;
}
?>
<?php
function proweb_fun_contact_section()
{
$front_contact_active = get_theme_mod('proweb_contact_active','1');
$front_contact_title = get_theme_mod('proweb_contact_title','Contact Us');
$front_contact_sub_title = get_theme_mod('front_contact_sub_title','Get in <em>Touch with Us</em>');
$front_contact_description = get_theme_mod('front_contact_description');

$proweb_formshortcode = get_theme_mod('proweb_formshortcode','4');
$proweb_address = get_theme_mod('proweb_address','New York City Office Greenpoint Ave, USA');
$proweb_email = get_theme_mod('proweb_email','contact@site.com');
$proweb_telephone = get_theme_mod('proweb_telephone','(555)6666');
$proweb_map_address = get_theme_mod('proweb_map_address','New York City Office Greenpoint Ave, USA');

if($front_contact_active):
?>
<section id="contact_us" class="contact">
	<div class="container">
    	<div class="row">	
			<div class="section_heading wow animated fadeInUp">
				<?php if($front_contact_title){ echo '<h2 class="section_title">'.$front_contact_title.'</h2>'; } ?>
				<?php if($front_contact_sub_title){ echo '<h2>'.$front_contact_sub_title.'</h2>'; } ?>
			</div>
			<div class="section_text">
				<?php if($front_contact_description){ echo '<p>'.$front_contact_description.'</p>'; } ?>
			</div> 
			<div class="col-md-12">  
				<div class="contact_detail wow animated fadeInUp">
					<?php if($proweb_address){ ?>
					<div class="col-md-4 col-sm-4">
						<div class="contact_detail_m">
							<i class=" icon-map"></i>
							<h5><?php echo $proweb_address;?></h5>  
							<span> <i class="icon-map"></i> </span>                          
						</div>
					</div>
					<?php } ?>           
					<?php if($proweb_email){ ?>                   
					<div class="col-md-4 col-sm-4">
						<div class="contact_detail_m">
							<i class=" icon-envelope"></i>
							<h5><a href="<?php echo $proweb_email;?>"><?php echo $proweb_email;?></a></h5>
							<span><i class="icon-envelope"></i> </span>  
						</div>
					</div>
					<?php } ?>              
					<?php if($proweb_telephone){ ?>
					<div class="col-md-4 col-sm-4">
						<div class="contact_detail_m">
							<i class=" icon-phone"></i>
							<h5><?php echo $proweb_telephone;?></h5>
							<span><i class="icon-phone"></i></span>  
						</div>
					</div>
					<?php } ?>
				</div>  
			</div>
			<div class="contact_form contact_form_m"><?php if($proweb_formshortcode) { echo do_shortcode('[contact-form-7 id="'.$proweb_formshortcode.'"]'); } ?></div>
      </div>
   </div>
    
	<?php if($proweb_map_address){?> 
    <div class="map">
    	<div style="text-decoration:none; overflow:hidden; height:462px; width:100%; max-width:100%;">
                 <div style="height:462px;width:100%;max-width:100%;" id="google-maps-display">
                	 <iframe frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=<?php echo $proweb_map_address;?>&amp;key=AIzaSyAN0om9mFmy1QN6Wf54tXAowK4eT0ZUPrU" style="height:100%;width:100%;border:0;"></iframe>
                 </div>
        </div>
    </div>
	<?php } ?>
</section>
<?php
endif;
}
?>
<?php
function proweb_fun_footer()
{
$proweb_footer_text = get_theme_mod('proweb_footer_contact_desc','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. ');
$proweb_social_media_fb = get_theme_mod('proweb_social_media_fb','#/');
$proweb_social_media_tw = get_theme_mod('proweb_social_media_tw','#/');
$proweb_social_media_in = get_theme_mod('proweb_social_media_in','#/');
$proweb_social_media_gp = get_theme_mod('proweb_social_media_gp','#/');
$proweb_footer_copyright = get_theme_mod('proweb_copyright_text','Copyright &copy; Proweb 2016. All rights reserved.');
?>
<footer class="primary-bg wow animated fadeInUp">
	<div class="container">
		<div class="row">	
            <div class="col-md-12">
            	<div class="footer_detail">
    				<a href="<?php echo home_url();?>"><?php proweb_the_custom_logo(); ?></a>             
                    <?php if($proweb_footer_text){?><p><?php echo $proweb_footer_text;?></p><?php } ?>
					<ul>
                    	<?php if($proweb_social_media_fb){?><li><a href="<?php echo $proweb_social_media_fb; ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li><?php } ?>
                        <?php if($proweb_social_media_tw){?><li><a href="<?php echo $proweb_social_media_tw; ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li><?php } ?>
                        <?php if($proweb_social_media_in){?><li><a href="<?php echo $proweb_social_media_in; ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li><?php } ?>
                        <?php if($proweb_social_media_gp){?><li><a href="<?php echo $proweb_social_media_gp; ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li><?php } ?>
                    </ul>
                    <?php if($proweb_footer_copyright){?><p><?php echo $proweb_footer_copyright;?></p><?php } ?>
   				</div>
             </div>   
    	 </div>
    </div>
</footer>
<?php
}
?>