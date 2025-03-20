<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<title><?php echo ($pagedata['title']); ?></title>
		<?php
		// Include page CSS
 		getCSSmod('chota/dist/chota.min');
		getCSS('universal');
		if (isset($required_css)) { foreach ($required_css as $library) { getCSS($library); } }
		?>
		
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,400;0,600;1,300;1,400;1,600&display=swap" rel="stylesheet">
		
		<link rel="apple-touch-icon" sizes="180x180" href="./view/images/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="./view/images/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="16x16" href="./view/images/favicon-16x16.png">
		<link rel="manifest" href="manifest.json">
		
		<script>const home_url = '<?php echo ($cfg["url"]); ?>';</script>
		
	</head>

	<body>
		
		<header>
		
			<div id="hamburger">
				<input id="menu__toggle" type="checkbox" />
				<label class="menu__btn" for="menu__toggle"></label>
				<ul class="menu__box">
					<li><a class="menu__item" href="schedule">Schedule</a></li>
					<li><a class="menu__item" href="roster">Roster</a></li>
					<li><a class="menu__item" href="#">Beer</a></li>
					<li><hr /></li>
					<li><a class="menu__item" href="logout">Logout</a></li>
				</ul>
			</div>
		
<!--
			<div id="hamburger">
				<input id="menu__toggle" type="checkbox" />
				<label class="menu__btn" for="menu__toggle">
					<span></span>
				</label>
				<ul class="menu__box">
					<li><a class="menu__item" href="schedule">Schedule</a></li>
					<li><a class="menu__item" href="roster">Roster</a></li>
					<li><a class="menu__item" href="#">Beer</a></li>
					<li><hr /></li>
					<li><a class="menu__item" href="logout">Logout</a></li>
				</ul>
			</div>
-->

			<span class="header-title">Catfish Hockey</span>

		</header>