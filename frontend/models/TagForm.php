<?php
namespace frontend\models;

/*
 * 标签表单模型
 */
use yii\base\Model;
use common\models\TagsModel;

class TagForm extends Model
{
    public $id;
    
    public $tags;
    
    public function rules()
    {
        return [
            ['tags','required'],
            ['tags','each','rule'=>['string']],
        ];
    }
    
    
    /*
     * 保存标签集合
     */
    public function saveTags()
    {
        $ids = [];
        $tags = $this->tags;
        if (!empty($tags)){
            foreach ($tags as $tag){
                $ids[] = $this->_saveTag($tag);
            }
        }
        return $ids;
    }
    
    /*
     * 保存单个标签
     */
    private function _saveTag($tag)
    {
        $model = new TagsModel();
        $res = $model->find()->where(['tag_name'=>$tag])->one();
        
        //新建标签
        if(!$res){
            $model->tag_name = $tag;
            $model->post_num = 1;
            if(!$model->save()){
                throw new \Exception("保存标签失败");
            }
            
            return $model->id;
        }else{
            $res->updateCounters(['post_num'=>1]);
        }
        
        return $res->id;
    }
    
    /*
     * 将获取到的标签，转换数组形式
     */
    private function _tagRule($tags)
    {
        //对传入的字符串做处理，去空格，换逗号，合并成数组
        $tag = explode(",", str_replace('，',',',trim($tags)));
        
        return $tag;
    }
}



















