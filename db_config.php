<?php
// setting parameter
$server   = "localhost";
$username = "root";
$password = "";
$database = "hr_db";

// fungsi koneksi database
$conection = mysqli_connect($server, $username, $password, $database);

// cek koneksi
if (!$conection) {
    die('Koneksi Database Gagal : ' . mysqli_connect_error());
}
?>