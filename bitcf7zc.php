<?php

/**
 * Plugin Name: Integration of Zoho CRM and Contact Form 7
 * Requires Plugins: contact-form-7
 * Plugin URI:  https://formsintegrations.com/contact-form-7-integration-with-zoho-crm
 * Description: Sends Contact Form 7 entries to Zoho CRM
 * Version:     1.0.6
 * Author:      Forms Integrations
 * Author URI:  https://formsintegrations.com
 * Text Domain: bitcf7zc
 * Requires PHP: 5.6
 * Domain Path: /languages
 * License: GPLv2 or later
 */

/***
 * If try to direct access  plugin folder it will Exit
 **/
if (!defined('ABSPATH')) {
    exit;
}
global $bitcf7zc_db_version;
$bitcf7zc_db_version = '1.0';


// Define most essential constants.
define('BITCF7ZC_VERSION', '1.0.6');
define('BITCF7ZC_PLUGIN_MAIN_FILE', __FILE__);

include_once plugin_dir_path(__FILE__) . 'includes/loader.php';
function bitcf7zc_activate_plugin()
{
    if (version_compare(PHP_VERSION, '5.6.0', '<')) {
        wp_die(
            esc_html__('bitcf7zc requires PHP version 5.6.', 'bitcf7zc'),
            esc_html__('Error Activating', 'bitcf7zc')
        );
    }
    do_action('bitcf7zc_activation');
}

register_activation_hook(__FILE__, 'bitcf7zc_activate_plugin');

function bitcf7zc_uninstall_plugin()
{
    do_action('bitcf7zc_uninstall');
}
register_uninstall_hook(__FILE__, 'bitcf7zc_uninstall_plugin');