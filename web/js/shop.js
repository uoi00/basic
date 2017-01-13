function newshop() {
	$('#addshop').dialog('open').dialog('setTitle', '添加用户');
	$('#addshopform').form('clear');
}
function editshop() {
	var row = $('#shopgrid').datagrid('getSelected');
	if (row) {
		$('#editshop').dialog('open').dialog('setTitle', '修改用户');
		$('#editshopform').form('load', row);
	}else{
		alert('请选择要修改的用户');
	}
}
function saveshop() {
    $('#addshopform').form( 'submit',{
        url : './index.php?r=admin/shop/addshop',
        success : function(result) {
            var result = eval("(" + result + ")");
            if (result.fruit == 'true') {
                $('#addshop').dialog('close');
                $.messager.alert('操作提示', result.msg);
                $('#shopgrid').datagrid('reload');
            } else {
                $.messager.alert('操作提示', result.msg);
            }
        }
    });
}
function editsaveshop() {
    $('#editshopform').form( 'submit', {
        url: './index.php?r=admin/shop/editshop',
        success: function (result) {
            var result = eval("(" + result + ")");
            if (result.fruit == 'true') {
                $('#editshop').dialog('close');
                $.messager.alert('操作提示', result.msg);
                $('#shopgrid').datagrid('reload');
            } else {
                $.messager.alert('操作提示', result.msg);
            }
        }
    });
}
function reload() {
	$('#shopgrid').datagrid('reload', []);
}
function destroyshop() {
	var row = $('#shopgrid').datagrid('getSelections');
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
				$.post('./index.php?r=admin/shop/delshop', {ids : ids}, function(result) {
					var result = eval("(" + result + ")");
					if (result.fruit = 'true') {
						$.messager.alert('操作提示', result.msg);
						$('#shopgrid').datagrid('reload'); // reload the shop data
					} else {
						$.messager.alert('操作提示', result.msg);
					}
				});
			}
		});
	}
}
function searchshop() {
	var shopname = $('#queryshop').val();
	if(shopname!=''){
		$('#shopgrid').datagrid('load', {
			shopname : shopname
		});
	}else{
		$.messager.alert('操作提示','请输入用户名进行查询！！！');
	}

}
