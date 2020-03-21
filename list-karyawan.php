
<?php
if (isset($_POST['cari'])) {
    $cari = $_POST['cari'];
} else {
    $cari = "";
}
?>

<div class="row">
    <div class="col-md-12">
        <div class="page-header">
            <h4>
                <form class="form-inline" method="POST" action="index.php">
                    <div class="form-group">
                        <div class="input-group">

                            <input type="text" class="form-control" name="cari" placeholder="Cari ..."
                                   autocomplete="off" value="<?php echo $cari; ?>">
                            <div class="input-group-addon ">
                                <i class="glyphicon glyphicon-search "></i>
                            </div>
                        </div>
                    </div>
                    <a class="btn btn-success pull-right" href="?page=add">
                        <i class="glyphicon glyphicon-plus"></i> Tambah
                    </a>
                </form>

            </h4>
        </div>

        <?php
        if (empty($_GET['alert'])) {
            echo "";
        } elseif ($_GET['alert'] == 1) {
            echo "<div class='alert alert-danger alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-alert'></i> Gagal!</strong> Terjadi kesalahan.
          </div>";
        } elseif ($_GET['alert'] == 2) {
            echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-check'></i> Sukses!</strong> Data karyawan berhasil disimpan.
          </div>";
        } elseif ($_GET['alert'] == 3) {
            echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-check'></i> Sukses!</strong> Data karyawan berhasil diubah.
          </div>";
        } elseif ($_GET['alert'] == 4) {
            echo "<div class='alert alert-success alert-dismissible' role='alert'>
            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            <strong><i class='glyphicon glyphicon-ok-circle'></i> Sukses!</strong> Data karyawan berhasil dihapus.
          </div>";
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">Data karyawan</h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>TTL</th>
                            <th>Gender</th>
                            <th>Agama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        /* Pagination */
                        $batas = 5;

                        if (isset($cari)) {
                            //Sql command query
                            $sql ="SELECT * FROM karyawan WHERE nik LIKE '%$cari%' OR nama LIKE '%$cari%'";
                            $jumlah_record = mysqli_query($conection,$sql )
                            or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($conection));
                        } else {
                            $jumlah_record = mysqli_query($conection, "SELECT * FROM is_siswa")
                            or die('Ada kesalahan pada query jumlah_record: ' . mysqli_error($conection));
                        }

                        $jumlah = mysqli_num_rows($jumlah_record);
                        $halaman = ceil($jumlah / $batas);
                        $page = (isset($_GET['hal'])) ? (int)$_GET['hal'] : 1;
                        $mulai = ($page - 1) * $batas;
                        /*-------------------------------------------------------------------*/
                        $no = 1;
                        if (isset($cari)) {

                            // fungsi eksekusi query
                            $sql = "SELECT * FROM karyawan WHERE nik LIKE '%$cari%' OR nama LIKE '%$cari%'  ORDER BY nik DESC LIMIT $mulai, $batas";
                            $query = mysqli_query($conection, $sql) or die('Ada kesalahan : ' . mysqli_error($conection));
                        } else {

                            // fungsi eksekusi query
                            $sql ="SELECT * FROM is_siswa ORDER BY nik DESC LIMIT $mulai, $batas";
                            $query = mysqli_query($conection,$sql ) or die('Ada kesalahan : ' . mysqli_error($conection));
                        }

                        while ($data = mysqli_fetch_assoc($query)) {

                            $tanggal = $data['tanggal_lahir'];
                            $tgl = explode('-', $tanggal);
                            $tanggal_lahir = $tgl[2] . "-" . $tgl[1] . "-" . $tgl[0];

                            echo "  <tr>
                      <td width='50' class='center'>$no</td>
                      <td width='60'>$data[nik]</td>
                      <td width='150'>$data[nama]</td>
                      <td width='150'>$data[jabatan]</td>
                      <td width='180'>$data[tempat_lahir], $tanggal_lahir</td>
                      <td width='120'>$data[jenis_kelamin]</td>
                      <td width='120'>$data[agama]</td>
                      <td width='250'>$data[alamat]</td>
                      <td width='80'>$data[no_telepon]</td>

                      <td width='100'>
                        <div class=''>
                          <a data-toggle='tooltip' data-placement='top' title='Ubah' style='margin-right:5px' class='btn btn-warning btn-sm' href='?page=edit&id=$data[nik]'>
                            <i class='glyphicon glyphicon-edit'></i>
                          </a>";
                            ?>
                            <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm"
                               href="delete-karyawan.php?id=<?php echo $data['nik']; ?>"
                               onclick="return confirm('Anda yakin ingin menghapus karyawan <?php echo $data['nama']; ?>?');">
                                <i class="glyphicon glyphicon-trash"></i>
                            </a>
                            <?php
                            echo "
                        </div>
                      </td>
                    </tr>";
                            $no++;
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                    if (empty($_GET['hal'])) {
                        $halaman_aktif = '1';
                    } else {
                        $halaman_aktif = $_GET['hal'];
                    }
                    ?>

                    <a>
                        Halaman <?php echo $halaman_aktif; ?> dari <?php echo $halaman; ?> |
                        Total <?php echo $jumlah; ?> data
                    </a>

                    <nav>
                        <ul class="pagination pull-right">
                            <!-- Button untuk halaman sebelumnya -->
                            <?php
                            if ($halaman_aktif <= '1') { ?>
                                <li class="disabled">
                                    <a href="" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php
                            } else { ?>
                                <li>
                                    <a href="?hal=<?php echo $page - 1 ?>" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>

                            <!-- Link halaman 1 2 3 ... -->
                            <?php
                            for ($x = 1; $x <= $halaman; $x++) { ?>
                                <li class="">
                                    <a href="?hal=<?php echo $x ?>"><?php echo $x ?></a>
                                </li>
                                <?php
                            }
                            ?>

                            <!-- Button untuk halaman selanjutnya -->
                            <?php
                            if ($halaman_aktif >= $halaman) { ?>
                                <li class="disabled">
                                    <a href="" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                                <?php
                            } else { ?>
                                <li>
                                    <a href="?hal=<?php echo $page + 1 ?>" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div> <!-- /.panel -->
    </div> <!-- /.col -->
</div> <!-- /.row -->