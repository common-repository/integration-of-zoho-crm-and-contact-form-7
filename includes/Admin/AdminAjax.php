<?php

namespace BitCode\BITCF7ZC\Admin;

class AdminAjax
{
    public function __construct()
    {
        //
    }
    public function register()
    {
        if(strpos(\sanitize_text_field($_REQUEST['action']), 'bitcf7zc') === false) return;   
        $dirs = new \FilesystemIterator(__DIR__);
        foreach ($dirs as $dirInfo) {
            if ($dirInfo->isDir()) {
                $serviceName = basename($dirInfo);
                if (file_exists(__DIR__.'/'.$serviceName)
                    && file_exists(__DIR__.'/'.$serviceName.'/Router.php')
                ) {
                    $routes = __NAMESPACE__. "\\{$serviceName}\\Router";
                    if (method_exists($routes, 'registerAjax')) {
                        (new $routes())->registerAjax();
                    }
                }
            }
        }
        return;
    }
}