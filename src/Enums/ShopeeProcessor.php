<?php


namespace Huaqiang\LaravelShopee\Enums;


use Huaqiang\LaravelShopee\Processors\AuthorizationUrlProcessor;
use Huaqiang\LaravelShopee\Processors\GetAirwayBillProcessor;
use Huaqiang\LaravelShopee\Processors\GetAttributesProcessor;
use Huaqiang\LaravelShopee\Processors\GetItemProcessor;
use Huaqiang\LaravelShopee\Processors\ItemAddProcessor;
use Huaqiang\LaravelShopee\Processors\ItemDeleteProcessor;
use Huaqiang\LaravelShopee\Processors\ItemDiscountDeleteProcessor;
use Huaqiang\LaravelShopee\Processors\ItemImagesUpdateProcessor;
use Huaqiang\LaravelShopee\Processors\ItemListProcessor;
use Huaqiang\LaravelShopee\Processors\ItemUpdateProcessor;
use Huaqiang\LaravelShopee\Processors\LogisticsInitProcessor;
use Huaqiang\LaravelShopee\Processors\LogisticsProcessor;
use Huaqiang\LaravelShopee\Processors\OrderDetailProcessor;
use Huaqiang\LaravelShopee\Processors\OrderListProcessor;
use Huaqiang\LaravelShopee\Processors\ShopInfoProcessor;
use Huaqiang\LaravelShopee\Processors\TierVariationInitProcessor;
use Huaqiang\LaravelShopee\Processors\UnlistItemProcessor;
use Huaqiang\LaravelShopee\Processors\UpdateVariationPriceProcessor;
use Huaqiang\LaravelShopee\Processors\UpdateVariationStockProcessor;

class ShopeeProcessor
{
    const AUTHORIZATION_URL      = 'authorization_url';
    const SHOP_INFO              = 'shop_info';
    const LOGISTICS_INFO         = 'logistics_info';
    const ITEM_ADD               = 'item_add';
    const TIER_VAR_INIT          = 'tier_var_init';
    const GET_ATTRIBUTES         = 'get_attributes';
    const ITEM_UPDATE            = 'item_update';
    const ITEM_IMAGES_UPDATE     = 'item_images_update';
    const LOGISTICS_INIT         = 'logistics_init';
    const GET_AIRWAY_BILL        = 'get_airway_bill';
    const UPDATE_VARIATION_PRICE = 'update_variation_price';
    const UPDATE_VARIATION_STOCK = 'update_variation_stock';
    const UNLIST_ITEM            = 'unlist_item';
    const GET_ITEM               = 'get_item';
    const DELETE_ITEM            = 'delete_item';
    const DELETE_ITEM_DISCOUNT   = 'delete_item_discount';
    const ITEM_LIST              = 'item_list';
    const ORDER_LIST             = 'order_list';
    const ORDER_DETAIL           = 'order_detail';

    const PROCESSOR_LIST
        = [
            self::AUTHORIZATION_URL      => AuthorizationUrlProcessor::class,
            self::SHOP_INFO              => ShopInfoProcessor::class,
            self::LOGISTICS_INFO         => LogisticsProcessor::class,
            self::ITEM_ADD               => ItemAddProcessor::class,
            self::TIER_VAR_INIT          => TierVariationInitProcessor::class,
            self::GET_ATTRIBUTES         => GetAttributesProcessor::class,
            self::ITEM_UPDATE            => ItemUpdateProcessor::class,
            self::ITEM_IMAGES_UPDATE     => ItemImagesUpdateProcessor::class,
            self::LOGISTICS_INIT         => LogisticsInitProcessor::class,
            self::GET_AIRWAY_BILL        => GetAirwayBillProcessor::class,
            self::UPDATE_VARIATION_PRICE => UpdateVariationPriceProcessor::class,
            self::UPDATE_VARIATION_STOCK => UpdateVariationStockProcessor::class,
            self::UNLIST_ITEM            => UnlistItemProcessor::class,
            self::GET_ITEM               => GetItemProcessor::class,
            self::DELETE_ITEM            => ItemDeleteProcessor::class,
            self::DELETE_ITEM_DISCOUNT   => ItemDiscountDeleteProcessor::class,
            self::ITEM_LIST              => ItemListProcessor::class,
            self::ORDER_LIST             => OrderListProcessor::class,
            self::ORDER_DETAIL           => OrderDetailProcessor::class
        ];
}