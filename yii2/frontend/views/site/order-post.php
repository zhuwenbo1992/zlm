<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 6/7/17
 * Time: PM2:02
 */
?>
<div class="row wrapper page-heading"
     style="background: #32B294;position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
    <div class="col-xs-3">
        <a href="/"><i class="fa fa-angle-left white-color f16"></i></a>
    </div>
    <div class="col-xs-6 text-center">
        <span class="white-color f16">找人</span>
    </div>
    <div class="col-xs-3 text-right">
        <p style="padding-top: 5px;margin-bottom: 0px;"><a class="white-color f12">提交</a></p>
    </div>
</div>

<form id="formname" method="post" action="/site/add-date">
    <input name="_csrf-frontend" type="hidden" id="_csrf-frontend" value="<?= \Yii::$app->request->csrfToken ?>">


    <div class="row" style="padding-top: 40px;background: #32B294;padding-bottom: 20px;">
    <div class="col-xs-12">
        <span class="weak-color f12">需要什么职位？</span>
        <input id="job-input"  name="need_job"  onfocus="$('#job').removeClass().addClass('white-bg')" type="text"
               class="form-control primary-bg" style="border-top: 0px;border-left: 0px;border-right: 0px;color: white">
        <span id="job_color"></span>
    </div>


</div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">职位名称</p>
    </div>
    <div class="col-xs-8">
        <input type="text" name="post_work"  id="work_id" class="form-control default-input" placeholder="请输入">
        <span id="work"></span>
    </div>
</div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">招聘人数</p>
    </div>
    <div class="col-xs-8">
        <input type="text" name="order_num" id="order_num" class="form-control default-input" placeholder="请输入">
        <span id="num"></span>
    </div>
</div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">学历要求</p>
    </div>
    <div class="col-xs-8">
        <select name="post_edu" id="post_edu" class="form-control default-input">
            <option value="">请选择</option>
            <option value="所有">所有</option>
            <option value="初中及以下">初中及以下</option>
            <option value="高中/中技/中专">高中/中技/中专</option>
            <option value="大专">大专</option>
            <option value="本科">本科</option>
            <option value="硕士">硕士</option>
            <option value="博士">博士</option>
        </select>

        <span id="edu"></span>
    </div>
</div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">经验要求</p>
    </div>
    <div class="col-xs-8">
        <select name="post_exec"  id="post_exec" class="form-control default-input">
            <option value="">请选择</option
            <option value="所有">所有</option
            <option value="无经验">无经验</option
            <option value="一年以下">一年以下</option>
            <option value="1-3年">1-3年</option>
            <option value="3-5年">3-5年</option>
            <option value="5-10年">5-10年</option>
            <option value="10年以上">10年以上</option>

        </select>
        <span id="exec"></span>
    </div>
</div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">年龄要求</p>
    </div>
    <div class="col-xs-8">
        <select name="age"  id="age" class="form-control default-input">
            <option value="">请选择</option>
            <option value="16-20">16-20岁</option>
            <option value="20-30">20-30岁</option>
            <option value="30-40">30-40岁</option>
            <option value="40-50">40-50岁</option>
        </select>
        <span id="age_id"></span>
    </div>
</div>


