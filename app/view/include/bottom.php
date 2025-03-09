		<?php 
		getJS_mod('jquery/dist/jquery.min');
		getJS('universal',1);
		if (isset($required_js)) { foreach ($required_js as $library => $external) { getJS($library, $external); } }
		?>
		
	</body>

</html>