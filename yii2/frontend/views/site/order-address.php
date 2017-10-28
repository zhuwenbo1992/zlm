<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 11/7/17
 * Time: PM1:44
 */

isset($act)?$act:'0';
?>
<div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;padding-top: 10px;padding-left: 20px;padding-right: 20px;">
    <div class="row" style="padding-top: 0px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="javascript:history.go(-1)"><i class="fa fa-angle-left f16"></i></a>
        </div>
        <div class="col-xs-6 text-center"><span class="f16">选择城市</span></div>
        <div class="col-xs-3 text-right">
            <p style="padding-top: 5px;margin-bottom: 0px;"><a href="/site/order-post" class="f12">确认</a></p>

        </div>
    </div>
</div>

<div style="height: 5px;padding-top: 45px;"></div>
<div class="row white-bg padding5">




</div>
<div style="height: 5px;"></div>
<div class="row white-bg border-bottom padding5">


    <div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">省份</p>
    </div>
    <div class="col-xs-8">
        <select id="province" name="province" class="form-control default-input"
                onchange="changeRegion('province','city')">
            <option>请选择</option>
            <?php
            foreach ($CityList as $value):
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
        <select id="city" name="city" class="form-control default-input" onchange="changeRegion('city','area')">
            <option>请先选择省份</option>
        </select>
    </div>
</div>
<div class="row white-bg border-bottom padding5">
    <div class="col-xs-4">
        <p class="default-title">行政区</p>
    </div>
    <div class="col-xs-8">
        <select id="area" name="area" class="form-control default-input" >
            <option>请先选择城市</option>
        </select>
    </div>

    <div class="row white-bg border-bottom padding5">
        <div class="col-xs-4">
            <p class="default-title">街道 / 楼道 / 门牌号</p>
        </div>
        <div class="col-xs-8">
            <input  id="area_id3" type="text" name="area_code3" class="form-control default-input" placeholder="请输入">
        </div>
    </div>
    <div class="row padding5">
        <div class="col-xs-12">
            <p class="default-title"><a  id="button_sub"    class="btn btn-lg btn-primary block">确认</a></p>
        </div>



</div>
<script  src="http://libs.baidu.com/jquery/1.7.2/jquery.min.js"></script>
<script>

    $("#button_sub").click(function(){
            var id="<?=\yii::$app->session->get('current_id')?>";
            var pro=$("#province").val();
            var city=$("#city").val();
            var area=$("#area").val();
            var area_code3=$("#area_id3").val();
            var url = "<?=\yii\helpers\Url::to(['site/area-sta'])?>";
            $.get(url,{"pro":pro,"city":city,"area":area,"area_code3":area_code3},function(msg){

                if(msg){

                    window.location="/site/order-post?id="+id;

                }else{

                    alert('选择有误');
                }



            })



    })





    $(function(){

        $('select[name="area_code"]').change(function() {

            var area = $(this).val();


            var url = "<?=\yii\helpers\Url::to(['site/get-region'])?>";
            $.get(url, {'area': area}, function (msg) {

                if(msg){
//                    alert(msg);
                    $("#area_id2").empty();
                    for (i=0;i<msg.length;i++) {
                        $("#area_id2").append('<option>' + msg[i] + '</option>')
                    }

                }


            }, 'json')


        })
    })

</script>

