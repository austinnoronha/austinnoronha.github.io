{include file="header.tpl" title=foo}


<div id="page-wrapper">
		<div class="row">
				<div class="col-lg-12">
						<h1 class="page-header">{$APP_PAGE_HEAD}</h1>
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
												<a href="{$SITEAPPURL}ngprovisioning">NG Provisioning for Domain</a>
										</li>
										<li>
												<a href="{$SITEAPPURL}rprouserstatus">RPRO User Status</a>
										</li>
										<li>
												<a href="{$SITEAPPURL}rprouserdetails">RPRO/EPRO User DB Details</a>
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



{include file="footer.tpl"}
