<?php
/**
 * Created by PhpStorm.
 * User: Olalekan
 * Date: 05/10/2017
 * Time: 9:15 PM
 */
?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.graygrids.com/themes/engage/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 04 Oct 2017 12:53:42 GMT -->
<head>
    <meta charset="utf-8">
    <!-- Viewport Meta Tag -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Edtel | Integrated Systems
    </title>
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <!-- Main Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
    <!-- Slicknav Css -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/slicknav.css">
    <!-- Color Switcher -->
<!--    <link rel="stylesheet" type="text/css" href="--><?php //echo base_url();?><!--assets/css/color-switcher.css">-->
    <!-- Responsive Style -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/responsive.css">
    <!--Fonts-->
    <link rel="stylesheet" media="screen" href="<?php echo base_url();?>assets/fonts/font-awesome/font-awesome.min.css">
    <link rel="stylesheet" media="screen" href="<?php echo base_url();?>assets/fonts/simple-line-icons.css">

    <!-- Extras -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/extras/owl/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/extras/owl/owl.theme.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/extras/animate.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/extras/normalize.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/extras/settings.css">

    <!-- Color CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/colors/green.css" media="screen" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js">
    </script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js">
    </script>
    <![endif]-->
    <style>
        li.nav-item.dropdown:hover{
            background-color: #9c3;
            color: #ffffff !important;
            /*border-radius: 10px 10px 10px 10px;*/
        }
        #main-menu .nav-link:hover {
            background-color: #9c3 !important;
            color: #ffffff !important;
        }
    </style>
</head>
<body>

<!-- Header area wrapper starts -->
<header id="header-wrap">
    <!-- Navbar Starts -->
    <nav class="navbar navbar-expand-md">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index-2.html">
<!--                    <img src="assets/img/logo.png" alt="">-->
                   <div style="font-size: 26px;">Edtel Systems</div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="main-menu">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">

                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url()?>">Home <span class="sr-only">(current)</span></a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="<?php echo base_url();?>#about-us" aria-haspopup="true" aria-expanded="false">About Us</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="<?php echo base_url();?>#other-services" aria-haspopup="true" aria-expanded="false">Services</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="<?php echo base_url();?>#showcase" aria-haspopup="true" aria-expanded="false">Showcase</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="portfolio-col-2.html">Portfolio 2 Columns</a>
                            <a class="dropdown-item" href="portfolio-col-3.html">Portfolio 3 Columns</a>
                            <a class="dropdown-item" href="portfolio-col-4.html">Portfolio 4 Columns</a>
                            <a class="dropdown-item" href="portfolio-item.html">Portfolio Single</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="<?php echo site_url('home/blog')?>" aria-haspopup="true" aria-expanded="false">Blog</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" aria-haspopup="true" aria-expanded="false">Contact Us</a>
                    </li>
                </ul>
            </div>

            <!-- Mobile Menu Start -->
            <ul class="wpb-mobile-menu">
                <li>
                    <a href="index-2.html">Home</a>
                </li>

                <li>
                    <a href="<?php echo base_url();?>#about-us">About Us</a>
                </li>

                <li>
                    <a href="<?php echo base_url();?>#other-services">Services</a>
                </li>

                <li>
                    <a href="<?php echo base_url();?>#showcase">Showcase</a>
                </li>

                <li>
                    <a href="#">Blog</a>
                </li>

                <li>
                    <a href="#">Contact Us</a>
                </li>
            </ul>
            <!-- Mobile Menu End -->
        </div>
    </nav>