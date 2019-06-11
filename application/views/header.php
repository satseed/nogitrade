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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="<?php echo base_url('css/') ?>balay/animate.css">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="<?php echo base_url('css/') ?>balay/icomoon.css">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="<?php echo base_url('css/') ?>balay/bootstrap.css">
    <!-- Flexslider  -->
    <link rel="stylesheet" href="<?php echo base_url('css/') ?>balay/flexslider.css">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="<?php echo base_url('css/') ?>balay/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url('css/') ?>balay/owl.theme.default.min.css">
    <!-- Theme style  -->
    <link rel="stylesheet" href="<?php echo base_url('css/') ?>balay/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

    <!-- Modernizr JS -->
    <script src="<?php echo base_url('js/') ?>modernizr-2.6.2.min.js"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
    <script src="js/respond.min.js"></script>
    <![endif]-->

    <!-- slider -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/slick/') ?>slick.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/slick/') ?>slick-theme.css" media="screen" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    </head>
    <body>
    <div id="colorlib-page">
        <a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
        <aside id="colorlib-aside" role="complementary" class="border js-fullheight">
            <h1 id="colorlib-logo"><a href="<?php echo base_url('home'); ?>">nogidia</a></h1>
            <nav id="colorlib-main-menu" role="navigation">
                <ul>
                    <li class="fh5co-active">
                        <a href="<?php echo base_url('home'); ?>">Home</a>
                    </li>
                    <li class="fh5co-active">
                        <a href="<?php echo base_url('product/all_product_list'); ?>">商品一覧</a>
                    </li>
                    <?php if($log == NULL): ?>
                        <li>
                            <a href="<?php echo base_url('login'); ?>" class="show-kiyaku">ログイン</a>
                        </li>
                    <?php endif; ?>
                    <li class="fh5co-active">
                        <a href="<?php echo base_url('late_list'); ?>">レート表</a>
                    </li>
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
                            <a href="<?php echo base_url('first'); ?>"><span class="first">初めての方</span></a>
                        <?php endif; ?>
                    </li>
                    <li>
                        <?php if($log == 1): ?>
                            <a href="<?php echo base_urL('withdraw/').$access_id; ?>" onClick="return confirm('本当に退会しますか？');">退会する</a>
                        <?php endif; ?>
                    </li>
                    <li>
                        <form id="form2" action="<?php echo base_url('home'); ?>" method="post">
                            <input id="sbox2" name="search" type="text" placeholder="フリーワードを入力"/>
                            <button type="submit" id="sbtn2"><i class="fas fa-search"></i></button>
                        </form>
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
                    <small>&copy; <?php echo date('Y'); ?> TREDIA All Rights Reserved.</small>
                </p>
                <ul>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>
        </aside>