<!--<div class="row white-bg border-bottom padding5"  id="disarea" onclick="window.location='/site/order-address'">-->



    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">所在省份</p>
        </div>
        <div class="col-xs-8">
            <select id="province" name="province"  class="form-control default-input"
                    onchange="changeRegion('province','city')">

                <option value="">请选择</option>
                <?php
                foreach ($CityList as $value):?>
                    ?>
                    <option value="<?= $value['regionid'] ?>"><?= $value['regionname'] ?></option>
                    <?php
                endforeach;
                ?>
            </select>
            <span id="province_id"></span>
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">城市</p>
        </div>
        <div class="col-xs-8">
            <select id="city" name="city" class="form-control default-input" onchange="changeRegion('city','district')">
                <option value="">请先选择省份</option>

            </select>
            <span id="city_id"></span>
        </div>
    </div>
    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">行政区</p>
        </div>
        <div class="col-xs-8">
            <select id="district" name="district"  class="form-control default-input">

                <option value="">请先选择城市</option>
            </select>
            <span id="dis_id"></span>
        </div>
    </div>


    <div class="row white-bg border-bottom padding5"  id="disarea" >


        <div class="col-xs-4">
            <p class="default-title">街道／编号</p>
        </div>

        <div class="col-xs-8">
            <input type="text" name="area_disct"  id="jiedao" class="form-control default-input" placeholder="请输入">
            <span id="jiedao_id"></span>
        </div>
    </div>



<div class="row white-bg padding5" >
    <div class="col-xs-4">
        <p class="default-title">工作福利</p>
    </div>


</div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-12">
        <?php if(isset($BenList)&&empty(!$BenList)){?>

            <?php foreach ($BenList as $val):?>
                <input type="text"   name="<?=$val->b_id?>" id="<?=$val->b_id?>" value="0" style="display: none"><span id="<?=$val->b_id?>a" class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;"
                                                                                          onclick="welfare('<?=$val->b_id?>');"><?=$val->b_name?></span>
            <?php endforeach;?>


        <?php   }  ?>

<!--        <input type="input" name="a" id="a" value="0" style="display: none"><span id="aa" class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;"-->
<!--                                                                                  onclick="welfare('a');">商业保险</span>-->
<!--        <input type="input" name="b" id="b" value="0" style="display: none"><span id="ba" class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;"-->
<!--                                                                                  onclick="welfare('b');">包餐</span>-->
<!--        <input type="input" name="b" id="c" value="0" style="display: none"><span id="ca" class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;"-->
<!--                                                                                  onclick="welfare('c');">班车接送</span>-->
<!--        <input type="input" name="b" id="d" value="0" style="display: none"><span id="da" class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;"-->
<!--                                                                                  onclick="welfare('d');">补贴</span>-->



    </div>
</div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">职责描述</p>
    </div>
    <div class="col-xs-8">


        <input type="text"  id="work_duty"
               onfocus="$('#desc').removeClass().addClass('white-bg')" name="duty_name"
               class="form-control default-input"   placeholder="请输入">
    </div>

    <span id="duty_id"></span>
</div>

    <div id="desc" class="white-bg hide" style="position:fixed;left:0px;bottom:0px;right: 0px;z-index: 9;top: 0">
        <div class="row wrapper border-bottom white-bg page-heading"
             style="height: 40px;">
            <div class="row" style="padding-top: 10px;padding-left: 20px;padding-right: 20px;">
                <div class="col-xs-3">
                    <a href="/site/order-post"><i class="fa fa-angle-left f16"></i></a>
                </div>
                <div class="col-xs-6 text-center"><span class="f16">职责描述</span></div>
                <div class="col-xs-3 text-right">
                    <p style="padding-top: 5px;margin-bottom: 0px;"><a href="javascript:closeDesc();" class="f12">确认</a></p>

                </div>
            </div>
        </div>
        <div style="height: 5px;" class="gray-bg"></div>
        <div class="row white-bg padding5">
            <div class="col-xs-12">
                <textarea id="work_id"  name="duty_desc"style="width: 100%" rows="20"> </textarea>
            </div>
        </div>
    </div>





<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">薪资</p>
    </div>
    <div class="col-xs-8">
        <input type="text" name="money" id="money" class="form-control default-input" placeholder="请输入">
        <span id="money_id"></span>
    </div>
