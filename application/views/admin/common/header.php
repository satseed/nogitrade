<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title><?php echo $title; ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url('css/admin'); ?>/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="<?php echo base_url('css/admin'); ?>/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="<?php echo base_url('css/admin'); ?>/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?php echo base_url('css/admin'); ?>/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="<?php echo base_url('css/admin'); ?>/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
        <link href="<?php echo base_url('css/admin'); ?>/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- DataTables CSS -->
        <link href="<?php echo base_url('css/admin'); ?>/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="<?php echo base_url('css/admin'); ?>/dataTables/dataTables.responsive.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

    <div id="wrapper">

        <!-- Navigation -->
       <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url('admin'); ?>">NOGIDIA管理画面</a>
            </div>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search"></i>
                                    </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/users'); ?>" class="active"><i class="fas fa-address-card"></i>ユーザー情報</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/products/lists'); ?>" class="active"><i class="fas fa-table"></i>商品一覧</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/members'); ?>" class="active"><i class="fas fa-users"></i>メンバー一覧</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/login/logout'); ?>" class="active"><i class="fas fa-sign-out-alt"></i>ログアウト</a>
                        </li>
                    </ul>
                </div>
            </div>
       </nav>
       <!-- Navigation -->

       <div id="page-wrapper">
            <!--
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Dashboard</h1>
                </div>
            </div>
            -->
            <!-- /.row -->