function newroot() {
	$('#addroot').dialog('open').dialog('setTitle', '添加用户');
	$('#addrootform').form('clear');
}
function editroot() {
	var row = $('#rootgrid').datagrid('getSelected');
	if (row) {
		$('#editroot').dialog('open').dialog('setTitle', '修改用户');
		$('#editrootform').form('load', row);
	}else{
		alert('请选择要修改的用户');
	}
}
function saveroot() {
	$('#addrootForm').form( {
		url : './index.php?r=admin/root/addroot',
		success : function(result) {
			var result = eval("(" + result + ")");
			if (result.fruit == 'true') {
				$('#addroot').dialog('close');
				$.messager.alert('操作提示', result.msg);
				$('#rootgrid').datagrid('reload');
			} else {
				$.messager.alert('操作提示', result.msg);
			}
		}
	});
}
function editsaveroot() {
	var id = $('#id1').val();
	var pwdo = $('#pwdold1').val();
	var user = $('#user1').val();
	var pwdn = $('#pwdnew1').val();
	var pwds = $('#pwds1').val();
	if (pwds == pwdn && pwdo.length >0){
		$.post('./index.php?r=admin/root/editroot',{id:id,pwdo:pwdo,user:user,pwdn:pwdn},function (result) {
            var result = eval("(" + result + ")");
            if (result.fruit == 'true') {
                $('#addroot').dialog('close');
                $.messager.alert('操作提示', result.msg);
                $('#rootgrid').datagrid('reload');
            } else {
                $.messager.alert('操作提示', result.msg);
            }
        })
	}else {
		alert('数据错误，请检查');
	}
}
function reload() {
	$('#rootgrid').datagrid('reload', []);
}
function destroyroot() {
	var row = $('#rootgrid').datagrid('getSelections');
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
				$.post('./index.php?r=admin/root/delroot', {ids : ids}, function(result) {
					var result = eval("(" + result + ")");
					if (result.fruit = 'true') {
						$.messager.alert('操作提示', result.msg);
						$('#rootgrid').datagrid('reload'); // reload the root data
					} else {
						$.messager.alert('操作提示', result.msg);
					}
				});
			}
		});
	}
}
function searchroot() {
	var rootname = $('#queryroot').val();
	if(rootname!=''){
		$('#rootgrid').datagrid('load', {
			rootname : rootname
		});
	}else{
		$.messager.alert('操作提示','请输入用户名进行查询！！！');
	}

}
