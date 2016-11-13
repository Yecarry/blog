<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CatsModel */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '查看', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cats-model-view">


    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定删除该分类?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cat_name',
        ],
    ]) ?>

</div>
