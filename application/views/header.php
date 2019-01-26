<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

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
	<link rel="shortcut icon" href="favicon.ico">

	<link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="../../css/balay/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../../css/balay/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../../css/balay/bootstrap.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="../../css/balay/flexslider.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="../../css/balay/owl.carousel.min.css">
	<link rel="stylesheet" href="../../css/balay/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="../../css/balay/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="border js-fullheight">
			<h1 id="colorlib-logo"><a href="index.html">nogidia</a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li class="fh5co-active">
						<a href="<?php echo base_url('home'); ?>">Home</a>
					</li>
					<?php if($log == NULL): ?>
						<li>
							<a href="<?php echo base_url('login'); ?>">ログイン</a>
						</li>
					<?php endif; ?>
					<li>
						<?php if($log == 1): ?>
							<a href="<?php echo base_url('product'); ?>">出品する</a>
						<?php else: ?>
							<a href="<?php echo base_url('registration'); ?>">会員登録</a>
						<?php endif; ?>
					</li>
					<li>
						<?php if($log == 1): ?>
							<a href="<?php echo base_url('mypage/').$access_id ?>"; ?>マイページ</a>
						<?php endif; ?>
					</li>
					<li>
						<?php if($log == 1): ?>
							<a href="<?php echo base_url('profile/').$access_id ?>"; ?>プロフィール</a>
						<?php endif; ?>
					</li>
					<li>
						<?php if($log == 1): ?>
							<a href="<?php echo base_url('email_password/').$access_id ?>"; ?>メール・パスワード変更</a>
						<?php endif; ?>
					</li>
					<li>
						<?php if($log == 1): ?>
							<a href="<?php echo base_url('logout'); ?>">ログアウト</a>
						<?php else: ?>
							<a href="contact.html">Contact</a>
						<?php endif; ?>
					</li>
					<li>
						<?php if($log == 1): ?>
							<a href="<?php echo base_urL('withdraw/').$access_id; ?>"; ?>退会する</a>
						<?php endif; ?>
					</li>
				</ul>
			</nav>

			<div class="colorlib-footer">
				<p>
					<p>
						<small>
							<?php if($log != 0): ?>
								<?php echo $nickname.'さん。こんにちは！'; ?>
							<?php endif; ?>
						</span>
					</p>
					<small>&copy; 2018 TREDIA All Rights Reserved.</small>
				</p>
				<ul>
					<li><a href="#"><i class="fa fa-facebook"></i></a></li>
					<li><a href="#"><i class="fa fa-twitter"></i></a></li>
					<li><a href="#"><i class="fa fa-instagram"></i></a></li>
					<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
				</ul>
			</div>

		</aside>
