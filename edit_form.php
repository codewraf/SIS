<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Update Student Profile</title>
</head>
<body>
<?php 
include __DIR__ . ('/connection.php');
$studid = $_GET['studid'];

$result = mysqli_query($conn, "select * from tblstudents where studid='$studid'");

$row = mysqli_fetch_array($result);
$sex = $row[2];
$courseid = $row[5];
?>
<div id="wrapper">
<h1 align="center">Update Student</h1>
<form action="update_code.php" method="post">
	<table>
		<tr>
			<td width="150" align="right">Student ID:</td>
			<td><input type="text" name="txtID" size="5" value="<?php echo $row[0]; ?>" readonly></td>
		</tr>
		<tr>
			<td align="right">Name of Student:</td>
			<td><input type="text" name="txtName" value="<?php echo $row[1]; ?>"></td>
		</tr>
		<tr>
			<td align="right">Sex:</td>
			<td>
				<select name="cboSex">
					<option value="0">-Select-</option>
					<option value="Male" <?php if($sex=="Male"){echo "selected";}?>>Male</option>
					<option value="Female" <?php if($sex=="Female"){echo "selected";}?>>Female</option>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">Birthdate:</td>
			<td><input type="date" name="txtBirthdate" value="<?php echo $row[3]; ?>"></td>
		</tr>
		<tr>
			<td align="right">Address: </td>
			<td><input type="text" name="txtAddress" value="<?php echo $row[4]; ?>"></td>
		</tr>
		<tr>
			<td align="right">Course: </td>
			<td>
				<select name="cboCourse">
				<?php 
				$combo = mysqli_query($conn, "select * from tblcourses order by course asc");
				while($rows = mysqli_fetch_array($combo)){
				?>
					<option value="<?php echo $rows[0]; ?>" <?php if($rows[0]==$courseid){echo "selected";}?>><?php echo $rows[1]; ?></option>
				<?php
				}
				?>
				</select>
			</td>
		</tr>
	</table>
	<br/>
	<input type="submit" name="btnSave" value="Update Record">
	<input type="submit" name="btnClear" value="Cancel">
</form>
</div>
</body>
</html>