</div>



    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">薪资单位</p>
        </div>
        <div class="col-xs-8">
            <select name="money_code"  id="money_code" class="form-control default-input">
                <option value="">请选择</option>
                <option value="/时">/时</option>
                <option value="/天">/天</option>
                <option value="/周">/周</option>
                <option value="/月">/月</option>
                <option value="/单">/单</option>

            </select>
            <span id="exec"></span>
        </div>
    </div>



    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">结算方式</p>
        </div>
        <div class="col-xs-8">
            <select name="payments"  id="pay_way" class="form-control default-input">
                <option value="">请选择</option>
                <option value="日结">日结</option>
                <option value="次日结">次日结</option>
                <option value="周结">周结</option>
                <option value="月结">月结</option>
                <option value="完工结">完工结</option>

            </select>
            <span id="exec"></span>
        </div>
    </div>


    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">联系人</p>
        </div>
        <div class="col-xs-8">
            <input type="text" name="post_name"  id="post_name" class="form-control default-input" placeholder="请输入">
        </div>
    </div>


    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">联系人电话</p>
        </div>
        <div class="col-xs-8">
            <input type="text" name="post_phone"  id="post_phone" class="form-control default-input" placeholder="请输入">
        </div>
    </div>


<div class="text-center darkgrey-color padding5">发表职位即表示您已同意<span class="primary-color">《找了么发单协议》</span></div>
<div style="padding: 10px;padding-top: 0px;">

   <a id="nextButton"  onclick="submitdate('formname','/site/add-date','/site/order-datetime-select')"  class="btn btn-lg btn-primary block"
       style="padding-top: 7px;padding-bottom: 7px;font-size: 16px;">下一步</a>
<!--    <a id="nextButton"  onclick="buttonError('请选择职位')"  class="btn btn-lg btn-primary block"
       style="padding-top: 7px;padding-bottom: 7px;font-size: 16px;">下一步</a>-->
</div>
<script>
    function buttonError(msg) {
        $('#nextButton').html(msg);
        $('#nextButton').removeClass().addClass('btn btn-lg btn-danger block disabled');
        setTimeout(function () {
            $('#nextButton').html('下一步');
            $('#nextButton').removeClass().addClass('btn btn-lg btn-primary block');
        },1000);


    }


</script>

    </form>

