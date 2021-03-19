<?php 
/**
 * Bootstrap Blocks for WP Editor Layout.
 *
 * @version 1.1.0
 *
 * @package Bootstrap Blocks for WP Editor
 * @author  Virgial Berveling
 * @updated 2019-03-21
 * 
 */

// Exit if accessed directly.
if ( ! defined( 'GUTENBERGBOOTSTRAP_VERSION' ) ) {
	exit;
}



register_block_type( 'gtb-bootstrap/column', array(
   'editor_script'   => 'gtb-bootstrap-editor',
   'editor_style'    => 'gtb-bootstrap-editor',

   'render_callback' => 'gtb_bootstrap_render_column',
   'category' => 'bootstrap'
) );


function gtb_bootstrap_render_column( $attributes, $content = '')
{
   $cls = '';
   $has_xs = false;
   $has_col = false;
   foreach(array( 'sm', 'md', 'lg') as $s):
      if (!empty($attributes['size_'.$s]))
      {
         $has_col = true;
         $cls.= ' col-'.$s.'-'.$attributes['size_'.$s];
      }
   endforeach;

   if (!empty($attributes['className'])) $cls .= ' '.$attributes['className'];

   if ($has_col):
       $cls = '%%| '.$cls;
   else:
      $cls = '|%% '.$cls;
   endif;


   return '<div class="'.$cls.'">
      '.$content.'
   </div>';
}

