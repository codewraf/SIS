<?php
include __DIR__ . ('/connection.php');

if(isset($_GET['studid'])){
	$studid = $_GET['studid'];

	$delete_query = "delete from tblstudents where studid='$studid'";

	$result = mysqli_query($conn, $delete_query);

	if($result){
		echo "<script>window.alert('Record deleted!');</script>";
		echo "<script>window.location='index.php';</script>";
	}else{
		echo mysqli_error($conn);
	}
	mysqli_close($conn);
}
?>