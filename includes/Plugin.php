<?php

namespace BitCode\BITCF7ZC;

/**
 * Main class for the plugin.
 *
 * @since 1.0.0-alpha
 */

use BitCode\BITCF7ZC\Core\Database\DB;
use BitCode\BITCF7ZC\Admin\Admin_Bar;
use BitCode\BITCF7ZC\Admin\AdminHooks;
use BitCode\BITCF7ZC\Core\Util\Request;
use BitCode\BITCF7ZC\Core\Util\Activation;
use BitCode\BITCF7ZC\Core\Util\Deactivation;
use BitCode\BITCF7ZC\Core\Util\Uninstallation;
use BitCode\BITCF7ZC\Core\Ajax\AjaxService;
use BitCode\BITCF7ZC\Integration\Integrations;

final class Plugin
{

    /**
     * Main instance of the plugin.
     *
     * @since 1.0.0-alpha
     * @var   Plugin|null
     */
    private static $instance = null;

    /**
     * Initialize the hooks
     *
     * @return void
     */
    public function initialize()
    {
        add_action('plugins_loaded', array($this, 'init_plugin'));
        (new Activation())->activate();
        (new Deactivation())->register();
        (new Uninstallation())->register();
    }

    public function init_plugin()
    {
        if (!class_exists('WPCF7')) {
            add_action('admin_notices', [$this, 'cf7NotFound']);
            return;
        }
        add_action('init', array($this, 'init_classes'), 10);
        add_filter('plugin_action_links_' . plugin_basename(BITCF7ZC_PLUGIN_MAIN_FILE), array($this, 'plugin_action_links'));
    }

    public function cf7NotFound()
    {
        echo '<div class="error"><p>Contact Form 7  plugin is required<p></div>';
    }
    /**
     * Instantiate the required classes
     *
     * @return void
     */
    public function init_classes()
    {
        if (Request::Check('admin')) {
            (new Admin_Bar())->register();
        }
        if (Request::Check('ajax')) {
            new AjaxService();
        }
        (new AdminHooks())->register();
        (new Integrations())->registerHooks();
    }

    /**
     * Plugin action links
     *
     * @param  array $links
     *
     * @return array
     */
    public function plugin_action_links($links)
    {
        $links[] = '<a href="https://formsintegrations.com/contact-form-7-integration-with-zoho-crm" target="_blank">' . __('Docs', 'bitcf7zc') . '</a>';

        return $links;
    }

    /**
     * Retrieves the main instance of the plugin.
     *
     * @since 1.0.0-alpha
     *
     * @return BITCF7ZC Plugin main instance.
     */
    public static function instance()
    {
        return static::$instance;
    }

    public static function update_tables()
    {
        if (! current_user_can('manage_options')) {
            return;
        }
        global $bitcf7zc_db_version;
        $installed_db_version = get_site_option("bitcf7zc_db_version");
        if ($installed_db_version != $bitcf7zc_db_version) {
            DB::migrate();
        }
    }
    /**
     * Loads the plugin main instance and initializes it.
     *
     * @since 1.0.0-alpha
     *
     * @param string $main_file Absolute path to the plugin main file.
     * @return bool True if the plugin main instance could be loaded, false otherwise./
     */
    public static function load($main_file)
    {
        if (null !== static::$instance) {
            return false;
        }
        // static::update_tables();
        static::$instance = new static($main_file);
        static::$instance->initialize();
        return true;
    }
}
