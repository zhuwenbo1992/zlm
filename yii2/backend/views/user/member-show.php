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

<?php if(isset($UserInfo)&&empty(!$UserInfo)) {?>
<div class="cl pd-20" style=" background-color:#5bacb6">
	<img class="avatar size-XL l" src="<?=$UserInfo['headimgurl']?>">
	<dl style="margin-left:80px; color:#fff">
		<dt>
			<span class="f-18"><?=isset($UserInfo['real_name'])?$UserInfo['real_name']:$UserInfo['nickname']?></span>

		</dt>

		<dd class="pt-10 f-12" style="margin-left:0">个人签名</dd>
	</dl>
</div>
<div class="pd-20">
	<table class="table">
		<tbody>

				<th class="text-r">昵称：</th>
                <td><?=isset($UserInfo['nickname'])?$UserInfo['nickname']:''?></td>
				<th class="text-r">QQ：</th>
				<td><?=isset($UserInfo['QQ_card'])?$UserInfo['QQ_card']:''?></td>
			</tr>
			<tr>
				<th class="text-r">地址：</th>
				<td><?=isset($UserInfo['province'])?$UserInfo['province']:''?>||<?=isset($UserInfo['city'])?$UserInfo['city']:''?></td>


				<th class="text-r">注册时间：</th>
				<td><?=isset($UserInfo['register_time'])?date("Y-m-d H:i:s",$UserInfo['register_time']):''?></td>
			</tr>
			<tr>
				<th class="text-r">微信：</th>
				<td><?=isset($UserInfo['wechat_card'])?$UserInfo['wechat_card']:''?></td>
                <th class="text-r">联系方式：</th>
                <td><?=isset($UserInfo['phone'])?$UserInfo['phone']:''?></td>
			</tr>

                <tr>
                    <th class="text-r">他发的单：</th>
                    <td><a style="color:green" href="">查看详情</a></td>
                    <th class="text-r">他接的单：</th>
                    <td><a style="color: green" href="">查看详情</a></td>
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