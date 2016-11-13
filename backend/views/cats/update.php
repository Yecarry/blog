<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatsModel */

$this->title = '分类: ' . $model->cat_name;
$this->params['breadcrumbs'][] = ['label' => '编辑', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cat_name, 'url' => ['view', 'id' => $model->id]];
?>
<div class="cats-model-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
