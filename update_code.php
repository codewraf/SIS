<?php 
include __DIR__ . ('/connection.php');

if(isset($_POST['btnSave'])){
	$studid = $_POST['txtID'];
	$studname = $_POST['txtName'];

	if($_POST['cboSex']=='Male'){
		$sex='Male';
	}else if($_POST['cboSex']=='Female'){
		$sex="Female";
	}else{
		$sex="";
	}

	$birthdate = $_POST['txtBirthdate'];
	$address = $_POST['txtAddress'];
	$course = $_POST['cboCourse'];

	$update_code = "update tblstudents set fullname='$studname', sex='$sex', birthdate='$birthdate', address='$address', courseID='$course' where studid='$studid'";

	$result = mysqli_query($conn, $update_code);

	if($result){
	?>
		<script>window.alert('Record successfully updated!');</script>
		<script>window.location='index.php';</script>
	<?php
	}else{
		echo mysqli_error($conn);
	}
	mysqli_close($conn);
}

if(isset($_POST['btnClear'])){
	echo "<script>window.location='index.php';</script>";
}
?>