<style>
    .shul {
        font-family: "宋体";
        font-size: 20px;
        height: 30px;
        width: 150px;


    }
</style>
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <li><a href="./index.php?r=home/index/index">主页</a></li>
                <li class="active">商品详情</li>
            </ol>
        </div>
    </div>
</div>
<div class="single contact">
    <div class="container">
        <div class="single-main">
            <div class="col-md-9 single-main-left">
                <div class="sngl-top">
                    <div class="col-md-5 single-top-left">
                        <div class="flexslider">
                            <ul class="slides">
                                <li data-thumb="<?=$rst['img']?>">
                                    <div class="thumb-image"> <img src="<?=$rst['img']?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                </li>
                                <li data-thumb="<?=$rst['img']?>">
                                    <div class="thumb-image"> <img src="<?=$rst['img']?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                </li>
                                <li data-thumb="<?=$rst['img']?>">
                                    <div class="thumb-image"> <img src="<?=$rst['img']?>" data-imagezoom="true" class="img-responsive" alt=""/> </div>
                                </li>
                            </ul>
                        </div>
                        <!-- FlexSlider -->
                        <script src="./front/js/imagezoom.js"></script>
                        <script defer src="./front/js/jquery.flexslider.js"></script>
                        <link rel="stylesheet" href="./front/css/flexslider.css" type="text/css" media="screen" />
                    </div>
                    <div class="col-md-7 single-top-right">
                        <div class="single-para simpleCart_shelfItem">
                            <h2><?=$rst['user']?></h2>
                            <div class="star-on">
                                <ul class="star-footer">
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                    <li><a href="#"><i> </i></a></li>
                                </ul>
                                <div class="review">
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                            <h5 class="item_price">￥ <?=$rst['price']?></h5>
                            <p>商品详情：</p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;<?=$rst['type']?><br></p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;<?=$rst['nums']?>支装</p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($rst['cont']){
                                  echo $rst['cont'];
                                }else{
                                    echo '该商品暂无详情';
                                }
                                ?></p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;
                                <?php
                                if($rst['remark']){
                                    echo $rst['remark'];
                                }else{
                                    echo '该商品暂无详情';
                                }
                                ?></p>
                            <p>
                                数量：<input class="shul" id="inp" name="shul" value="1" > </input>
                            </p>
                            </div>
                            <a href="javascript:;" id="<?=$rst['id']?>" class="add-cart item_add" onclick="addcar(this)">添加购物车</a>
                            <a href="javascript;" onclick="shoping(this)" class="add-cart item_add" id="<?=$rst['id']?>">现在购买</a>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="./js/indexjs.js"></script>
<script>
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>