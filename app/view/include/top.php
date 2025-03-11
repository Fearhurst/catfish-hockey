<!DOCTYPE html>
<html>
	<head>

		<title><?php echo ($pagedata['title']); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		
		<?php
		// Include page CSS
 		getCSSmod('chota/dist/chota.min');
		getCSS('universal');
		if (isset($required_css)) { foreach ($required_css as $library) { getCSS($library); } }
		?>
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&display=swap" rel="stylesheet">
		
		<script>const home_url = '<?php echo ($cfg["url"]); ?>';</script>
		
	</head>

	<body>
		
		<header class="is-center">
			<div class="row">
				<div class="col is-paddingless is-marginless">
					
<!-- 					<div class="hamburger-menu"> -->
						<input id="menu__toggle" type="checkbox" />
						<label class="menu__btn" for="menu__toggle">
							<span></span>
						</label>
						<ul class="menu__box">
							<li><a class="menu__item" href="#">Schedule</a></li>
							<li><a class="menu__item" href="#">Roster</a></li>
							<li><a class="menu__item" href="#">Beer</a></li>
							<li><hr /></li>
							<li><a class="menu__item" href="logout">Logout</a></li>
						</ul>
<!-- 					</div> -->
					  
					<span class="header-title">Catfish Hockey</span>
				</div>
			</div>
		</header>