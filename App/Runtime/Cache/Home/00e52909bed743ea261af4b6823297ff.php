<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/project/Public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/project/Public/css/custom.css" />

</head>
<body data-spy="scroll" data-target="#myScrollspy">

<nav class="navbar navbar-fixed-top my-navbar" role="navigation">
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
                <li>    <form class="navbar-form navbar-left" role="search" action="/project/index.php/Home/Index/search" method="post">
                    <div class="form-group">
                        <input type="search" class="form-control search-text"  placeholder="Search" name="keys" style="width: 265px; height: 36.5px;">
                    </div>
                    <button type="submit" class="btn btn-default btn-search-ico"><span class="glyphicon glyphicon-search" style="height: 10.5px;"></span> </button>
                </form></li>
                <?php if(!$uid){ ?>
                <!--    <?php echo U('Terrace/ckpt?id='.$msg['glid']);?>-->
                <li><a href="<?php echo U('Home/Login/index');?>"><span class="glyphicon glyphicon-log-in"></span> 登录</a></li>
                <?php  }else{ ?>
                <li><a href="<?php echo U('Home/Index/mine');?>"> <img src="/project/Public/images/user1.jpg" class="img-circle" /> 账号:<?php echo ($username); ?> </a> </li>
                <li><a href="<?php echo U('Home/Login/login_out');?>"><span class="glyphicon glyphicon-log-out"></span> 注销</a></li>
                <?php  } ?>
            </ul>

        </div>
    </div>
</nav>

<div class="bg"></div>


<div class="container">
    <div class="row">
        <div class="col-xs-2" id="myScrollspy">
            <ul class="nav nav-tabs nav-stacked" data-spy="affix" data-offset-top="100">
                <li class="active"><a href="#section-1">最新区域</a></li>
                <li><a href="#section-2">最火区域</a></li>
                <li><a href="#section-3">排行榜</a></li>
            </ul>
        </div>


        <div class="col-xs-10">
            <h2 id="section-1">最新区域</h2>
            <div class="row">

                <?php if(is_array($list1)): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                     <a href="/project/index.php/Home/Index/book?bid=<?php echo ($vo["bid"]); ?>" >  <img src="/project/Public/../Uploads/<?php echo ($vo["imagesrc"]); ?>"
                             alt="" style="height: 100%;width: 90%;">
                     </a>
                        <div class="caption" style="margin-bottom: -15px; right: 10%;">
                            <span class="col-md-12" >书名 <?php echo ($vo["bookname"]); ?> </span>
                            <p >
                               <span class="col-md-8" > 作者  <?php echo ($vo["name"]); ?></span>
                                    <span  id="like" class="glyphicon glyphicon-heart" style="color:grey;"></span>
                            </p>
                        </div>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>

                </div>



            <hr>
            <h2 id="section-2">最火区域</h2>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <img src="/project/Public/../Uploads/201807/aa1.jpg"
                             alt="通用的占位符缩略图" style="height: 100%;width: 90%;">
                        <div class="caption" style="margin-bottom: -15px; right: 10%;">
                            <span class="col-md-8" >书名</span>
                            <p >
                                <span class="col-md-6">作者</span>
                                    <span class="glyphicon glyphicon-heart" style="color:grey;text-shadow: black 5px 3px 3px;"></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <hr>
            <h2 id="section-3">排行榜</h2>
           <div style="float: left;width: 50%">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>前十高书摘量文章</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($digest)): $i = 0; $__LIST__ = $digest;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo22): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($vo22["bookname"]); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                </tbody>
            </table>
           </div>


            <div style="float: left;width: 50%">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>前十高评论量文章</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if(is_array($comment)): $i = 0; $__LIST__ = $comment;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo33): $mod = ($i % 2 );++$i;?><tr><td><?php echo ($vo33["bookname"]); ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
            </div>




            <hr>






        </div>

        </div>


</div>








<script src="/project/Public/js/jquery-3.2.1.min.js"></script>
<script src="/project/Public/js/bootstrap.min.js"></script>
<script>
    $(window).scroll(function () {
        if ($(".navbar").offset().top > 50) {$(".navbar-fixed-top").addClass("top-nav");
        }else {$(".navbar-fixed-top").removeClass("top-nav");}
    })
</script>
<script>
    (function(){
        var like =document.getElementById('like'),
                isLike =false;;

        console.log(like);
        like.onclick =function(){

                     if(isLike){
                        like.style.color = "grey";    isLike =false;;
                     }else{
                         like.style.color = "red";    isLike =true;;
                     }
        }
    }) ()
</script>




</body>
</html>