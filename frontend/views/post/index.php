<?php 



use frontend\widgets\post\PostWidget;
use yii\base\Widget;
use yii\helpers\Url;
?>
<div class="panel">
<div class="row">
	<div class="col-lg-9">
		<!-- 列表页挂架  widget(['limit'=>1] 可以设置每页多少条数据-->
		<?=PostWidget::widget(['user_id'=>$id,'title'=>'我的文章'])?>
	</div>
	<div class="col-lg-3">
	<div class="panel">
	<?php if (!\Yii::$app->user->isGuest):?>
	<a class="btn btn-success btn-block btn-post" href="<?=Url::to(['post/create'])?>">创建文章</a>
	<?php endif;?>
	</div>
	</div>
</div>
</div>
























