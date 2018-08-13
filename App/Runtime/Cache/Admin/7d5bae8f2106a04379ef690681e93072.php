<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
	
<title>Admin</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />

<link href="/project/Public/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="/project/Public/css/style.css" rel='stylesheet' type='text/css' />

<!-- Graph CSS -->
<link href="/project/Public/css/font-awesome.css" rel="stylesheet">
<!-- jQuery -->

<!-- //jQuery -->
<link href='http://fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

<!-- lined-icons -->
<style type="text/css">
	a+span{
		cursor:pointer;
		color: red;
	}
	.prev,.num,.next,.current{
	width:auto;
height:auto;
margin:10px;
padding:1px 2px;
}
</style>


	

</head>





<body>

   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
             <!--header start here-->
<!--heder end here-->
	<ol class="breadcrumb">
<div>
		<div class="profile_details w3l" style="float: right;">
				<ul>
					<li class="dropdown profile_details_drop">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
							<div class="profile_img">
								<span class="prfil-img"><img src="/project/Public/images/in11.jpg" alt=""> </span>
								<div class="user-name" >

									<p><span style="color: black;">Administrator</span></p>
								</div>
								<i class="fa fa-angle-down"></i>
								<i class="fa fa-angle-up"></i>
								<div class="clearfix"></div>
							</div>
						</a>
						<ul class="dropdown-menu drp-mnu">
							<li> <a href="<?php echo U('Admin/Admin/login_out');?>"><i class="fa fa-sign-out"></i> Logout</a> </li>
						</ul>
					</li>
				</ul>

			</div>
			<div style="margin-top: 0.5em;">

		<a href="<?php echo U('Admin/Admin/index');?>">Admin</a><span></span><span style="color:black">-></span>
		
		
		</div>

	<div class="clearfix"> </div>
</div>
	</ol>
<!-- table Start -->

<!--four-grids here-->
<div class="four-grids">
			<div class="col-md-3 four-grid">
				<a href="<?php echo U('Admin/Admin/userInfo');?>">
				<div class="four-agileits">
					<div class="icon">
						<i class="glyphicon glyphicon-user" aria-hidden="true"></i>
					</div>
					<div class="four-text">
						<h3>用户</h3>

						<h4>
						<?php echo ($data["usercount"]); ?></h4>

					</div>
					
				</div>
				</a>
			</div>

		<div class="col-md-3 four-grid">
			<a href="<?php echo U('Admin/Admin/bookInfo');?>">
			<div class="four-w3ls">
				<div class="icon">
					<i class="glyphicon glyphicon-hdd" aria-hidden="true"></i>
				</div>
				<div class="four-text">
					<h3>图书</h3>
					<h4><?php echo ($data["bookcount"]); ?></h4>
					
				</div>
				
			</div>
			</a>
		</div>
		<div class="col-md-3 four-grid">
			<a href="#">
			<div class="four-wthree">
				<div class="icon">
					<i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i>
				</div>
				<div class="four-text">
					<h3>书摘</h3>
					<h4><?php echo ($data["digestcount"]); ?></h4>
					
				</div>
				
			</div>
			</a>
		</div>
	<div class="col-md-3 four-grid">
		<a href="#">
		<div class="four-agileinfo">
			<div class="icon">
				<i class="glyphicon glyphicon-edit" aria-hidden="true"></i>
			</div>
			<div class="four-text">
				<h3>评论</h3>
				<h4><?php echo ($data["commentcount"]); ?></h4>
	
			</div>
			
		</div>
		</a>
	</div>
	<div>
		
		
			<br>
		
		</div>
	
	<div class="clearfix" style="margin: 20px;"></div>

	
</div>
<!--//four-grids here-->




<div class="inner-block">

</div>


</div>
  <!--//content-inner-->
			<!--/sidebar-menu-->
	<div class="sidebar-menu">
		<header class="logo1">
<a href="<?php echo U('Admin/index');?>" class="sidebar-icon"> <span class="fa fa-bars"></span> </a>
		</header>
			<div style="border-top:1px ridge rgba(255, 255, 255, 0.15)"></div>
                     <div class="menu">
						<ul id="menu" >
						<li id="menu-academico" ><a href="<?php echo U('Admin/userInfo');?>"><i class="fa fa-th-list" aria-hidden="true"></i><span>管理</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
								<ul id="menu-academico-sub" >
								<li id="menu-academico-avaliacoes" ><a href="<?php echo U('Admin/userInfo');?>">用户信息</a></li>
							<li id="menu-academico-avaliacoes" ><a href="<?php echo U('Admin/authorInfo');?>">作者信息</a></li>
							<li id="menu-academico-avaliacoes" ><a href="<?php echo U('Admin/bookInfo');?>">图书信息</a></li>
							</ul>
						</li>
						<li><a href><i class="fa fa-check-square-o nav_icon"></i><span>审核</span> <span class="fa fa-angle-right" style="float: right"></span><div class="clearfix"></div></a>
						  <ul>
							<li><a href="<?php echo U('Admin/booksCheck');?>"> 作品审核</a></li>
							<li><a href="<?php echo U('Admin/reportAudit');?>">举报审核</a></li>
						</ul>
						</li>
							 <li id="menu-academico" ><a href="<?php echo U('Admin/bookUpload');?>"><i class="fa fa-envelope nav_icon"></i><span>上传</span><div class="clearfix"></div></a></li>

						<li id="menu-academico" ><a href="<?php echo U('Admin/rank');?>"><i class="fa fa-bar-chart"></i><span>排行榜</span> <div class="clearfix"></div></a>
						<!--	<ul>
							<li><a href="<?php echo U('Admin/rank');?>"> 书摘/评论</a></li>
							<li><a href="<?php echo U('Admin/rank2');?>">年/月</a></li>
						</ul> -->
						</li>


					  </ul>
					</div>
				  </div>

				</div>



</body>
<!-- Bootstrap Core JavaScript -->

	<script src="/project/Public/js/jquery-2.1.4.min.js"></script>
<script src="/project/Public/js/bootstrap.min.js"></script>

<!--<script src="/project/Public/js/myjs.js"></script> -->
<!-- tablesorter -->
		<script type="text/javascript" src="/project/Public/js/jquery-latest.js"></script>
		<script type="text/javascript" src="/project/Public/js/jquery.tablesorter.js"></script>
		<script type="text/javascript">
		$(function() {
			$("table").tablesorter({debug: true});
		});
		</script>

<script>
function del2(obj,id,loca){
		$.post(loca,{id:id},function(data){
			if(data==1){
				$(obj).parent().parent().remove();
				alert('success');
			}else{

			alert('effor');
			}
		});
}



function abook(obj,id){
		$.post('/project/index.php/Admin/Admin/test',{id:id},function(data){
			if(data){
				let arr=[];
				for(let i=0;i<data.length;i++){
					arr[i]=data[i]['bookname'];
				}
				alert(arr)
				}
		});
}

</script>






</html>