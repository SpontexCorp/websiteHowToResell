<?php
/**
 * Welcome Screen Class
 */
class Blogcafe_Welcome {

	/**
	 * Constructor for the welcome screen
	 */
	public function __construct() {

		/* create dashbord page */
		add_action( 'admin_menu', array( $this, 'proweb_welcome_register_menu' ) );

		/* activation notice */
		add_action( 'load-themes.php', array( $this, 'proweb_activation_admin_notice' ) );

		/* enqueue script and style for welcome screen */
		add_action( 'admin_enqueue_scripts', array( $this, 'proweb_welcome_style_and_scripts' ) );

		/* enqueue script for customizer */
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'proweb_welcome_scripts_for_customizer' ) );

		/* load welcome screen */
		add_action( 'proweb_welcome', array( $this, 'proweb_welcome_getting_started' ), 	    10 );
		add_action( 'proweb_welcome', array( $this, 'proweb_welcome_free_pro' ), 				60 );

		/* ajax callback for dismissable required actions */
		add_action( 'wp_ajax_proweb_dismiss_required_action', array( $this, 'proweb_dismiss_required_action_callback') );
		add_action( 'wp_ajax_nopriv_proweb_dismiss_required_action', array($this, 'proweb_dismiss_required_action_callback') );

	}

	/**
	 * Creates the dashboard page
	 * @see  add_theme_page()
	 * @since 1.8.2.4
	 */
	public function proweb_welcome_register_menu() {
		add_theme_page( 'About Proweb', 'About Proweb', 'activate_plugins', 'proweb-welcome', array( $this, 'proweb_welcome_screen' ) );
	}

	/**
	 * Adds an admin notice upon successful activation.
	 * @since 1.8.2.4
	 */
	public function proweb_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', array( $this, 'proweb_welcome_admin_notice' ), 99 );
		}
	}

	/**
	 * Display an admin notice linking to the welcome screen
	 * @since 1.8.2.4
	 */
	public function proweb_welcome_admin_notice() {
		?>
			<div class="updated notice is-dismissible">
				<p><?php echo sprintf( esc_html__( 'Welcome! Thank you for choosing Proweb! To fully take advantage of the best our theme can offer please make sure you visit our %swelcome page%s.', 'proweb' ), '<a href="' . esc_url( admin_url( 'themes.php?page=proweb-welcome' ) ) . '">', '</a>' ); ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'themes.php?page=proweb-welcome' ) ); ?>" class="button" style="text-decoration: none;"><?php _e( 'Get started with Proweb', 'proweb' ); ?></a></p>
			</div>
		<?php
	}

	/**
	 * Load welcome screen css and javascript
	 * @since  1.8.2.4
	 */
	public function proweb_welcome_style_and_scripts( $hook_suffix ) {

		if ( 'appearance_page_proweb-welcome' == $hook_suffix ) {
			wp_enqueue_style( 'proweb-welcome-screen-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome.css' );
			wp_enqueue_script( 'proweb-welcome-screen-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome.js', array('jquery') );

			global $proweb_required_actions;

			$nr_actions_required = 0;

			/* get number of required actions */
			if( get_option('proweb_show_required_actions') ):
				$proweb_show_required_actions = get_option('proweb_show_required_actions');
			else:
				$proweb_show_required_actions = array();
			endif;

			if( !empty($proweb_required_actions) ):
				foreach( $proweb_required_actions as $proweb_required_action_value ):
					if(( !isset( $proweb_required_action_value['check'] ) || ( isset( $proweb_required_action_value['check'] ) && ( $proweb_required_action_value['check'] == false ) ) ) && ((isset($proweb_show_required_actions[$proweb_required_action_value['id']]) && ($proweb_show_required_actions[$proweb_required_action_value['id']] == true)) || !isset($proweb_show_required_actions[$proweb_required_action_value['id']]) )) :
						$nr_actions_required++;
					endif;
				endforeach;
			endif;

			wp_localize_script( 'proweb-welcome-screen-js', 'prowebLiteWelcomeScreenObject', array(
				'nr_actions_required' => $nr_actions_required,
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
				'template_directory' => get_template_directory_uri(),
				'no_required_actions_text' => __( 'Hooray! There are no required actions for you right now.','proweb' )
			) );
		}
	}

	/**
	 * Load scripts for customizer page
	 * @since  1.8.2.4
	 */
	public function proweb_welcome_scripts_for_customizer() {

		wp_enqueue_style( 'proweb-welcome-screen-customizer-css', get_template_directory_uri() . '/inc/admin/welcome-screen/css/welcome_customizer.css' );
		wp_enqueue_script( 'proweb-welcome-screen-customizer-js', get_template_directory_uri() . '/inc/admin/welcome-screen/js/welcome_customizer.js', array('jquery'), '20120206', true );

		global $proweb_required_actions;

		$nr_actions_required = 0;

		/* get number of required actions */
		if( get_option('proweb_show_required_actions') ):
			$proweb_show_required_actions = get_option('proweb_show_required_actions');
		else:
			$proweb_show_required_actions = array();
		endif;

		if( !empty($proweb_required_actions) ):
			foreach( $proweb_required_actions as $proweb_required_action_value ):
				if(( !isset( $proweb_required_action_value['check'] ) || ( isset( $proweb_required_action_value['check'] ) && ( $proweb_required_action_value['check'] == false ) ) ) && ((isset($proweb_show_required_actions[$proweb_required_action_value['id']]) && ($proweb_show_required_actions[$proweb_required_action_value['id']] == true)) || !isset($proweb_show_required_actions[$proweb_required_action_value['id']]) )) :
					$nr_actions_required++;
				endif;
			endforeach;
		endif;

		wp_localize_script( 'proweb-welcome-screen-customizer-js', 'prowebLiteWelcomeScreenCustomizerObject', array(
			'nr_actions_required' => $nr_actions_required,
			'aboutpage' => esc_url( admin_url( 'themes.php?page=proweb-welcome#actions_required' ) ),
			'customizerpage' => esc_url( admin_url( 'customize.php#actions_required' ) ),
			'themeinfo' => __('View Theme Info','proweb'),
		) );
	}

	/**
	 * Dismiss required actions
	 * @since 1.8.2.4
	 */
	public function proweb_dismiss_required_action_callback() {

		global $proweb_required_actions;

		$proweb_dismiss_id = (isset($_GET['dismiss_id'])) ? $_GET['dismiss_id'] : 0;

		echo $proweb_dismiss_id; /* this is needed and it's the id of the dismissable required action */

		if( !empty($proweb_dismiss_id) ):

			/* if the option exists, update the record for the specified id */
			if( get_option('proweb_show_required_actions') ):

				$proweb_show_required_actions = get_option('proweb_show_required_actions');

				$proweb_show_required_actions[$proweb_dismiss_id] = false;

				update_option( 'proweb_show_required_actions',$proweb_show_required_actions );

			/* create the new option,with false for the specified id */
			else:

				$proweb_show_required_actions_new = array();

				if( !empty($proweb_required_actions) ):

					foreach( $proweb_required_actions as $proweb_required_action ):

						if( $proweb_required_action['id'] == $proweb_dismiss_id ):
							$proweb_show_required_actions_new[$proweb_required_action['id']] = false;
						else:
							$proweb_show_required_actions_new[$proweb_required_action['id']] = true;
						endif;

					endforeach;

				update_option( 'proweb_show_required_actions', $proweb_show_required_actions_new );

				endif;

			endif;

		endif;

		die(); // this is required to return a proper result
	}


	/**
	 * Welcome screen content
	 * @since 1.8.2.4
	 */
	public function proweb_welcome_screen() {

		require_once( ABSPATH . 'wp-load.php' );
		require_once( ABSPATH . 'wp-admin/admin.php' );
		require_once( ABSPATH . 'wp-admin/admin-header.php' );
		?>

		<ul class="proweb-nav-tabs" role="tablist">
			<li role="presentation" class="active"><a href="#getting_started" aria-controls="getting_started" role="tab" data-toggle="tab"><?php esc_html_e( 'Getting started','proweb'); ?></a></li>
			<li role="presentation"><a href="#free_pro" aria-controls="free_pro" role="tab" data-toggle="tab"><?php esc_html_e( 'Free VS PRO','proweb'); ?></a></li>
		</ul>

		<div class="proweb-tab-content">

			<?php
			/**
			 * @hooked proweb_welcome_getting_started - 10
			 * @hooked proweb_welcome_actions_required - 20
			 * @hooked proweb_welcome_child_themes - 30
			 * @hooked proweb_welcome_github - 40
			 * @hooked proweb_welcome_changelog - 50
			 * @hooked proweb_welcome_free_pro - 60
			 */
			do_action( 'proweb_welcome' ); ?>

		</div>
		<?php
	}

	/**
	 * Getting started
	 * @since 1.8.2.4
	 */
	public function proweb_welcome_getting_started() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/getting-started.php' );
	}

	/**
	 * Free vs PRO
	 * @since 1.8.2.4
	 */
	public function proweb_welcome_free_pro() {
		require_once( get_template_directory() . '/inc/admin/welcome-screen/sections/free_pro.php' );
	}
}

$GLOBALS['Blogcafe_Welcome'] = new Blogcafe_Welcome();