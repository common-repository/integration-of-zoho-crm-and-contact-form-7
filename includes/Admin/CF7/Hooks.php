<?php
namespace BitCode\BITCF7ZC\Admin\CF7;

use BitCode\BITCF7ZC\Core\Util\Request;

final class Hooks{
    public function __construct()
    {
        //
    }
    
    
    public function registerHooks()
    {
        if (Request::Check('frontend') && !class_exists('BitCode\\BITCF7ZCPRO\\Integration\\Integrations')) {
            add_action('wpcf7_submit', [Handler::class, 'handle_wpcf7_submit'], 10, 2);
            add_filter('wpcf7_form_hidden_fields', [Handler::class, 'filter_wpcf7_form_hidden_fields'], 10, 1 ); 
        }
    }
} 