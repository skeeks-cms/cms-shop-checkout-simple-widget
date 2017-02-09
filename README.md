Widget shop simple checkout for SkeekS CMS
===================================

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist skeeks/cms-shop-checkout-simple-widget "*"
```

or add

```
"skeeks/cms-shop-checkout-simple-widget": "*"
```

Example
----------

```php

<?= \skeeks\cms\shopCheckoutSimple\ShopCheckoutSimpleWidget::widget(); ?>

```

Example advanced
----------

```php

<? $checkoutWidget = \skeeks\cms\shopCheckoutSimple\ShopCheckoutSimpleWidget::begin([
    'btnSubmitWrapperOptions' => [
        'style' => 'display: none;'
    ]
]); ?>

<? \skeeks\cms\shopCheckoutSimple\ShopCheckoutSimpleWidget::end(); ?>

<a href="#" onclick="$('#{$checkoutWidget->formId}').submit(); return false;">Отправка вне формы</a>

```


##Links
* [Web site](https://cms.skeeks.com)
* [Author](https://skeeks.com)

___

> [![skeeks!](https://gravatar.com/userimage/74431132/13d04d83218593564422770b616e5622.jpg)](https://skeeks.com)  
<i>SkeekS CMS (Yii2) — quickly, easily and effectively!</i>  
[skeeks.com](https://skeeks.com) | [cms.skeeks.com](https://cms.skeeks.com)


