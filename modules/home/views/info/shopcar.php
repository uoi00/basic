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
    .shul{
        height: 40px;
    }
    .scdd{
        margin-left:87%;
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
                        <li class="active"><a href="./index.php?r=home/info/shopcar">购物车</a></li>
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
    <form action="./index.php?r=home/index/carshops" method="post">
    <?php
        if ($data){
            echo '<table class="tb1 col-md-10 table table-bordered table-hover">
        <tr>
            <td align="center">商品</td>
            <td align="center">数量</td>
            <td align="center">单价</td>
            <td align="center">操作</td>
        </tr>';
            foreach ($data as $k=>$v){
                echo '<tr id="'.$v['id'].'">
    <td><div>'.$v['user'].'</div><img style="width: 100px" src="'.$v['img'].'"><input name="id['.$k.']" hidden value="'.$v['id'].'"></td><td align="center"><div><input type="button" style="height: 40px;width: 40xp" value="-" onclick="nums(this,\'-\')"><input type="text" name="shul['.$k.']" value="'.$v['shul'].'" style="width: 60px;height: 40px">
	<input type="button" style="height: 40px;width: 40xp" value="+" onclick="nums(this,\'+\')">
</div></td><td align="center"> ￥ '.$v['price'].'<input name="price['.$k.']" value="'.$v['price'].'" hidden></td><td align="center"><a href="javascript:;" class="'.$v['id'].'" onclick="delcar('.$v['id'].')">取消</a>&nbsp;&nbsp;
    <a href="javascript:;" class="'.$v['id'].'" onclick="carshoping( this )">购买</a></td></tr>';
            }
            echo '</table>';
            echo '<button class="scdd btn btn-danger">生成订单</button>';
        }else{
            echo '<div align="center" style="margin: 40px 40px;font: 24px bold">你还没有购买物品哦！</div>';
        }
    ?>
    </form>
</div>
<script type="text/javascript" charset="utf-8" async defer>
    function nums (elmt,t) {
        var prt = elmt.parentNode.childNodes[1];
        var val = prt.value;
        if (t == '+') {
            prt.setAttribute('value', parseInt(val)+1);
        }
        else if (t == '-'){
            if (val > 1) {
                prt.setAttribute('value', parseInt(val)-1);
            }
        }
    }
</script>