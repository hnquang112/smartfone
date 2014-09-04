<?php
	include("connectdb.php");
	if(isset($_GET['u']) and !empty($_GET['u'])){
		$sql="SELECT * FROM khachhang WHERE tendn='".$_GET['u']."'";
		$query=mysql_query($sql);
		if(mysql_num_rows($query)>0)
			echo "0";
		else
			echo "1";
	}
	else echo "2";
?>