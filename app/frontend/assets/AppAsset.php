<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'fonts/imoon/style.css',
        'css/site.css',
    ];
    public $js = [
        'js/app.js'
    ];
    public $depends = [
        'macgyer\yii2materializecss\assets\MaterializePluginAsset',
        'macgyer\yii2materializecss\assets\MaterializeAsset',
        'yii\web\YiiAsset',
    ];
}
