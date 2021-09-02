<?php
 /*
 Plugin Name: Notification-update
 Description: A plugin for myCred
 Version: 1.0.0
 Author: Dylan Butelle
 Author URI: https://dbutelle.dev
 License: GPL3
 Text Domain: notificationUpdate
 */
include_once plugin_dir_path( __FILE__ ).'../mycred/index.php';
function notice(){
    if(!function_exists('mycred_add_new_notice')){
        echo 'mycred not installed!';
    }else{

        wp_enqueue_style("style",plugin_dir_url(__FILE__)."/assets/css/styleNotif.css");
        wp_enqueue_script("js",plugin_dir_url(__FILE__)."/assets/js/jsNotif.js");
        $message = "
        <div class='notif'>
            <div class='bandeau'>
                <img src=".plugin_dir_url(__FILE__)."/assets/img/cloche.gif"." width='40px' height='40px'></img>
                <p>+1 Notification</p>
            </div>
            <div class='content'>
                <img src=".get_avatar_url(wp_get_current_user()->ID,40)." width='50px' height='50px'></img> 
                <p>Tu as " . do_shortcode('[mycred_total_points]') . " points</p>
            </div>
            
        </div>
        
        ";

        mycred_add_new_notice(array('user_id' => wp_get_current_user()->ID, 'message' => $message));
    }
}
add_action('get_footer', 'notice');

 ?>