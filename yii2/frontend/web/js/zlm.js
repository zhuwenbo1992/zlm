/**
 * Created by zk on 10/7/17.
 */
/**
* 点击按钮选择并设置隐藏input
 *按钮id=隐藏input ID + 'a'
 *
* */
function welfare(a) {
    // alert(a);
    if ($('#'+a).val()==0) {
        $('#'+a).val(1);
        $('#'+a+'a').removeClass().addClass('btn btn-xs btn-primary');
    } else {
        $('#'+a).val(0);
        $('#'+a+'a').removeClass().addClass('btn btn-xs btn-default');
    }
}
function selectJob(a) {
    $("#job-input").val(a);
    $("#job").addClass('hide');
}



function closeDesc(){

    $("#desc").addClass('hide');
    console.log($("textarea").val())
    if($("textarea").val()==''){
        alert(2)
        $("#work_duty").val("你还未输入");
        return false;

    }else{

        $("#work_duty").val("已输入");
        $("#work_duty").css('color','red');

    }



}
function selectJobType(a) {
    closeAllJob();
    $("#" + a).removeClass();
}
function closeAllJob() {
    for (i=1;i<=6;i++) {
        $("#job" + i).removeClass().addClass('hide');
    }
    $("#hot").removeClass().addClass('hide');
}
/**
 * 省市区联动
 * Pid=父选择框的id
 * Sid=子选择框的id
 * */
function changeRegion(Pid, Sid) {
    /**获取下级name的url*/
    printRegion(Sid,$("#" + Pid).val());
}
/**
* id:目标select的id
 * value:要显示的option列表的父id
* */
function printRegion(id,value,defaultValue) {
    var url = "/site/get-region";
    $.get(url, {'area': value}, function (msg) {
        if (msg) {
            /**清空子选择框的所有option*/
            $("#" + id).empty();

            if (msg.id==undefined) {
                /**如果msg为空则输出：没有地区*/
                $("#" + id).append('<option vaue="0">没有可选地区</option>');
            } else {
                $("#" + id).append('<option>请选择</option>');
                /**循环输出地区名*/
                for (i = 0; i < msg.id.length; i++) {
                    if (msg.id[i]==defaultValue) {
                        var selected='selected';
                    } else {
                        var selected='';
                    }
                    $("#" + id).append('<option value="' + msg.id[i] + '" ' + selected + '>' + msg.name[i] + '</option>');
                }
            }
        }
    }, 'json');

}
