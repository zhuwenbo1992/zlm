<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;

class CommonController extends Controller
{

    //验证是否登陆
      public function init()
      {
        parent::init();
        $adminid = \Yii::$app->session->get('adminid');
       
        if (!isset($adminid)) {

          $this->redirect(['/login/login']);
        }



      }


    /**
     * @param array $url
     * @param int $sec
     * @return string
     * 跳转提示
     */
 		
	public function success($url= [] ,$sec =2)
		{  
	        $url= empty($url)?['admin/main']: $url;
	        $url=\yii\helpers\Url::toRoute($url);
	        return $this->renderPartial('/common/msg',['gotoUrl'=>$url,'sec'=>$sec]);
    	}


    	 public function error($msg= '',$sec =2)
    	 {
        
        return $this->renderPartial('/common/msg',['errorMessage'=>$msg,'sec'=>$sec]);
   		 }

/**
 *
 * 获取客户端ip
 */
        function getClientIP()
        {
        global $ip;
        if (getenv("HTTP_CLIENT_IP"))
            $ip = getenv("HTTP_CLIENT_IP");
        else if(getenv("HTTP_X_FORWARDED_FOR"))
            $ip = getenv("HTTP_X_FORWARDED_FOR");
        else if(getenv("REMOTE_ADDR"))
            $ip = getenv("REMOTE_ADDR");
        else $ip = "Unknow";
        return $ip;
        }

  /**
   * 获取服务器信息
   *
   */
        public function GetHostInfo()
        {
            $sysos = $_SERVER["SERVER_SOFTWARE"];      //获取服务器标识的字串
            $sysversion = PHP_VERSION;                   //获取PHP服务器版本
            //从服务器中获取GD库的信息
            if(function_exists("gd_info")){
            $gd = gd_info();
            $gdinfo = $gd['GD Version'];
            }else {
            $gdinfo = "未知";
            }
            //从GD库中查看是否支持FreeType字体
            $freetype = $gd["FreeType Support"] ? "支持" : "不支持";
            //从PHP配置文件中获得是否可以远程文件获取
            $allowurl= ini_get("allow_url_fopen") ? "支持" : "不支持";
            //从PHP配置文件中获得最大上传限制
            $max_upload = ini_get("file_uploads") ? ini_get("upload_max_filesize") : "Disabled";
            //从PHP配置文件中获得脚本的最大执行时间
            $max_ex_time= ini_get("max_execution_time")."秒";
            //以下两条获取服务器时间，中国大陆采用的是东八区的时间,设置时区写成Etc/GMT-8
            date_default_timezone_set("Etc/GMT-8");
            $systemtime = date("Y-m-d H:i:s",time());
            $str='';
            $str.= "<table class='table table-border table-bordered table-bg' border='0' align=center cellspacing=0 cellpadding=0>";
            $str.= "<h5> 系统信息  </h5>";
            $str.="<tr> <td> Web服务器：    </td> <td> $sysos        </td> </tr>";
            $str.= "<tr> <td> PHP版本：      </td> <td> $sysversion   </td> </tr>";
            $str.= "<tr> <td> GD库版本：     </td> <td> $gdinfo       </td> </tr>";
            $str.= "<tr> <td> FreeType：     </td> <td> $freetype     </td> </tr>";
            $str.="<tr> <td> 远程文件获取： </td> <td> $allowurl     </td> </tr>";
            $str.= "<tr> <td> 最大上传限制： </td> <td> $max_upload   </td> </tr>";
            $str.= "<tr> <td> 最大执行时间： </td> <td> $max_ex_time  </td> </tr>";
            $str.= "<tr> <td> 服务器时间：   </td> <td> $systemtime   </td> </tr>";
            $str.="</table>";
            return $str;



        }


}