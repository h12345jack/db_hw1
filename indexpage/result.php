<!DOCTYPE html>
<html lang="en">
<?php
require "js.php";
?>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>西文文献检索</title>
    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Plugin CSS -->
    <link rel="stylesheet" href="../dist/css/animate.min.css" type="text/css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../dist/css/creative.css" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
     <link href='../dist/css/font.css' rel='stylesheet' type='text/css'>
    <style type="text/css">
    .title1{
        font-family: 'Alegreya', cursive;
        font-size: 150%;
    }
    .title1 strong{
        font-family: 'Alegreya', cursive;
        font-size: 140%;
        font-weight: 200%;
        color:#ff9900;
    }

    .panel-heading{

         font-family: 'Lobster', serif;
    }
    #js{
        font-family: 'Alegreya', serif;
        font-size: 150%;
    }
    .panel-body h3,h4{
        font-family: 'Lobster', serif;
        font-size: 100%;
    }

    }
    </style>
</head>

<body id="page-top">
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" href="index.html">西文文献检索系统前端</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" href="#page-top">关于系统</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="../pages/login.php">登陆后台</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="./index.html#contact">联系我们</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
    <section class="bg-primary small-padding-bottom" id="about">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <form method="post" action="result.php">
                        <div class="input-group input-group-lg ">
                            <input type="text" class="form-control" placeholder="输入您的检索词" name="jsc" id="js">
                            <span class="input-group-btn">
                             <button class="btn btn-default" type="submit">检索一下</button>
                            </span>
                        </div>
                        <div class="input-group input-group-lg">
                            <label class="radio-inline">
                                <input type="radio" name="op" id="inlineRadio1" value="1" checked/> 全文检索
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="op" id="inlineRadio2" value="2"> 作者检索
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="op" id="inlineRadio3" value="3"> 标题检索
                            </label>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="small-padding"  id="about">
        <div class="container">
            <h3 class="col-lg-8" id="js"><?php echo jsc();?></h3>
            <?php resultit();?>
        </div>
    </section>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Plugin JavaScript -->
    <script src="../dist/js/jquery.easing.min.js"></script>
    <script src="../dist/js/jquery.fittext.js"></script>
    <script src="../dist/js/wow.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/creative.js"></script>
</body>

</html>
