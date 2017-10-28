<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="lib/html5shiv.js"></script>
    <script type="text/javascript" src="lib/respond.min.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="static/h-ui.admin/css/style.css" />
    <!--[if IE 6]>
    <script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <title>用户查看</title>
</head>
<body>

<?php if(isset($OrderInfo)&&empty(!$OrderInfo)) {?>
    <div class="cl pd-20" style=" background-color:#5bacb6">
        <dl style="margin-left:80px; color:#fff">
            <dt>
                <span class="f-18"><?=isset($OrderInfo['work_name'])?$OrderInfo['work_name']:''?></span>

            </dt>

            <dd class="pt-10 f-12" style="margin-left:0">职位人数:<?=$OrderInfo['people_num']?>人</dd>
        </dl>
    </div>
    <div class="pd-20">
        <table class="table">
            <tbody>

            <th class="text-r">学历要求：</th>
            <td><?=isset($OrderInfo['people_edu'])?$OrderInfo['people_edu']:''?></td>
            <th class="text-r">年限要求：</th>
            <td><?=isset($OrderInfo['people_exc'])?$OrderInfo['people_exc']:''?></td>
            </tr>
            <tr>
                <th class="text-r">年龄要求：</th>
                <td><?=isset($OrderInfo['people_age'])?$OrderInfo['people_age']:''?></td>


                <th class="text-r">工作地址：</th>
                <td><?=isset($OrderInfo['area_detail'])?$OrderInfo['area_detail']:''?></td>
            </tr>
            <tr>
                <th class="text-r">职责描述：</th>
                <td><?=isset($OrderInfo['duty_desc'])?$OrderInfo['duty_desc']:''?></td>
                <th class="text-r">企业名称：</th>
                <td><?=isset($OrderInfo['company_name'])?$OrderInfo['company_name']:''?></td>
            </tr>

            <tr>
                <th class="text-r">工作时间</th>
                <td>
                       <th>开始日期:<?=$OrderInfo['date_time'][0]['start_date']?></th>
                       <th>结束日期:<?=$OrderInfo['date_time'][0]['end_date']?></th>
                       <th>开始时间:<?=$OrderInfo['date_time'][0]['time_start']?></th>
                       <th>结束时间:<?=$OrderInfo['date_time'][0]['time_end']?></th>

                </td>


            </tr>
                    <tr>
                        <th class="text-r">福利待遇</th>
                        <td>
                            <a style="color: green" href="">查看详情</a>
                        </td>
                    </tr>

            </tbody>
        </table>
    </div>

<?php }?>
<!--_footer 作为公共模版分离出去-->

<!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
</body>
</html>