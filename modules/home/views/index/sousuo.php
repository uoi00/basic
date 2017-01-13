<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="./index.php?r=home/index/index">主页</a></li>
                <li class="active">搜索结果</li>
            </ol>
        </div>
    </div>
</div>
<div class="product">
    <div class="container">
        <div class="product-top">
            <?php
            foreach ($data as $v){
                echo '<div class="col-md-3 product-left">
                    <div class="product-main simpleCart_shelfItem">
                        <a href="./index.php?r=home/index/shops&ids='.$v['id'].'" class="mask">
                            <img class="img-responsive zoom-img" src="'.$v['img'].'" alt="" /></a>
                        <div class="product-bottom" align="center">
                            <h3>'.$v['user'].'</h3>
                            <h4>
                                <span class=" item_price">￥ '.$v['price'].'</span>
                            </h4>
                        </div>
                        <div class="srch">
                            <span>-50%</span>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</div>