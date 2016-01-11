<?php

namespace Intelliview\Quickbooks;

use Intelliview\Quickbooks\Http\HttpRequesterInterface;
use Intelliview\Quickbooks\OAuth\OAuthInterface;

/**
 * Class DataService
 *
 * @package Intelliview\Quickbooks
 */
class DataService
{
    /**
     * @var OAuthInterface $oauth
     */
    protected $oauth;

    /**
     * @var HttpRequesterInterface $requester
     */
    protected $requester;

    /**
     * @var int $realmId
     */
    protected $realmId;

    /**
     * @var string $accessToken
     */
    protected $accessToken;

    /**
     * @var string $accessTokenSecret
     */
    protected $accessTokenSecret;
    
    /**
     * @var \Intelliview\Quickbooks\QboConfig
     */
    protected $config;
   
    function __construct(OAuthInterface $oauth, HttpRequesterInterface $requester, $accessToken, $accessTokenSecret, $realmId, \Intelliview\Quickbooks\QboConfig $config)
    {
        $this->oauth             = $oauth;
        $this->requester         = $requester;
        $this->realmId           = $realmId;
        $this->accessToken       = $accessToken;
        $this->accessTokenSecret = $accessTokenSecret;
        $this->config            = $config;
    }

    /**
     * Get all entities.
     *
     * @param  string $entityName
     * @return array
     */
    public function all($entityName)
    {
        return $this->query('select * from '.$entityName);
    }

    /**
     * Get entity by id.
     *
     * @param  string $entityName
     * @param  int    $id
     *
     * @return array
     */
    public function get($entityName, $id)
    {
        return $this->makeCall('GET',$this->buildUrl('/'.strtolower($entityName).'/'.$id));
    }

    /**
     * Create new entity.
     *
     * @param  string $entityName
     * @param  array  $payload
     *
     * @return array
     */
    public function create($entityName, $payload)
    {
        return $this->makeCall('POST', $this->buildUrl('/'.strtolower($entityName)), $payload);
    }

    /**
     * Query API
     *
     * @param  string $query
     * @return array
     */
    public function query($query)
    {
        return $this->makeCall('GET',$this->buildUrl('/query?query='.$query))['QueryResponse'];
    }

    /**
     * Build url for querying API
     *
     * @param  string $config
     * @return string
     */
    protected function buildUrl($config)
    {
        return $this->config->getApiUrl().'/v'.$this->config->getApiVersion().'/company/'.$this->realmId.$config;
    }

    /**
     * Make API call.
     *
     * @param string     $method
     * @param string     $url
     * @param null|array $payload
     *
     * @return array
     */
    protected function makeCall($method,$url, $payload = [])
    {
        return $this->requester->request($method, $url, $payload, [
            'Authorization' => $this->oauth->generateAuthorizationHeader($method, $url, $this->accessToken, $this->accessTokenSecret)
        ]);
    }
    
    /**
     * Get TransactionList
     * 
     * $params = [
     *      "start_date" => '2015-12-02',
     *      "end_date" => '2015-12-02',
     *      "columns" => ['tx_date','txn_type','doc_num','name','account_name','other_account','last_mod_date','split_acc','debt_amt','credit_amt','tax_amount'],
     *   ];
     * 
     * @param array $params
     * @return array
     */
    public function transactionList($params){
        return $this->report('TransactionList', $params);
    }
    
    
    public function generalLedger($params){
        return $this->report('GeneralLedger', $params);
    }
    
    public function report($entityName, $params){
        $str = '?';
        if(count($params) > 0){
            foreach($params as $k=>$v){
                if($k == 'columns'){
                    $str .= "&columns=".implode(',', $v);
                }else{
                    $str .= '&'.$k.'='.$v;
                }
            }
        }
        
        return $this->makeCall('GET',$this->buildUrl('/reports/'.$entityName.$str));
    }
    
    public function reconnect(){
        return $this->makeCall('GET', $this->config->getApiUrlReconnect());
    }

    public function disconnect(){
        return $this->makeCall('GET', $this->config->getApiUrlDisconnect());
    }
    
}
