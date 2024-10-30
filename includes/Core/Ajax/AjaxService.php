<?php

namespace BitCode\BITCF7ZC\Core\Ajax;

use BitCode\BITCF7ZC\Core\Util\Request;
use BitCode\BITCF7ZC\Admin\AdminAjax;
use BitCode\BITCF7ZC\Integration\Integrations;

class AjaxService
{
    public function __construct()
    {
        if (Request::Check('admin')) {
            $this->loadAdminAjax();
            $this->loadIntegrationsAjax();
        }
    }

    /**
     * Helps to register admin side ajax
     *
     * @return null
     */
    public function loadAdminAjax()
    {
        (new AdminAjax())->register();
    }

    /**
     * Helps to register integration ajax
     *
     * @return null
     */
    public function loadIntegrationsAjax()
    {
        (new Integrations())->registerAjax();
    }
}
