<?php


namespace Huaqiang\LaravelShopee\Interfaces;


interface ShopeeProcessInterface
{
    public function process(string $processorName, array $params, array $signMap);
}