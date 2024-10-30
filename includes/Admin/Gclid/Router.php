<?php
namespace BitCode\BITCF7ZC\Admin\Gclid;

use BitCode\BITCF7ZC\Core\Util\Route;

final class Router{
    public function __construct()
    {
        //
    }
    
    
    public static function registerAjax()
    {
        
        Route::post('gclid/enable', [Handler::class, 'enable']);
        Route::post('gclid/disable', [Handler::class, 'disable']);
    }
} 