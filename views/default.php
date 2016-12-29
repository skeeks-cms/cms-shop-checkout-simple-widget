<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link http://skeeks.com/
 * @copyright 2010 SkeekS (СкикС)
 * @date 14.10.2016
 */
/* @var $this yii\web\View */
/* @var $widget \skeeks\cms\shopCheckoutSimple\ShopCheckoutSimpleWidget */
\skeeks\cms\shopCheckoutSimple\assets\ShopCheckoutSimpleWidgetAsset::register($this);

$widget     = $this->context;
$shopFuser  = $widget->shopFuser;
$clientOptions = \yii\helpers\Json::encode($widget->clientOptions);
?>
<?= \yii\helpers\Html::beginTag('div', $widget->options); ?>
    <? if ($widget->shopIsReady) : ?>

    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'id'                                            => $widget->formId,
        'enableAjaxValidation'                          => false,
        'enableClientValidation'                        => false,
        'options'                        =>
        [
            'data-pjax' => 'true'
        ]
    ]); ?>

    <? $this->registerJs(<<<JS
    (function(sx, $, _)
    {
        new sx.classes.SimpleCheckoutWidget({$clientOptions});
    })(sx, sx.$, sx._);
JS
    ); ?>

    <? if (count(\Yii::$app->shop->shopPersonTypes) <= 1) : ?>
        <div style="display: none;">
    <? endif; ?>
        <?= $form->field($shopFuser, 'person_type_id')->radioList(
            \yii\helpers\ArrayHelper::map(\Yii::$app->shop->shopPersonTypes, 'id', 'name'),
            [
                'data-form-reload' => 'true'
            ]
        )->label(false); ?>
    <? if (count(\Yii::$app->shop->shopPersonTypes) <= 1) : ?>
        </div>
    <? endif; ?>

            <? foreach ($widget->shopBuyer->relatedProperties as $property) : ?>
                <?= $property->renderActiveForm($form, $widget->shopBuyer)?>
            <? endforeach; ?>

            <? if ($widget->shopFuser->paySystems) : ?>
                <?= $form->field($widget->shopFuser, 'pay_system_id')->label('Способ оплаты')->radioList(
                    \yii\helpers\ArrayHelper::map($widget->shopFuser->paySystems, 'id', 'name'),
                    [
                        'data-form-reload' => 'true'
                    ]
                ); ?>
            <? endif; ?>

            <?= $form->field($widget->shopFuser, 'delivery_id')->label('Способ доставки')->radioList(
                \yii\helpers\ArrayHelper::map(\skeeks\cms\shop\models\ShopDelivery::find()->active()->all(), 'id', 'name'),
                [
                    'data-form-reload' => 'true'
                ]
            ); ?>

            <?= \yii\helpers\Html::beginTag('div', $widget->btnSubmitWrapperOptions); ?>
                <?=
                    \yii\helpers\Html::button($widget->btnSubmitName, $widget->btnSubmitOptions)
                ?>
            <?= \yii\helpers\Html::endTag('div'); ?>
        <? $form::end(); ?>
    <? else : ?>
        Магазин не настроен
    <? endif; ?>
<?= \yii\helpers\Html::endTag('div'); ?>