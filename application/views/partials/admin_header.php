<?php
/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 12/10/2017
 * Time: 1:41 AM
 */
?>
<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo $tab ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="<?php echo base_url()?>adminassets/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <!-- Custom Theme files -->
    <link href="<?php echo base_url(); ?>adminassets/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>adminassets/css/style.css" rel='stylesheet' type='text/css' />
    <link href="<?php echo base_url()?>adminassets/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo base_url();?>adminassets/css/sweetalert.css" rel="stylesheet" type="text/css"/>
    <script src="<?php echo base_url()?>adminassets/js/jquery.min.js"> </script>
    <script src="<?php echo base_url()?>adminassets/js/bootstrap.min.js"> </script>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url()?>adminassets/js/jquery.metisMenu.js"></script>
    <script src="<?php echo base_url()?>adminassets/js/jquery.slimscroll.min.js"></script>
    <!-- Custom and plugin javascript -->
    <link href="<?php echo base_url()?>adminassets/css/custom.css" rel="stylesheet">
    <script src="<?php echo base_url()?>adminassets/js/screenfull.js"></script>
    <script>
        $(function () {
            $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

            if (!screenfull.enabled) {
                return false;
            }



            $('#toggle').click(function () {
                screenfull.toggle($('#container')[0]);
            });



        });
    </script>



</head>
<body>
<div id="wrapper">
 
    <div class="navbar-default navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <h1 style="background-color: #ffffff!important;"> <a class="navbar-brand" href="<?php echo site_url('admin/index')?>">Edtel CMS</a></h1>
        </div>
        <div class=" border-bottom">
<!--            <div class="full-left">-->
<!--                <div class="clearfix"> </div>-->
<!--            </div>-->
            <div class="clearfix">

            </div>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">

                        <li>
                            <a href="<?php echo site_url('admin/index')?>" class=" hvr-bounce-to-right"><i class="fa fa-dashboard nav_icon "></i><span class="nav-label">Dashboard</span> </a>
                        </li>

                        <li>
                            <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-shopping-cart nav_icon"></i> <span class="nav-label">Products</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo site_url('admin/addProductCategory')?>" class=" hvr-bounce-to-right"> <i class="fa fa-pencil-square-o nav_icon"></i>Add Product Category</a></li>

                                <li><a href="<?php echo site_url('admin/addProduct')?>" class=" hvr-bounce-to-right"><i class="fa fa-cart-plus nav_icon"></i>Add Product</a></li>

                                <li><a href="<?php echo site_url('admin/allProduct')?>" class=" hvr-bounce-to-right"><i class="fa fa-list-alt nav_icon"></i>All Product</a></li>

                                <li><a href="<?php echo site_url('admin/orders')?>" class=" hvr-bounce-to-right"><i class="fa fa-shopping-bag nav_icon"></i>Orders</a></li>

                            </ul>
                        </li>

                        <li>
                            <a href="#" class=" hvr-bounce-to-right"><i class="fa fa-newspaper-o nav_icon"></i> <span class="nav-label">Blog</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?php echo site_url('admin/createPost')?>" class=" hvr-bounce-to-right"> <i class="fa fa-bullhorn nav_icon"></i>Create Post</a></li>

                                <li><a href="<?php echo site_url('admin/allPost')?>" class=" hvr-bounce-to-right"><i class="fa fa-eye nav_icon"></i>View Posts</a></li>

                                <li><a href="<?php echo site_url('admin/viewcomments')?>" class=" hvr-bounce-to-right"><i class="fa fa-book nav_icon"></i>Comments</a></li>

                            </ul>
                        </li>

                        <li>
                            <a href="<?php echo site_url('admin/access')?>" class=" hvr-bounce-to-right"><i class="fa fa-user nav_icon"></i> <span class="nav-label">Access Control</span></a>
                        </li>

                        
                        <li>
                            <a href="<?php echo site_url('auth/signout')?>" class=" hvr-bounce-to-right"><i class="fa fa-power-off nav_icon"></i> <span class="nav-label">Sign Out</span></a>
                        </li>

                    </ul>
                </div>
            </div>
    </div>
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="content-main">
