<!DOCTYPE html>
<html lang="en-US">
<head>
    <title>美丽花店</title>
    <base href="<?=\yii\helpers\Url::base(true);?>/">
    <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css" />
    <script type="text/javascript" src="./public/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
        <!--
        .li1{
            margin-right: 30px;
        }
        .footer{
            width: 100%;
            margin-top: 20px;
            position: absolute;
            height: 50px;
            font: 18px bold;
            background-color: lightgray;
            text-align: center;
            bottom: 0%;
        }
        #main{
            margin-top: 2px;
        }
        .bana{
            float: left;
            height: 100px;
            margin-left: 13%;
        }
        .logo{
            height: 100px;
        }
        
        .search{
            margin-top: 35px;
            margin-left: 20px;
            float: left;
            height: 48px;
            border: 1px black solid;
            padding: 1px;
        }
        .con{
            height: 40px;
        }
        .content{
            border: none;
            font-size: 24px;
        }
        .clear{
            border: none;
        }
        .s_btn{
            background-color: #00bbee;
            height: 40px;
            width: 60px;
            border: none;
        }
        #dz1{
            height: 50px;
        }
        -->
    </style>
</head>
<body>
    <nav class="navbar-default navbar-fixed-top navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#navbar-collapse">
                    <span class="sr-only">切换导航</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=\yii\helpers\Url::to(['home/index/index'])?>">美丽花店</a>
            </div>
            <div class="navbar-nav navbar-right nav" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active li1"><a href="#">账号</a></li>
                    <li class="li1"><a href="#">购物车</a></li>
                    <li class="li1"><a href="#">我的订单</a></li>
                    <li class="dropdown li1">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            客户服务 <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="#">配送范围</a></li>
                            <li><a href="#">售后服务</a></li>
                            <li class="divider"></li>
                            <li><a href="#">留言反馈</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div style="height: 50px;width: 100%"></div>
    <div id="main">
        <div class="bana">
            <img src="./img/logo.png" class="logo">
        </div>
        <div class="search" align="center">
            <form action="<?=yii\helpers\Url::to(['home/index/search'])?>" method="post">
                <span class="con">
                    <input type="text" class="content" placeholder="请输入搜索内容">
                    <button class="clear"><img src="./img/del.svg" style="height: 40px"></button>
                </span>
                <button class="s_btn">搜索</button>
            </form>
        </div>
        <div style="height: 100px;width: 100%"></div>
        <div>
            <?=$content?>
        </div>
    </div>
    <div id="dz1"></div>
    <footer class="footer">
        @所有权归 混·魂 所有
    </footer>
</body>
<script type="text/javascript">
    $('.content').on('keyup',function(){
        $('.clear').show();
    });
    $('.clear').click(function(){
        $('.content').val('');
    });
</script>
</html>


