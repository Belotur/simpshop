<?php

namespace frontend\components\widgets\horizontalViewRequired;

use frontend\assets\AppAsset;
use yii\web\AssetBundle;

/**
 * Комплект статики виджета.
 * Виджет элемента требующего повернуть устройство горизонтально для устройств с маленькой шириной экрана (смартфоны).
 */
class Asset extends AssetBundle
{
    public $sourcePath = '@frontend/components/widgets/horizontalViewRequired/assets';

    public $css = [
        'need-horizontal-message.css'
    ];
    public $depends = [
        AppAsset::class,
    ];
}