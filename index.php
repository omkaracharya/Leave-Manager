<?php 	

include "core/init.php";
logged_in_redirect();
 
if(empty($_POST)===false){
	$username= $_POST['username_teacher'];
	$password= $_POST['password_teacher'];
	if (empty($username)===true || empty($password)===true) {
		$errors="Please check the all fields";
	}else{
		$id=login($username,$password);
		if($id === false){
			$errors="Username/Password is incorrect";
		}else{
			$_SESSION['id']=$id;
			if(get_user_type($id)==0){
				header("Location:login.php");
			}else{
				header("Location:hod.php");
			}
		}
	}	
}

include "includes/overall/header.php"; 

?>			

<h3>LOGIN</h3>

<form action="index.php" method="POST">
	<ul>
		<li>
			Username:<br>
			<input type="text" name="username_teacher" value="<?php if(isset($username)){ echo $username; }?>" />
		</li>
		<li>
			Password:<br>
			<input type="password" name="password_teacher"/>
		</li>		
		<li>
			<input type="submit" value="Login" />
			<div id="errors"><?php if(isset($errors)){ echo $errors; }?></div>
		</li>
	</ul>
</form>

<?php include "includes/overall/footer.php" ?>		
