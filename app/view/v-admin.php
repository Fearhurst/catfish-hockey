<?php include ('include/top.php'); ?>

<div id="page-content">

	<h3>Add a Player</h3>
		
	<div class="row">
		<div class="col">
			<input type="email" name="email" id="email" autocomplete="off" autocapitalize="off" placeholder="Email" />
		</div>
	</div>
	
	<div class="row">
		<div class="col">
			<input type="text" name="password" id="password" placeholder="Password" autocomplete="off" />
		</div>
	</div>
	
	<div class="row">
		<div class="col">
			<input type="text" name="firstname" id="firstname" placeholder="First Name" autocomplete="off" />
		</div>
	</div>
	
	<div class="row">
		<div class="col">
			<input type="text" name="lastname" id="lastname" placeholder="Last Name" autocomplete="off" />
		</div>
	</div>
	
	<div class="row">
		<div class="col">
			<select id="position" name="position">
				<option value="FWD">Forward</option>
				<option value="D">Defence</option>
				<option value="C">Centre</option>
				<option value="LW">Left Wing</option>
				<option value="RW">Right Wing</option>
				<option value="G">Goalie</option>
			</select>
		</div>
	</div>
	
	<div class="row">
		<div class="col">
			<input type="number" name="number" id="number" placeholder="Number" autocomplete="off" />
		</div>
	</div>
	
	<div class="row" style="margin-top: 1em;">
		<div class="col">
			<button id="btnAddUser" class="button">Add</button>
		</div>
	</div>

</div>

<?php include ('include/bottom.php'); ?>