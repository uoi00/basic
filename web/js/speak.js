function huifu1() {
    var row = $('#speakgrid').datagrid('getSelected');
    if (row) {
        $('#editspeak').dialog('open').dialog('setTitle', '留言回复');
        $('#editspeakform').form('load', row);
    }else{
        alert('请选择要回复的留言');
    }
}
function editsavespeak() {
    $('#editspeakform').form( 'submit', {
        url: './index.php?r=admin/speak/huifuspeak',
        success: function (result) {
            var result = eval("(" + result + ")");
            if (result.fruit == 'true') {
                $('#editspeak').dialog('close');
                $.messager.alert('操作提示', result.msg);
                $('#speakgrid').datagrid('reload');
            } else {
                $.messager.alert('操作提示', result.msg);
            }
        }
    });
}
function reload() {
    $('#speakgrid').datagrid('reload', []);
}
function types(ss) {
    if (ss == '1'){
        $('#speakgrid').datagrid('load', {
            speakname : '咨询'
        });
    }else if (ss == '2'){
        $('#speakgrid').datagrid('load', {
            speakname : '建议'
        });
    }else if (ss == '3'){
        $('#speakgrid').datagrid('load', {
            speakname : '投诉'
        });
    }else if (ss == '4'){
        $('#speakgrid').datagrid('load', {
            speakname : '其他'
        });
    }else if (ss == '5'){
        $('#speakgrid').datagrid('load', {
            speakname : '已回复'
        });
    }else if (ss == '6'){
        $('#speakgrid').datagrid('load', {
            speakname : '未回复'
        });
    }
}

