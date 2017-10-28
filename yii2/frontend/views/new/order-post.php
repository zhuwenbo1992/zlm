<?php
/**
 * Created by PhpStorm.
 * User: zk
 * Date: 2017/6/20
 * Time: 下午1:46
 */
?>
<div class="row wrapper border-bottom white-bg page-heading" style="position:fixed;height: 40px;left:0px;top:0px;right: 0px;z-index: 9;">
    <div class="row" style="padding-top: 10px;padding-left: 20px;padding-right: 20px;">
        <div class="col-xs-3">
            <a href="/new/index"><i class="fa fa-angle-left"></i> 返回</a>
        </div>
        <div class="col-xs-6 text-center">发单</div>
        <div class="col-xs-3 text-right">
            <i class="fa fa-comment"></i>

        </div>
    </div>
</div>
<div class="row" style="padding-top: 50px;">
    <div class="col-xs-12 ibox-content">
        <form class="form-horizontal">
            <div class="form-group"><label class="col-sm-2 control-label">职位名称</label>

                <div class="col-sm-10"><input type="text" placeholder="请输入职位名称" class="form-control"
                                              value="洗碗工">
                </div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">学历要求</label>

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
            <div class="form-group"><label class="col-sm-2 control-label">经验要求</label>

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
            <div class="form-group"><label class="col-sm-2 control-label">年龄要求</label>

                <div class="col-sm-10">
                    <select class="form-control">
                        <option>请选择</option>
                        <option selected>16-20</option>
                        <option>21-25</option>
                        <option>26-30</option>
                        <option>31-40</option>
                        <option>41-50</option>
                        <option>51以上</option>
                    </select>
                </div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">招聘人数</label>

                <div class="col-sm-10">
                    <input type="text" placeholder="请输入人数" class="form-control" value="10">
                </div>
            </div>

            <div class="form-group"><label class="col-sm-2 control-label">职位类别</label>

                <div class="col-sm-10">
                    <select class="form-control">
                        <option>请选择</option>
                        <option>普工</option>
                        <option>洗碗工</option>
                        <option>技工</option>
                        <option>什么工</option>

                    </select>
                </div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">工作地点</label>

                <div class="col-sm-10">

                    <div class="row">
                        <div class="col-xs-5">
                            <select class="form-control">
                                <option>请选择区</option>
                                <option selected>徐汇区</option>
                                <option>闵行区</option>
                                <option>浦东新区</option>
                                <option>青浦区</option>
                                <option>金山区</option>
                                <option>杨浦区</option>
                            </select>
                        </div>
                        <div class="col-xs-7">
                            <select class="form-control">
                                <option>请选择地点</option>
                                <option selected>全部</option>
                                <option>吴泾</option>
                                <option>南方商城</option>
                                <option>金桥</option>
                                <option>闵行工业区</option>
                            </select>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-xs-12" style="padding-top: 10px;">
                            <input type="text" placeholder="请输入具体地址" class="form-control" value="XX路XX号">
                        </div>
                    </div>


                </div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">职位福利</label>

                <div class="col-sm-10" style="line-height: 45px;">


                    <label class="btn btn-sm btn-white"> <input type="checkbox" name="a">包食宿</label>
                    <label class="btn btn-sm btn-white"> <input type="checkbox" name="a">班车接送</label>
                    <label class="btn btn-sm btn-white"> <input type="checkbox" name="a">五险一金</label>
                    <label class="btn btn-sm btn-white"> <input type="checkbox" name="a">工资周结</label>
                    <label class="btn btn-sm btn-white"> <input type="checkbox" name="a">带薪年假</label>
                    <label class="btn btn-sm btn-white"> <input type="checkbox" name="a">还有什么</label>


                </div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">职位简介</label>

                <div class="col-sm-10">

                    <textarea class="form-control"></textarea>


                </div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">时薪</label>

                <div class="col-sm-10">

                    <div class="row">
                        <div class="col-xs-6">
                            <input class="form-control" type="text" placeholder="多少元每人">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <label class="text-danger" style="padding-top: 8px;"><i class="fa fa-bell"></i>
                                我们会自动扣取10%的金额作为服务费</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a class="btn btn-primary" type="submit"
                       href="<?= \yii\helpers\Url::toRoute('/new/order-post2') ?>">下一步</a>
                </div>
            </div>
        </form>
    </div>
</div>