<?php

namespace BitCode\BITCF7ZC\Core\Util;

use BitCode\BITCF7ZC\Core\Database\DB;

/**
 * Class handling plugin activation.
 *
 * @since 1.0.0
 */
final class Activation
{
    public function activate()
    {
        add_action('bitcf7zc_activation', array($this, 'install'));
    }

    public function install()
    {
        $installed = get_option('bitcf7zc_installed');
        if ($installed) {
            $oldversion = get_option('bitcf7zc_version');
        }
        if (!get_option('bitcf7zc_erase_all')) {
            update_option('bitcf7zc_erase_all', false);
        }
    
        if (!$installed || version_compare($oldversion, BITCF7ZC_VERSION, '!=')) {
            DB::migrate();
            update_option('bitcf7zc_installed', time());
        }
        update_option('bitcf7zc_version', BITCF7ZC_VERSION);
    }
}
