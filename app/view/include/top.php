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
		
		<script>const home_url = '<?php echo ($cfg["url"]); ?>';</script>
		
	</head>

	<body>
