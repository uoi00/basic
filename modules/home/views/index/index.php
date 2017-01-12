<div class="header-bottom">
    <div class="container">
        <div class="header">
            <div class="col-md-9 header-left">
                <div class="top-nav">
                    <ul class="memenu skyblue">
                        <li class="active"><a href="<?yii\helpers\Url::to(['home/index/index']);?>">主页</a></li>
                        <li class="grid">
                            <a>花型</a>
                            <div class="mepanel">
                                <div class="row">
                                    <div class="col1 me-one">
                                        <h4>花型</h4>
                                        <ul>
                                            <?php
                                                foreach ($type as $v){
                                                    echo "<li><a href='./index.php?r=home/index/type&id=$v[name]'>$v[name]</a></li>";
                                                }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="grid"><a>颜色</a>
                            <div class="mepanel">
                                <div class="row">
                                    <div class="col1 me-one">
                                        <h4>Shop</h4>
                                        <ul>
                                            <?php
                                            foreach ($color as $v){
                                                echo "<li><a href='./index.php?r=home/index/type&id=$v[name]'>$v[name]</a></li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="grid"><a>装束</a>
                            <div class="mepanel">
                                <div class="row">
                                    <div class="col1 me-one">
                                        <h4>Shop</h4>
                                        <ul>
                                            <?php
                                            foreach ($baoz as $v){
                                                echo "<li><a href='./index.php?r=home/index/type&id=$v[name]'>$v[name]</a></li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="grid">
                            <a>场合</a>
                            <div class="mepanel">
                                <div class="row">
                                    <div class="col1 me-one">
                                        <ul>
                                            <?php
                                            foreach ($yotu as $v){
                                                echo "<li><a href='./index.php?r=home/index/type&id=$v[name]'>$v[name]</a></li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="grid"><a href="contact.html">联系我们</a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
            <div class="col-md-3 header-right">
                <div class="search-bar">
                    <input type="text" placeholder="关键字" id="keywrd">
                    <input type="submit" value="" id="sub">
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</div>

<div class="product">
    <div class="container">
        <div class="product-top">
            <?php
                foreach ($rst as $v){
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