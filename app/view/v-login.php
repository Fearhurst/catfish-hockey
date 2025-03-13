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
				
				<div class="row">
					<div class="col">
						<input type="submit" id="submit" name="submit" class="button" value="Login" />
						<?php
						if (isset($error) && $error != NULL) {
							echo ('<span class="error">' . $error . '</span>');
						}
						?>
					</div>
				</div>
				

			
			</form>
		</div>
	</div>

</div>

<?php include ('include/bottom.php'); ?>