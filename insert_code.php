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

	if($studid != ""){
		$insert_code = "insert into tblstudents values('$studid', '$studname', '$sex', '$birthdate', '$address', '$course')";

		$result = mysqli_query($conn, $insert_code);

		if($result){
		?>
		<script>window.alert('Record Saved');</script>
		<script>window.location='index.php';</script>
		<?php
		}else{
			echo mysqli_error($conn);
		}
		mysqli_close($conn);
	}else{
		echo "<script>window.alert('Field is empty!');</script>";
		echo "<script>window.location='insert.php';</script>";
	}
}

if(isset($_POST['btnClear'])){
	echo "<script>window.location='index.php';</script>";
}
?>