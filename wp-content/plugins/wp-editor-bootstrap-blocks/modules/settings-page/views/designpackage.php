<?php
if ( ! defined( 'ABSPATH' ) || ! class_exists( 'GtbBootstrapSettingsPage', false ) ) exit;
include_once(dirname(__FILE__).'/../formfields.php');
global $gtb_options;
?>

<div class="section-part design-promo">
   <span class="free-installed">Free version installed</span>
   <img src="<?=plugins_url( '/modules/settings-page/assets/gtb-dashboard-text.png', GUTENBERGBOOTSTRAP_PLUGIN_BASENAME)?>" alt="Now you can use Bootstrap and Gutenberg Together!" style="max-width:30rem;width:100%" />
   <div class="clear"></div>
   <p style="float:left"><br/><a class="gtb-btn gtb-btn-blue" href="https://gutenberg-bootstrap.com" target="_blank">View pricing options</a>
   <br/><br/>
   <a href="https://gutenberg-bootstrap.com" target="_blank">View extra features Design Package</a>
   <br/>&nbsp;</p>
   <img src="<?=plugins_url( '/modules/settings-page/assets/gtb-group-image.png', GUTENBERGBOOTSTRAP_PLUGIN_BASENAME)?>" alt="group-image" style="float:right;max-width:30rem;width:100%;position:relative;top:1px;" />
   <div class="clear"></div>
</div>
