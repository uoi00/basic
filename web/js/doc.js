function fahuo() {
    var row = $('#docgrid').datagrid('getSelected');
    if (row) {
        $('#editdoc').dialog('open').dialog('setTitle', '修改用户');
        $('#editdocform').form('load', row);
    }else{
        alert('请选择要修改的用户');
    }
}
function editsavedoc() {
    $('#editdocform').form( 'submit', {
        url: './index.php?r=admin/doc/editdoc',
        success: function (result) {
            var result = eval("(" + result + ")");
            if (result.fruit == 'true') {
                $('#editdoc').dialog('close');
                $.messager.alert('操作提示', result.msg);
                $('#docgrid').datagrid('reload');
            } else {
                $.messager.alert('操作提示', result.msg);
            }
        }
    });
}
function reload() {
    $('#docgrid').datagrid('reload', []);
}
function destroydoc() {
    var row = $('#docgrid').datagrid('getSelections');
    if (row) {
        ids = '';
        for ( var i = 0; i < row.length; i++) {
            ids += row[i].id;
            if (i < row.length - 1) {
                ids = ids + ",";
            }
        }
        $.messager.confirm('删除提示', '你确定要删除这些数据吗,删除后不能恢复请谨慎操作!!!', function(r) {
            if (r) {
                $.post('./index.php?r=admin/doc/deldoc', {ids : ids}, function(result) {
                    var result = eval("(" + result + ")");
                    if (result.fruit = 'true') {
                        $.messager.alert('操作提示', result.msg);
                        $('#docgrid').datagrid('reload'); // reload the doc data
                    } else {
                        $.messager.alert('操作提示', result.msg);
                    }
                });
            }
        });
    }
}
function searchdoc() {
    var docname = $('#querydoc').val();
    if(docname!=''){
        $('#docgrid').datagrid('load', {
            docname : docname
        });
    }else{
        $.messager.alert('操作提示','请输入用户名进行查询！！！');
    }
}
function status(ss) {
    if (ss == '1'){
        $('#docgrid').datagrid('load', {
            docname : '已下单，未付款'
        });
    }else if (ss == '2'){
        $('#docgrid').datagrid('load', {
            docname : '已付款，未发货'
        });
    }else if (ss == '3'){
        $('#docgrid').datagrid('load', {
            docname : '已发货，请等待'
        });
    }else if (ss == '4'){
        $('#docgrid').datagrid('load', {
            docname : '已收货，交易完成'
        });
    }
}
