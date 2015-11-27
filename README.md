#Quickbooks


## Usage

### Authentication
```php
    $authenticator = \ActiveCollab\Quickbooks\Quickbooks::getAuthenticator([
        'consumerKey'       => 'example-consumer-key',
        'consumerKeySecret' => 'example-consumer-key-secret',
        'callbackUrl'       => 'http://example.com'
    ]);
```    
    
### Querying API
```php    
    $dataService = \ActiveCollab\Quickbooks\Quickbooks::getDataService([
        'consumerKey'       => 'example-consumer-key',
        'consumerKeySecret' => 'example-consumer-key-secret',
        'accessToken'       => 'example-access-token',
        'accessTokenSecret' => 'example-access-token-secret',
        'callbackUrl'       => 'http://example.com',
        'realmId'           => 123456789,
        'serviceConfig'    => new \ActiveCollab\Quickbooks\SandboxConfig() // SandboxConfig() || ProductionConfig()
    ]);

    $allData = $dataService->query("SELECT * FROM Invoice");
```