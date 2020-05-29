<?php


namespace Huaqiang\LaravelShopee\Services;


use Huaqiang\LaravelShopee\Enums\ShopeeProcessor;
use Huaqiang\LaravelShopee\Traits\AuthToken;
use Carbon\Carbon;

class Shopee
{
    use AuthToken;
    protected $_config;
    protected $_params = [];
    protected $_sign = [];
    protected $_processorList = [];

    /**
     * Shopee constructor.
     *
     * @param string $client
     *
     * @throws \Exception
     */
    public function __construct(string $client = 'default')
    {
        $this->_config = config('shopee', [])[$client] ?? [];
        if (empty($this->_config)) {
            throw new \Exception('shopee配置错误', 5000001);
        }
        $this->_initProcessor();
    }

    /**
     *
     */
    private function _initProcessor()
    {
        foreach (ShopeeProcessor::PROCESSOR_LIST as $processor) {
            $this->_processorList[] = new $processor($this->_config);
        }
    }

    /**
     * @param string $client
     */
    public function setClient(string $client = 'default')
    {
        $this->_config = config('shopee', [])[$client] ?? [];
    }

    /**
     * @param array $params
     *
     * @return $this
     * @throws \Exception
     */
    public function setParams(array $params = [])
    {
        if (!empty($params)) {
            $params['partner_id'] = $this->_config['partner_id'];
            $params['timestamp']  = Carbon::now()->getTimestamp();
            $this->_params        = $params;
            $this->setAuthToken($this->_params);
        }

        return $this;
    }

    /**
     * @param array $params
     *
     * @throws \Exception
     */
    protected function setAuthToken(array $params)
    {
        foreach (ShopeeProcessor::PROCESSOR_LIST as $processorName => $processor) {
            $this->_sign[$processor] = $this->token($processor::$apiUrl, $params);
        }
    }

    /**
     * @param string $processorName
     *
     * @return array
     */
    public function processor(string $processorName)
    {
        $result = [];
        foreach ($this->_processorList as $processor) {
            empty($result) && $result = $processor->process($processorName, $this->_params, $this->_sign);
        }

        return $result;
    }

}