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
        <div class="col-xs-6 text-center"><span class="f16">选择接单人</span></div>
        <div class="col-xs-3 text-right">
                        <p style="padding-top: 2px;margin-bottom: 0px;"><a href="/referrals/persons-add?act=<?=$id?>" class="f14 primary-color">+ 添加</a></p>

        </div>
    </div>
</div>

<div style="height: 5px;padding-top: 45px;"></div>

<div class="row">
    <div class="col-xs-12" style="padding-left: 5px;padding-right: 5px;">
        <div class="input-group" style="">
            <input id="search_value" type="text" class="form-control f12" placeholder="搜索姓名/手机号">
            <span class="input-group-btn">
                <button type="button" onclick="if ($('#search_value').val()!='') window.location='/takeing/search?id=<?=$id?>&&value=' + $('#search_value').val()" class="btn btn-default"><i class="fa fa-search"></i></button>
            </span>
        </div>
    </div>
</div>
<div style="height: 6px;"></div>


<form action="/takeing/submit" method="post">


    <input name="_csrf-frontend" type="hidden" id="_csrf-frontend" value="<?= \Yii::$app->request->csrfToken ?>">
<div style="height: 6px;"></div>
    <input type="hidden" name="order_id" value="<?=$id?>">
<div id="myselfDiv" class="row white-bg padding5 border-bottom" onclick="checkUser('myself');" style="border-left: 3px solid #ffffff;">
<!--
选中样式
<div class="row white-bg padding5 border-bottom" style="border-left: 3px solid #32B294">
-->
    <div  class="col-xs-12 f14" >
        <p  onclick="jiance()"   style="padding-top: 10px;">我自己</p><input class="hidden"  id="myself" type="checkbox"  name="user_name" value="<?=$user_id?>">
    </div>
</div>

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
        <p class="darkgrey-color f12"><?=isset($value['local_name'])?$value['local_name']:''?></p>
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
        <input class="block btn btn-primary" style="width:100%" type="submit"value="确认接单">
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


<!DOCTYPE html>
<html>
<head>
    <title>js制作带有遮罩弹出层实现登录小窗口</title>
    <link type="text/css" rel="stylesheet" href="./css/reset.css" />
    <script>
        window.onload = function(){
            document.getElementById("btn_showlogin").onclick = shogMinLogin;
            document.getElementById("close_minilogin").onclick = closeLogin;
            document.getElementById("firstLine").onmousedown = moveLogin;
            /* 显示登录窗口 */
            function shogMinLogin(){
                var mini_login = document.getElementsByClassName("mini_login")[0];
                var cover = document.getElementsByClassName("cover")[0];
                mini_login.style.display = "block";
                cover.style.display = "block";

                mini_login.style.left = (document.body.scrollWidth - mini_login.scrollWidth) / 2 + "px";
                mini_login.style.top = (document.body.scrollHeight - mini_login.scrollHeight) / 2 + "px";
            }

            /* 关闭登录窗口 */
            function closeLogin(){
                var mini_login = document.getElementsByClassName("mini_login")[0];
                var cover = document.getElementsByClassName("cover")[0];
                mini_login.style.display = "none";
                cover.style.display = "none";
            }

            /* 移动登录窗口 */
            function moveLogin(event){
                var moveable = true;

                //获取事件源
                event = event ? event : window.event;
                var clientX = event.clientX;
                var clientY = event.clientY;

                var mini_login = document.getElementById("mini_login");
                console.log(mini_login);
                var top = parseInt(mini_login.style.top);
                var left = parseInt(mini_login.style.left);//鼠标拖动
                document.onmousemove = function(event){
                    if(moveable){
                        event = event ? event : window.event;
                        var y = top + event.clientY - clientY;
                        var x = left + event.clientX - clientX;
                        if(x>0 && y>0){
                            mini_login.style.top = y + "px";
                            mini_login.style.left = x + "px";
                        }
                    }
                }
                //鼠标弹起
                document.onmouseup = function(){
                    moveable = false;
                }
            }
        };
    </script>

    <style>
        /* 弹出 样式 */
        .mini_login{
            display:none;
            position:absolute;
            z-index:2;
            background:white;
        }
        .mini_login .item{
            width:320px;
            margin:0 auto;
            height:48px;
            line-height:48px;
            padding:0 20px;
        }
        /* 登录窗第一行*/
        .mini_login .firstLine{
            color:#666;
            background:#f7f7f7;
            font-size:18px;
            font-weight:bold;
            cursor:move;
        }
        .mini_login .item .login_close{
            display:inline-block;
            float:right;
            cursor:pointer;
        }

        .mini_login .item label{
            font-size:14px;
            margin-right:15px;
        }
        .mini_login .item input{
            display:inline-block;
            height:60%;
            width:70%;
        }
        /* 登录按钮 */
        .mini_login .item a.btn_login{
            display:block;
            margin:10px 10% 0;
            height:30px;
            line-height:30px;
            width:80%;
            background:#4490F7;
            color:white;
            font-size:16px;
            font-weight:bold;
            text-align:center;
        }
        /* 遮罩层样式 */
        .cover{
            display:none;
            width:100%;
            height:100%;
            position:absolute;
            top:0;
            left:0;
            z-index:1;
            background-color:#000;
            opacity:0.3;
        }
    </style>
</head>
<body>

<!-- 主体 -->
<div class="main">

</div>

<!-- 弹出登录小窗口 -->
<div class="mini_login" id="mini_login">
    <!-- 表单 -->
    <form action="" method="post">
        <div class="item firstLine" id="firstLine">
            <span class="login_title">去完善信息</span>
            <span class="login_close" id="close_minilogin">X</span>
        </div>
        <div class="item">
            <label>姓名</label>
            <input type="text" name="uname" />
        </div>
        <div class="item">
            <label>电话</label>
            <input type="password" name="upwd" />
        </div>
        <div class="item">
            <a href="javascript:void(0)" class="btn_login" onclick=""></a>
        </div>
    </form>
</div>
<!-- 遮罩层 -->
<div class="cover"></div>

</body>
</html>
