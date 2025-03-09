<?php include ('include/top.php'); ?>

<div id="page-content">
			
	<div id="login">
		<form id="frmLogin" method="post" action="login">
			<input type="email" name="email" id="email" autocomplete="off" autocapitalize="off" placeholder="Email" />
			<input type="password" name="password" id="password" placeholder="Password" autocomplete="off" />
			<input type="submit" id="submit" name="submit" class="button" value="Login" />
			<?php
			if (isset($error) && $error != NULL) {
				echo ('<span class="error">' . $error . '</span>');
			}
			?>
		</form>
	</div>

</div>

<?php include ('include/bottom.php'); ?>