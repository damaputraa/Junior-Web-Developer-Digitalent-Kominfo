<?php
include 'koneksi.php';
?>

<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <title>Proses CRUD Pasien</title>
</head>

<!-- Main content -->
<section class="container content my-5">
  <div class="row">
    <div class="col-sm-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title text-center">List Data Pasien</h3>
          <div class="box-tools pull-left my-4">
            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#tambahpasien" name="tambahpasien"><i class="fa fa-male"></i>+ Tambah Pasien</a>
            <a href="logout.php" class="btn btn-warning float-right"><i class="fa fa-home"></i> Logout</a>
          </div>
        </div>
        <div class="box-body">

          <div class="table-responsive22">
            <table id="datatable" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>No </th>
                  <th>Id Pasien</th>
                  <th>Nama </th>
                  <th>Alamat</th>
                  <th>NIK KTP</th>
                  <th>Keluhan</th>
                  <th>Jenis Kelamin</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                $queryview = mysqli_query($koneksi, "SELECT * FROM tb_pasien");
                while ($row = mysqli_fetch_assoc($queryview)) {
                ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['id_pasien']; ?></td>
                    <td><?php echo $row['nama']; ?></td>
                    <td><?php echo $row['alamat']; ?></td>
                    <td><?php echo $row['nik_ktp']; ?></td>
                    <td><?php echo $row['keluhan']; ?></td>
                    <td><?php echo $row['jk']; ?></td>
                    <td>
                      <!--<a href="../pasien/form_editpasien.php?id=<?php echo $row['id'] ?>" class="btn btn-primary btn-flat btn-xs"><i class="fa fa-pencil"></i> Edit</a>-->
                      <a href="#" class="btn btn-primary btn-flat btn-xs" data-toggle="modal" data-target="#updatepasien<?php echo $no; ?>"><i class="fa fa-pencil"></i> </a>
                      <a href="#" class="btn btn-danger btn-flat btn-xs" data-toggle="modal" data-target="#deletepasien<?php echo $no; ?>"><i class="fa fa-trash"></i> </a>

                      <!-- modal delete -->
                      <div class="example-modal">
                        <div id="deletepasien<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title">Konfirmasi Delete Data pasien</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <h4 align="center">Apakah anda yakin ingin menghapus pasien id? <?php echo $row['id_pasien']; ?><strong><span class="grt"></span></strong> ?</h4>
                              </div>
                              <div class="modal-footer">
                                <button id="nodelete" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cancel</button>
                                <a href="fungsi.php?act=deletepasien&id=<?php echo $row['id_pasien']; ?>" class="btn btn-primary">Delete</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal delete -->

                      <!-- modal update pasien -->
                      <div class="example-modal">
                        <div id="updatepasien<?php echo $no; ?>" class="modal fade" role="dialog" style="display:none;">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h3 class="modal-title">Edit Data pasien</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                              </div>
                              <div class="modal-body">
                                <form action="fungsi.php?act=updatepasien" method="post" role="form">
                                  <?php
                                  $id_pasien = $row['id_pasien'];
                                  $query = "SELECT * FROM tb_pasien WHERE id_pasien='$id_pasien'";
                                  $result = mysqli_query($koneksi, $query);
                                  while ($row = mysqli_fetch_assoc($result)) {
                                  ?>
                                    <div class="form-group">
                                      <div class="row">
                                        <label class="col-sm-3 control-label text-right">Id pasien <span class="text-red" style="color: red;">*</span></label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="id_pasien" placeholder="Id pasien" value="<?php echo $row['id_pasien']; ?>" required></div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="row">
                                        <label class="col-sm-3 control-label text-right">Nama <span class="text-red" style="color: red;">*</span></label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="nama pasien" value="<?php echo $row['nama']; ?>" required></div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="row">
                                        <label class="col-sm-3 control-label text-right">Alamat <span class="text-red" style="color: red;">*</span></label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="alamat" placeholder="alamat pasien" value="<?php echo $row['alamat']; ?>" required></div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="row">
                                        <label class="col-sm-3 control-label text-right">NIK KTP <span class="text-red" style="color: red;">*</span></label>
                                        <div class="col-sm-8"><input type="number" class="form-control" name="nik_ktp" placeholder="nik_ktp pasien" value="<?php echo $row['nik_ktp']; ?>" required></div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="row">
                                        <label class="col-sm-3 control-label text-right">Keluhan Pasien<span class="text-red" style="color: red;">*</span></label>
                                        <div class="col-sm-8"><input type="text" class="form-control" name="keluhan" placeholder="keluhan pasien" value="<?php echo $row['keluhan']; ?>" required></div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <div class="row">
                                        <label class="col-sm-3 control-label text-right">Jenis Kelamin <span class="text-red" style="color: red;">*</span></label>
                                        <div class="col-sm-8"><select name="jk" class="form-control select2" value="" style="width: 100%;">
                                            <option value="-" selected="selected">-- Pilih Satu --</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button id="noedit" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                                      <input type="submit" name="submit" class="btn btn-primary" value="Update">
                                    </div>
                                  <?php
                                  }
                                  ?>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div><!-- modal update pasien -->
                    </td>
                  </tr>
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>

        <!-- modal insert -->
        <div class="example-modal">
          <div id="tambahpasien" class="modal fade" role="dialog" style="display:none;">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Registrasi Pasien Baru</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                  <form action="fungsi.php?act=tambahpasien" method="post" role="form">
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-3 control-label text-right">Id pasien <span class="text-red" style="color: red;">*</span></label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="id_pasien" placeholder="Id pasien" required></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-3 control-label text-right">Nama <span class="text-red" style="color: red;">*</span></label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Pasien" required></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-3 control-label text-right">Alamat <span class="text-red" style="color: red;">*</span></label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="alamat" placeholder="Masukan Alamat" required></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-3 control-label text-right">NIK KTP <span class="text-red" style="color: red;">*</span></label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="nik_ktp" placeholder="Masukkan NIK KTP" required></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-3 control-label text-right">Keluhan Pasien<span class="text-red" style="color: red;">*</span></label>
                        <div class="col-sm-8"><input type="text" class="form-control" name="keluhan" placeholder="Masukkan Keluhan" required></div>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <label class="col-sm-3 control-label text-right">Jenis Kelamin <span class="text-red" style="color: red;">*</span></label>
                        <div class="col-sm-8"><select name="jk" class="form-control select2" value="" style="width: 100%;" required>
                            <option value="-" selected="selected">-- Pilih Satu --</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button id="nosave" type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                      <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    </div>
                    <!--<div class="box-footer">
                      <a href="../user/data_user.php" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
                      <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                    </div> /.box-footer -->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div><!-- modal insert close -->
      </div>
    </div>
  </div>
</section><!-- /.content -->
<footer class="text-center text-info"> <a href="https://linktr.ee/damaputra" target="_blank">Rachmad Ananda Damaputra</a> @ 2021 VSGA</footer>
</div>
