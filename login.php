<?php 
	include "core/init.php"; 

	if(empty($_POST)===false){
		if(empty($_POST['remarks'])===true||empty($_POST['from_date'])===true||empty($_POST['to_date'])===true){
			$errors="Please check the all fields";
		}else{
			$days=(strtotime($_POST['to_date'])-strtotime($_POST['from_date']))/(3600*24);
			if ($_POST['from_date']>$_POST['to_date']) {
				$errors="Please check your leave dates";
			}elseif (teacher_available_leaves($_SESSION['id'])<$days) {
				$errors="You don't have enough leaves";
			}elseif (teacher_leave_status($_SESSION['id'])==2) {
				$errors="You already have a pending leave application";
			}
			else{
				$leave_data=array(
					'username' 		=> mysql_result(mysql_query("SELECT `username` FROM `teachers` WHERE `id`='$_SESSION[id]'"),0),
					'type'			=> $_POST['type'],
					'remarks'		=> $_POST['remarks'],
					'to_date'		=> $_POST['to_date'],
					'from_date'		=> $_POST['from_date'],
					'days'			=> $days,
					'status'		=> 2,
					'teacher_id'	=> $_SESSION['id']
				);

				leave_apply($leave_data);
				$errors="Leave application has been successfully submitted to HOD";
			}
		}
	}

?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Leave Manager</title>
		<link rel="stylesheet" href="css/style2.css" />
	</head>

	<body>
		<header>
			<div class="top_header">
			<a href="index.php"><img src="includes/overall/logo.png" alt="logo" width="100px" height="100px" /></a>
				<h1>Leave Application</h1>
				<h3>Pune Institute of Computer Technology, Pune</h3>
			</div>
		</header>

		<?php 
		if(isset($_SESSION['id'])){?>
			<div class="apply">
				<h3>LEAVE APPLICATION
					<a id="logout" href="logout.php">Logout</a>
				</h3>
				<div id="errors"><?php if(isset($errors)){ echo $errors; }?></div>
				<form action="" method="POST">
					<ul>
					    <li>
						   Name: <?php echo get_user_name($_SESSION['id']);?> 
						</li>
					    <li>
						    Leave Type:
			                <select name="type">
			                <option value="vl" selected>Vacation Leave</option>
			                <option value="sl">Sick Leave</option>
							<option value="al">Administrative Leave</option>
							<option value="gl">Leave For Appointment by Governer</option>
							<option value="el">Emergency Leave</option>
							<option value="cl">Child Care Leave</option>
							<option value="other">other</option>
			                </select>
						<li>
							From:
							<input type="date" name="from_date" id="date">
							To:
							<input type="date" name="to_date" id="date">
						</li>
						<li>
						    Remarks:<br>
			                <textarea rows="3" cols="30" name="remarks">
			                </textarea>
						</li>
						<li>
							<input type="submit" value="Submit" id="button">
						</li>
					</ul>
				</form>
				<div id="vertical_line">
				</div>
				<div id="available_leaves">
					<p id="total_leaves">
						You have <?php echo teacher_available_leaves($_SESSION['id']);?> leaves.
					</p>
				</div>
				<div id="leave_status">
					<p id="total_leaves">
						<?php 
							$status=teacher_leave_status($_SESSION['id']);
							switch($status){
								case 0: echo "Your leave application has been rejected";
								break;
								case 1: echo "Congrats! Your leave application has been accepted";
								break;
								case 2: echo "Your leave application is pending";
								break;								
							}							
						?>
					</p>
				</div>
			</div>
		<?php
			include 'includes/overall/footer.php'; 
	
		}else{
			header("Location:index.php");
		}
	?>
	</body>
</html>