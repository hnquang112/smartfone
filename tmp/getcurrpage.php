<?php
function currPageURL(){
	$pageURL='http';
	if($_SERVER["HTTPS"]=="on")
		$pageURL .= "s";
	$pageURL .= "://";
	if($_SERVER["SERVER_PORT"]!="80")
		$pageURL.=$_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	else
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	return $pageURL;
}
 
function currPageName(){
	return substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
}
?>