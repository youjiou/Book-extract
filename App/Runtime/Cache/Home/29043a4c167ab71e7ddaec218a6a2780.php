<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">


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
				<div class="col-md-4 col-md-push-8">
					

					<!-- Start Sign In Form -->
					<form action="<?php echo U('Home/Login/login');?>" class="fh5co-form animate-box" data-animate-effect="fadeInRight">
						<h2 align="center">登录</h2>
						<div class="form-group">
							<label for="username" class="sr-only">Username</label>
							<input type="text" class="form-control" id="UserName" name="UserName" placeholder="用户名" autocomplete="off" required>
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
							<input type="password" class="form-control" id="Password" name="Password" placeholder="密码" autocomplete="off" required>
						</div>

                        <div class="form-group">
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="codetext" placeholder="验证码">
                            </div>
                            <div class="col-sm-5">
                                <input type="button" id="checkCode" class="code form-control" onclick="createCode()" />
                            </div>
                        </div>

						<div class="form-group">
                          <div style="margin: 100px 0 0 0"><span class="col-md-8">  <p>没有账号？<span ><a href="<?php echo U('/Home/Login/register');?>">注册</a>
							 <a href="#" style="display: none;">忘记密码</a></span></p></span>
							<span> <input type="submit" value="Sign In" class="btn btn-primary" onclick="return validate()" > </span>
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

     <script src="/project/Public/login/js/code.js"></script>
	</body>
</html>