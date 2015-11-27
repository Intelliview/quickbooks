<?php

namespace ActiveCollab\Quickbooks;

/**
 * Description of ProductonConfig
 *
 * @author kristian@intelliview.no
 */
class ProductonConfig {
    
    protected static $apiVersion = 3;
    protected static $apiUrl     = 'https://quickbooks.api.intuit.com';
    
    public function getApiVersion() {
        return self::$apiVersion;
    }

    public function getApiUrl() {
        return self::$apiUrl;
    }
    
}
