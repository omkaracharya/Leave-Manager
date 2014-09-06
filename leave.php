<?php 
	include "core/init.php"; 
?>

<link rel="stylesheet" href="css/style4.css" />

<?php	

	if(hod_logged_in()){
		include "includes/overall/header.php";
		if(isset($_GET)===true &&empty($_GET)===false){
			$id=$_GET['id'];
			$query= mysql_query("SELECT * FROM `leave_details` WHERE `teacher_id`=$id");
			while($row=mysql_fetch_array($query)){
			?>
			<table border="1" width="1000" cellpadding="20" cellspacing=1>
				<tr>
					<td><b>Teacher Name<b></td>
					<td><b>Type<b></td>
					<td><b>Remarks<b></td>
					<td><b>From Date<b></td>																
					<td><b>To Date<b></td>
				</tr> 
				<tr>
					<td>
						<?php echo get_user_name_for_hod($id)."<br>";?>
					</td>
					<td>
						<?php echo $row['type']."<br>";?>
					</td>	
					<td>
						<?php echo $row['remarks']."<br>";?>
					</td>	
					<td>
						<?php echo $row['from_date']."<br>";?>
					</td>	
					<td>
						<?php echo $row['to_date']."<br>";?>
					</td>	
				</tr>
			</table>

			<?php }?>
			
			<form action="hod.php" method="POST">
				<input type="submit" value="Approve" name="approve">
				<input type="submit" value="Reject" name="reject">
			</form>
			<?php

		}





		include "includes/overall/footer.php";
	}else{
		header("Location:index.php");
	}
?>