<?php 
/**
 * Bootstrap Blocks for WP Editor Layout.
 *
 * @version 1.0.0
 *
 * @package Bootstrap Blocks for WP Editor
 * @author  Virgial Berveling
 * @updated 2018-11-28
 * 
 */

// Exit if accessed directly.
if ( ! defined( 'GUTENBERGBOOTSTRAP_VERSION' ) ) {
	exit;
}
function load_mod_gtb_bootstrap_layout()
{
	GutenbergBootstrap::AddModule('layout', array(
		'name' => 'Free Layout Package',
		'version'=>'1.0.2',
	));

	function init_mod_gtb_bootstrap_layout()
	{

		include_once(dirname(__FILE__).'/block-container.php');
		include_once(dirname(__FILE__).'/block-row.php');
		include_once(dirname(__FILE__).'/block-column.php');


		function gtb_bootstrap_editor_assets()
		{
			$update_time = WP_DEBUG?time():GUTENBERGBOOTSTRAP_VERSION;
			wp_enqueue_script(
				'gtb-bootstrap-editor', // Handle.
				plugins_url( '/dist/blocks.build.js',GUTENBERGBOOTSTRAP_PLUGIN_BASENAME ), // Block.build.js: We register the block here. Built with Webpack.
				array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor' ), // Dependencies, defined above.
				$update_time, // Version: File modification time.
				true // Enqueue the script in the footer.
			);


			wp_localize_script( 'gtb-bootstrap-editor', 'gtb_settings', get_option( 'gtbbootstrap_options' ) );


			// Styles.
			wp_enqueue_style(
				'gtb-bootstrap-editor', // Handle.
				plugins_url( '/dist/blocks.editor.build.css',GUTENBERGBOOTSTRAP_PLUGIN_BASENAME ), // Block editor CSS.
				array( 'wp-edit-blocks' ), // Dependency to include the CSS after it.
				$update_time // Version: File modification time.
			);
		}

		// Hook: Editor assets.
		add_action( 'enqueue_block_editor_assets', 'gtb_bootstrap_editor_assets' );
	}
	add_action('gtb_init','init_mod_gtb_bootstrap_layout');
}

add_action('gtb_bootstrap_modules','load_mod_gtb_bootstrap_layout');