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
        border: none;
    }
    .yc{
        display: none;
    }
    .sls{
        border: none;
    }
    .jiage{
        color: red;
        font:20px bolder;
        padding-top: 3px;
        margin-right: 40px;
    }
</style>
<div class="col-md-10" id="carlist">
    <form action="./index.php?r=home/doc/shops" method="post">
        <table class="tb1 col-md-10 table table-bordered table-hover">
            <tr>
                <td align="center">收货地址：</td>
                <td colspan="4"><input name="addrs" class="form-control"></td>
            </tr>
            <tr>
                <td align="center">收货人：</td>
                <td colspan="4"><input name="names" class="form-control"></td>
            </tr>
            <tr>
                <td align="center">联系电话：</td>
                <td colspan="4"><input name="tels" class="form-control"></td>
            </tr>
            <tr>
                <td align="center">商品</td>
                <td align="center">属性</td>
                <td align="center">单价</td>
                <td align="center">数量</td>
                <td align="center">合计</td>
            </tr>
            <?php
            foreach ($data as $k=>$v){
                echo '<tr>
    <td><div>'.$v['user'].'</div><img style="width: 100px" src="'.$v['img'].'"><input name="user['.$k.']" class="yc" value="'.$v['user'].'"></td>
    <td align="center">'.$v['type'].'</td>
    <td align="center"> ￥'.$v['price'].'</td>
    <td align="center"><input readonly="readonly" class="sls" name="shuls['.$k.']" value="'.$v['shu'].'"></td>
    <td align="center"> ￥<input name="money['.$k.']" readonly="readonly" class="sls" value="'.$v['shu']*$v['price'].'"></td></tr>';
            }
            ?>
            <tr>
                <td colspan="4" align="right" class="jiage">
                    价格合计：<?php
                    $con ='';
                    foreach ($data as $v){
                        $con += $v['shu']*$v['price'];
                    }
                    echo $con;
                    ?>
                </td>
                <td colspan="1" align="center">
                    <button type="submit" class="btn doc">提交订单</button>
                </td>
            </tr>
        </table>
    </form>
</div>