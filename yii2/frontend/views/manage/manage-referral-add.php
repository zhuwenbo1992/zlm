<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 2017/7/15
 * Time: 下午8:38
 */
?>
<div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
    <div class="row" style="padding-top: 0px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="javascript:history.go(-1)"><i class="fa fa-angle-left f16"></i></a>
        </div>
        <div class="col-xs-6 text-center"><span class="f16">添加接单人</span></div>
        <div class="col-xs-3 text-right">
            <p style="padding-top: 2px;margin-bottom: 0px;"><a href="/referrals/persons-add" class="f14 primary-color">+ 添加</a></p>

        </div>
    </div>
</div>
<div style="height: 5px;padding-top: 45px;"></div>
<!--<div class="row">-->
<!--    <div class="col-xs-12" style="padding-left: 5px;padding-right: 5px;">-->
<!--        <div class="input-group" style="">-->
<!--            <input type="text" class="form-control f12" placeholder="搜索姓名/手机号/职位">-->
<!--            <span class="input-group-btn">-->
<!--                <button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>-->
<!--            </span>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->


<form action="/manage/referral-add" method="post">


    <input name="_csrf-frontend" type="hidden" id="_csrf-frontend" value="<?= \Yii::$app->request->csrfToken ?>">
    <div style="height: 6px;"></div>
    <input type="hidden" name="order_id" value="<?=$id?>">
    <div id="myselfDiv" class="row white-bg padding5 border-bottom" onclick="checkUser('myself');" style="border-left: 3px solid #ffffff;">
        <!--
        选中样式
        <div class="row white-bg padding5 border-bottom" style="border-left: 3px solid #32B294">
        -->

        <?php if(isset($is_myself)&&($is_myself==0)) {?>

        <div  class="col-xs-12 f14" >
            <p style="padding-top: 10px;">我自己</p><input class="hidden"  id="myself" type="checkbox"  name="user_name" value="<?=$user_id?>">
        </div>
    </div>
        <?php }?>


    <?php if(isset($UserList)&&empty(!$UserList)) {?>
        <?php foreach ($UserList as $value) :?>
            <div id="u<?=$value['id']?>Div" class="row white-bg padding5 border-bottom" onclick="checkUser('u<?=$value['id']?>')" style="border-left: 3px solid #ffffff;>


    <input id="u<?=$value['id']?>" class="hidden" type="checkbox" name="person_name[]" value="<?=$value['id']?>">

            <input  id="u<?=$value['id']?>" class="hidden"  type="checkbox" name="person_name[]" value="<?=$value['id']?>">
            <a class="col-xs-11 f14 black-color">
                <p style="padding-top: 10px;"><span class="pull-right"><i class="fa fa-mobile"></i> <?=$value['mobile_phone']?>
            </span><?=$value['name']?> |

                    <?php if($value['sex']==1){
                        echo "男";

                    }elseif($value['sex']==2){

                        echo "女";

                    }else{

                        echo "未知";
                    }?>


                    | <?=$value['age']?>岁 </p>
                <p class="darkgrey-color f12"><?=$value['province_name']?> | <?=$value['city_name']?> | <?=$value['area_name']?></p>
                <p class="darkgrey-color">
                    <span class="label"><?=$value['job1']?></span>
                    <span class="label"><?=$value['job2']?></span>
                    <span class="label"><?=$value['job3']?></span></p>

            </a>
            </div>
            <div style="height: 6px;"></div>

        <?php endforeach;?>
    <?php }?>

    <div class="row">
        <div class="col-xs-12">
            <!--        <a class="block btn btn-primary">已选1人，确认接单</a>-->
            <input class="block btn btn-primary" style="width:100%" type="submit"value="确认添加">
        </div>
    </div>
</form>
<script>


    function checkUser(id) {
        if ($('#' + id + 'Div').css('border-left') == '3px solid rgb(50, 178, 148)') {
//                alert('ok');
            $('#' + id + 'Div').css('border-left','3px solid rgb(255, 255, 255)');
            $('#' + id).prop('checked',false);
        } else {
//                alert('no');
            $('#' + id + 'Div').css('border-left','3px solid rgb(50, 178, 148)');
            $('#' + id).prop('checked',true);
        }
    }



</script>