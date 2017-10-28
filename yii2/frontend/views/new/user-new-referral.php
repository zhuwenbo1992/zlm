<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 2017/6/22
 * Time: 下午1:51
 */
?>
<div class="row wrapper border-bottom white-bg page-heading"
     style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;">
    <div class="row" style="padding-top: 10px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="/new/user-referrals"><i class="fa fa-angle-left"></i> 返回</a>
        </div>
        <div class="col-xs-6 text-center">录入人才</div>
        <div class="col-xs-3 text-right">
            <i class="fa fa-comment"></i>

        </div>
    </div>
</div>
<div class="row" style="padding-top: 50px;">
        <div class="col-xs-12 ibox-content">

                <form class="form-horizontal">
                    <div class="form-group"><label class="col-sm-2 control-label">手机</label>

                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="13588888888">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">姓名</label>

                        <div class="col-sm-10"><input type="text" placeholder="请输入真实姓名" class="form-control" value="张三">
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">性别</label>

                        <div class="col-sm-10">
                            <select class="form-control">
                                <option>请选择</option>
                                <option selected>男</option>
                                <option>女</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">民族</label>

                        <div class="col-sm-10">
                            <select class="form-control">
                                <option>请选择</option>
                                <option selected>汉族</option>
                                <option>回族</option>
                                <option>维族</option>
                                <option>蒙族</option>
                                <option>壮族</option>
                                <option>其他</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">出生年月</label>

                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-xs-8">
                                    <select class="form-control">
                                        <?php
                                        for ($i = 1960; $i < 2010; $i++) {
                                            echo '<option>' . $i . '年</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-xs-4">
                                    <select class="form-control">
                                        <?php
                                        for ($i = 1; $i < 13; $i++) {
                                            echo '<option>' . $i . '月</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">最高学历</label>

                        <div class="col-sm-10">
                            <select class="form-control">
                                <option>请选择</option>
                                <option selected>初中及以下</option>
                                <option>高中</option>
                                <option>大专</option>
                                <option>本科</option>
                                <option>研究生及以上</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">工作经验</label>

                        <div class="col-sm-10">
                            <select class="form-control">
                                <option>请选择</option>
                                <option selected>1年以内</option>
                                <option>1-2年</option>
                                <option>2-3年</option>
                                <option>3-5年</option>
                                <option>5-8年</option>
                                <option>9-10年</option>
                                <option>10年以上</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">掌握技能</label>

                        <div class="col-sm-10">
                            <select class="form-control">
                                <option>请选择</option>
                                <option>高级电工</option>
                                <option>高级钳工</option>
                                <option>低级搞笑</option>
                                <option>初级厨师</option>
                            </select>
                        </div>
                    </div>


                    <div class="form-group"><label class="col-sm-2 control-label">应聘岗位</label>

                        <div class="col-sm-10" style="line-height: 40px;">

                            <label class="btn btn-sm btn-white"> <input type="checkbox"> 电工 </label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox"> 操作工 </label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox"> 搬运工 </label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox"> 焊工 </label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox"> 木工 </label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox"> 服务员 </label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox"> 送餐员 </label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox"> 洗碗工 </label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox"> 导购 </label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox"> 客服 </label>


                        </div>
                    </div>
                    <div class="form-group"><label class="col-sm-2 control-label">应聘区域</label>

                        <div class="col-sm-10" style="line-height: 40px;">

                            <label class="btn btn-sm btn-white"> <input type="checkbox"> 张江/金桥 </label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox"> 徐家汇 </label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox"> 青浦 </label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox"> 莘庄 </label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox"> 等等 </label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox"> 等等等 </label>


                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <a class="btn btn-primary" type="submit"
                               href="#">保存</a>
                        </div>
                    </div>
                </form>
        </div>
</div>