<div id="job" class="white-bg hide" style="position:fixed;left:0px;bottom:0px;right: 0px;z-index: 9;top: 0">
    <div class="row wrapper border-bottom white-bg page-heading"
         style="height: 40px;">
        <div class="row" style="padding-top: 10px;padding-left: 20px;padding-right: 20px;">
            <div class="col-xs-3">
                <a href="/site/order-post"><i class="fa fa-angle-left f16"></i></a>
            </div>
            <div class="col-xs-6 text-center"><span class="f16">选择职位类型</span></div>
            <div class="col-xs-3 text-right">


            </div>
        </div>
    </div>
    <div class="row white-bg">
        <div class="col-xs-3 text-center" style="padding-right: 0px;">
            <p class="border-bottom" style="height: 30px;padding-top: 5px;"><a class="block" onclick="selectJobType('hot')">热门</a></p>
            <p class="border-bottom" style="height: 30px;"><a class="block" onclick="selectJobType('job1')">技工</a></p>
            <p class="border-bottom" style="height: 30px;"><a class="block" onclick="selectJobType('job2')">普工</a></p>
            <p class="border-bottom" style="height: 30px;padding-top: 5px;"><a class="block" onclick="selectJobType('job3')">家政维修</a></p>
            <p class="border-bottom" style="height: 30px;"><a class="block" onclick="selectJobType('job4')">教育培训</a></p>
            <p class="border-bottom" style="height: 30px;"><a class="block" onclick="selectJobType('job5')">学生兼职</a></p>
            <p class="border-bottom" style="height: 30px;"><a class="block" onclick="selectJobType('job6')">行政人事</a></p>


        </div>
        <div class="col-xs-9" style="line-height: 30px;padding-left: 0px;">
            <div id="hot" class="" style="background: #F7F7F7;padding: 5px;">

                <?php foreach ($JobList as $val): ?>
                <span class="padding5"><a class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;" onclick="selectJob('<?=$val->job_name?>');"><?=$val->job_name?></a></span>
                <?php endforeach; ?>
            </div>
            <div id="job1" class="hide" style="background: #F7F7F7;padding: 5px;">

                <?php foreach ($JobListOne  as $v):?>
                <span class="padding5"><a class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;" onclick="selectJob('<?=$v->job_name?>');"><?=$v->job_name?></a></span>


                <?php endforeach;?>
            </div>

            <div id="job2" class="hide" style="background: #F7F7F7;padding: 5px;">

                <?php foreach ($JobListTwo  as $v):?>
                    <span class="padding5"><a class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;" onclick="selectJob('<?=$v->job_name?>');"><?=$v->job_name?></a></span>


                <?php endforeach;?>
            </div>

            <div id="job3" class="hide" style="background: #F7F7F7;padding: 5px;">

                <?php foreach ($JobListThree as $val): ?>
                    <span class="padding5"><a class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;" onclick="selectJob('<?=$val->job_name?>');"><?=$val->job_name?></a></span>
                <?php endforeach; ?>
            </div>
            <div id="job4" class="hide" style="background: #F7F7F7;padding: 5px;">

                <?php foreach ($JobListFour  as $v):?>
                    <span class="padding5"><a class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;" onclick="selectJob('<?=$v->job_name?>');"><?=$v->job_name?></a></span>


                <?php endforeach;?>
            </div>

            <div id="job5" class="hide" style="background: #F7F7F7;padding: 5px;">

                <?php foreach ($JobListFive  as $v):?>
                    <span class="padding5"><a class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;" onclick="selectJob('<?=$v->job_name?>');"><?=$v->job_name?></a></span>


                <?php endforeach;?>
            </div>


            <div id="job6" class="hide" style="background: #F7F7F7;padding: 5px;">

                <?php foreach ($JobListSix  as $v):?>
                    <span class="padding5"><a class="btn btn-xs btn-default" style="padding-left: 15px;padding-right: 15px;" onclick="selectJob('<?=$v->job_name?>');"><?=$v->job_name?></a></span>


                <?php endforeach;?>
            </div>


        </div>
    </div>
</div>

<script  src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script>






//提交以上的数据之后进行下一步去添加时间 日期添加


    function submitdate(formname,url,goUrl){




        if (formname=='' || typeof(formname)=='undefined') {
            formname='#subform';
        }
        if (typeof(goUrl)=='undefined') {
            goUrl='';
        }

        $.ajax({
            type:'POST',
            url:url,
            data : $("#formname").serialize(),
            success:function(message)
            {

                if (message==1) {
                window.location="/site/order-datetime-select";

                }
                else {
                    buttonError(message);

                }

            }

        })







    }


    /**
     * @param formname
     * @param url
     * @param goUrl
     * 发单任务添加完成提交
     */


    function workadd(formname,url,gourl)
    {

        var id=$("input[name='id']").val();
        var need_job=$("input[name='need_job']").val();
        var post_work=$("input[name='post_work]").val();
        var post_edu=$("input[name='post_edu]").val();
        var age=$("input[name=age]").val();









        if(id==''||need_job==''||post_work==''||'post_edu'==''||'age'==''){

            alert("请完善你的提交数据否则无法提交！！！");
            return false;
        }


        var duty=$("#work_id").val();
        $("#duty_work").val(duty);
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
                if (message) {
                    alert("您的信息发布成功");
                    window.location=gourl+"?id="+message;


                }
                else {
                    alert('fail')
                }

            }

        })


    }


    /**
     *城市添加
     * @param formname 表单ID
     * @param url 后台接受地址
     * @param goUrl 成功跳转地址
     */


    function submitFormPost(formname,url,goUrl)
    {
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
                if (message) {

                    window.location="/site/order-address?id="+message;

                }
                else {
                    alert('fail')
                }

            }

        });
    }









</script>
