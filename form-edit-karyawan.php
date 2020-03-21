
  <div class="row">
    <div class="col-md-12">
      <div class="page-header">
        <h4>
          <i class="glyphicon glyphicon-edit"></i>
          Edit data Karyawan
        </h4>
      </div>
      <?php
      if (isset($_GET['id'])) {
        $nik   = $_GET['id'];

        //Sql command query
        $sql ="SELECT * FROM karyawan WHERE nik='$nik'";
        $query = mysqli_query($conection,$sql) or die('Query Error : '.mysqli_error($conection));

        while ($data  = mysqli_fetch_assoc($query)) {

          $nik           = $data['nik'];
          $nama          = $data['nama'];
          $jabatan       = $data['jabatan'];
          $tempat_lahir  = $data['tempat_lahir'];
          
          $tanggal       = $data['tanggal_lahir'];
          $tgl           = explode('-',$tanggal);
          $tanggal_lahir = $tgl[2]."-".$tgl[1]."-".$tgl[0];
          
          $jenis_kelamin = $data['jenis_kelamin'];
          $agama         = $data['agama'];
          $alamat        = $data['alamat'];
          $no_telepon    = $data['no_telepon'];
        }
      }
      ?>
      <div class="panel panel-default">
        <div class="panel-body">
          <form class="form-horizontal" method="POST" action="edit-karyawan.php">
            <div class="form-group">
              <label class="col-sm-2 control-label">NIK</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="nik" value="<?php echo $nik; ?>" readonly>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Nama Karyawan</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="nama" autocomplete="off" value="<?php echo $nama; ?>" required>
              </div>
            </div>

              <div class="form-group">
                  <label class="col-sm-2 control-label">jabatan</label>
                  <div class="col-sm-3">
                      <select class="form-control" name="jabatan" placeholder="Pilih Jabatan">
                          <option value=""><?php echo $jabatan ?></option>
                          <option value="Fullstack Developer">Fullstack Developer</option>
                          <option value="Frontend Developer">Frontend Developer</option>
                          <option value="Backend Developer">Backend Developer</option>
                          <option value="Busines Analis">Busines Analis</option>
                          <option value="UI/UX designer">UI/UX designer</option>
                      </select>
                  </div>
              </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tempat Lahir</label>
              <div class="col-sm-3">
                <input type="text" class="form-control" name="tempat_lahir" autocomplete="off" value="<?php echo $tempat_lahir; ?>" required>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Tanggal Lahir</label>
              <div class="col-sm-2">
                <div class="input-group">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tanggal_lahir" autocomplete="off" value="<?php echo $tanggal_lahir; ?>" required>
                  <span class="input-group-addon">
                    <i class="glyphicon glyphicon-calendar"></i>
                  </span>
                </div>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Jenis Kelamin</label>
              <div class="col-sm-4">
              <?php
              if ($jenis_kelamin=='Laki-laki') { ?>
                <label class="radio-inline">
                  <input type="radio" name="jenis_kelamin" value="Laki-laki" checked> Laki-laki
                </label>

                <label class="radio-inline">
                  <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                </label>
              <?php
              } else { ?>
                <label class="radio-inline">
                  <input type="radio" name="jenis_kelamin" value="Laki-laki"> Laki-laki
                </label>

                <label class="radio-inline">
                  <input type="radio" name="jenis_kelamin" value="Perempuan" checked> Perempuan
                </label>
              <?php
              }
              ?>
              </div>
            </div>
            
            <div class="form-group">
              <label class="col-sm-2 control-label">Agama</label>
              <div class="col-sm-3">
                <select class="form-control" name="agama" placeholder="Pilih Agama" required>
                  <option value="<?php echo $agama; ?>"><?php echo $agama; ?></option>
                  <option value=""></option>
                  <option value="Islam">Islam</option>
                  <option value="Protestan">Protestan</option>
                  <option value="Katolik">Katolik</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddha">Buddha</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">Alamat</label>
              <div class="col-sm-3">
                <textarea class="form-control" name="alamat" rows="3" required><?php echo $alamat; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-2 control-label">No. Telepon</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" name="no_telepon" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" value="<?php echo $no_telepon; ?>" required>
              </div>
            </div>
            
            <hr/>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-success btn-submit" name="simpan" value="Simpan">
                <a href="index.php" class="btn btn-warning btn-reset">Batal</a>
              </div>
            </div>
          </form>
        </div> <!-- /.panel-body -->
      </div> <!-- /.panel -->
    </div> <!-- /.col -->
  </div> <!-- /.row -->
