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
</style>
<div class="col-md-10" id="carlist">
    <table class="tb1 col-md-10 table table-bordered table-hover">
        <tr>
            <td align="center">商品</td>
            <td align="center">属性</td>
            <td align="center">单价</td>
            <td align="center">数量</td>
            <td align="center">合计</td>
        </tr>
        <?php
            echo '<tr>
    <td><div>'.$data['user'].'</div><img style="width: 100px" src="'.$data['img'].'"></td>
    <td align="center">'.$data['type'].'</td>
    <td align="center"> ￥'.$data['price'].'</td>
    <td align="center">'.$shu.'</td>
    <td align="center"> ￥'.$shu*$data['price'].'</td></tr>';
        ?>
        <tr>
            <td colspan="5">
                <a class="btn doc" href="#">提交订单</a>
            </td>
        </tr>
    </table>
</div>