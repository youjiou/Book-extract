<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>书面</title>
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
                <li><a href="<?php echo U('Home/Index/mine');?>"> <img src="/project/Public/images/user1.jpg" class="img-circle" /> 账号:<?php echo ($username); ?> </a> </li>
                <li><a href="<?php echo U('Home/Login/login_out');?>"><span class="glyphicon glyphicon-log-out"></span> 注销</a></li>
                <?php  } ?>
            </ul>

        </div>
    </div>
</nav>



<div class="MyHeader">
    <ol class="breadcrumb">
        <li><a href="<?php echo U('Home/Index/index');?>">首页</a></li>
        <li><a href="#">阅读文章</a></li>
    </ol>
</div>

<div class="booklist">
    <div class="row">

        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-md-6">
            <div class="itop"><img src="/project/Public/../Uploads/<?php echo ($vo["imagesrc"]); ?>" alt="" ></div>
            <div class="ibottom">分享 <span class="glyphicon glyphicon-share" > </span></div>
        </div>
        <div class="col-md-6">
            <div class="bookname"><span class="b1">书名:</span>    <?php echo ($vo["bookname"]); ?> </div>
            <div class="bookins">介绍 <br/> <?php echo ($vo["introduction"]); ?></div>
            <div class="readbook">
                <a href="<?php echo U('Home/Index/read');?>?bid=<?php echo ($vo["bid"]); ?>"> <button type="button" class="btn btn-primary btn-lg">开始阅读</button> </a>
            </div>
        </div><?php endforeach; endif; else: echo "" ;endif; ?>

    </div>

</div>



<div class="Myarea">
    <div class="aleft">
        <h2>评论区</h2>

<div class="showms">
<!--    <?php if(is_array($list3)): $i = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i; endforeach; endif; else: echo "" ;endif; ?>-->
    <table class="table table-striped">
        <caption>Your words</caption>
        <thead>
        <tr>
            <th>用户</th>
            <th>评论</th>
            <th>时间</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list3)): $i = 0; $__LIST__ = $list3;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo3["name"]); ?></td>
                <td><?php echo ($vo3["message"]); ?></td>
                <td><?php echo ($vo3["publishedtime"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

        </tbody>
    </table>
</div>


<div class="writer">

        <div class="form-group">
            <label  class="col-sm-2 control-label">内容</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="4" name="message" id="content"  maxlength="50" onkeyup="checkLen(this)"  style="width:400px;font-size: 15px;line-height: 20px;"></textarea>
                <input type="hidden" value="<?php echo ($bid); ?>" id="bookid" />
                <span>您还可以输入 <span id="count">50</span> 个文字</span>
                <button type="submit" class="btn btn-primary" style="margin-left: 90%;" onclick="publish()">发布留言</button>
            </div>
        </div>

</div>
    </div>
    <div class="aright">
        <h2>最新书摘区</h2>
        <table class="table table-striped">
            <caption>记录你的文</caption>
            <thead>
            <tr>
                <th>用户</th>
                <th>书摘</th>
            </tr>
            </thead>
            <tbody>
            <?php if(is_array($list1)): $i = 0; $__LIST__ = $list1;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($vo1["name"]); ?></td>
                <td><?php echo ($vo1["content"]); ?></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>

            </tbody>
        </table>




    </div>
</div>






</body>
<script src="/project/Public/js/jquery-3.2.1.min.js"></script>
<script src="/project/Public/js/bootstrap.min.js"></script>
<script>



    function publish(){
         var content = document.getElementById('content').value;
         var bookid = document.getElementById('bookid').value;
         // console.log(bookid);
         $.post("<?php echo U('Home/Index/publish');?>", {content:content,bid:bookid} ,  function(data) {
         if(data.code=200){
         alert(data.info);
         }else{
         alert(data.info);
         }
         });
        document.getElementById('content').value = "";
    }


    function checkLen(obj)
    {
        var maxChars = 50;//最多字符数
        if (obj.value.length > maxChars)
            obj.value = obj.value.substring(0,maxChars);
        var curr = maxChars - obj.value.length;
        document.getElementById("count").innerHTML = curr.toString();
    }






</script>
</html>