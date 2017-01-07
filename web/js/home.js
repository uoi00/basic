$(function () {
    $('#sub').click(keys());
});
//按关键字搜索
function keys() {
    var key = $('#keywrd').val();
}
//按类型搜索
function tytpe(typ) {

}
//添加购物车
function addcar(id) {
    var ids = id['id'];
    var su = $('#inp').val();
    $.post('./index.php?r=home/info/addcar',{id:ids,shu:su},function (msg) {
        if (msg == 'true'){
            alert('添加成功!');
        }else {
            alert('添加失败');
        }
    });
}
function delcar(id) {
    $.post('./index.php?r=home/info/delcar',{id:id},function (msg) {
        if (msg == 'true'){
            alert('取消成功!');
        }else {
            alert('取消失败');
        }
    });
}
function looks(ids) {
    $.post('./index.php?r=home/index/shops',{id:ids});
}