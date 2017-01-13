<style type="text/css">
    #ttle{
        font-size: 28px;
        font-weight: bolder;
        margin-left: 10%;
        margin-top: 15px;
        margin-bottom: 15px;
    }
    .liuy{
        float: none;
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    .sub{
        margin-left:88%;
    }
    form div label{
        font-size: 22px;
    }
</style>
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="./index.php?r=home/index/index">主页</a></li>
                <li class="active">联系我们</li>
            </ol>
        </div>
    </div>
</div>
<div id="ttle">客户留言：</div>
<div class="col-md-9 liuy">
    <form action="./index.php?r=home/speak/liuyan" method="post">
        <div class="form-group">
            <label for="name">姓名：</label>
            <input type="text" class="form-control" id="name" name="names" placeholder="姓名">
        </div>
        <div class="form-group">
            <label for="tel">联系方式:</label>
            <input type="text" class="form-control" id="tel" name="tels" placeholder="邮箱、电话">
        </div>
        <div class="form-group">
            <label for="type">留言类型：</label>
            咨询：<input type="radio" name="types" value="咨询">&nbsp;&nbsp;&nbsp;&nbsp;
            建议：<input type="radio" name="types" value="建议">&nbsp;&nbsp;&nbsp;&nbsp;
            投诉：<input type="radio" name="types" value="投诉">&nbsp;&nbsp;&nbsp;&nbsp;
            其他：<input type="radio" name="types" value="其他">&nbsp;&nbsp;&nbsp;&nbsp;
        </div>
        <div class="form-group">
            <label for="content">内容：</label>
            <textarea name="content" style="width:100%;max-width:100%;height:200px;visibility:hidden;">留言</textarea>
        </div>
        <div class="form-group">
            <input class="btn btn-info sub" type="submit" value="提交">
        </div>
    </form>
</div>
<link rel="stylesheet" href="./kinde/themes/default/default.css" />
<script charset="utf-8" src="./kinde/kindeditor-min.js"></script>
<script charset="utf-8" src="./kinde/lang/zh_CN.js"></script>
<script>
    var editor;
    KindEditor.ready(function(K) {
        editor = K.create('textarea[name="content"]', {
            resizeType : 1,
            allowPreviewEmoticons : false,
            allowImageUpload : false,
            items : [
                'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
                'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
                'insertunorderedlist', '|', 'emoticons', 'multiimage', 'link']
        });
    });
</script>
