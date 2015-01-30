<?php /*%%SmartyHeaderCode:1421153b5380422a421-91448710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1404383985,
      2 => 'file',
    ),
    '10e0737838b4a574ef135d0c601e7b602cfaf37a' => 
    array (
      0 => '.\\templates\\header.tpl',
      1 => 1404383976,
      2 => 'file',
    ),
    '1be7ff7fdee636597edd726ee98dfef4bfd55d1f' => 
    array (
      0 => '.\\templates\\footer.tpl',
      1 => 1404384127,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1421153b5380422a421-91448710',
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53b55049000952_41266851',
  'has_nocache_code' => false,
  'cache_lifetime' => 300,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b55049000952_41266851')) {function content_53b55049000952_41266851($_smarty_tpl) {?><!DOCTYPE html>
<html>

<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta charset="UTF-8"/>
    <meta name="description" content="Rediffmail Customer Complaint Dashboard v1.0"/>
    <meta name="author" content="Rediffmail Customer Complaint Dashboard"/>
    <meta name='robots' content='noindex,follow' />
    <meta name="generator" content="Rediffmail Customer Complaint Dashboard v1.0" />
    <link rel='canonical' href='http://mail.rediff-inc.com/' />
    <link rel='shortlink' href='http://mail.rediff-inc.com/' />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Rediffmail Customer Complaint Dashboard v1.0 - 07/03/14</title>

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
                <a class="navbar-brand" href="http://localhost/test/bootstrap/themes/customercomplaintsdashboard/?mod=home">Rediffmail Customer Complaint Dashboard</a>
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
                        <li><a href="http://localhost/test/bootstrap/themes/customercomplaintsdashboard/?mod=login"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
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
                            <a href="http://localhost/test/bootstrap/themes/customercomplaintsdashboard/?mod=home"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Rediffmail Control<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="http://localhost/test/bootstrap/themes/customercomplaintsdashboard/?mod=ngprovisioning">NG Provisioning for Domain</a>
                                </li>
                                <li>
                                    <a href="http://localhost/test/bootstrap/themes/customercomplaintsdashboard/?mod=rprouserstatus">RPRO User Status</a>
                                </li>
                                <li>
                                    <a href="http://localhost/test/bootstrap/themes/customercomplaintsdashboard/?mod=rprouserdetails">RPRO/EPRO User DB Details</a>
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



<div id="page-wrapper">
		<div class="row">
				<div class="col-lg-12">
						<h1 class="page-header">Dashboard</h1>
				</div>
				<!-- /.col-lg-12 -->
		</div>
		<!-- /.row -->
		
		<div class="row">
			<div class="col-lg-12">
					<div class="panel panel-default">
							<div class="panel-heading">
									Control Center
							</div>
							<!-- .panel-heading -->
							<div class="panel-body">
									<ul>
										<li>
												<a href="http://localhost/test/bootstrap/themes/customercomplaintsdashboard/?mod=ngprovisioning">NG Provisioning for Domain</a>
										</li>
										<li>
												<a href="http://localhost/test/bootstrap/themes/customercomplaintsdashboard/?mod=rprouserstatus">RPRO User Status</a>
										</li>
										<li>
												<a href="http://localhost/test/bootstrap/themes/customercomplaintsdashboard/?mod=rprouserdetails">RPRO/EPRO User DB Details</a>
										</li>
									</ul>
							</div>
							<!-- .panel-body -->
					</div>
					<!-- /.panel -->
			</div>
			<!-- /.col-lg-12 -->
	</div>
	<!-- /.row -->
</div>
<!-- /#page-wrapper -->



    </div>
    <!-- /#wrapper -->

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>

</body>

</html>

<?php }} ?>
