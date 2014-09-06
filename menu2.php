<!DOCTYPE html>

<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Leave Manager</title>
		<link rel="stylesheet" href="style.css" />
	</head>

	<body>
		<header>
			<div class="top_header">
			<a href="index.php"><img src="logo.png" alt="logo" width="100px" height="100px" /></a>
				<h1>Leave Management System</h1>
				<h3>Pune Institute of Computer Technology, Pune</h3>
			</div>
		</header>

		<div class="login_teacher">
			<h3>Teacher's Login</h3>
			<form action="" method="POST">
				<ul>
					<li>
						Username:<br>
						<input type="text" name="username_teacher"/>
					</li>
					<li>
						Password:<br>
						<input type="password" name="password_teacher"/>
					</li>		
					<li>
						<input type="submit" value="Login" />
					</li>
				</ul>
			</form>
		</div>
		<div class="login_hod">
			<h3>HOD's Login</h3>
			<form action="" method="POST">
				<ul>
					<li>
						Username:<br>
						<input type="text" name="username_hod"/>
					</li>
					<li>
						Password:<br>
						<input type="password" name="password_hod"/>
					</li>		
					<li>
						<input type="submit" value="Login" />
					</li>
				</ul>
			</form>
		</div>






	</body>
</html>