<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel common\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '内容管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-model-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
//                 'header' => 'false',
            ],

            'id',
            'title'=>[
                'attribute'=>'title',
                'format' => 'raw',//取消过滤显示链接
                'value'=>function($model){
                    return '<a href="'.\Yii::$app->params['url']['frontend'].Url::to(['post/view','id'=>$model->id]).'">'.$model->title.'</a>';
                }
            ],
            'summary',
            //'content:ntext',
            'label_img',
             'cat.cat_name',
            // 'user_id',
             'user_name',
             'is_valid'=>[
                'attribute' => 'is_valid',
                'value' => function ($model){
                    return ($model->is_valid==1)?'发布':'未发布';
                },
                'filter' => ['1'=>'发布','0'=>'未发布']
             ],
             'created_at:datetime',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                
                ],
        ],
    ]); ?>
</div>









