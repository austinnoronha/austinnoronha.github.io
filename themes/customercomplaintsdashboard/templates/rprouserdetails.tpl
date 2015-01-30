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
									RPRO/EPRO User Information
							</div>
							<!-- .panel-heading -->
							<div class="panel-body">
									<form role="form" name="frm1" id="frm1" action="{$APP_FORM_CONTROL_URL}/proUserDbDetails.php" method="get">
										<div class="form-group">
												<label>Email ID</label>
												<input class="form-control" type="email" name="email" id="email" value="" maxlength="100" required /> 
												<p class="help-block">Please enter the valid PRO or EPRO email ID.</p>
										</div>

										<div class="form-group">
											<label>Domain Type</label>
											<div class="radio">
													<label>
															<input type="radio" checked="" value="pro" id="rdDomainType1" name="domain">Pro User
													</label>
											</div>
											<div class="radio">
													<label>
															<input type="radio" value="epro" id="rdDomainType2" name="domain">Epro User
													</label>
											</div>
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
