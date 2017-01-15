<style type="text/css">
    #carlist{
        float: none;
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 40px;
    }
    #status{
        margin: 10px 40px;
        padding-top: 15px;
        background-color: cornsilk;
        height: 55px;
    }
    #status span{
        font: 22px bolder;
        margin-left: 40px;
    }
    .doclist{
        margin: 10px;
        padding:5px;
        background-color: coral;
    }
    .doclist div{
        margin:10px 20px;
        font-size:16px;
    }
    .deldoc{
        margin: 3px;
        font-size: 18px;
    }
    .zhifu{
        font-size: 18px;
        margin: 3px;
    }
</style>
<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">
                <div class="top-nav">
                    <ul class="memenu skyblue">
                        <li><a href="./index.php?r=home/index/index">主页</a></li>
                        <li><a href="./index.php?r=home/info/index">我的留言</a></li>
                        <li><a href="./index.php?r=home/info/shopcar">购物车</a></li>
                        <li class="active"><a href="./index.php?r=home/info/doc">我的订单</a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="col-md-10" id="carlist">
    <div id="status">
        <span><a href="./index.php?r=home/info/doc&type=已下单，未付款">未付款</a></span>
        <span><a href="./index.php?r=home/info/doc&type=已付款，未发货">未发货</a></span>
        <span><a href="./index.php?r=home/info/doc&type=已发货，请等待">未收货</a></span>
        <span><a href="./index.php?r=home/info/doc&type=已收货，交易完成">已完成</a></span>
    </div>
    <?php
    foreach ($data as $k=>$v){
        echo '<div class="doclist"><div>购买物品：'.$v['res'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;订单编号：'.$v['id'].'</div>';
        echo '<div>下单时间：'.$v['time'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;状态：'.$v['status'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;总价：'.$v['money'].'</div>';
        echo '<div>收货人：'.$v['name'].'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;联系方式：'.$v['tel'].'</div>';
        echo '<div>收货地址：'.$v['addr'].'</div>';
        if ($v['status'] == '已下单，未付款'){
            echo '<a class="btn btn-danger btn-block deldoc" id="'.$v['id'].'">取消订单</a>';
            echo '<a class="btn btn-info btn-block zhifu" id="'.$v['id'].'">去付款</a>';
        }
        if ($v['status'] == '已发货，请等待'){
            echo '<div>运单号：'.$v['delivery'].'</div>';
        }
        echo '</div>';
    }
    ?>
</div>
<script type="text/javascript">
    $(function () {
        $('.deldoc').click(function () {
            $.post('./index.php?r=home/doc/deldoc',{id:this.id},function (msg) {
                if (msg == 'true') {
                    alert('取消成功！');
                    location.href = './index.php?r=home/info/doc';
                }else {
                    alert('发生错误');
                }
            });
        });
        $('.zhifu').click(function () {
           $.post('./index.php?r=home/doc/zhifu',{data:this.id},function (msg) {
                if (msg == 'true') {
                    alert('支付成功！');
                    location.href = './index.php?r=home/info/doc';
                }else {
                    alert('发生错误');
                }
            });
        });
    });
</script>