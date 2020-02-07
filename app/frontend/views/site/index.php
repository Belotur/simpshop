<?php

/* @var $this yii\web\View */

$this->title = 'MarketPlanner';
?>

<div class="site-content">
    <!--    Сделать по высоте экрана с равномерным размещением элементов-->
    <!--    Такой же блок справа -->

    <div id="scene"></div>
</div>

<!--демо-сцена-->
<?php
$this->registerJsFile('/js/three.min.js');
$this->registerJsFile('/js/WebGL.js');
$this->registerJsFile('/js/OrbitControls.js');
$this->registerJsFile('/js/stats.min.js');
$this->registerJsFile('/js/stats.min.js');
$this->registerJsFile('/js/Cloth.js');

//$this->registerJsFile('/js/scene-demo.js');

?>
<!--/демо-сцена-->