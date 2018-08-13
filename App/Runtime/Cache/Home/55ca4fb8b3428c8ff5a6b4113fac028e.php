<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="/project/Public/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/project/Public/css/custom.css" />
    <style>
        #show{
            display: none;
            position: absolute;
            width: 200px;
            height: 30px;
            line-height: 28px;
            background: 		#7B68EE;
            color: #fff;
            text-align: center;
        }

        #show:hover{
            background: #32c8a3;
        }
    </style>
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

                <li><a href="#"> <img src="/project/Public/images/user1.jpg" class="img-circle" /> 账号:<?php echo ($username); ?> </a> </li>
                <li><a href="<?php echo U('Home/Login/login_out');?>"><span class="glyphicon glyphicon-log-out"></span> 注销</a></li>

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






<div class="container" style="background: #D8D8D8; margin-top:20px; height: auto;;">
    <div id="myDiv">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xx-12 ">
                   <div align="center" class="Rbook">
                       <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="ititle">
                               <?php echo ($vo["bid"]); ?>
                           </div>
                           <div class="intro">
                               <span class="auther">作者 <?php echo ($id); ?><span class="glyphicon glyphicon-user"></span>:<?php echo ($vo["name"]); ?></span>  <span class="itime">发布时间 <span class="glyphicon glyphicon-time"></span> : <?php echo ($vo["publishedtime"]); ?></span>
                           </div>
                           <div class="icontent">
                               <?php
 echo html_entity_decode($list[0]['content']); ?>
                           </div><?php endforeach; endif; else: echo "" ;endif; ?>
                       <div id="show">分享书摘</div>
                       <input type="hidden" value="<?php echo ($id); ?>" id="bookid">
                   </div>
        </div>
   </div>

</div>
</div>






</body>
<script src="/project/Public/js/jquery-3.2.1.min.js"></script>
<script src="/project/Public/js/bootstrap.min.js"></script>
<script>
    (function(){
        var myDiv = document.getElementById("myDiv");
        var isDown = false; //记录鼠标是否没按住 当前没有按下
        var dy = 0; var dx = 0 ; //代表鼠标按下时的XY
        var show = document.getElementById('show');
        var content = null;  //存储选中内容
        //console.log(show);
        //传入要获取其中选择文本的对象
        function getSelectedText(e){
            //IE下获取选择文本
            if (document.selection) {
                return document.selection.createRange().text;
            }
            //firefox下获取选择文本
            else
            if (window.getSelection().toString()) {
                return window.getSelection().toString();
            }
            //firefox下获取input或textArea域的选择文本
            else
            if (e.selectionStart != undefined && e.selectionEnd != undefined) {
                var start = e.selectionStart;
                var end = e.selectionEnd;
                return e.value.substring(start, end);
            }
        }


        myDiv.onmouseup = function(){
            if(getSelectedText(document.body)){
                content = getSelectedText(document.body);
                show.style.display ="block";
                //show.classList.add('on');
            }else{
                show.style.display ="none";
            }
            if (isDown) {
                isDown = false;
            }
        }


        myDiv.onmousemove = function(e){
            if (isDown) {
                var ev = e || event;
                //  console.log(ev.clientY)
                if(dy<ev.clientY){
                    show.style.top = ev.clientY - dy + 'px';
                    show.style.left = ev.clientX - dx + 'px';
                }else if(dy==ev.clientY ||  dx==ev.clientX ){
                    show.style.top = ev.clientY  	+ 'px';
                    show.style.left = ev.clientX  -150 + 'px';
                }
                else{
                    show.style.top =  dy - ev.clientY 	+ 'px';
                    show.style.left =  dx -ev.clientX  + 'px';
                }
            }
        }


        myDiv.onmousedown =function(){
            dx = event.clientX;
            dy = event.clientY;
            if (!isDown) {
                isDown  = true;
            }

        }
        var bookid = document.getElementById('bookid').value;
        show.onclick =    function(){
            console.log(content);
            $.post("<?php echo U('Home/Index/share');?>", {content:content,id:bookid} ,  function(data) {
                if(data.code=200){
                    alert(data.info);
                }else{
                    alert(data.info);}
            });
        }
        //console.log(show);

    })()

</script>
</html>