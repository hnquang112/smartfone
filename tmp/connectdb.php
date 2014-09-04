<?php
	$server='localhost';
	$username='root';
	$password='';
	$dbname='dienthoai';
	$conn=mysql_connect($server,$username,$password);
	if(!$conn){
		die('khong ket noi được vao sql'.mysql_error($conn));
	}
	mysql_query('set names "utf8"');
	mysql_select_db($dbname) or die('khong ket noi được vao sql'.mysql_error($conn));
	function escape_data($data){
		global $conn;
		if(ini_get('magic_quotes_gpc')){
			$data=stripslashes($data);
		}
		return mysql_real_escape_string($data,$conn);
	}
?>