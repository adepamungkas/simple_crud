<?php
require_once "db_config.php";

if (isset($_POST['simpan'])) {
    if (isset($_POST['nik'])) {
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
        $sql = "UPDATE karyawan 
                SET nama = '$nama',
                    jabatan = '$jabatan',
					tempat_lahir 	= '$tempat_lahir',
					tanggal_lahir 	= '$tanggal_lahir',
					jenis_kelamin 	= '$jenis_kelamin',
					agama 			= '$agama',
					alamat 			= '$alamat',
					no_telepon 		= '$no_telepon'
				WHERE nik 			= '$nik'";

        // fungsi eksekusi query
        $query = mysqli_query($conection, $sql);

        // cek query
        if ($query) {
            header('location: index.php?alert=3');
        } else {
            header('location: index.php?alert=1');
        }
    }
}
?>