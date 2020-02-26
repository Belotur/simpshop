<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'macgyer\yii2materializecss\assets\MaterializePluginAsset',
        'macgyer\yii2materializecss\assets\MaterializeAsset',
        'yii\web\YiiAsset',
    ];
}
