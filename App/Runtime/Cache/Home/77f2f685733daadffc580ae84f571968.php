<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Minimal and Clean Sign up / Login and Forgot Form by FreeHTML5.co</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, html5, css3, mobile first, responsive" />
	

  

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="/project/Public/favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="/project/Public/login/css/bootstrap.min.css">
	<link rel="stylesheet" href="/project/Public/login/css/animate.css">
	<link rel="stylesheet" href="/project/Public/login/css/login.css">
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body class="style-3">

		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-push-3">
					

					<!-- Start Sign In Form -->
					<form action="<?php echo U('Home/Login/doRegister');?>" class="fh5co-form animate-box" method="post" data-animate-effect="fadeInRight"  method="post">
						<h2>注册</h2>
						<!--
						<div class="form-group">
							<div class="alert alert-success" role="alert">Your info has been saved.</div>
						</div>
						-->
						<div class="form-group">
							<label for="UserName" class="sr-only">Name</label>
							<input type="text" class="form-control" id="UserName" name="UserName" placeholder="账号" autocomplete="off" onblur="checkAccount()" required>
                            <div class="show" id="shown" style="color: red;"></div>
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
							<input type="password" class="form-control" id="Password" name="Password" placeholder="密码" autocomplete="off" required>
						</div>
						<div class="form-group">
                        <label for="re-password" class="sr-only">Re-type Password</label>
                        <input type="password" class="form-control"  id="re-password" placeholder="重复密码" autocomplete="off"  onblur="checkpws()" required>
                            <div class="show" id="show" style="color: red;"></div>
                    </div>




                        <div class="form-group">
                            <div style="margin: 30px 0 0 0"><span class="col-md-8">  <p>已经注册？<span > <a href="<?php echo U('Login/index');?>">登陆</a>
							 <a href="#" style="display: none;">忘记密码</a></span></p></span>
                                <span><input type="submit" value="注册" class="btn btn-primary"></span>
                            </div>
                        </div>

					</form>
					<!-- END Sign In Form -->


				</div>
			</div>

		</div>
	
	<!-- jQuery -->
	<script src="/project/Public/login/js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="/project/Public/login/js/bootstrap.min.js"></script>
	<!-- Placeholder -->
	<script src="/project/Public/login/js/jquery.placeholder.min.js"></script>
	<!-- Waypoints -->
	<script src="/project/Public/login/js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="/project/Public/login/js/main.js"></script>
   <script>
       function checkAccount(){
           var shown =document.getElementById("shown");
           var username =  document.getElementById("UserName");
           console.log(username.value.length);
           if(username.value.length< 6 ||username.value.length> 12){
               shown.innerHTML = "您的账号名称长度不符合规范!"   ;
           }else{
               shown.innerHTML = "" ;
           }
       }
       function checkpws(){
           var show = document.getElementById("show");
           var p1 = document.getElementById("Password").value;
           var p2 = document.getElementById("re-password").value;
           if(p1!=p2){ show.innerHTML = "2次密码不相同，请重新输入!"   ;   }else{
               show.innerHTML = "";
           }
       }

       //console.log(show);
   </script>
	</body>
</html>