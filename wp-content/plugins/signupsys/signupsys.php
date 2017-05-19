<?php
/**
Plugin Name: signupsys
Plugin URI: https://PulsarTao.github.io/
Description: 支付宝接口报名系统
Version: 1.0.0
Author: PulsarTao
Author URI: https://PulsarTao.github.io/signupsys
License: GPL
Text Domain: signupsys
*/

/**
 * @param install signup sys database
 *
 */
global $wpdb;
define('UESTC_SIGNIN', $wpdb->prefix . 'signin');
define('SIGNINSYS_VERSION', $wpdb->prefix . '1.0.0');
define( 'SIGNIN__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
require (SIGNIN__PLUGIN_DIR."class.signinsys-admin.php");
include (SIGNIN__PLUGIN_DIR."class.signinsys-frount.php");
register_activation_hook(__FILE__, 'signinsys_install');
function signinsys_install(){
    $charset_collate = '';
    global $wpdb;
    if (!empty($wpdb->charset)) {
        $charset_collate = "DEFAULT CHARACTER SET {$wpdb->charset}";
    }
    if (!empty( $wpdb->collate)) {
        $charset_collate .= " COLLATE {$wpdb->collate}";
    }
    $sql = "CREATE TABLE " . UESTC_SIGNIN . " (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        time timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
        name text DEFAULT '' NOT NULL,
        uid int NOT NULL,
        sex int NOT NULL,
        payid bigint NOT NULL,
        alipay int NOT NULL,
        phone bigint NOT NULL,
        discrib text DEFAULT '' NOT NULL,
        ispayd int DEFAULT 0 NOT NULL,
        UNIQUE KEY id (id)
    ) $charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    update_option('signinsys_version', SIGNINSYS_VERSION);
}
register_deactivation_hook(__FILE__, 'plugin_deactivation_deltable');
function plugin_deactivation_deltable() {
    global $wpdb;
    $wpdb->query("DROP TABLE IF EXISTS " . UESTC_SIGNIN);
    delete_option('signinsys_version');
}


?>
