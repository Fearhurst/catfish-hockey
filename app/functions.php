<?php

function getCSS($lib) {
	global $cfg;
	
	$lib_version = explode("?",$lib);
	$lib = $lib_version[0];
	$version = isset($lib_version[1]) ? "?".$lib_version[1] : "";
	
	//$output = '<link href="'.$cfg['url'].'/view/css/'.$lib.'.css'.$version.'" rel="stylesheet" type="text/css" />';
	$output = '<link href="view/css/'.$lib.'.css'.$version.'" rel="stylesheet" type="text/css" />';
	echo ($output."\n\t\t");
}

function getCSSmod($lib) {
	global $cfg;
	
	$output = '<link href="node_modules/' . $lib . '.css" rel="stylesheet" type="text/css" />';
	echo ($output."\n\t\t");
}

function getJS($lib, $hosted) {
	global $cfg;
	if ($hosted == 1) {
		$lib_version = explode("?",$lib);
		$lib = $lib_version[0];
		$version = isset($lib_version[1]) ? "?".$lib_version[1] : "";

		$output = '<script src="view/js/'.$lib.'.js'.$version.'" type="text/javascript"></script>';
	} else {
		$output = '<script src="'.$lib.'" type="text/javascript"></script>';
	}
	echo ($output."\n\t\t");
}

function getJS_mod($lib) {
	global $cfg;
	$lib_version = explode("?", $lib);
	$lib = $lib_version[0];
	$version = isset($lib_version[1]) ? "?".$lib_version[1] : "";
	$output = '<script src="node_modules/' . $lib . '.js' . $version . '" type="text/javascript"></script>';
	echo ($output."\n\t\t");
}

function trim_value(&$value) {
	$value = trim($value);
}

?>