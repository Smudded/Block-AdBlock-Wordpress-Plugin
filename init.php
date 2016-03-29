<?php
/**
 * Block AdBlock 1.2.0 initiate .
 */
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );
/**
 * Load plugin textdomain.
 */
function killadblock_load_textdomain() {
  load_plugin_textdomain( 'kill-adblock', false, basename( dirname( __FILE__ ) ) . '/languages/' );
}
add_action( 'plugins_loaded', 'killadblock_load_textdomain' );
/**
 * Enqueue scripts and styles.
 */
function kill_adblock_setup()
{
    if(get_option('kill_adBlock_status')==1)
    {
        // Load the killadblock stylesheet.
        wp_enqueue_style( 'killadblock-css', plugin_dir_url( __FILE__ ) . '/css/style.css' );
        // Load the killadblock javascript library.
        wp_enqueue_script( 'killadblock', plugin_dir_url( __FILE__ ) . '/js/killadblock.js');
        // Load the killadblock function.
        wp_enqueue_script( 'killadblock-script', plugin_dir_url( __FILE__ ) . '/js/function.js', array( 'jquery' ));
    }
}
add_action( 'wp_enqueue_scripts', 'kill_adblock_setup' );
/**
 * initiate javascript.
 */
function kill_adblock_init()
{
    if(get_option('kill_adBlock_status')==1)
    {?>
<script>
    var kill_adBlock_status = <?php echo kill_adblock_default_value(get_option('kill_adBlock_status'));?>;
    var kill_adBlock_message = '<?php echo addslashes(get_option('kill_adBlock_message'));?>';
    var kill_adBlock_message_delay = <?php echo kill_adblock_default_value(get_option('kill_adBlock_message_delay'));?>;
    var kill_adBlock_close_btn = <?php echo kill_adblock_default_value(get_option('kill_adBlock_close_btn'));?>;
    var kill_adBlock_close_automatically = <?php echo kill_adblock_default_value(get_option('kill_adBlock_close_automatically'));?>;
    var kill_adBlock_close_automatically_delay = <?php echo kill_adblock_default_value(get_option('kill_adBlock_close_automatically_delay'));?>;
    var kill_adBlock_message_type = <?php echo kill_adblock_default_value(get_option('kill_adBlock_message_type'));?>;
    function adBlockDetected() {
      show_message();
    }
    
    if(typeof killAdBlock === 'undefined') {
    	adBlockDetected();
    } else {
    	killAdBlock.onDetected(adBlockDetected).onNotDetected(adBlockNotDetected);
    }
</script>
    <?php }
}
add_action('wp_head', 'kill_adblock_init');
/**
 * return default value to javascript.
 */
function kill_adblock_default_value($value)
{
    if($value)
    {
        return $value;
    }else{
        return 0;
    }
}
/**
 * footer message.
 */
function kill_adblock_footer() {
    if(get_option('kill_adBlock_status')==1)
    {
        require 'footer-message.php';
    }
}
add_action( 'wp_footer', 'kill_adblock_footer' );