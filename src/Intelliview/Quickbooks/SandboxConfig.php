<?php

namespace Intelliview\Quickbooks;

/**
 * Description of ProductonConfig
 * 
 * @author     Kristian Beres <kristian@intelliview.no>
 */
class SandboxConfig extends QboConfig{
    
    protected $apiVersion = 3;
    protected $apiUrl     = 'https://sandbox-quickbooks.api.intuit.com';
    
    public function getApiUrl() {
        return $this->apiUrl;
    }
    
}
