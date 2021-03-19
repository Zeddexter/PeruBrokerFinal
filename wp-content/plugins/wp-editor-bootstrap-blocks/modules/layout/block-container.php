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

register_block_type( 'gtb-bootstrap/container', array(
   'editor_script'   => 'gtb-bootstrap-editor',
   'editor_style'    => 'gtb-bootstrap-editor',
   'render_callback' => 'gtb_bootstrap_render_container',
   'category' => 'bootstrap'
) );

function gtb_bootstrap_render_container( $attributes, $content = '')
{
   $cls = 'container';
   if (!empty($attributes['fluid'])) $cls = 'container-fluid';

   return '<div class="'.$cls.'">
      '.$content.'
   </div>';
}
