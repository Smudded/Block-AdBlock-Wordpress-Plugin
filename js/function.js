/*
 * Block AdBlock 1.2.0 Script Function
 */
function show_message()
{
    kill_adBlock_message_delay = kill_adBlock_message_delay * 1000;
    kill_adBlock_close_automatically_delay = kill_adBlock_close_automatically_delay * 1000;
    setTimeout(function(){
        jQuery('.kill-adblock').html(kill_adBlock_message);
        jQuery('.kill-adblock-container').fadeIn();
     }, kill_adBlock_message_delay);
    if(kill_adBlock_close_automatically_delay>0 && kill_adBlock_close_automatically==1)
    {
        setTimeout(function(){
            jQuery('.close-btn').trigger('click');
         }, kill_adBlock_close_automatically_delay);
    }
}
function adBlockNotDetected(){}
jQuery(document).ready(function(){
    jQuery('.close-btn').click(function(){
        jQuery('.kill-adblock-container').fadeOut('kill-adblock-hide');
    });
});