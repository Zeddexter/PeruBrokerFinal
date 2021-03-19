<?php
/**
 * Bootstrap Blocks for WP Editor class.
 *
 * @version 1.0.0
 *
 * @package Bootstrap Blocks for WP Editor
 * @author  Virgial Berveling
 * @updated 2018-11-28
 * 
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}


if ( ! class_exists( 'GutenbergBootstrap', false ) ) {

    class GutenbergBootstrap
    {
        private static $modules = array();
        private static $notices = array();
        var $menu_slug = GUTENBERGBOOTSTRAP_SLUG;

        
        public function __construct($modules=false)
        {
            if (!$this->check_gutenberg() ) return;

            add_action('init',array($this,'do_modules'));
            add_filter( 'block_categories',array($this,'add_category_bootstrap'), 10, 2 );
            add_action( 'admin_notices', array($this,'admin_notices') );

        }
        
        static function AddModule($name,$args)
        {
            self::$modules[$name] = (object) array(
                'name' => isset($args['name'])?$args['name']:$name,
                'version' => isset($args['version'])?$args['version']:GUTENBERGBOOTSTRAP_VERSION,
                'licensed' => isset($args['licensed'])?true:false,
                'slug' => isset($args['slug'])?$args['slug']:$name
            );
        }

        static function getModules()
        {
            return self::$modules;
        }


        static function AddNotice($message='missing notification message', $priority='error',$dismissible=false)
        {
            self::$notices[] = array('message'=>$message, 'priority'=>$priority, 'dismissible'=>$dismissible );
        }

        public function admin_notices()
        {
            foreach(self::$notices as $notice):
                $dismissible = $notice['dismissible']?' is-dismissible':'';
                printf( '<div class="%1$s"><p>%2$s</p></div>', 'notice notice-'.$notice['priority'].$dismissible,  $notice['message'] ); 

            endforeach;
        }



        /**
         * @since 2.0.1 
         * added folder namespacing
         */
        
        public function do_modules()
        {
            do_action('gtb_bootstrap_modules');
            do_action('gtb_init');
        }

        static function get_licensed_modules()
        {
            $m = array();
            foreach(GutenbergBootstrap::$modules as $key=>$module):
                if ($module->licensed) $m[$key] = $module;
            endforeach;
            return count($m)>0?$m:false;
        }




        function add_category_bootstrap( $categories, $post )
        {

            
            return array_merge(
                $categories,
                array(
                    array(
                        'slug'  => 'bootstrap',
                        'title' => 'Bootstrap Blocks',
                        'icon' => plugins_url( '/modules/settings-page/assets/logo-wp-editor-bootstrap-blocks-blue.svg', GUTENBERGBOOTSTRAP_PLUGIN_BASENAME)
                    ),
                )
            );
        }

    

        private function check_gutenberg()
        {
            if (!defined('GUTENBERG_VERSION') && version_compare(get_bloginfo('version'),'5.0') < 0):

                fa_add_notice( __('Gutenberg is required for plugin Gutenberg Bootstrap to work properly.', GUTENBERGBOOTSTRAP_SLUG ),'error' ); 
                return false;
            endif;
            return true;
        }


        static function uninstall()
        {
            delete_option('gtbbootstrap_version');
        }


    }



    if (!function_exists('fa_add_notice')):
     function fa_add_notice($message='', $priority='error',$dismissible=false)
     {
        GutenbergBootstrap::AddNotice($message, $priority,$dismissible);
     }
     endif;
    
}