<?php
	ob_start();
	require_once('tmp/getcurrpage.php');
	$cart=$_SESSION['cart'];
	$id=$_GET['id'];
	if($id == 0)
		unset($_SESSION['cart']);
	else
		unset($_SESSION['cart'][$id]);
	if(currPageName()=='index.php')
		header("location: index.php");
	else
		header("location: cart.php");
	exit();
?>