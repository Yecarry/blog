<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\PostModel */

$this->title = '文章: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '内容管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => '文章', 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更改发布';
?>
<div class="post-model-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
