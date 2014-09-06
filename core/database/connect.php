<?php 
	$connect_error="Ooops something went wrong!!";
	mysql_connect('localhost','root','') or die($connect_error);
	mysql_select_db('db_leave_manager') or die($connect_error);
?>