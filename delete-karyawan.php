
<?php
require_once "db_config.php";

if (isset($_GET['id'])) {
	$nik = $_GET['id'];

	//Sql command query
	$sql ="DELETE FROM karyawan WHERE nik='$nik'";

	// fungsi eksekusi query
	$query = mysqli_query($conection, $sql);

	// cek hasil query
	if ($query) {
		header('location: index.php?alert=4');
	} else {
		header('location: index.php?alert=1');
	}	
}							
?>