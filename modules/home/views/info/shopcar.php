<table class="table table-hover">
    <tr>
        <td>商品</td>
        <td>数量</td>
        <td>价格</td>
        <td>操作</td>
    </tr>
    <?php
    foreach ($data as $v){
        echo '<tr>
<td><img style="width: 100px" src="'.$v['img'].'"></td>
<td>'.$v['shul'].'</td>
<td>'.$v['shul']*$v['price'].'</td>
<td><a href="javascript:;" class="'.$v['id'].'" onclick="delcar('.$v['id'].')">取消</a>&nbsp;&nbsp;
<a href="javascript:;" class="'.$v['id'].'" onclick="shoping('.$v['id'].')">购买</a></td></tr>';
    }
    ?>
</table>
<script src="./js/indexjs.js"></script>