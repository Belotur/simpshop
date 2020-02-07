<?php

namespace frontend\components\widgets\horizontalViewRequired;

use yii\base\Widget;
/**
 * Виджет элемента требующего повернуть устройство горизонтально для устройств с маленькой шириной экрана (смартфоны).
 */
class HorizontalViewRequiredWidget extends Widget
{
    public function run()
    {
        return $this->render('widget');
    }
}