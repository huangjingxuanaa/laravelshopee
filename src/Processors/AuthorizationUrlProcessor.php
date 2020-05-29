<?php


namespace Huaqiang\LaravelShopee\Processors;


use Huaqiang\LaravelShopee\Enums\ShopeeProcessor;

class AuthorizationUrlProcessor extends BaseProcessor
{
    public static $apiUrl = 'https://partner.shopeemobile.com/api/v1/shop/auth_partner';
    protected $_config;


    public function process(string $processorName, array $params, array $signMap)
    {
        if ($processorName == ShopeeProcessor::AUTHORIZATION_URL) {
            $_key       = $this->_config['key'];
            $_partnerId = $this->_config['partner_id'];
            $_callBack  = $this->_config['callback'];
            $_token     = hash('sha256', $_key . $_callBack);

            return ['url' => self::$apiUrl . "?id=$_partnerId&token=$_token&redirect=$_callBack"];
        }
    }
}