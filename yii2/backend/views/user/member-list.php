﻿<?php
use \yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
?>

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
<title>用户管理</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 会员中心 <span class="c-gray en">&gt;</span> 会员管理 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
	<div class="text-c"> 日期范围：
		<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
		-
		<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
		<input type="text" class="input-text" style="width:250px" placeholder="输入会员名称、电话、邮箱" id="" name="">
		<button type="submit" class="btn btn-success radius" id="" name=""><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
	</div>
	<div class="cl pd-5 bg-1 bk-gray mt-20"> <span class="l">
            <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius"><i class="Hui-iconfont">&#xe6e2;</i> 批量删除</a>
            &nbsp&nbsp<span class="r">共有数据：<strong><?=isset($data['count'])?$data['count']:''?></strong> 条</span> </div>
	<div class="mt-20">
	<table class="table table-border table-bordered table-hover table-bg table-sort">
		<thead>
			<tr class="text-c">
				<th width="25"><input type="checkbox" name="" value=""></th>
				<th width="40">ID</th>
				<th width="100">昵称</th>
				<th width="80">头像</th>
				<th width="90">QQ号</th>
				<th width="100">微信号</th>
				<th width="120">地址</th>
				<th width="130">加入时间</th>
				<th width="70">是否启用</th>
				<th width="100">操作</th>
			</tr>
		</thead>
		<tbody>
        <?php foreach ($data['UserList'] as $k=>$v):?>
			<tr class="text-c">
				<td><input type="checkbox" value="<?=$v['user_id']?>" name="ids[]"></td>
				<td><?=$k+1?></td>
				<td><u style="cursor:pointer" class="text-primary" onclick="member_show('<?=$v['nickname']?>','<?=\yii\helpers\Url::to(['user/user-info','id'=>$v['user_id']])?>','<?=$v["user_id"]?>','560','400')"><?=$v['nickname']?></u></td>
				<td><img src="<?=$v['headimgurl']?>"  alt="" height="50px" width="50px"></td>
				<td><?=$v['QQ_card']?></td>
				<td><?=$v['wechat_card']?></td>
				<td class="text-l"><?=$v['province']?>||<?=$v['city']?></td>
				<td><?=date("Y-m-d H:i:s",$v['register_time'])?></td>
				<td class="td-status"><span class="label label-success radius">已启用</span></td>
				<td class="td-manage">
                    <a style="text-decoration:none" onClick="member_stop(this,'10001')" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>

<!--                    <a title="编辑" href="javascript:;" onclick="member_edit('编辑','member-add.html','4','','510')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>-->

                    <a title="删除" href="javascript:;" onclick="member_del(this,'<?=$v["user_id"]?>')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
			</tr>
        <?php endforeach;?>
		</tbody>
	</table>
            <div style="float: right">
                <?= LinkPager::widget(['pagination' => $pagination, 'nextPageLabel' => '下一页', 'prevPageLabel' => '上一页', ]); ?>


            </div>


            <!--  -->
        </div>


            <!--  -->

	</div>


</div>





<!--请在下方写此页面业务相关的脚本-->

<!--<script type="text/javascript" src="lib/My97DatePicker/4.8/WdatePicker.js"></script>-->
<!--<script type="text/javascript" src="lib/datatables/1.10.0/jquery.dataTables.min.js"></script>-->
<!--<script type="text/javascript" src="lib/laypage/1.2/laypage.js"></script>-->
<script type="text/javascript">

/*用户-添加*/
function member_add(title,url,w,h){
	layer_show(title,url,w,h);
}
/*用户-查看*/
function member_show(title,url,id,w,h){

	layer_show(title,url,w,h);
}
/*用户-停用*/
function member_stop(obj,id){
	layer.confirm('确认要停用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '',
			dataType: 'json',
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_start(this,id)" href="javascript:;" title="启用"><i class="Hui-iconfont">&#xe6e1;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-defaunt radius">已停用</span>');
				$(obj).remove();
				layer.msg('已停用!',{icon: 5,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});		
	});
}

/*用户-启用*/
function member_start(obj,id){
	layer.confirm('确认要启用吗？',function(index){
		$.ajax({
			type: 'POST',
			url: '<?=Url::to(['user/del'])?>',
			data:"id="+id,
			success: function(data){
				$(obj).parents("tr").find(".td-manage").prepend('<a style="text-decoration:none" onClick="member_stop(this,id)" href="javascript:;" title="停用"><i class="Hui-iconfont">&#xe631;</i></a>');
				$(obj).parents("tr").find(".td-status").html('<span class="label label-success radius">已启用</span>');
				$(obj).remove();
				layer.msg('已启用!',{icon: 6,time:1000});
			},
			error:function(data) {
				console.log(data.msg);
			},
		});
	});
}
/*用户-编辑*/
function member_edit(title,url,id,w,h){
	layer_show(title,url,w,h);
}
/*密码-修改*/
function change_password(title,url,id,w,h){
	layer_show(title,url,w,h);	
}
/*用户-删除*/
function member_del(obj,id){
	layer.confirm('确认要删除吗？',function(index){
		$.ajax({
			type: 'GET',
            url: '<?=Url::to(['user/user-del'])?>',
            data:"id="+id,
            datatype:'json',
			success: function(res)
            {
				if(res==1){

                    $(obj).parents("tr").remove();
                    layer.msg('已删除!',{icon:1,time:1000});

                }else{

                    alert(res);
                    layer.msg('删除失败!',{icon:1,time:1000});

                }
			}


		});
	});
}
</script> 
</body>
</html>