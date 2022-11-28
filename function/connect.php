<?php
	$connect = mysqli_connect("localhost","root","");
	if(!mysqli_select_db($connect,"gatepass")) 
	{
		die("connection error");
	}
?>