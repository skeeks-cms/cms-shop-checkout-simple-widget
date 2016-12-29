<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 28.12.2016
 */
namespace skeeks\cms\shopCheckoutSimple\assets;
use skeeks\cms\base\AssetBundle;

/**
 * Class ShopCartStepsWidgetAsset
 *
 * @package skeeks\cms\shopCartStepsWidget\assets
 */
class ShopCheckoutSimpleWidgetAsset extends AssetBundle
{
    public $sourcePath = '@skeeks/cms/shopCheckoutSimple/assets/src';

    public $css             = [];

    public $js              = [
        'checkout-simple.js'
    ];

    public $depends         = [
        'skeeks\sx\assets\Core'
    ];
}
