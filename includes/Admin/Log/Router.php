<?php
namespace BitCode\BITCF7ZC\Admin\Log;

use BitCode\BITCF7ZC\Core\Util\Route;

final class Router{
    public function __construct()
    {
        //
    }
    
    
    public static function registerAjax()
    {
        Route::post('log/get', [Handler::class, 'get']);
        Route::post('log/delete', [Handler::class, 'delete']);
    }
} 