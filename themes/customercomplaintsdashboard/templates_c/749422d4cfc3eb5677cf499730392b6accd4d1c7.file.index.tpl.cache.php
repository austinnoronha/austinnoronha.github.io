<?php /* Smarty version Smarty-3.1.18, created on 2014-07-03 13:01:24
         compiled from ".\templates\index.tpl" */ ?>
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
  ),
  'nocache_hash' => '1421153b5380422a421-91448710',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'APP_PAGE_HEAD' => 0,
    'SITEAPPURL' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.18',
  'unifunc' => 'content_53b538042a8ae2_76011202',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53b538042a8ae2_76011202')) {function content_53b538042a8ae2_76011202($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array('title'=>'foo'), 0);?>



<div id="page-wrapper">
		<div class="row">
				<div class="col-lg-12">
						<h1 class="page-header"><?php echo $_smarty_tpl->tpl_vars['APP_PAGE_HEAD']->value;?>
</h1>
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



<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 9999, null, array(), 0);?>

<?php }} ?>
