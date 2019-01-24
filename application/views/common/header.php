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
        <link href="http://sattriomph.xsrv.jp/css/bootstrap.min.css" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="http://sattriomph.xsrv.jp/css/metisMenu.min.css" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="http://sattriomph.xsrv.jp/css/timeline.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="http://sattriomph.xsrv.jp/css/startmin.css" rel="stylesheet">

        <!-- Morris Charts CSS -->
        <link href="http://sattriomph.xsrv.jp/css/morris.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="http://sattriomph.xsrv.jp/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- DataTables CSS -->
        <link href="http://sattriomph.xsrv.jp/css/dataTables/dataTables.bootstrap.css" rel="stylesheet">

        <!-- DataTables Responsive CSS -->
        <link href="http://sattriomph.xsrv.jp/css/dataTables/dataTables.responsive.css" rel="stylesheet">

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
                <a class="navbar-brand" href="<?php echo base_url('admin'); ?>">トレディア管理画面</a>
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
                                        <i class="fa fa-search"></i>
                                    </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/users'); ?>" class="active"><i class="glyphicon glyphicon-user fa-fw"></i>ユーザー情報</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('admin/login/logout'); ?>" class="active"><i class="fa fa-check"></i>ログアウト</a>
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