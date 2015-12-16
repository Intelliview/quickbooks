<?php

namespace Intelliview\Quickbooks;

/**
 * Description of ProductonConfig
 * 
 * @author     Kristian Beres <kristian@intelliview.no>
 */
abstract class QboConfig {
    
    protected $apiVersion = 3;
    protected $apiUrlReconenct = 'https://appcenter.intuit.com/api/v1/connection/reconnect';
    protected $apiUrlDisconnect = 'https://appcenter.intuit.com/api/v1/connection/disconnect';
    
    public function getApiVersion() {
        return $this->apiVersion;
    }

    public function getApiUrlReconnect() {
        return $this->apiUrlReconenct;
    }
    
    public function getApiUrlDisconnect() {
        return $this->apiUrlDisconnect;
    }
}

 