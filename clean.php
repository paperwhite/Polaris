<?php
function clean($dirtyphp){	
	require_once '/home/paperwhite/Downloads/htmlpurifier-4.7.0/library/HTMLPurifier.auto.php';
    	$config = HTMLPurifier_Config::createDefault();
    	$config->set('Core.LexerImpl','DirectLex');
    	$purifier = new HTMLPurifier($config);
    	$string = HTMLPurifier_Encoder::cleanUTF8($dirtyphp);
    	$string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
	return $string;
	}
?>
