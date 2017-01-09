<style type="text/css">
     #carlist{
         float: none;
         display: block;
         margin-left: auto;
         margin-right: auto;
     }
     .doc{
         background-color: indianred;
         float: right;
         margin-right: 40px;
         color: white;
         font: 18px bold;
     }
    .zongj{
        color: darkred;
        font: 22px bold;
    }
</style>
<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">
                <div class="top-nav">
                    <ul class="memenu skyblue">
                        <li class="active"><a href="./index.php?r=home/index/index">主页</a></li>
                        <li><a href="./index.php?r=home/info/index">个人中心</a></li>
                        <li><a href="./index.php?r=home/info/info">我的信息</a></li>
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
    <table class="tb1 col-md-10 table table-bordered table-hover">
        <tr>
            <td align="center">商品</td>
            <td align="center">数量</td>
            <td align="center">价格</td>
            <td align="center">操作</td>
        </tr>
        <?php
        foreach ($data as $v){
            echo '<tr>
    <td><div>'.$v['user'].'</div><img style="width: 100px" src="'.$v['img'].'"></td>
    <td align="center">'.$v['shul'].'</td>
    <td align="center"> ￥ '.$v['shul']*$v['price'].'</td>
    <td align="center"><a href="javascript:;" class="'.$v['id'].'" onclick="delcar('.$v['id'].')">取消</a>&nbsp;&nbsp;
    <a href="javascript:;" class="'.$v['id'].'" onclick="carshoping('.$v['sid'].','.$v['shul'].')">购买</a></td></tr>';
        }
        ?>
        <tr>
            <td class="zongj" colspan="2" align="center">合计总价： ￥
                <?php
                $con = 0;
                foreach ($data as $v){
                    $con = $con + $v['shul']*$v['price'];
                }
                echo $con;
                ?>
            </td>
            <td colspan="2">
                <a class="btn doc" href="#">提交订单</a>
            </td>
        </tr>
    </table>
</div>