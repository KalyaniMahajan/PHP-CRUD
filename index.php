<?php
	require_once("config.php");
	$sql = "SELECT * FROM users ORDER BY userId DESC";
	$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Users List</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<form name="frmUser" method="post" action="">
			<div class="container">
			<div class="message"><?php if(isset($message)) { echo $message; } ?></div>
			<div align="right" style="padding-bottom:5px;"><a href="add_user.php" class="link">
			<img alt='Add' title='Add' src='images/add.png' width='15px' height='15px'/> Add User</a></div>
			<table border="0" cellpadding="10" cellspacing="1" class="tblListForm  container">
				<tr class="listheader container">
					<td>Username</td>
					<td>First Name</td>
					<td>Last Name</td>
					<td>Actions</td>
				</tr>
				<?php
					$i=0;
					while($row = mysqli_fetch_array($result)) {
					if($i%2==0)
						$classname="evenRow";
					else
						$classname="oddRow";
					?>
					<tr class="<?php if(isset($classname)) echo $classname;?>">
						<td>
							<?php echo $row["userName"]; ?>
						</td>
						<td>
							<?php echo $row["firstName"]; ?>
						</td>
						<td>
							<?php echo $row["lastName"]; ?>
						</td>
						<td>
							<a href="edit_user.php?userId=<?php echo $row["userId"]; ?>" class="link">
							<img alt='Edit' title='Edit' src='images/edit.png' width='15px' height='15px' hspace='10' />
							</a>  
							<a href="delete_user.php?userId=<?php echo $row["userId"]; ?>"  class="link">
							<img alt='Delete' title='Delete' src='images/delete.png' width='15px' height='15px'hspace='10' />
							</a>
						</td>
					</tr>
					<?php
						$i++;
						}
					?>
				</table>
			</form>
		</div>
	</body>
</html>