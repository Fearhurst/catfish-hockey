<?php

require_once('./vendor/autoload.php');

// Postmark
use Postmark\PostmarkClient;
use Postmark\Models\PostmarkAttachment;
use Postmark\Models\PostmarkException;

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

function sendPasswordResetEmail($to, $action_url) {
    
	global $db;
	global $cfg;
	
	//SET VALUES FOR EMAIL
	$PM_to              = $to;
	$PM_tag 			= $cfg['pm_tag'];
	$PM_template 		= $cfg['pm_template'];
	$PM_variables		= array(
		"action_url" 	=> $action_url,
		"product_name"	=> "Catfish Hockey"
	);
			
	try {
		
		$client = new PostmarkClient($cfg['pm_api_token']);
		$sendResult = $client->sendEmailWithTemplate(
			$cfg['pm_from_email'], 	        // $from
			$PM_to, 						// $to
			$PM_template,					// $templateId
			$PM_variables,					// $templateModel
			true,							//$inlineCss = true
			$PM_tag,						//$tag = NULL
			true,							//$trackOpens = true
			NULL,							//$replyTo = NULL
			NULL,							//$cc = NULL
			NULL,							//$bcc = NULL
			NULL,							//$headers = NULL
			NULL,							//$attachments = NULL
			/*[								
				"Name"			=> $PM_filename,
				"Content"		=> $PM_base64,
				"ContentType" 	=> "image/jpeg"
			],*/					
			"HtmlAndText"					//$trackLinks = NULL
		);

		//print_r ($sendResult);
		$postmark_result = $sendResult->Message;

		if ($postmark_result == "OK") {
			return ($postmark_result);
			//return $sendResult->messageid;
		
		} else {
			return -1;
		
		}

	} catch(PostmarkException $ex) {
		// If client is able to communicate with the API in a timely fashion,
		// but the message data is invalid, or there's a server error,
		// a PostmarkException can be thrown.
		$postError  = $ex->HttpStatusCode . '<br>';
		$postError .= $ex->message . '<br>';
		$postError .= $ex->PostmarkApiErrorCode;

		$output = array('result' => 'Postmark Error', 'postmark_result' => $postError, 'message' => 'Unable to send email');
		exit(json_encode($output));
		return -1;

	} catch(Exception $generalException) {
		// A general exception is thrown if the API
		// was unreachable or times out.
		$postError = $generalException->getMessage();
		$output = array('result' => 'General Error', 'postmark_result' => $postError, 'message' => 'Unable to send email');
		exit(json_encode($output));
		return -1;
	}
	
}

?>