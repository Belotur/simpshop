<?php

/* @var $this \yii\web\View */
/* @var $content string */

use macgyer\yii2materializecss\lib\Html;
use macgyer\yii2materializecss\widgets\Alert;
use yii\helpers\Url;

frontend\assets\AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">

    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>

    <body>
    <?php $this->beginBody() ?>
    <div class="main-container">
        <header class="page-header">
            <nav class="grey darken-3">
                <div class="nav-wrapper">
                    <a href="/" class="brand-logo left">MP</a>
                    <ul id="nav-mobile" class="right">
                        <li>
                            <a href="#" id="app-menu">
                                <i class="material-icons">dehaze</i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-bell">
                                    <span class="badge red">1</span>
                                </i>

                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-cart"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-consultants"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-share"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-arrow-left"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="icon-arror-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <main class="content">
            <div class="grid-column-left">
                <ul class="collection tools-panels">
                    <li class="collection-item grey darken-3">
                        <a href="#" title="Мебель" class="white-text">
                            <span class="icon-furniture"></span>
                        </a>
                    </li>
                    <li class="collection-item grey darken-3">
                        <a href="#" title="Интерьер" class="white-text">
                            <span class="icon-materials"></span>
                        </a>
                    </li>
                    <li class="collection-item grey darken-3">
                        <a href="#" title="Конструкции" class="white-text">
                            <span class="icon-inteerier"></span>
                        </a>
                    </li>
                    <li class="collection-item grey darken-3">
                        <a href="#" title="Строительство" class="white-text">
                            <span class="icon-materials"></span>
                        </a>
                    </li>
                    <li class="collection-item grey darken-3">
                        <a href="#" title="Бытовая техника" class="white-text">
                            <span class="icon-appliances"></span>
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <?= Alert::widget() ?>

                <?= $content ?>
            </div>

            <div class="grid-column-right">
                <ul class="collection tools-panels">
                    <?php for($i = 0; $i <= 5; $i++): ?>
                        <li class="collection-item grey darken-3">
                            <a href="#" title="Бытовая техника" class="white-text">
                                <span class="icon-appliances"></span>
                            </a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>
        </main>

        <!-- @todo Add to appMenu widget -->
        <div class="app-menu hidden">
            <div class="main-menu-wrapper container-fluid">
                <a href="#" class="app-menu-item square">
                    <i class="icon-cart"></i>
                    <span>Корзина</span>
                </a>
                <a href="#" class="app-menu-item square">
                    <i class="icon-favorites"></i>
                    <span>Избранное</span>
                </a>
                <a href="#" class="app-menu-item square">
                    <i class="icon-orders"></i>
                    <span>Заказы</span>
                </a>
                <a href="#" class="app-menu-item square">
                    <i class="icon-messages"></i>
                    <span>Сообщения</span>
                </a>

                <a href="<?= Url::to(['pages/index', 'key' => \common\models\Page::KEY_PROVISIONERS_OFFER]) ?>"
                   class="app-menu-item square">
                    <i class="icon-topartners"></i>
                    <span>Поставщикам</span>
                </a>
                <a href="<?= Url::to(['pages/index', 'key' => \common\models\Page::KEY_TERMS_OF_USE]) ?>"
                   class="app-menu-item square">
                    <i class="icon-conditions"></i>
                    <span>Условия</span>
                </a>
                <a href="#" class="app-menu-item square">
                    <i class="icon-user"></i>
                    <span>Личный кабинет</span>
                </a>
                <?php if (Yii::$app->getUser()->isGuest): ?>
                    <a href="<?= Url::to(['users/login']) ?>" class="app-menu-item square">
                        <i class="icon-login"></i>
                        <span>Вход</span>
                    </a>
                <?php else: ?>
                    <?= Html::beginForm(['/users/logout'], 'post', ['class' => 'app-menu-item square']); ?>

                    <?= Html::submitButton(
                    '<i class="icon-login"></i> Выход', ['class' => 'btn grey darken-3 logout-button']
                    ); ?>
                    <?= Html::endForm() ?>
                <?php endif; ?>

                <a href="#" class="app-menu-item flat-left">
                    <i class="icon-login"></i>
                    <span>Наши контакты</span>
                </a>
                <a href="#" class="app-menu-item flat-right">
                    <i class="icon-login"></i>
                    <span>Помощь</span>
                </a>
            </div>
        </div>
    </div>

    <?= \frontend\components\widgets\horizontalViewRequired\HorizontalViewRequiredWidget::widget() ?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>