<?php
namespace common\models;
use yii\base\Model;
use yii\web\UploadedFile;

/**
* Uploadimg is the model behind the upload form.
*/
class UploadImg extends Model
{
    /**
    * @var UploadedFile file attribute
    */
    public $images;

    public $rootPath='uploads';


    /**
    * @return array the validation rules.
    */
    public function rules()
    {
        return [
            [['images'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg,jpeg,gif'],
        ];
    }

    public function attributeLabels()
    {

        return[
        'images'=>'',

        ];


    }



// 文件上傳
     public function Upload()
    {   
        $path=$this->createPath();
       
        $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randLetter = substr(str_shuffle($str), -5);
        $randLetter.=time().rand(10000,99999);
        $randLetter=md5($randLetter);
        $save_path=$path . $randLetter.'head'.'.' . $this->images->extension;

        

        if ($this->images&&$this->validate())
        {
            
           $this->images->saveAs($save_path);

           return $save_path;
        }
        else
        {
            
                return false;

        }

    }

    /**
     * @return bool|string
     *
     *
     * 生成文件目录
     */

    private function createPath()
    {
        // /2016/12/12/xxx.jpg
        
        $path = $this->rootPath.'/'.date('Y').'/'.date('m').'/'.date('d');
        // 创建

        if(!file_exists($path))
        {
            if(!mkdir($path,0777,true))
            {
                $this->error = '创建目录失败';
                return false;
            }
        }
        return $path;
    }


}

?>