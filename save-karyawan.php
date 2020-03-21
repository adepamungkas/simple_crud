
<?php

require_once "db_config.php";

if (isset($_POST['simpan'])) {
    $nik = mysqli_real_escape_string($conection, trim($_POST['nik']));
    $nama = mysqli_real_escape_string($conection, trim($_POST['nama']));
    $tempat_lahir = mysqli_real_escape_string($conection, trim($_POST['tempat_lahir']));
    $jabatan = $_POST['jabatan'];

    $tanggal = $_POST['tanggal_lahir'];
    $tgl = explode('-', $tanggal);
    $tanggal_lahir = $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];

    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat = mysqli_real_escape_string($conection, trim($_POST['alamat']));
    $no_telepon = $_POST['no_telepon'];

    //Sql command query
    $sql = "INSERT INTO 
            karyawan(nik,
				     nama,
				     jabatan,
				     tempat_lahir,
				     tanggal_lahir,
				     jenis_kelamin,
				     agama,
				     alamat,
				     no_telepon)	
			VALUES('$nik',
			        '$nama',
			        '$jabatan',
			        '$tempat_lahir',
			        '$tanggal_lahir',
			        '$jenis_kelamin',
			        '$agama',
			        '$alamat',
			        '$no_telepon')";

    // fungsi eksekusi query
    $query = mysqli_query($conection, $sql);
    if ($query) {
        header('location: index.php?alert=2');
    } else {
        header('location: index.php?alert=1');
    }
}
?>