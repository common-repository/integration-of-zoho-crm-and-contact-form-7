<?php
if (!defined('ABSPATH')) {
    exit;
}
define('BITCF7ZC_PLUGIN_BASENAME', plugin_basename(BITCF7ZC_PLUGIN_MAIN_FILE));
define('BITCF7ZC_PLUGIN_DIR_PATH', plugin_dir_path(BITCF7ZC_PLUGIN_MAIN_FILE));
define('BITCF7ZC_ROOT_URI', plugins_url('', BITCF7ZC_PLUGIN_MAIN_FILE));
define('BITCF7ZC_ASSET_URI', BITCF7ZC_ROOT_URI . '/assets');
define('BITCF7ZC_ASSET_JS_URI', BITCF7ZC_ROOT_URI . '/assets/js');
// Autoload vendor files.
require_once BITCF7ZC_PLUGIN_DIR_PATH . 'vendor/autoload.php';
// Initialize the plugin.
BitCode\BITCF7ZC\Plugin::load(BITCF7ZC_PLUGIN_MAIN_FILE);

