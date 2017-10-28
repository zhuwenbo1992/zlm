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

            <div class="form-group"><label class="col-sm-2 control-label">工作日期</label>

                <div class="col-sm-10">

                    <div class="row">
                        <div class="col-xs-12">
                            <select class="form-control">
                                <option selected>请选择开始日期</option>
                                <option>长期</option>
                                <option>2017-6-20</option>
                                <option>2017-6-20</option>
                                <option>2017-6-20</option>
                                <option>2017-6-20</option>
                                <option>2017-6-20</option>
                                <option>2017-6-20</option>
                            </select>
                        </div>
                        <div class="col-xs-12" style="padding-top: 10px;"><select class="form-control">
                                <option selected>请选择结束日期</option>
                                <option>长期</option>
                                <option>2017-6-20</option>
                                <option>2017-6-20</option>
                                <option>2017-6-20</option>
                                <option>2017-6-20</option>
                                <option>2017-6-20</option>
                                <option>2017-6-20</option>
                            </select>
                        </div>

                    </div>


                </div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">工作日</label>

                <div class="col-sm-10">

                    <div class="row">
                        <div class="col-xs-12" style="line-height: 40px;">
                            <label class="btn btn-sm btn-white"> <input type="checkbox" name="a">周一</label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox" name="a">周二</label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox" name="a">周三</label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox" name="a">周四</label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox" name="a">周五</label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox" name="a">周六</label>
                            <label class="btn btn-sm btn-white"> <input type="checkbox" name="a">周日</label>
                        </div>


                    </div>


                </div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">工作时间</label>

                <div class="col-sm-10">

                    <div class="row">
                        <div class="col-xs-12">
                            <select class="form-control">
                                <option selected>请选择开始时间</option>
                                <option>0点</option>
                                <option>1点</option>
                                <option>2点</option>
                                <option>3点</option>
                                <option>4点</option>
                                <option>5点</option>

                            </select>
                        </div>
                        <div class="col-xs-12" style="padding-top: 10px;">
                            <select class="form-control">
                                <option selected>请选择结束时间</option>
                                <option>0点</option>
                                <option>1点</option>
                                <option>2点</option>
                                <option>3点</option>
                                <option>4点</option>
                                <option>5点</option>

                            </select>

                        </div>

                    </div>


                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <a class="btn btn-default" type="submit"
                       href="<?= \yii\helpers\Url::toRoute('/new/order-post2') ?>">添加时间段</a>
                </div>
            </div>
        </form>
    </div>
</div>
<div style="padding-top: 10px;"></div>
<div class="row white-bg" >
    <div class="col-xs-12 border-bottom">
        <small class="pull-right" style="padding-top: 30px;"><i class="fa fa-trash"></i></small>
        <p style="padding-top: 15px;"><span class="text-warning"><i class="fa fa-circle-o"></i></span> 2017-6-20 至 2016-6-25，工作日</p>
        <p>上午9点 至 12点</p>
    </div>
    <div class="col-xs-12 border-bottom">
        <small class="pull-right" style="padding-top: 30px;"><i class="fa fa-trash"></i></small>
        <p style="padding-top: 15px;"><span class="text-warning"><i class="fa fa-circle-o"></i></span> 2017-6-20 至 2016-6-25，工作日</p>
        <p>上午9点 至 12点</p>
    </div>
    <div class="col-xs-12 border-bottom">
        <small class="pull-right" style="padding-top: 30px;"><i class="fa fa-trash"></i></small>
        <p style="padding-top: 15px;"><span class="text-warning"><i class="fa fa-circle-o"></i></span> 2017-6-20 至 2016-6-25，工作日</p>
        <p>上午9点 至 12点</p>
    </div>
    <div class="col-xs-12" style="padding-top: 15px;padding-bottom: 15px;">
        <a class="btn btn-default" type="submit"
           href="<?= \yii\helpers\Url::toRoute('/new/order-post') ?>">上一步</a>
        <a class="btn btn-primary" type="submit"
           href="<?= \yii\helpers\Url::toRoute('/new/order-post2') ?>">保存并发布</a>
    </div>


</div>