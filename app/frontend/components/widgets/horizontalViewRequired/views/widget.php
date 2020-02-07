<?php

use frontend\components\widgets\horizontalViewRequired\Asset;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */

$asset = Asset::register($this);
?>

<div class="need-horizontal-message hide-on-med-and-up">
    <img src="<?= Url::to([$asset->baseUrl . '/need-horizontal-view.png'])  ?>" alt="">
    <br>
    <span><?= Yii::t('app', 'Rotate the device horizontally.') ?></span>
</div>
