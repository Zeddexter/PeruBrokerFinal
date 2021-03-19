<?php 
/**
 * Bootstrap Blocks for WP Editor Metaboxes.
 *
 * @version 1.1.2
 *
 * @package Bootstrap Blocks for WP Editor
 * @author  Virgial Berveling
 * @updated 2019-03-21
 * 
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function load_mod_metaboxes_bootstrap_metaboxes()
{
	GutenbergBootstrap::AddModule('metaboxes',array(
		'name' => 'Metaboxes',	
		'version'=>'1.1.2'
	));

	function init_mod_metaboxes_bootstrap_metaboxes()
	{

		/**
		 * Register meta box(es).
		 */
		function gtb_page_options_bootstrap_register_meta_boxes() {
			add_meta_box( 'page_title_options', __( 'GTB Bootstrap page options', GUTENBERGBOOTSTRAP_SLUG ), 'gtb_page_options_callback', 'page', 'side' );
		}
		add_action( 'add_meta_boxes', 'gtb_page_options_bootstrap_register_meta_boxes');

		/**
		* Meta box display callback.
		*
		* @param WP_Post $post Current post object.
		*/
		function gtb_page_options_callback( $post) {

			$post_id = isset($post->ID)?$post->ID:null;
			$gtb_hide_title = get_post_meta($post->ID, 'gtb_hide_title', true);
			$gtb_wrap_title = get_post_meta($post->ID, 'gtb_wrap_title', true);
			$gtb_class_title = get_post_meta($post->ID, 'gtb_class_title', true);
			$gtb_remove_headerfooter = get_post_meta($post->ID, 'gtb_remove_headerfooter', true);
			$gtb_hide_title_checked = !empty($gtb_hide_title)?'checked="checked" ':'';
			$gtb_wrap_title_checked = !empty($gtb_wrap_title)?'checked="checked" ':'';
			$gtb_remove_headerfooter_checked = !empty($gtb_remove_headerfooter)?'checked="checked" ':'';
			$overlaydiv = defined('GTBBOOTSTRAP_DESIGN_LC')?'':'<div style="font-weight:bold;font-style:italic;color:rgb(35, 137, 255);padding-top:10px;padding-left:10px;position:absolute;top:50px;left:0;width:100%;height:50%;background-color:rgba(255,255,255,0.7);">
				Bootstrap Design Package feature
			</div>
			<div class="proposition-box"><a href="https://gutenberg-bootstrap.com" target="_blank">View pricing options</a></div>';
			$extrastyle = defined('GTBBOOTSTRAP_DESIGN_LC')?'':' style="position:relative;padding-top:30px"';
			
			wp_nonce_field( 'title_options_meta_box_nonce', 'gtb_meta_box_nonce' );
			echo '
				<div class="components-base-control">
					<div class="components-base-control__field">
						<input '.$gtb_hide_title_checked.' name="gtb_hide_title" id="gtb_hide_title" class="components-checkbox-control__input" type="checkbox" value="1">
						<label class="components-checkbox-control__label" for="gtb_hide_title">'.__( 'Hide default page title', GUTENBERGBOOTSTRAP_SLUG ).'</label>
					</div>
					<div class="components-base-control__field">
						<input '.$gtb_wrap_title_checked.' name="gtb_wrap_title" id="gtb_wrap_title" class="components-checkbox-control__input" type="checkbox" value="1">
						<label class="components-checkbox-control__label" for="gtb_wrap_title">'.__( 'Wrap title with bootstrap container', GUTENBERGBOOTSTRAP_SLUG ).'</label>
					</div>
					<div class="components-base-control__field"'.$extrastyle.'>
						<label class="components-checkbox-control__label" for="gtb_class_title">'.__( 'Extra Title CSS class', GUTENBERGBOOTSTRAP_SLUG ).'</label>
						<input name="gtb_class_title" id="gtb_class_title" type="text" value="'.esc_attr($gtb_class_title).'">
					</div>
					<div class="components-base-control__field">
						<input '.$gtb_remove_headerfooter_checked.' name="gtb_remove_headerfooter" id="gtb_remove_headerfooter" class="components-checkbox-control__input" type="checkbox" value="1">
						<label class="components-checkbox-control__label" for="gtb_remove_headerfooter">'.__( 'Suppress default header &amp; footer', GUTENBERGBOOTSTRAP_SLUG ).'</label>
					</div>
					'.$overlaydiv.'
				</div>';
			}

		/**
		* Save meta box content.
		*
		* @param int $post_id Post ID
		*/
		function metaboxes_bootstrap_save_meta_box( $post_id ) {
			global $post;

			if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
					return $post->ID;
			}
			if( !isset( $_POST['gtb_meta_box_nonce'] ) || !wp_verify_nonce( $_POST['gtb_meta_box_nonce'], 'title_options_meta_box_nonce' ) ) return;

			update_post_meta($post->ID, "gtb_hide_title", empty($_POST["gtb_hide_title"])?'':'1');
			update_post_meta($post->ID, "gtb_wrap_title", empty($_POST["gtb_wrap_title"])?'':'1');
			if (defined('GTBBOOTSTRAP_DESIGN_LC')):
				update_post_meta($post->ID, "gtb_class_title", sanitize_text_field($_POST["gtb_class_title"]));
				update_post_meta($post->ID, "gtb_remove_headerfooter", empty($_POST["gtb_remove_headerfooter"])?'':'1');
			endif;
		}
		
		add_action( 'save_post', 'metaboxes_bootstrap_save_meta_box' );
	}
	add_action('gtb_init','init_mod_metaboxes_bootstrap_metaboxes');
}

add_action('gtb_bootstrap_modules','load_mod_metaboxes_bootstrap_metaboxes');

