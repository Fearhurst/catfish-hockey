<?php include ('include/top.php'); ?>

<div id="page-content">
	
	<div class="row" style="margin-bottom: 40px;">
		<div class="col">
			<img class="logo" src="view/images/logo_catfish.png" />
		</div>
	</div>
	
	<div class="row">
		<div class="col">
			
			<?php
				switch ($reset_step) {
					case 'prompt' :	
			?>
			
					<form id="frmForgot" method="post" action="forgot">
						
						<div class="row">
							<div class="col">
								<h2>Enter your new password</h2>
							</div>
						</div>
						
						<div class="row">
							<div class="col">
								<input type="password" name="password" id="password" autocomplete="off" autocapitalize="off" placeholder="Password" />
								<input type="hidden" name="selector" id="selector" value="<?php echo($_GET['s']); ?>" />
								<input type="hidden" name="token" id="token" value="<?php echo($_GET['t']); ?>" />
							</div>
						</div>
						
						<div class="row" style="margin-top: 1em;">
							<div class="col">
								<input type="submit" id="submit" name="submit" class="button" value="Submit" />
								<div class="error" style="height: 1em; margin-top: 1em;">
									<?php
									if (isset($error) && $error != NULL) {
										echo ($error);
									}
									?>
								</div>
							</div>
							
						</div>
					
					</form>
			
				<?php 
					break;
					
					case 'link' :
				?>
					
					<div class="row">
						<div class="col">
							<h2>Thanks!</h2>
							<p>Check your email for the link.</p>
						</div>
					</div>
					
				<?php
					break;
		
					case 'start' :
				?>
			
					<form id="frmForgot" method="post" action="forgot">
						
						<div class="row">
							<div class="col">
								<p>Enter your email and I'll send you a link&nbsp;to&nbsp;reset&nbsp;it.</p>
							</div>
						</div>
						
						<div class="row">
							<div class="col">
								<input type="email" name="email" id="email" autocomplete="off" autocapitalize="off" placeholder="Email" />
							</div>
						</div>
						
						<div class="row" style="margin-top: 1em;">
							<div class="col">
								<input type="submit" id="submit" name="submit" class="button" value="Submit" />
								<div class="error" style="height: 1em; margin-top: 1em;">
									<?php
									if (isset($error) && $error != NULL) {
										echo ($error);
									}
									?>
								</div>
							</div>
							
						</div>
					
					</form>
			
				<?php
					break;
					
					case 'complete' :
				?>
				
					<div class="row">
						<div class="col">
							<p>Your password has been reset, and you're logged in.</p>
							<a href="schedule" class="button">Great, now when's the next game?</a>
						</div>
					</div>
				
				<?php break;
			
				} ?>
			
		</div>
	</div>

</div>

<?php include ('include/bottom.php'); ?>