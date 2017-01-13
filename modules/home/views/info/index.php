<style type="text/css">
    #carlist{
        float: none;
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 40px;
    }
    .ttle{
        font-size: 16px;
        color: grey;
        margin: 13px 22px;
    }
    .cont{
        font-size: 18px;
        margin: 13px 10px;
    }
    .hfu{
        font-size: 14px;
        margin:6px 20px;
    }
</style>
<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">
                <div class="top-nav">
                    <ul class="memenu skyblue">
                        <li><a href="./index.php?r=home/index/index">主页</a></li>
                        <li class="active"><a href="./index.php?r=home/info/index">我的留言</a></li>
                        <li><a href="./index.php?r=home/info/shopcar">购物车</a></li>
                        <li><a href="./index.php?r=home/info/doc">我的订单</a></li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
<div class="col-md-10" id="carlist">
    <?php
    if ($data){
        foreach ($data as $v) {
            echo "<div class='ttle'>$v[type]&nbsp;&nbsp;&nbsp;&nbsp;$v[ishf]&nbsp;&nbsp;&nbsp;&nbsp;$v[time]</div>";
            echo "<div class='cont'>".$v['cont']."</div>";
            if (isset($v['hf'])){
                echo "<div class='hfu'>".$v['hf']['name'].  '：'.  $v['hf']['cont']."</div>";
            }
        }
        //类型 内容 时间 状态
    }else{
        echo '<div align="center" style="margin: 40px 40px;font: 24px bold">你还没有进行留言哦！</div>';
    }
    ?>
</div>