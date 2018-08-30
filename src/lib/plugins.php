<?php

namespace ThemeName;

class Plugins
{
	public function __construct() {
		add_action('tgmpa_register', array($this, 'registerPlugins'));
	}

	public function registerPlugins() {
		$plugins = array(
			array(
				'name'     => 'Advanced Custom Fields Pro', // The plugin name
				'slug'     => 'advanced-custom-fields-pro', // The plugin slug (typically the folder name)
				'source'   => get_stylesheet_directory() . '/plugins/advanced-custom-fields-pro.zip', // The plugin source
				'required' => true,
			),
			array(
				'name'     => 'Migrate DB Pro', // The plugin name
				'slug'     => 'wp-migrate-db-pro-1.8.1', // The plugin slug (typically the folder name)
				'source'   => get_stylesheet_directory() . '/plugins/wp-migrate-db-pro-1.8.1.zip', // The plugin source
				'required' => true,
			),
			array(
				'name'     => 'Migrate DB Pro (Media Files)', // The plugin name
				'slug'     => 'wp-migrate-db-pro-media-files-1.4.9', // The plugin slug (typically the folder name)
				'source'   => get_stylesheet_directory() . '/plugins/wp-migrate-db-pro-media-files-1.4.9.zip', // The plugin source
				'required' => true,
			),
			array(
				'name'     => 'Timber', // The plugin name
				'slug'     => 'timber-library.1.7.1', // The plugin slug (typically the folder name)
				'source'   => get_stylesheet_directory() . '/plugins/timber-library.1.7.1.zip', // The plugin source
				'required' => true,
			),
			array(
				'name'     => 'Custom Post Type UI', // The plugin name
				'slug'     => 'custom-post-type-ui.1.5.8', // The plugin slug (typically the folder name)
				'source'   => get_stylesheet_directory() . '/plugins/custom-post-type-ui.1.5.8.zip', // The plugin source
				'required' => true,
			),
			array(
				'name'     => 'Compress JPEG & PNG images', // The plugin name
				'slug'     => 'tiny-compress-images.3.0.1.zip', // The plugin slug (typically the folder name)
				'source'   => get_stylesheet_directory() . '/plugins/tiny-compress-images.3.0.1.zip', // The plugin source
				'required' => false,
			)
		);

		/** Change this to your theme text domain, used for internationalising strings */
		$theme_text_domain = 'd3applications';

		/**
		 * Array of configuration settings. Uncomment and amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * uncomment the strings and domain.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			/*'domain'       => $theme_text_domain,         // Text domain - likely want to be the same as your theme. */
			/*'default_path' => '',                         // Default absolute path to pre-packaged plugins */
			/*'menu'         => 'install-my-theme-plugins', // Menu slug */
			'strings'      	 => array(
				/*'page_title'             => __( 'Install Required Plugins', $theme_text_domain ), // */
				/*'menu_title'             => __( 'Install Plugins', $theme_text_domain ), // */
				/*'instructions_install'   => __( 'The %1$s plugin is required for this theme. Click on the big blue button below to install and activate %1$s.', $theme_text_domain ), // %1$s = plugin name */
				/*'instructions_activate'  => __( 'The %1$s is installed but currently inactive. Please go to the <a href="%2$s">plugin administration page</a> page to activate it.', $theme_text_domain ), // %1$s = plugin name, %2$s = plugins page URL */
				/*'button'                 => __( 'Install %s Now', $theme_text_domain ), // %1$s = plugin name */
				/*'installing'             => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name */
				/*'oops'                   => __( 'Something went wrong with the plugin API.', $theme_text_domain ), // */
				/*'notice_can_install'     => __( 'This theme requires the %1$s plugin. <a href="%2$s"><strong>Click here to begin the installation process</strong></a>. You may be asked for FTP credentials based on your server setup.', $theme_text_domain ), // %1$s = plugin name, %2$s = TGMPA page URL */
				/*'notice_cannot_install'  => __( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', $theme_text_domain ), // %1$s = plugin name */
				/*'notice_can_activate'    => __( 'This theme requires the %1$s plugin. That plugin is currently inactive, so please go to the <a href="%2$s">plugin administration page</a> to activate it.', $theme_text_domain ), // %1$s = plugin name, %2$s = plugins page URL */
				/*'notice_cannot_activate' => __( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', $theme_text_domain ), // %1$s = plugin name */
				/*'return'                 => __( 'Return to Required Plugins Installer', $theme_text_domain ), // */
			),
		);
		\tgmpa( $plugins, $config );
	}
}
