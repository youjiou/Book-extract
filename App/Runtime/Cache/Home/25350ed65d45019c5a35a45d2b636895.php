<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>搜索</title>
    <link rel="stylesheet" href="/project/Public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/project/Public/css/custom.css" />
</head>
<body>

<nav class="navbar navbar-fixed-top my-navbar top-nav" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#example-navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">sharedYourBook</a>
        </div>
        <div class="collapse navbar-collapse" id="example-navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li>    <form class="navbar-form navbar-left" role="search">
                    <div class="form-group">
                        <input type="text" class="form-control search-text" placeholder="Search" style="width: 265px; height: 36.5px;">
                    </div>
                    <button type="submit" class="btn btn-default btn-search-ico"><span class="glyphicon glyphicon-search" style="height: 10.5px;"></span> </button>
                </form></li>
                <?php if(!$uid){ ?>
                <!--    <?php echo U('Terrace/ckpt?id='.$msg['glid']);?>-->
                <li><a href="<?php echo U('Home/Login/index');?>"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
                <?php  }else{ ?>
                <li><a href="#"> <img src="/project/Public/images/user1.jpg" class="img-circle" /> 账号:<?php echo ($username); ?> </a> </li>
                <li><a href="<?php echo U('Home/Login/login_out');?>"><span class="glyphicon glyphicon-log-out"></span> 注销</a></li>
                <?php  } ?>
            </ul>

        </div>
    </div>
</nav>

<div class="MyHeader">
    <ol class="breadcrumb">
        <li><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
        <li><a href="#">搜索页面</a></li>
    </ol>
</div>

<div class="MyContent">
    <div class="searchH">
        <span class="	glyphicon glyphicon-zoom-out">搜索結果/ SEARCH</span>
    </div>
    <div class="searchContent">

        <div class="row">
         <div class="col-md-9">

             <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-sm-6 col-md-4">
             <div class="thumbnail">
                 <img src="/project/Public/../Uploads/201807/aa1.jpg"
                      alt="通用的占位符缩略图" style="height: 100%;width: 90%;">
                 <div class="caption" style="margin-bottom: -15px; right: 10%;">
                     <span class="col-md-8" ><?php echo ($vo["bookname"]); ?></span>
                     <p >
                         <span class="col-md-6"></span>
                         <a href="#" class="btn btn-default" role="button" style="left: 50%;">
                             <span class="glyphicon glyphicon-heart" style="color:grey;text-shadow: black 5px 3px 3px;"></span>
                         </a>
                     </p>
                 </div>
             </div>
         </div><?php endforeach; endif; else: echo "" ;endif; ?>

         </div>





         <div class="col-md-3"></div>








        </div>




    </div>
</div>





</body>
<script src="/project/Public/js/jquery-3.2.1.min.js"></script>
<script src="/project/Public/js/bootstrap.min.js"></script>
</html>