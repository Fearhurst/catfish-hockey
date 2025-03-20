<?php include ('include/top.php'); ?>

<div id="page-content">
	
	<div class="row" style="margin-bottom: 40px;">
		<div class="col">
			<img class="logo" src="view/images/logo_catfish.png" />
		</div>
	</div>
	
	<div class="row">
		<div class="col">
			<form id="frmLogin" method="post" action="login">
				
				<div class="row">
					<div class="col">
						<input type="email" name="email" id="email" autocomplete="off" autocapitalize="off" placeholder="Email" />
					</div>
				</div>
				
				<div class="row">
					<div class="col">
						<input type="password" name="password" id="password" placeholder="Password" autocomplete="off" />
					</div>
				</div>
				
				<div class="row" style="margin-top: 1em;">
					<div class="col">
						<input type="submit" id="login-submit" name="submit" class="button" value="Login" />
						<div class="error" style="height: 1em; margin-top: 1em;">
							<?php
							if (isset($error) && $error != NULL) {
								echo ($error);
							}
							?>
						</div>
					</div>
				</div>
				
				<div class="row" style="margin-top: 30px;">
					<div class="col">
						<a href="forgot">Forgot your password?</a>
					</div>
				</div>
			
			</form>
			
		</div>
	</div>

</div>

<?php include ('include/bottom.php'); ?>