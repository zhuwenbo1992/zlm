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
<form method="post" id="persons-add-form" action="/qrcode/persons-add-submit">
    <input name="<?= Yii::$app->request->csrfParam; ?>" type="hidden" value="<?= Yii::$app->request->csrfToken ?>">
    <input name="user_id" type="hidden" value="<?=$i?>">
    <div class="row border-bottom padding5 text-center">
        <div class="col-xs-12">
            <p class="default-title primary-color">录入简历</p>
        </div>

    </div>
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
                <option value="0">请选择</option>
                <option>初中及以下</option>
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
                <option value="0">不限</option>
                <option value="1">一年</option>
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
    <div style="height: 6px;"></div>

    <div class="row">
        <div class="col-xs-12">
            <button class="block btn btn-primary" style="width: 100%" type="submit"> 保存</button>
        </div>
    </div>
</form>

