<?php

use macgyer\yii2materializecss\assets\MaterializePluginAsset;
use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\media\Carousel;

/* @var $this yii\web\View */

$this->title = 'The Shop';
MaterializePluginAsset::register($this);
?>

<!--<div class="carousel carousel-slider">-->
<!--    <a class="carousel-item" href="#one!"><img src="https://i.picsum.photos/id/1/200/300.jpg"></a>-->
<!--    <a class="carousel-item" href="#two!"><img src="https://i.picsum.photos/id/65/200/300.jpg"></a>-->
<!--    <a class="carousel-item" href="#three!"><img src="https://i.picsum.photos/id/1/200/300.jpg"></a>-->
<!--    <a class="carousel-item" href="#four!"><img src="https://i.picsum.photos/id/65/200/300.jpg"></a>-->
<!--</div>-->

<?= Carousel::widget([
        'fullWidth' => true,
        'items' => [
            [
                    'content' => Html::a(
                            Html::img('https://www.tnvacation.com/sites/default/files/styles/hero/public/article/_HEADER_10.jpg', [
                                    'class' => 'responsive-img'
                                    ]),
                            '#!'
                    )
            ],
            [
                    'content' => Html::a(
                        Html::img('https://www.thoughtco.com/thmb/hdPUIi6hKOZG3xnsj7fqZHyzXag=/2750x2750/smart/filters:no_upscale()/close-up-of-clothes-hanging-in-row-739240657-5a78b11f8e1b6e003715c0ec.jpg', [
                        ]),
                        '#!'
                    )
            ],
            [
                    'content' => Html::a(

                        Html::img('https://www.rd.com/wp-content/uploads/2018/02/10_Dry_Laundry-Mistakes-You-Didn%E2%80%99t-Know-You-Were-Making_617024009_Africa-Studio.jpg', [
                        ]),
                        '#!'
                    )
            ],
            [
                    'content' => Html::a(

                        Html::img('https://static.dezeen.com/uploads/2019/10/circulose-recycled-cotton-clothing-sustainable-fashion-stockholm-sweden_hero-a.jpg', [
                        ]),
                        '#!'
                    )
            ],
        ]
]) ?>

<div class ="wrapper">
    <div class="row">

        <div class="col s3">

            <ul class="collection">
                <a href="#!" class="collection-item">Футболки</a>
                <a href="#!" class="collection-item">Худи</a>
                <a href="#!" class="collection-item">Свитошоты</a>
            </ul>
        </div>

        <div class="col s9">
            <a class="waves-effect waves-light btn-large">фильтр</a>
        </div>

        <div class="col s9">
            <div class="col s4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://www.korablik.ru/upload/resize_cache/iblock/a7a/1200_1200_1/a7aae04bf2ec9f96e13bc5ead519ab75.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                        <p><a href="#">This is a link</a></p>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://www.korablik.ru/upload/resize_cache/iblock/a7a/1200_1200_1/a7aae04bf2ec9f96e13bc5ead519ab75.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                        <p><a href="#">This is a link</a></p>
                    </div>
                </div>
            </div>
            <div class="col s4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="https://www.korablik.ru/upload/resize_cache/iblock/a7a/1200_1200_1/a7aae04bf2ec9f96e13bc5ead519ab75.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                        <p><a href="#">This is a link</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

