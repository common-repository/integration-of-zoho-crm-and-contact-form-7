<?php

namespace BitCode\BITCF7ZC\Admin;

use BitCode\BITCF7ZC\Core\Util\DateTimeHelper;
use BitCode\BITCF7ZC\Admin\Gclid\Handler as GclidHandler;

/**
 * The admin menu and page handler class
 */

class Admin_Bar
{
    public function register()
    {
        add_action('admin_menu', array( $this, 'AdminMenu' ), 9, 0);
        add_action('admin_enqueue_scripts', array( $this, 'AdminAssets' ));
        add_filter('script_loader_tag', [$this, 'filterScriptTag'], 0, 3);
    }


    /**
     * Register the admin menu
     *
     * @return void
     */
    public function AdminMenu()
    {
        global $submenu;
        $capability = apply_filters('bitcf7zc_form_access_capability', 'manage_options');
        if (current_user_can($capability)) {
            add_menu_page(__('Zoho CRM integration for Contact Form 7', 'bitcf7zc'), 'CF7 Zoho CRM', $capability, 'bitcf7zc', array($this, 'RootPage'), 'data:image/svg+xml;base64,' . base64_encode('<svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 128 128"><defs><style>.cls-1{fill:#fff;}</style></defs><path class="cls-1" d="M82,94.25a30.09,30.09,0,0,1-21.48-8.83q-8.31-8.23-16.53-16.54a9.7,9.7,0,0,1-2.56-10.26,9.66,9.66,0,0,1,7.9-7,9.7,9.7,0,0,1,9.08,2.85c5,4.95,9.94,9.94,14.92,14.9,2,2,4.61,2.19,6.52.53a4.6,4.6,0,0,0,.1-7c-3.2-3.25-6.44-6.47-9.68-9.69-2.66-2.64-5.18-5.47-8-7.87C54.61,39.07,46,37.59,36.9,41.28S22.76,51.86,21.76,61.52a24.49,24.49,0,0,0,26.63,27,25.51,25.51,0,0,0,4.41-.8c1.93-.52,3.44.21,3.87,1.84s-.49,3-2.37,3.59a30.23,30.23,0,1,1-14-58.77c10.39-2,19.54.85,27.15,8.21C73.05,48,78.49,53.5,83.94,59a9.83,9.83,0,0,1,2.53,10.7,10.2,10.2,0,0,1-16.86,3.88q-7.47-7.44-14.92-14.9c-2.16-2.15-4.94-2.23-6.86-.24a4.41,4.41,0,0,0-.07,6.24c5.82,5.88,11.49,11.94,17.61,17.51,7.2,6.56,15.8,8.16,24.92,4.8s14.5-10.11,15.82-19.73c1.84-13.5-7.17-25.39-20.64-27.61a25,25,0,0,0-10.67.71,2.81,2.81,0,1,1-1.35-5.44c10.63-2.79,20.25-.75,28.45,6.56a29.93,29.93,0,0,1,2.82,42.14A29.43,29.43,0,0,1,82,94.25Z"/><path class="cls-1" d="M64,127.42A63.42,63.42,0,1,1,127.42,64,63.49,63.49,0,0,1,64,127.42ZM64,3.58A60.42,60.42,0,1,0,124.42,64,60.5,60.5,0,0,0,64,3.58Z"/></svg>'), 30);

            $submenu['bitcf7zc'][] = array(__('Forms', 'bitcf7zc'), $capability, 'admin.php?page=bitcf7zc#/');
        }
    }
    /**
     * Load the asset libraries
     *
     * @return void
     */
    public function AdminAssets($current_screen)
    {
        if (strpos($current_screen, 'bitcf7zc') === false) {
            return;
        }
        $parsed_url = parse_url(get_admin_url());
        $site_url = $parsed_url['scheme'] . "://" . $parsed_url['host'];
        $site_url .= empty($parsed_url['port']) ? null : ':' . $parsed_url['port'];
        $base_path_admin =  str_replace($site_url, '', get_admin_url());
        $prefix = 'FITCF7ZC';
        if (is_readable(BITCF7ZC_PLUGIN_DIR_PATH . DIRECTORY_SEPARATOR . 'port')) {
            $devPort = file_get_contents(BITCF7ZC_PLUGIN_DIR_PATH . DIRECTORY_SEPARATOR . 'port');
            $devUrl = 'http://localhost:' . $devPort;
            wp_enqueue_script(
                'vite-client-helper-' . $prefix . '-MODULE',
                $devUrl . '/config/devHotModule.js',
                [],
                null
            );

            wp_enqueue_script(
                'vite-client-' . $prefix . '-MODULE',
                $devUrl . '/@vite/client',
                [],
                null
            );
            wp_enqueue_script(
                'index-' . $prefix . '-MODULE',
                $devUrl . '/index.jsx',
                [],
                null
            );
        } else {
            wp_enqueue_script(
                'index-' . $prefix . '-MODULE',
                BITCF7ZC_ASSET_URI . "/index-" . BITCF7ZC_VERSION . ".js",
                [],
                null
            );
        }
        $gclidHandler = new GclidHandler();
        $gclid_enabled = $gclidHandler->get_enabled_form_lsit();
        $forms = \WPCF7_ContactForm::find();
        $all_forms = [];
        foreach ($forms as $form) {
            $all_forms[] = (object)[
                'id' => $form->id(),
                'title' => $form->title(),
                'gclid' => in_array($form->id(), $gclid_enabled)
            ];
        }
        $bitcf7zc = apply_filters(
            'bitcf7zc_localized_script',
            array(
                'nonce'     => wp_create_nonce('bitcf7_nonce'),
                'assetsURL' => BITCF7ZC_ASSET_URI,
                'baseURL'   => $base_path_admin . 'admin.php?page=bitcf7zc#',
                'ajaxURL'   => admin_url('admin-ajax.php'),
                'allForms'  => is_wp_error($all_forms) ? null : $all_forms,
                'dateFormat'  => get_option('date_format'),
                'timeFormat'  => get_option('time_format'),
                'timeZone'  => DateTimeHelper::wp_timezone_string(),
                'redirect' => get_rest_url() . 'bitcf7zc/redirect',
            )
        );

        if (get_locale() !== 'en_US' && file_exists(BITCF7ZC_PLUGIN_DIR_PATH . '/languages/generatedString.php')) {
            include_once BITCF7ZC_PLUGIN_DIR_PATH . '/languages/generatedString.php';
            $bitcf7zc['translations'] = $i18nStrings;
        }
        wp_localize_script('index-' . $prefix . '-MODULE', 'bitcf7', $bitcf7zc);

    }

    /**
     * apps-root id vider
     * @return void
     */
    public function RootPage()
    {
        require_once BITCF7ZC_PLUGIN_DIR_PATH . '/views/view-root.php';
    }

    public function filterScriptTag($html, $handle, $href)
    {
        $newTag = $html;
        $prefix = 'FITCF7ZC';
        if (preg_match('/' . $prefix . '-MODULE/', $handle)) {
            $newTag = preg_replace('/<script /', '<script type="module" ', $newTag);
        }
        return $newTag;
    }
}
