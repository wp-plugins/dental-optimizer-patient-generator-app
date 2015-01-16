<div id="ps_dental_admin">
	<div id="main">
		<div class="content-holder">
			<h1>Build A Patient Generator Application</h1>
			<div id="twocolumns">
				<div class="column-layout">
					<article class="content-block">
						<div class="inner">
						<div class="ps_usage">
								<h3><?php _e( 'Usage', 'ps_dwc' ); ?></h3>
								<ol style="margin-left:2em;">
									<li style="list-style-type:decimal;"><?php _e( 'Authenticate to dental optimizer by providing login information.', 'ps_dwc' ); ?></li>
									<li style="list-style-type:decimal;"><?php _e( 'After completing all of the three steps, insert following code in the content area. (<strong>Use HTML mode</strong>)', 'ps_dwc' ); ?>
									<br /><code>[ps-dental-widget-code]</code></li>
									<li style="list-style-type:decimal;"><?php _e( 'You can use dental widget to display in side bar in widget section.', 'ps_dwc' ); ?></li>
								</ol>
								<br>
								<br>
							</div>
							<div style="margin-top:10px;" class="logdiv" style="display:block;">
								<form method="post" onsubmit="return false;">
									<h2>Login</h2><br>
									<b>Username</b><br><br>
									<input type="text" name="ps_uname" id="ps_uname" size="40">
									<i>Dental Optimizer account username</i><br><br>
									<b>Password</b><br><br>
									<input type="password" name="ps_pwd" id="ps_pwd" size="40">
									<i>Dental Optimizer account password</i><br><br>
									<div class="submit">
										<div class="btn-holder"> 
											<div style="float:left;">
												Don't have an account <br><a class="anc_regdiv" href="javascript:void(0);">Create your free account here</a>
											</div>
											<a style="border-radius:0px;float:right;" onclick="submitform()" href="javascript:void(0);" class="button layout">Submit</a>
										</div>
									</div>
								</form>
							</div>
							<div style="margin-top:10px;display:none;" class="regdiv" >
								<form method="post" onsubmit="return false;">
									<h2>Registration</h2><br>
									<b>Username</b><br><br>
									<input type="text" name="ps_uname1" id="ps_uname1" size="40">
									<i>Please enter username for Dental Optimizer account</i><br><br>
									<b>Email</b><br><br>
									<input type="text" name="ps_email" id="ps_email" size="40">
									<i>Please enter email for Dental Optimizer account</i><br><br>
									<b>Zip</b><br><br>
									<input type="text" name="ps_zip" id="ps_zip" size="40">
									<i>Please enter zip for Dental Optimizer account</i><br><br>
									<b>Select Role</b><br><br>
									<select id="ps_role" name="ps_role" class="ps_role" style="width:280px;"><option value="no">Select Role</option><option value="patient">Patient</option><option value="dentist">Dentist</option></select>
									<i>Please select role for Dental Optimizer account</i><br><br>
									<div class="submit">
										<div class="btn-holder"> 
											<div style="float:left;">
												Already have an account <br><a class="anc_logdiv" href="javascript:void(0);">Please click here to Login</a>
											</div>
											<a style="border-radius:0px;float:right;" onclick="submitformReg()" href="javascript:void(0);" class="button layout">Submit</a>
										</div>
									</div>
								</form>
							</div>
						</div>
					</article>
					<aside id="sidebar">
						<div class="block">
							<div class="ad-holder" id="addwidget">
								<div id="wi_dental_cont"></div>
								<script language="javascript" src="<?=$siteurlremote;?>/ps-dental-widget-js.php?u=<?=$default_widget_key;?>"></script>
							</div>
						</div>
					</aside>
				</div>
			</div>
		</div>
	</div>
</div>