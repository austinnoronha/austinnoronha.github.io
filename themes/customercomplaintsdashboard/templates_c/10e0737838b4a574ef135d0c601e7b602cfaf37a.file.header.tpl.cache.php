<?php /* Smarty version Smarty-3.1.18, created on 2014-07-03 13:01:24
         compiled from ".\templates\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1561653b53804344507-03344114%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10e0737838b4a574ef135d0c601e7b602cfaf37a' => 
    array (
      0 => '.\\templates\\header.tpl',
      1 => 1404383976,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1561653b53804344507-03344114',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'APP_NAME' => 0,
    'APP_VER' => 0,
    'SITEAPPURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53b538043c1346_87352017',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b538043c1346_87352017')) {function content_53b538043c1346_87352017($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'C:\\xampp\\htdocs\\test\\bootstrap\\themes\\customercomplaintsdashboard\\include\\smarty\\libs\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html>

<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="UTF-8"/>
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['APP_NAME']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['APP_VER']->value;?>
"/>
    <meta name="author" content="<?php echo $_smarty_tpl->tpl_vars['APP_NAME']->value;?>
"/>
    <meta name='robots' content='noindex,follow' />
    <meta name="generator" content="<?php echo $_smarty_tpl->tpl_vars['APP_NAME']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['APP_VER']->value;?>
" />
    <link rel='canonical' href='http://mail.rediff-inc.com/' />
    <link rel='shortlink' href='http://mail.rediff-inc.com/' />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo $_smarty_tpl->tpl_vars['APP_NAME']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['APP_VER']->value;?>
 - <?php echo smarty_modifier_date_format(time(),"%D");?>
</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['SITEAPPURL']->value;?>
home"><?php echo $_smarty_tpl->tpl_vars['APP_NAME']->value;?>
</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo $_smarty_tpl->tpl_vars['SITEAPPURL']->value;?>
login"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['SITEAPPURL']->value;?>
home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Rediffmail Control<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['SITEAPPURL']->value;?>
ngprovisioning">NG Provisioning for Domain</a>
                                </li>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['SITEAPPURL']->value;?>
rprouserstatus">RPRO User Status</a>
                                </li>
                                <li>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['SITEAPPURL']->value;?>
rprouserdetails">RPRO/EPRO User DB Details</a>
                                </li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
<?php }} ?>
