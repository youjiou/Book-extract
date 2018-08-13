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
	
	<link rel="stylesheet" href="/project/Public/css/bootstrap.min.css">
	<link rel="stylesheet" href="/project/Public/css/animate.css">
	<link rel="stylesheet" href="/project/Public/css/login.css">


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
					<form action="<?php echo U('Admin/Admin/doLogin');?>" class="fh5co-form animate-box" method="post" data-animate-effect="fadeInRight">
						<h2>管理员登陆</h2>
						<div class="form-group">
							<label for="username" class="sr-only">Username</label>
							<input type="text" class="form-control" id="UserName" name="UserName" placeholder="用户名" required autocomplete="off">
						</div>
						<div class="form-group">
							<label for="password" class="sr-only">Password</label>
							<input type="password" class="form-control" id="Password" name="Password" placeholder="密码" required autocomplete="off">
						</div>


						<div class="form-group">
							<input type="submit" value="Sign In" class="btn btn-primary">
						</div>
					</form>
					<!-- END Sign In Form -->


				</div>
			</div>

		</div>
	
	<!-- jQuery -->
	<script src="/project/Public/js/jquery.min.js"></script>
	<!-- Bootstrap -->
	<script src="/project/Public/js/bootstrap.min.js"></script>
	<!-- Placeholder -->
	<script src="/project/Public/js/jquery.placeholder.min.js"></script>
	<!-- Waypoints -->
	<script src="/project/Public/js/jquery.waypoints.min.js"></script>
	<!-- Main JS -->
	<script src="/project/Public/js/main.js"></script>

	</body>
</html>