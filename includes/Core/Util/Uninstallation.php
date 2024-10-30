<?php
namespace BitCode\BITCF7ZC\Core\Util;

/**
 * Class handling plugin uninstallation.
 *
 * @since 1.0.0
 * @access private
 * @ignore
 */
final class Uninstallation
{
    /**
     * Registers functionality through WordPress hooks.
     *
     * @since 1.0.0-alpha
     */
    public function register()
    {
        add_action('bitcf7zc_uninstall', array($this, 'uninstall'));
    }

    public function uninstall()
    {
        if (get_option('bitcf7zc_erase_all')) {
            global $wpdb;
            $tableArray = [
             $wpdb->prefix . "bitcf7zc_zoho_crm_log_details",
             $wpdb->prefix . "bitcf7zc_integration",
             $wpdb->prefix . "bitcf7zc_gclid",
            ];
            foreach ($tableArray as $tablename) {
                $wpdb->query("DROP TABLE IF EXISTS $tablename");
            }
            $columns = ["bitcf7zc_db_version", "bitcf7zc_installed", "bitcf7zc_version", "bitcf7zc_erase_all"];
            foreach ($columns as $column) {
                $wpdb->query("DELETE FROM `{$wpdb->prefix}options` WHERE option_name='$column'");
            }
        }
    }
}
