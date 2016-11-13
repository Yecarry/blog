<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CatsModel */

$this->title = '新建分类';
$this->params['breadcrumbs'][] = ['label' => '添加', 'url' => ['index']];
?>
<div class="cats-model-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
