<?php 

function sanitize($string){
	return mysql_real_escape_string($string);
}

?>