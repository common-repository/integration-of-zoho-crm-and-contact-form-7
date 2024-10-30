<?php
namespace BitCode\BITCF7ZC\Admin\CF7;

use BitCode\BITCF7ZC\Core\Util\Route;

final class Router{
    public function __construct()
    {
        //
    }
    
    
    public static function registerAjax()
    {
        Route::post('cf7/get/form', [Handler::class, 'get_a_form']);
    }
} 