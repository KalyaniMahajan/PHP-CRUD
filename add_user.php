<?php
	if(count($_POST)>0) {
		require_once("config.php");
		$sql = "INSERT INTO users (userName, password, firstName, lastName) VALUES ('" . $_POST["userName"] . "','" . $_POST["password"] . "','" . $_POST["firstName"] . "','" . $_POST["lastName"] . "')";
		mysqli_query($conn,$sql);
		$current_id = mysqli_insert_id($conn);
		if(!empty($current_id)) {
			$message = "New User Added Successfully";
			header("location: index.php");
		}
	}
?>
<html>
	<head>
		<title>Add New User</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
	<form name="frmUser" method="post" action="">
		<div class="container">
			<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
			<div align="right" style="padding-bottom:5px;"><a href="index.php" class="link">
				<img alt='List' title='List' src='images/list.png' width='15px' height='15px'/> List User</a></div>
				<table border="0" cellpadding="10" cellspacing="0" align="center" class="tblSaveForm container">
					<tr class="tableheader">
						<td colspan="2">Add New User</td>
					</tr>
					<tr>
						<td><label>Username</label></td>
						<td><input type="text" name="userName" class="txtField" required=""></td>
					</tr>
					<tr>
						<td><label>Password</label></td>
						<td><input type="password" name="password" class="txtField" required=""></td>
					</tr>
					<tr>
						<td><label>First Name</label></td>
						<td><input type="text" name="firstName" class="txtField" required="">
						</td>
					</tr>
					<tr>
						<td><label>Last Name</label></td><td>
						<input type="text" name="lastName" class="txtField" required="">
						</td>
					</tr>
					<tr>
					<td colspan="2">
						<input type="submit" name="submit" value="Submit" class="btnSubmit"></td>
					</tr>
				</table>
			</div>
		</form>
	</body>
</html>