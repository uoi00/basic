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
</style>
<div class="col-md-10" id="carlist">
    <form action="./index.php?r=home/doc/shop" method="post">
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
            echo '<tr>
    <td><div>'.$data['user'].'</div><img style="width: 100px" src="'.$data['img'].'"><input name="user" class="yc" value="'.$data['user'].'"></td>
    <td align="center">'.$data['type'].'</td>
    <td align="center"> ￥'.$data['price'].'</td>
    <td align="center"><input readonly="readonly" class="sls" name="shuls" value="'.$shu.'"></td>
    <td align="center"> ￥'.$shu*$data['price'].'</td></tr>';
            ?>
            <tr>
                <td colspan="5">
                    <button type="submit" class="btn doc">提交订单</button>
                </td>
            </tr>
        </table>
    </form>
</div>