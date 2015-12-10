<?php

namespace Intelliview\Quickbooks;

/**
 * Description of ProductonConfig
 *
 * @author     Kristian Beres <kristian@intelliview.no>
 */
class ProductonConfig extends QboConfig{
    
    protected $apiVersion = 3;
    protected $apiUrl     = 'https://quickbooks.api.intuit.com';
        
    public function getApiUrl() {
        return $this->apiUrl;
    }
    
}
