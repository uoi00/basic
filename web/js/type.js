function newtype() {
    $('#addtype').dialog('open').dialog('setTitle', '添加用户');
    $('#addtypeform').form('clear');
}
function edittype() {
    var row = $('#typegrid').treegrid('getSelected');
    if (row) {
        $('#edittype').dialog('open').dialog('setTitle', '修改用户');
        $('#edittypeform').form('load', row);
    }else{
        alert('请选择要修改的用户');
    }
}
function savetype() {
    $('#addtypeform').form( 'submit',{
        url : './index.php?r=admin/type/addtype',
        success : function(result) {
            var result = eval("(" + result + ")");
            if (result.fruit == 'true') {
                $('#addtype').dialog('close');
                $.messager.alert('操作提示', result.msg);
                $('#typegrid').treegrid('reload');
            } else {
                $.messager.alert('操作提示', result.msg);
            }
        }
    });
}
function editsavetype() {
    $('#edittypeform').form( 'submit', {
        url: './index.php?r=admin/type/edittype',
        success: function (result) {
            var result = eval("(" + result + ")");
            if (result.fruit == 'true') {
                $('#edittype').dialog('close');
                $.messager.alert('操作提示', result.msg);
                $('#typegrid').treegrid('reload');
            } else {
                $.messager.alert('操作提示', result.msg);
            }
        }
    });
}
function reload() {
    $('#typegrid').treegrid('reload', []);
}
function destroytype() {
    var row = $('#typegrid').treegrid('getSelections');
    if (row) {
        ids = '';
        for ( var i = 0; i < row.length; i++) {
            ids += row[i].id;
            if (i < row.length - 1) {
                ids = ids + ",";
            }
        }
        $.messager.confirm('删除提示', '你确定要删除这些数据吗,删除后不能回复请谨慎操作!!!', function(r) {
            if (r) {
                $.post('./index.php?r=admin/type/deltype', {ids : ids}, function(result) {
                    var result = eval("(" + result + ")");
                    if (result.fruit = 'true') {
                        $.messager.alert('操作提示', result.msg);
                        $('#typegrid').treegrid('reload'); // reload the type tree
                    } else {
                        $.messager.alert('操作提示', result.msg);
                    }
                });
            }
        });
    }
}
