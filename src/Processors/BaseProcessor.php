<?php


namespace Huaqiang\LaravelShopee\Processors;


use Huaqiang\LaravelShopee\Enums\ShopeeProcessor;
use Huaqiang\LaravelShopee\Interfaces\ShopeeProcessInterface;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

abstract class BaseProcessor implements ShopeeProcessInterface
{
    public static $apiUrl;
    protected $_config;
    protected $_debug;

    public function __construct(array $config)
    {
        $this->_config = $config;
        $this->_debug  = $this->_config['debug'] ?? false;
    }

    public function process(string $processorName, array $params, array $signMap)
    {
        if ($processorName == array_flip(ShopeeProcessor::PROCESSOR_LIST)[get_class($this)]) {
            return $this->api($params, $signMap[get_class($this)]);
        }
    }

    /**
     * @param array  $params
     * @param string $token
     *
     * @return mixed|\Psr\Http\Message\ResponseInterface
     */
    protected function api(array $params, string $token)
    {
        $this->_debug && Log::info('shopee请求参数:', [
            'params' => $params,
            'token'  => $token
        ]);
        $_client = new Client([
            'timeout' => 30000,
            'headers' => [
                'Content-type'  => 'application/json',
                'Authorization' => $token
            ]
        ]);
        $_result = $_client->post($this::$apiUrl, ['json' => $params]);
        $_result = json_decode($_result->getBody()->getContents(), true);
        Log::info('shopee返回数据:', [$_result]);

        return $_result;
    }

}