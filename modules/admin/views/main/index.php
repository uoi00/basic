<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>美丽花店管理平台</title>
    <base href="<?=\yii\helpers\Url::base(true);?>/">
    <script type="text/javascript" src="./public/jquery.min.js"></script>
    <script type="text/javascript" src="./public/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="./public/locale/easyui-lang-zh_CN.js" ></script>
    <link rel="stylesheet" type="text/css" href="./public/themes/default/easyui.css" />
    <link rel="stylesheet" type="text/css" href="./public/themes/icon.css" />
    <script type="text/javascript">
    $(function() {
        $('#index_tab').tabs('add', {
            title:"首页",
            href : "",
            iconCls : "icon-home",
            selected : true,
            closable : false
        });
        $('#navtree ul').tree({
            onClick : function(node) {
                var attributes = node.value;
                if ($('#index_tab').tabs('exists', node.text))
                    $('#index_tab').tabs('select', node.text);
                else
                    $('#index_tab').tabs('add', {
                        title : node.text,
                        href : './index.php?r=admin/main/' + attributes,
                        selected : true,
                        closable : true
                    });
            }
        });
    });
    </script>
</head>
<body class="easyui-layout">
    <div data-options="region:'north',border:false" style="height:81px;background-image: url('./img/lan.png');">
        <div style="font: 38px bold;margin: 10px 40px;color: #edf9ff">
            美丽花店管理平台
        </div>
        <a href="<?=\yii\helpers\Url::to(['test/logout']);?>" style="position:absolute; right: 30px; top: 15px;" title="注销">
            <img src="./img/logout.png" style="height: 50px">
        </a>
        <a href="./index.php?r=home/index/index" style="position:absolute; right: 95px; top: 15px;" title="主页">
            <img src="./img/home.png" style="height: 50px">
        </a>
    </div>
    <div data-options="region:'west',split:true,title:'操作菜单'" title="East" style="width:300px;background-image: url('./img/lan2.png')">
        <div class="easyui-accordion" id="navtree" data-options="multiple:false,border:false,fit:true">
            <div title="基础管理" data-options="iconCls:'{$menulist.iconCls}'" style="padding: 10px;">
                <ul class="easyui-tree" data-options="animate:true,lines:false,data:[{'text':'商品管理','value':'shop'},{'text':'分类管理','value':'type'},{'text':'订单管理','value':'doc'},{'text':'用户留言','value':'speak'}]"></ul>
            </div>
            <div title="基础管理" data-options="iconCls:'{$menulist.iconCls}'" style="padding: 10px;">
                <ul class="easyui-tree" data-options="animate:true,lines:false,data:[{'text':'管理员管理','value':'root'}]">
                </ul>
            </div>
        </div>
    </div>
    <div id="index_tab" data-options="region:'center',split:true,animate:true,collapsible: true" class="easyui-tabs">

    </div>
    <div data-options="region:'south',border:false" style="height:23px;padding:3px;">
        <div style='float:left;'>欢迎您，管理员：<?=$user['user']?></div>
        <div style='text-align:center'>@所有权归 混·魂 所有</div>
    </div>
</body>
</html>