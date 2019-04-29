<?php
/**
 * Getting started template
 */

$customizer_url = admin_url() . 'customize.php' ;
?>

<div id="getting_started" class="proweb-tab-pane active">

	<div class="proweb-tab-pane-center">

		<h1 class="proweb-welcome-title">Welcome to Proweb! <?php if( !empty($proweb['Version']) ): ?> <sup id="proweb-theme-version"><?php echo esc_attr( $proweb['Version'] ); ?> </sup><?php endif; ?></h1>

		<p><?php esc_html_e( 'Proweb is a beautiful blogging and business wordpress theme which allows you to turn your website into a business website and blog. It offers options to make your Wordpress blog left or right column or without any column.', 'proweb' ); ?>

	</div>

	<hr />

	<div class="proweb-tab-pane-center">

		<h1><?php esc_html_e( 'How to customize?', 'proweb' ); ?></h1>

		<p><?php esc_html_e( 'You can customize Proweb with Customizer. Simply go to customizer and you will see various options to customize your blog. You can customize anything from logo to background colors and much more!', 'proweb' ); ?></p>
		<p><a href="<?php echo esc_url( $customizer_url ); ?>" class="button button-primary"><?php esc_html_e( 'Go to Customizer', 'proweb' ); ?></a></p>

	</div>

	<hr />

	<div class="proweb-clear"></div>

</div>
