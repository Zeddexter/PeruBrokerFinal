<?php
if ( ! defined( 'ABSPATH' ) || ! class_exists( 'GtbBootstrapSettingsPage', false ) ) exit;
include_once(dirname(__FILE__).'/../formfields.php');
global $gtb_options;
?>
<div class="wrap">
    <h2><?php _e('Bootstrap Blocks for WP Editor',GUTENBERGBOOTSTRAP_SLUG)?> <small><small><?php _e('version',GUTENBERGBOOTSTRAP_SLUG)?> <?=GUTENBERGBOOTSTRAP_VERSION?></small></small></h2>
    <form method="post" action="?page=<?=GtbBootstrapSettingsPage::MENU_SLUG?>">
        <?php wp_nonce_field('update_gtb','wpnonce_gtb'); ?>
        <p>
            <?php _e('If you\'re familiar with Bootstrap, you can manage your Bootstrap Blocks for WP Editor preferences below.',GUTENBERGBOOTSTRAP_SLUG); ?>
        </p>
        <div class="nav-tab-wrapper"></div>
        <div class="spacer"></div>
        <div class="sections-wrapper">
        <?php
            // This prints out all hidden setting fields
            settings_fields( 'gtbbootstrap_option_group' );   
            GtbBootstrapSettingsPage::print_sections();
        ?>
        </div>
        <?php include_once(dirname(__FILE__).'/sidebar.php');?>
        <div class="clear"></div>
    </form>
</div>