<?php


namespace Huaqiang\LaravelShopee\Traits;


trait AuthToken
{
    public function token(string $path, array $params)
    {
        $_config = $this->_config ?? [];
        if (empty($_config)) {
            throw new \Exception('shopee配置错误', 5000001);
        };
        $_key  = $_config['key'] ?? '';
        $path  = $path . '|';
        $_sign = hash_hmac('sha256', $path . json_encode($params), $_key);

        return $_sign;
    }
}