<?php 
	include "core/init.php"; 
?>

<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Leave Manager</title>
		<link rel="stylesheet" href="css/style3.css" />
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
				<h3>LEAVE APPLICATIONS
					<a id="logout" href="logout.php">Logout</a>
				</h3>
				<div id="errors"><?php if(isset($errors)){ echo $errors; }?></div>
			
				<div id="leave_requests">
					<table border="1" width="400" cellpadding="10" cellspacing="1">
						<tr>
							<td><b>Teacher Name<b></td>						
						</tr> 
						<?php 
							$query=mysql_query("SELECT `teachers`.`first_name`, `teachers`.`last_name`, `teachers`.`username` FROM `teachers` INNER JOIN `leave_details` ON `teachers`.`id`=`leave_details`.`teacher_id` ");
							while($row=mysql_fetch_array($query)){?>
							<tr>	
								<td><a href="leave.php?id=<?=get_user_id($row['username'])?>"><?php echo $row['first_name'] . " " . $row['last_name']; ?></a></td>
							</tr>
							<?php }
						?>	
					</table>
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