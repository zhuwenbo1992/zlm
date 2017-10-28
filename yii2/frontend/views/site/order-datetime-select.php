<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 11/7/17
 * Time: PM2:32
 */
?>
<div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
    <div class="row" style="padding-top: 0px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="javascript:history.go(-1)"><i class="fa fa-angle-left f16"></i></a>
        </div>
        <div class="col-xs-6 text-center"><span class="f16">工作时间</span></div>
        <div class="col-xs-3 text-right">
            <p style="padding-top: 5px;margin-bottom: 0px;"><a class="f12">确认</a></p>

        </div>
    </div>
</div>

<form  id="add_time" method="post" action="/order-suc/success">
    <input name="_csrf-frontend" type="hidden" id="_csrf-frontend" value="<?= \Yii::$app->request->csrfToken ?>">
    <input type="hidden" name="order_post_id" value="<?=$id?>">

<div style="height: 5px;padding-top: 45px;"></div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">开始日期</p>
    </div>
    <div class="col-xs-8">
        <input type="date" name="start_date" class="form-control default-input" placeholder="请输入">
    </div>
</div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">结束日期</p>
    </div>
    <div class="col-xs-8">
        <input type="date" name="end_date" class="form-control default-input" placeholder="请输入">
    </div>
</div>
<div style="height: 5px;"></div>
<div class="row white-bg padding5">
    <div class="col-xs-12">
        <p class="default-title">请选择起止日期内的工作日</p>
    </div>
</div>
<div class="row white-bg border-bottom padding5" style="padding-bottom: 10px;line-height: 30px;">
    <div class="col-xs-12">
        <input type="input" name="all" id="all" value="全部" style="display: none"><span id="alla" class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;" onclick="welfare('all');">全部</span>
        <input type="input" name="w1" id="w1" value="周一" style="display: none"><span id="w1a" class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;" onclick="welfare('w1');">周一</span>
        <input type="input" name="w2" id="w2" value="周二" style="display: none"><span id="w2a" class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;" onclick="welfare('w2');">周二</span>
        <input type="input" name="w3" id="w3" value="周三" style="display: none"><span id="w3a" class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;" onclick="welfare('w3');">周三</span>
        <input type="input" name="w4" id="w4" value="周四" style="display: none"><span id="w4a" class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;" onclick="welfare('w4');">周四</span>
        <input type="input" name="w5" id="w5" value="周五" style="display: none"><span id="w5a" class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;" onclick="welfare('w5');">周五</span>
        <input type="input" name="w6" id="w6" value="周六" style="display: none"><span id="w6a" class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;" onclick="welfare('w6');">周六</span>
        <input type="input" name="w7" id="w7" value="周日" style="display: none"><span id="w7a" class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;"z onclick="welfare('w7');">周日</span>

    </div>
</div>
<div style="height: 5px;"></div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">开始时间点</p>
    </div>
    <div class="col-xs-8">
        <input type="time" name="time_start" class="form-control default-input" placeholder="请输入">
    </div>
</div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">结束时间点</p>
    </div>
    <div class="col-xs-8">
        <input type="time" name="time_end" class="form-control default-input" placeholder="请输入">
    </div>
</div>


    <?php if(isset($DateList)&&empty(!$DateList)){?>

        <?php foreach ($DateList as $value):?>

        <div class="row white-bg padding5">
            <div class="col-xs-12" >
                <p class="f12 darkgrey-color" style="margin-bottom: 0px;">


                    <i  onclick="delete_date(<?=$value->tim_id?>)" class="fa fa-trash-o pull-right primary-color" style="padding-top: 3px;">

                    </i>
                    <?=$value->start_date;?> 至 <?=$value->end_date;?>| <?=$value
                    ->work_day?>  | <?=$value->time_start;?>~<?=$value->time_end?>
                </p>
            </div>
        </div>
<?php endforeach;?>


  <?php   }  ?>




<div style="height: 5px;"></div>
<div class="row padding5">
    <div class="col-xs-12">
        <p class="default-title"><a  onclick="submitFormPost('add_time','/site/add-date-time')" class="btn btn-sm btn-default block">+ 添加时段</a></p>
    </div>

</div>
<div class="row padding5">
    <div class="col-xs-12">
        <a onclick="$('#add_time').submit();" class="btn btn-lg btn-primary block"
           style="padding-top: 7px;padding-bottom: 7px;font-size: 16px;">提交信息</a>
<!--        <p class="default-title"><a class="btn btn-lg btn-primary block">提交信息</a href="/order-suc/success?id=--><?//=$id?><!--"></p>-->
    </div>

</div>
</form>

<script  src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script>








    function  delete_date(id){

        var url = "<?=\yii\helpers\Url::to(['site/del-date'])?>";
       $.get(url,{'id':id},function(msg){
           if(msg==1){


           }else{

               alert('删除失败');


           }


            window.location.reload();

       })

    }

    /**
     * 添加时间段
     *
     * @param formname
     * @param url
     * @param goUrl
     * @returns {boolean}
     */

    function submitFormPost(formname,url,goUrl) {

        if (formname=='' || typeof(formname)=='undefined') {
            formname='#subform';
        }
        if (typeof(goUrl)=='undefined') {
            goUrl='';
        }

        $.ajax({
            type:'GET',
            url:url,
            data : $("form").serialize(),
            success:function(message) {
                if (message==1) {

                    window.location.reload();

                }
                else {
                    alert(message)
                }

            }

        });
    }









</script>