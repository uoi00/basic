<!DOCTYPE html>
<html>
<head>
<title>Home</title>
    <base href="<?=yii\helpers\Url::base(true)?>/">
<link href="./front/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
<script src="./front/js/jquery-1.11.0.min.js"></script>
<!--Custom-Theme-files-->
<!--theme-style-->
<link href="./front/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="各种美丽鲜花" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--start-menu-->
<script src="./front/js/simpleCart.min.js"> </script>
<link href="./front/css/memenu.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="./front/js/memenu.js"></script>
<script>$(document).ready(function(){$(".memenu").memenu();});</script>	
<!--dropdown-->
<script src="./front/js/jquery.easydropdown.js"></script>
</head>
<body> 
	<!--顶部-->
	<div class="top-header">
		<div class="container">
			<div class="top-header-main">
				<div class="col-md-6 top-header-left">
					<div class="drop">
						<div class="clearfix"></div>
					</div>
				</div>
				<!-- 购物车 -->
				<div class="col-md-6 top-header-left">
					<div class="cart box_1">
						<a href="./index.php?r=home/info/shopcar">
							<img src="./front/images/cart-1.png" alt="" />
						</a>
						<p><a href="./index.php?r=home/info/shopcar" class="simpleCart_empty">购物车</a></p>
						<div class="clearfix"> </div>
					</div>
					<div class="box_1">
						<span><br>我的订单</span>
					</div>
					<div class="box_1">
						<span><br>
                            <?php
                                if($this->params['user']){
                                    echo '<a href="./index.php?r=home/info/index">'.$this->params['user'].'</a>';
                                }else{
                                    echo "<a href='./index.php?r=home/index/login'>登录</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href='./index.php?r=home/index/register'>注册</a>";
                                }
                            ?>
                        </span>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--顶部-->
	<!--商店名称-->
	<div class="logo">
		<a href="<?yii\helpers\Url::to(['home/index/index']);?>"><h1>美丽花店</h1></a>
	</div>
	<!--商店名称-->
	<!--菜单条目-->

	<!--菜单条目-->
    <?=$content;?>

	<!--相关信息-->
	<div class="information">
		<div class="container">
			<div class="infor-top">
				<div class="col-md-3 infor-left">
					<h3>关注我们</h3>
					<ul>
						<li><a href="#"><span class="fb"></span><h6>Facebook</h6></a></li>
						<li><a href="#"><span class="twit"></span><h6>Twitter</h6></a></li>
						<li><a href="#"><span class="google"></span><h6>Google+</h6></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>相关消息</h3>
					<ul>
						<li><a href="#"><p>Specials</p></a></li>
						<li><a href="#"><p>New Products</p></a></li>
						<li><a href="#"><p>Our Stores</p></a></li>
						<li><a href="#"><p>Contact Us</p></a></li>
						<li><a href="#"><p>Top Sellers</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>我的账号</h3>
					<ul>
						<li><a href="<?yii\helpers\Url::to(['home/info/index']);?>"><p>我的账号</p></a></li>
						<li><a href="<?yii\helpers\Url::to(['home/info/doc']);?>"><p>我的订单</p></a></li>
						<li><a href="<?yii\helpers\Url::to(['home/info/info']);?>"><p>我的信息</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>联系方式</h3>
					<h4>所有者,
						<span>混·魂,</span>
						北京市昌平区XXX区.</h4>
					<h5>17090866372</h5>
					<p>uoi00@qq.com</p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--相关信息-->
	<!--底部-->
	<div class="footer">
		<div class="container">
			<div align="center" class="footer-top">
				@ 所有权归 魂·魂 所有
			</div>
		</div>
	</div>
	<!--底部-->
</body>
<script type="text/javascript" src="./js/home.js"></script>
</html>