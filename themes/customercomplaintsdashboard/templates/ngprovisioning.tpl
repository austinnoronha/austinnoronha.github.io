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
									NG Information
							</div>
							<!-- .panel-heading -->
							<div class="panel-body">
									<form role="form" name="frm1" id="frm1" action="{$APP_FORM_CONTROL_URL}/NGMobileorders.php" method="get">
										<div class="form-group">
												<label>Domain Name</label>
												<input class="form-control" type="text" name="domain" id="domain" value="" maxlength="30" required /> 
												<p class="help-block">Please enter the valid PRO or EPRO domain name.</p>
										</div>

										<button class="btn btn-default" type="submit">Submit</button>
										<button class="btn btn-default" type="reset">Reset</button>
									</form>
									<!-- /form -->
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
