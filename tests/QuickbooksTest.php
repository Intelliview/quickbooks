<?php

class QuickbooksTest extends TestCase
{
    public function testCreateDataService()
    {
        $dataService = \Intelliview\Quickbooks\Quickbooks::getDataService([
            'consumerKey'       => 'consumer-key',
            'consumerKeySecret' => 'consumer-key-secret',
            'accessToken'       => 'access-token',
            'accessTokenSecret' => 'access-token-secret',
            'callbackUrl'       => 'callback-url',
            'realmId'           => 123456789,
        ]);

        $this->assertInstanceOf('\Intelliview\Quickbooks\DataService', $dataService);
    }

    public function testCreateAuthenticator()
    {
        $authenticator = \Intelliview\Quickbooks\Quickbooks::getAuthenticator([
            'consumerKey'       => 'consumer-key',
            'consumerKeySecret' => 'consumer-key-secret',
            'callbackUrl'       => 'callback-url'
        ]);

        $this->assertInstanceOf('\Intelliview\Quickbooks\Authenticator', $authenticator);
    }
}