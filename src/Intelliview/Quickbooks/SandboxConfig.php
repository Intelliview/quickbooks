<?php

namespace Intelliview\Quickbooks;

/**
 * Description of ProductonConfig
 * 
 * @author     Kristian Beres <kristian@intelliview.no>
 */
class SandboxConfig {
    
    protected static $apiVersion = 3;
    protected static $apiUrl     = 'https://sandbox-quickbooks.api.intuit.com';
    
    public function getApiVersion() {
        return self::$apiVersion;
    }

    public function getApiUrl() {
        return self::$apiUrl;
    }
    
}
