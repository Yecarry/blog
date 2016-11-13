<?php
namespace frontend\widgets\post;

/*
 * 文章列表组件
 */
use Yii;
use yii\base\Widget;
use common\models\PostModel;
use frontend\models\PostForm;
use yii\helpers\Url;
use yii\data\Pagination;

class PostWidget extends Widget
{
    //文章列表的标题
    public $title = '';
    //显示条数
    public $limit = 8;
    //是否显示更多
    public $more = true;
    //是否显示分页
    public $page = true;
    //是否用户个人数据
    public $user_id = 'user';
    
    public function run()
    {
        //获取当前页数，没有即为1
        $curPage = Yii::$app->request->get('page',1);
        
        //查询条件
//         $cond = ['=','is_valid',PostModel::IS_VALID];
        $cond = ['is_valid'=>PostModel::IS_VALID,'user_id'=>$this->user_id];
        //根据用户传值获取用户的数据，如果没有则删除用户id字段查询所有
        if ($this->user_id == 'user'){
            unset($cond['user_id']);
        }
        
        $res = PostForm::getList($cond,$curPage,$this->limit);
        $result['title'] = $this->title?:"最新文章";
        $result['more'] = Url::to('index');
        $result['body'] = $res['data']?:[];
        //是否显示分页
        if($this->page){
            $pages = new Pagination(['totalCount'=>$res['count'],'pageSize'=>$res['pageSize']]);
            $result['page'] = $pages;
        }
        return $this->render('index',['data'=>$result]);
    }
}
















