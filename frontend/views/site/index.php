<?php

/* @var $this yii\web\View */
use frontend\widgets\post\PostWidget;
use frontend\widgets\hot\HotWidget;
use frontend\widgets\tag\TagWidget;
use yii\base\Widget;
$this->title = '博客-首页';
?>

<div class = "row">
	<div class="col-lg-9">
	<?=PostWidget::widget(['limit'=>6])?>
	</div>
	<div class="col-lg-3">
	<!-- 热门浏览 -->
	<?=HotWidget::widget()?>
	<!-- 标签云 -->
	<?=TagWidget::widget() ?>
	</div>


</div>