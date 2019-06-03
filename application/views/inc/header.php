<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>Dashboard</title>
        <!--favicon-->
        <link rel="icon" href="<?php echo base_url(); ?>assets/images/favicon.ico" type="image/x-icon">
        <!-- notifications css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/notifications/css/lobibox.min.css"/>
        <!-- Vector CSS -->
        <link href="<?php echo base_url(); ?>assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
        <!-- simplebar CSS-->
        <link href="<?php echo base_url(); ?>assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
        <!-- Bootstrap core CSS-->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet"/>
        <!-- animate CSS-->
        <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet" type="text/css"/>
        <!-- Icons CSS-->
        <link href="<?php echo base_url(); ?>assets/css/icons.css" rel="stylesheet" type="text/css"/>
        <!-- Sidebar CSS-->
        <link href="<?php echo base_url(); ?>assets/css/sidebar-menu.css" rel="stylesheet"/>
        <!-- Custom Style-->
        <link href="<?php echo base_url(); ?>assets/css/app-style.css" rel="stylesheet"/>
    </head>
    <body>
        <!-- Start wrapper-->
        <div id="wrapper">
            <!--Start sidebar-wrapper-->
            <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
                <div class="brand-logo">
                    <a href="index-2.html">
                        <img src="<?php echo base_url(); ?>assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
                        <h5 class="logo-text"> RiskLab</h5>
                    </a>
                </div>
                <div class="user-details">
                    <div class="media align-items-center collapsed">
                        <div class="avatar"><img class="mr-3 side-user-img" src="<?php echo base_url(); ?>assets/images/avatars/avatar-4.png" alt="user avatar"></div>
                        <div class="media-body">
                            <h6 class="side-user-name"><?php echo $an ?></h6>
                        </div>
                    </div>
                </div>
                <?php if ($ar == 'Administrator') {
                ?>
                <ul class="sidebar-menu do-nicescrol">
                    <li class="sidebar-header">MAIN NAVIGATION</li>
                    <li><a href="<?php echo base_url('admin') ?>" class="waves-effect"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                    <li><a href="<?php echo base_url('admin/getcomplaints') ?>" class="waves-effect"><i class="fa fa-eye"></i> All Complaints</a></li>
                    <li class="sidebar-header">SETTINGS</li>
                    <li><a href="<?php echo base_url('admin/rooms') ?>" class="waves-effect"><i class="fa fa-eye"></i> Rooms</a></li>                    
                    <li><a href="<?php echo base_url('admin/flaws') ?>" class="waves-effect"><i class="fa fa-eye"></i> Flaws</a></li>
                </ul>
                <?php
                } else { 
                ?>
                <ul class="sidebar-menu do-nicescrol">
                    <li class="sidebar-header">MAIN NAVIGATION</li>
                    <li><a href="<?php echo base_url('admin/getcomplaints') ?>" class="waves-effect"><i class="fa fa-eye"></i> All Complaints</a></li>
                </ul>
                <?php 
                } ?>

            </div>
            <!--End sidebar-wrapper-->
            <!--Start topbar header-->
            <header class="topbar-nav">
                <nav class="navbar navbar-expand fixed-top gradient-ibiza">
                    <ul class="navbar-nav mr-auto align-items-center">
                        <li class="nav-item">
                            <a class="nav-link toggle-menu" href="javascript:void();">
                            <i class="icon-menu menu-icon"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center right-nav-link">
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                            <span class="user-profile"><img src="<?php echo base_url(); ?>assets/images/avatars/avatar-17.png" class="img-circle" alt="user avatar"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right animated fadeIn">
                                <li class="dropdown-item user-details">
                                    <a href="javaScript:void();">
                                        <div class="media">
                                            <div class="avatar"><img class="align-self-start mr-3" src="<?php echo base_url(); ?>assets/images/avatars/avatar-17.png" alt="user avatar"></div>
                                            <div class="media-body">
                                                <h6 class="mt-2 user-title"><?php echo $an ?></h6>
                                                <p class="user-subtitle"><?php echo $ae ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li class="dropdown-item"><i class="icon-power mr-2"></i> <a href="<?php echo base_url('admin/logout') ?>">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </header>
            <!--End topbar header-->
            <div class="clearfix"></div>