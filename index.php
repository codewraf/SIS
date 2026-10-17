<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Student Profile</title>
</head>
<body>
<?php 
include __DIR__ . ('/connection.php');
?>
<div id="wrapper">
	<table cellpadding="2" cellspacing="2" align="center">
		<tr>
			<td colspan="6" align="center"><h1>Student Profile</h1></td>
		</tr>
		<tr>
			<td colspan="6">
				<form action="" method="post">
					<input type="text" name="txtSearch">
					<input type="submit" name="btnSearch" value="Search">
				</form>
			</td>
		</tr>
		<tr>
			<th width="100">Student ID</th>
			<th>Name of Student</th>
			<th>Sex</th>
			<th>Birthdate</th>
			<th width="250">Address</th>
			<th>Course</th>
			<th colspan="2">Action</th>
		</tr>
		<?php 
		if(isset($_POST['btnSearch'])){
			$search = $_POST['txtSearch'];
			if($search != ""){
				$result = mysqli_query($conn, "select tblstudents.studid, tblstudents.fullname, tblstudents.sex, tblstudents.birthdate, tblstudents.address, tblcourses.course from tblstudents inner join tblcourses on tblstudents.courseid=tblcourses.courseid where tblstudents.fullname like '%$search%' or tblstudents.address like '%$search%'");
			}else{
				$result = mysqli_query($conn, "select tblstudents.studid, tblstudents.fullname, tblstudents.sex, tblstudents.birthdate, tblstudents.address, tblcourses.course from tblstudents inner join tblcourses on tblstudents.courseid=tblcourses.courseid");
			}
		}else{
			$result = mysqli_query($conn, "select tblstudents.studid, tblstudents.fullname, tblstudents.sex, tblstudents.birthdate, tblstudents.address, tblcourses.course from tblstudents inner join tblcourses on tblstudents.courseid=tblcourses.courseid");
		}

		while($row = mysqli_fetch_array($result)){
		?>
		<tr>
			<td align="center"><?php echo $row[0]; ?></td>
			<td><?php echo $row[1]; ?></td>
			<td><?php echo $row[2]; ?></td>
			<td><?php echo $row[3]; ?></td>
			<td><?php echo $row[4]; ?></td>
			<td><?php echo $row[5]; ?></td>
			<td>
				<input type="image" src="img/edit.png" width="20" onClick="edit(<?php echo $row[0]; ?>)" name="btnEdit">
			</td>
			<td>
				<input type="image" src="img/delete.png" width="20" onClick="del(<?php echo $row[0]; ?>)" name="btnDelete">
			</td>
		</tr>
		<?php
		}
		?>
	</table>
	<script language="javascript">
		function del(studid){
			if(confirm("Do you really want to delete this record?")){
				window.location.href='delete.php?studid='+studid;
				return true;
			}
		}

		function edit(studid){
			if(confirm("Do you really want to update this record?")){
				window.location.href='edit_form.php?studid='+studid;
				return true;
			}
		}
	</script>
	<?php 
		$count = mysqli_num_rows($result);
		echo "$count record(s) found...";
		mysqli_close($conn);
	?>
	<br/><br/>
	<a href="insert.php">+ADD STUDENT</a>
</div>
</body>
</html>