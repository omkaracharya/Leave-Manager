<?php 

//include "general.php";

function array_sanitize(&$item){
	$item = mysql_real_escape_string($item);
}

function leave_apply($leave_data){
	array_walk($leave_data, 'array_sanitize');
	$fields= '`' . implode('`, `', array_keys($leave_data)) . '`';
	$data= '\'' . implode('\', \'', $leave_data) . '\'';
	$query="INSERT INTO `leave_details` ($fields) VALUES ($data)";
	mysql_query($query);	
}

function display_all(){
	$query=mysqli_query("SELECT * FROM `teachers`");
	return $query; 
}

function get_user_id($username){		
	return mysql_result(mysql_query("SELECT `id` FROM `teachers` WHERE `username`='$username'"),0);
}

function get_user_name($id){		
	return mysql_result(mysql_query("SELECT CONCAT(`first_name`,' ',`last_name`) FROM `teachers` WHERE `id`='$_SESSION[id]'"),0); 
}

function get_user_name_for_hod($id){		
	return mysql_result(mysql_query("SELECT CONCAT(`first_name`,' ',`last_name`) FROM `teachers` WHERE `id`='$id'"),0); 
}

function get_user_type($id){		
	return mysql_result(mysql_query("SELECT `type` FROM `teachers` WHERE `id`='$_SESSION[id]'"),0); 
}


function get_username($id){
	return mysql_result(mysql_query("SELECT `username` FROM `teachers` WHERE `id`=$_SESSION[id]"),0); 	
}


function login($username,$password){
	$user_id=get_user_id($username);
	$username=sanitize($username);
	$password=md5($password);
	$query="SELECT COUNT(`id`) FROM `teachers` WHERE `username`='$username' AND `password`='$password'";
	return (mysql_result(mysql_query($query), 0)==1)? $user_id : false;
}

function logged_in_redirect(){
	if(is_logged_in() === true){
		header("Location: login.php");
		exit();
	}
}

function hod_logged_in(){
	if(is_logged_in() === true && get_user_type($_SESSION['id']) == 1){
		return true;
	}
}

function is_logged_in(){
	return (isset($_SESSION['id'])) ? true : false;
}

function teacher_available_leaves($id){
	$query="SELECT `leaves_available` FROM `teachers` WHERE `id`=$id";
	return mysql_result(mysql_query($query), 0);	
}

function teacher_leave_status($id){
	$username=get_username($id);
	$query="SELECT `status` FROM `leave_details` WHERE `username`= '$username'";
	return mysql_result(mysql_query($query), 0);	
}

?>