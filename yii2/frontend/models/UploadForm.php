<?php
namespace frontend\models; 
use Yii;
use yii\db\ActiveRecord;
use yii\base\Model;
use yii\web\UploadedFile;

/**
* UploadForm is the model behind the upload form.
*/
class UploadForm extends Model
{
    /**
    * @var UploadedFile file attribute
    */
    public $imagefile;
    public $imagefileback;
    public $rootPath='uploads';
    public $newpath;

    /**
    * @return array the validation rules.
    */
    public function rules()
    {
        return [
            [['imagefile','imagefileback'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg,jpeg,gif'],
        ];
    }

    public function attributeLabels()
    {

        return[
        'imagefile'=>'',
        'imagefileback'=>'',

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
        $save_pathhead=$path . $randLetter.'head'.'.' . $this->imagefile->extension;
        $save_pathback=$path . $randLetter.'back'.'.' . $this->imagefileback->extension;
        

        if ($this->imagefile&&$this->validate()) 
        {
            
           $this->imagefile->saveAs($save_pathhead);
           $this->imagefileback->saveAs($save_pathback);
            return $data=[$save_pathback,$save_pathhead];
             
           
        }
        else
        {
            
                return false;

        }

    }

   
    //单个文件上传
    public function UploadOneFile() 
    {

        $path=$this->createPath();
        $str = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randLetter = substr(str_shuffle($str), -5);
        $randLetter.=time().rand(10000,99999);
        $randLetter=md5($randLetter);
        $save_path=$path . $randLetter.'.' . $this->imagefile->extension;
         if ($this->imagefile) 
        {
            
           $this->imagefile->saveAs($save_path);
           
            return $save_path;
             
           
        }
        else
        {
            
            return false;

        }


    } 
   



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