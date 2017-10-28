<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 2017/7/16
 * Time: 上午10:12
 */
?>
<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 2017/7/15
 * Time: 下午9:59
 */
?>
<form method="post" id="persons-add-form" action="/referrals/persons-add-submit">
    <input name="<?= Yii::$app->request->csrfParam; ?>" type="hidden" value="<?= Yii::$app->request->csrfToken ?>">

    <div class="row wrapper border-bottom white-bg page-heading"
         style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
        <div class="row" style="padding-top: 0px;padding-left: 20px;padding-right: 20px;">
            <div class="col-xs-3">
                <a href="javascript:history.go(-1)"><i class="fa fa-angle-left f16"></i></a>
            </div>
            <div class="col-xs-6 text-center"><span class="f16">添加人才</span></div>
            <div class="col-xs-3 text-right">
                <p style="padding-top: 2px;margin-bottom: 0px;"><a href="#" onclick="$('#persons-add-form').submit();" class="f14 primary-color">保存</a></p>

            </div>
        </div>
    </div>
    <div style="height: 5px;padding-top: 45px;"></div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">姓名</p>
        </div>
        <div class="col-xs-8">
            <input type="text" name="name" class="form-control default-input" placeholder="请输入" value="">
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">性别</p>
        </div>
        <div class="col-xs-8">
            <select name="sex" class="form-control default-input">
                <option value="0">请选择</option>
                <option value="1">男</option>
                <option value="2">女</option>
            </select>
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">年龄</p>
        </div>
        <div class="col-xs-8">
            <input type="text" name="age" class="form-control default-input" placeholder="请输入" value="">
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">身份证号码</p>
        </div>
        <div class="col-xs-8">
            <input type="text" name="idno" class="form-control default-input" placeholder="请输入" value="">
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">所在省份</p>
        </div>
        <div class="col-xs-8">
            <select id="province" name="province" class="form-control default-input"
                    onchange="changeRegion('province','city')">
                <option value="0">请选择</option>
                <?php
                foreach ($citylist as $value):
                    ?>
                    <option value="<?= $value['regionid'] ?>"><?= $value['regionname'] ?></option>
                    <?php
                endforeach;
                ?>
            </select>
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">城市</p>
        </div>
        <div class="col-xs-8">
            <select id="city" name="city" class="form-control default-input" onchange="changeRegion('city','district')">
                <option value="0">请先选择省份</option>
            </select>
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">行政区</p>
        </div>
        <div class="col-xs-8">
            <select id="district" name="district" class="form-control default-input">
                <option value="0">请先选择城市</option>
            </select>
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">联系电话</p>
        </div>
        <div class="col-xs-8">
            <input type="text" name="mobile_phone" class="form-control default-input" placeholder="请输入" value="">
        </div>
    </div>
    <div style="height: 5px;"></div>

    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">最高学历</p>
        </div>
        <div class="col-xs-8">
            <select name="education" class="form-control default-input">
                <option value="">请选择</option>
                <option value="所有">所有</option>
                <option value="初中及以下">初中及以下</option>
                <option value="高中/中技/中专">高中/中技/中专</option>
                <option value="大专">大专</option>
                <option value="本科">本科</option>
                <option value="硕士">硕士</option>
                <option value="博士">博士</option>

            </select>
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">工作年限</p>
        </div>
        <div class="col-xs-8">
            <select name="working_year" class="form-control default-input">
                <option value="0">请选择</option>
                <option value="1">不限</option>
                <option value="2">一年</option>
            </select>
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">期望职位1</p>
        </div>
        <div class="col-xs-8">
            <select name="job_id1" class="form-control default-input">
                <option value="0">请选择</option>
                <?php foreach ($jobList as $value): ?>
                <option value="<?=$value['job_id']?>"><?=$value['job_name']?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">期望职位2</p>
        </div>
        <div class="col-xs-8">
            <select name="job_id2" class="form-control default-input">
                <option value="0">请选择</option>
                <?php foreach ($jobList as $value): ?>
                    <option value="<?=$value['job_id']?>"><?=$value['job_name']?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">期望职位3</p>
        </div>
        <div class="col-xs-8">
            <select name="job_id3" class="form-control default-input">
                <option value="0">请选择</option>
                <?php foreach ($jobList as $value): ?>
                    <option value="<?=$value['job_id']?>"><?=$value['job_name']?></option>
                <?php endforeach;?>
            </select>
        </div>
    </div>
<!--    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">技能/证书</p>
        </div>
        <div class="col-xs-8">
            <p class="default-title darkgrey-color text-right">
                <span class="label">电焊工</span>
                <span class="label">服务员</span>
                <i class="fa fa-angle-right f16"></i>

            </p>
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">分类标签</p>
        </div>
        <div class="col-xs-8">
            <p class="default-title darkgrey-color text-right">
                <span class="label">电焊工</span>
                <span class="label">服务员</span>
                <i class="fa fa-angle-right f16"></i>

            </p>
        </div>
    </div>-->
    <input type="hidden" name="act" value="<?=isset($act)?$act:''?>">
    <div style="height: 6px;"></div>

    <div class="row">
        <div class="col-xs-12">
            <button class="block btn btn-primary" style="width: 100%" type="submit"> 保存</button>
        </div>
    </div>
</form>

