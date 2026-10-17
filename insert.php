<?php 
include __DIR__ . ('/connection.php');
$result = mysqli_query($conn, "select * from tblcourses order by course asc");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Add Student Profile</title>
</head>
<body>
<div id="wrapper">
<h1 align="center">Add Student</h1>

<form action="insert_code.php" method="post">
	<table>
		<tr>
			<td width="150" align="right">Student ID:</td>
			<td><input type="text" name="txtID" size="5"></td>
		</tr>
		<tr>
			<td align="right">Name of Student:</td>
			<td><input type="text" name="txtName"></td>
		</tr>
		<tr>
			<td align="right">Sex:</td>
			<td>
				<select name="cboSex">
					<option value="0">-Select-</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
				</select>
			</td>
		</tr>
		<tr>
			<td align="right">Birthdate:</td>
			<td><input type="date" name="txtBirthdate"></td>
		</tr>
		<tr>
			<td align="right">Address: </td>
			<td><input type="text" name="txtAddress"></td>
		</tr>
		<tr>
			<td align="right">Course: </td>
			<td>
				<select name="cboCourse">
				<?php 
				while($row = mysqli_fetch_array($result)){
				?>
					<option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
				<?php
				}
				?>
				</select>
			</td>
		</tr>
	</table>
	<?php 
	mysqli_close($conn);
	?>
	<br/>
	<input type="submit" name="btnSave" value="Save Record">
	<input type="submit" name="btnClear" value="Cancel">
</form>
</div>
</body>
</html>