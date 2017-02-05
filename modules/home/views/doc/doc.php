<style type="text/css">
    .bod{
        float: none;
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 40px;
        margin-bottom: 50px;
    }
    .docs{
        font: 18px bold;
        color: darkred;
        padding-left: 13%;
     }
    #qrzf{
        float: none;
        font-size: 18px;
        margin-right:40px;
    }
    #qxdd{
        float: none;
        font-size: 18px;
        margin-right: 100px;
    }
</style>
<div class="bod col-md-8">
    <?php
        if ($data == null){
            echo '<div class="docs">数据错误</div>';
        }else if ($data){
            echo '<div class="docs">您购买的物品:'.$data['res'].' <br>&nbsp;&nbsp;已生成订单：'.$data['id'].'点击确认将进行付款！！</div>';
            echo '<button class="btn btn-danger" id="qrzf">确认支付</button>';
            echo '<button class="btn btn-danger" id="qxdd">取消订单</button>';
        }
    ?>
</div>
<script type="text/javascript">
    <?php
    if ($data != null) {
        echo "$(function () {
            $('#qrzf') . click(function () {
                $.post('./index.php?r=home/doc/zhifu',{data:$data[id]},function (msg) {
                    if (msg == 'true') {
                        alert('付款成成功，返回首页');
                        location . href = './index.php?r=home/index/index';
                    }
                });
            });
        });";
        echo "$(function () {
            $('#qxdd') . click(function () {
                $.post('./index.php?r=home/doc/deldoc',{id:$data[id]},function (msg) {
                    if (msg == 'true') {
                        alert('取消成功，返回首页');
                        location . href = './index.php?r=home/index/index';
                    }
                });
            });
        });";
    }
    ?>
</script>