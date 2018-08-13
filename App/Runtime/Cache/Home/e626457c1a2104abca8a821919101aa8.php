<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>

	<meta charset="utf-8">
	<title>www.h2design.com</title>
	<meta name="description" content="Free Html5 Templates and Free Responsive Themes Designed by Kimmy | zerotheme.com">
	<meta name="author" content="www.zerotheme.com">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <!-- CSS
  ================================================== -->
	<link rel="stylesheet" href="/project/Public/css/css/zerogrid.css">
	<link rel="stylesheet" href="/project/Public/css/css/style.css">
    <link rel="stylesheet" href="/project/Public/css/css/responsive.css">
	<link rel="stylesheet" href="/project/Public/css/css/responsiveslides.css" />
	<link href='./images/favicon.ico' rel='icon' type='image/x-icon'/>
    <link  rel="stylesheet" href="/project/Public/css/bootstrap.min.css" />
	
	<script src="/project/Public/js/js/jquery.min.js"></script>
    <script src="/project/Public/js/js/people.js"></script>
    <script src="/project/Public/js/bootstrap.min.js"></script>
	<script src="/project/Public/js/js/responsiveslides.js"></script>
</head>
<style>
html{
	height:100%}
body{height:100%;}	
.container{
	height:800px;
	margin-bottom:0%;
}
.main{
	height:auto;}
.mgs{
	width:100%;

}
.mgs .mgs_b{
	font-size:15px;	
	padding:3% 0% 0% 3%;
	
}
.mgs .menu_li{
	margin-top:2.5%;
	width:100%;
	height: 30px;
	background:#cccccc;
}
li { float:left;padding:0px 0 5px 12px; line-height:25px;}
.mgs .menu_li ul li:hover {}
.mgs .menu_li ul li a{
	font-size: 13px; line-height:14px;color: #686868;display: block;padding: 6px 10px 6px 10px;margin-bottom: 5px;z-index: 6;position: relative;font-weight:bold;
}
.mgs .menu_li ul li:hover a{color:#000;}
.menu_content{
	margin:10px;
	height: auto;
	text-align:left;
}
</style>
<body>
<div class="container">
<!--------------Header--------------->
<header style=""> 
	
  <nav style="float:left; background:#DCD1B1; margin-left:10% !important; position:relative;">
		<ul class="menu" style="float:left; ">
			<li><a href="<?php echo U('Home/Index/index');?>">书城</a></li>
			<li><a href="<?php echo U('Home/Index/people');?>">我的</a></li>			
		</ul>
   </nav>
   
   
    <div style=" float:right; margin-top:6%; margin-right:25%;">
            <input type="search" placeholder="Search" style=" padding:5px; width:auto; background-color:#F6F6F6; 
            position:absolute; right:25%; top:39%;border:solid 2px #851916;"/>
            <input type="text" onClick="" readonly style="width:30px;height:23px; background:url(/project/Public/images/images/search.jpg) no-repeat;background-size:100% 100% !important; position:absolute; right:26%; top:41%;">
            
            
            <input type="button" onClick="" value="搜索" 
            style="height:29px;padding:3.95px;width:auto; background-color:#F6F6F6;position:absolute; right:21.5%; top:39%; border-radius:0 15px 15px 0; border:solid 2px #851916;"/>
        
    </div>
</header>
<div class="main">
	<div class="zerogrid">	
    	<div class="mgs">	
            <div class="mgs_b">

            </div>
            <div class="menu_li">
                <ul>

                    <li><a href="#menu_content" onClick="menus(3)" id="menu3">书籍上传</a></li>
                    <li><a href="#menu_content" onClick="menus(4)" id="menu4">个人信息</a></li>
                    <li><a href="#menu_content" onClick="menus(5)" id="menu5">修改密码</a></li>
                </ul>
            </div>
            <div class="menu_content">
                <div id="book_say" style="display:block;">书评</div>
                
                <div id="book_get" style="display:none;">书摘</div>
                
                <div id="thinks" style="display:none;">
                
                <form role="form" enctype="multipart/form-data"  method="post" action="/project/index.php/Home/Index/upload">
                                <div class="form-group">
                                    <label for="name">书名</label>
                                    <input type="text" class="form-control" id="name" placeholder="请输入名称" style="width: 55%;">
                                </div>
                                <div class="form-group">
                                    <label for="name">书名介绍</label>
                                    <textarea class="form-control" rows="3" style="width: 80%;"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="imgsrc">封面上传</label>
                                    <input type="file" name="photo"  id="imgsrc"/>
                                </div>

                                <div class="form-group">
                                    <label for="name">内容</label>
                                    <textarea class="form-control" rows="8" style="width: 100%;"></textarea>
                                </div>

                                <div class="col-md-2 col-md-offset-10"><button type="submit" class="btn btn-default">提交</button></div>
                            </form>
                </div>
                
                <div class="single_people" id="single_people" style="display:none;">
                	<table width="50%" >
                    	<tr><th>用户名：</th><td><input type="text" value="杨某" onclick="disp_prompt(this)" readonly></td></tr>
                        <tr><th>性别：</th><td>
                        <input type="text" value="无" onclick="disp_prompt1(this)" readonly id="nosex">
                        <div style="display:none;" id="xysex">
                            <input type="radio" name="sex" value="男" onChange="disp_prompt1(1)"> 男&nbsp;
                            <input type="radio" name="sex" value="女" onChange="disp_prompt1(1)"> 女
                        </div>
                        </td></tr>
                        <tr><th></th><td></td></tr>
                    </table>
                </div>
                
                <div class="change_pass" id="change_pass" style="display:none;">
                	<table width="50%" style="border-collapse:separate; border-spacing:0px 10px;">
                    	<tr><th>密码：</th><td><input type="password" style="border:#ccc double; padding:2px; border-radius:15px;"></td></tr>
                        <tr ><th><input type="button" value="确认修改" onclick="lert()" style="padding:2px; border-radius:5px;" id="12"></th><td></td></tr>
                    </table>
                </div>
            </div>
         </div>
    </div>
</div>
</body>
<script>
function lert(){
 alert(ok);
}
</script>
</html>