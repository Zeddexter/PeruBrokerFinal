<?php
if ( ! defined( 'ABSPATH' ) || ! class_exists( 'GtbBootstrapSettingsPage', false ) ) exit;
include_once(dirname(__FILE__).'/../formfields.php');
global $gtb_options;
?>
<div class="sidebar">
<?php if (!defined('GTBBOOTSTRAP_DESIGN_LC')): ?>
   <div class="info-panel buy">
      <img src="<?=plugins_url( '/modules/settings-page/assets/logo-wp-editor-bootstrap-blocks-fc.png', GUTENBERGBOOTSTRAP_PLUGIN_BASENAME)?>" alt="Gutenberg Bootstrap logo" />
      <p style="color:rgb(41, 41, 41);font-size:16px;"><?php _e('Set all breakpoints, add responsive spacer blocks, control headers & footers, gutters, container layout lock and use standard Bootstrap classes with the <strong>Design Package</strong>!',GUTENBERGBOOTSTRAP_SLUG)?></p>

      <a class="gtb-btn" href="https://gutenberg-bootstrap.com" target="_blank">View pricing options</a>
   </div>
<?php endif; ?>

   <div class="info-panel bootstrap">
      <h3><?php _e('Want to know more about Bootstrap?',GUTENBERGBOOTSTRAP_SLUG)?></h3>
      <?php _e('For more information about the bootstrap layout, you can visit the bootstrap website',GUTENBERGBOOTSTRAP_SLUG);?>

      <p><a class="button button-info" href="https://getbootstrap.com" target="_blank"><?php _e('Visit Bootstrap website',GUTENBERGBOOTSTRAP_SLUG)?></a></p>
   </div>
</div>
<!-- end sidebar -->
