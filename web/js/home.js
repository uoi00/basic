$(function () {
    $('#sub').click(function(){keys()});
});
//按关键字搜索
function keys() {
    var key = $('#keywrd').val();
    location.href = './index.php?r=home/index/key&key='+key;
}
//添加购物车
function addcar(id) {
    var ids = id['id'];
    var su = $('#inp').val();
    $.post('./index.php?r=home/info/addcar',{id:ids,shu:su},function (msg) {
        if (msg == 'true'){
            alert('添加成功!');
            location.href = './index.php?r=home/info/shopcar';
        }else {
            alert('添加失败');
        }
    });
}
//购买
function shoping(th) {
    var id = th['id'];
    var su = $('#inp').val();
    open("./index.php?r=home/index/shoped&id="+id+"&shu="+su);
}
function delcar(id) {
    $.post('./index.php?r=home/info/delcar',{id:id},function (msg) {
        if (msg == 'true'){
            alert('取消成功!');
            location.href = './index.php?r=home/info/shopcar';
        }else {
            alert('取消失败');
        }
    });
}
function carshoping(id,su) {
    open("./index.php?r=home/index/shoped&id="+id+"&shu="+su);
}
function looks(ids) {
    $.post('./index.php?r=home/index/shops',{id:ids});
}