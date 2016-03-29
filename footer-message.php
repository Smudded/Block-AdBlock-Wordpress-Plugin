<?php
/**
 * Block AdBlock 1.2.0 front end message template
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
?>
<div class="kill-adblock-container kill-adblock-<?php echo get_option('kill_adBlock_message_type');?> kill-adblock-hide">
    <div class="kill-adblock-body">
        <?php if(get_option('kill_adBlock_close_btn')){?>
        <span class="close-btn">×</span>
        <?php }?>
        <?php if(get_option('kill_adBlock_message_type')!=1){?>
        <img src="<?php echo plugin_dir_url( __FILE__ ) . '/images/logo.png'?>">
        <?}?>
        <div class="kill-adblock"></div>
    </div>
</div>