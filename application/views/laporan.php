<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Laporan Pengerjaan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>">Home</a></li>
            <li class="breadcrumb-item">Laporan</li>            
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <!-- <div class="card-header">
            <div class="row">
              <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <button class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-tambah-tim ">Tambah</button>
              </div>
            </div>
          </div> -->
          <div class="card-body table-responsive">
            <table class="table table-bordered table-striped" id="laporan">
            <thead>
                <tr>
                  <th>No</th>
                  <th>No Pelanggan</th>
                  <th>Zona Wilayah</th>
                  <th>Alamat</th>
                  <th>Jenis Kerusakan</th>
                  <th>Tanggal Laporan</th>
                  <th>Tanggal Distribusi</th>
                  <th>Tanggal Penyelesaian</th>
                  <th>Durasi Pengerjaan</th>
                  <th>Tim</th>
                  <th>Kategori</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($daftar_pengerjaan as $u) { ?>
                  <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $u->nomor_pelanggan ?></td>
                    <td class="text-center"><?php echo $u->zona_wilayah ?></td>
                    <td class="text-center"><?php echo $u->alamat ?></td>
                    <td class="text-center"><?php echo $u->jenis_kerusakan ?></td>
                    <td class="text-center"><?php echo $u->tanggal_laporan ?></td>                    
                    <td class="text-center"><?php echo "2020-02-14" ?></td>                    
                    <td class="text-center"><?php echo "2020-02-5" ?></td>                    
                    <td class="text-center"><?php echo "3 jam 30 menit" ?></td>                    
                    <td class="text-center"><?php echo "TIM A" ?></td>                    
                    <td class="text-center"><?php echo "Perbaikan" ?></td>                    
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
  function edituser(id, nama, username, role, jenis) {
    document.getElementById('id_user').value = id;
    document.getElementById('nama_lengkap').value = nama;
    document.getElementById('username').value = username;
    document.getElementById('role').value = role;
    document.getElementById('jenis').value = jenis;
  }
</script>

<div class="modal fade" id="modal-tambah-tim">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Tim</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?php echo base_url() ?>tim/tambah_tim" role="form" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Tim</label>
            <input type="text" class="form-control" placeholder="Masukkan nama tim..." name="nama_tim">
          </div>
          <div class="form-group">
            <label>Teknisi</label>
            <select class="form-control" name="teknisi">
              <?php
              foreach ($daftar_user as $row) {
                echo "<option value='" . $row->id . "'>" . $row->nama_lengkap . "</option>";
              }
              echo "</select>";
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Tukang 1</label>
            <select class="form-control" name="tukang1">
              <?php
              foreach ($daftar_user as $row) {
                echo "<option value='" . $row->id . "'>" . $row->nama_lengkap . "</option>";
              }
              echo "</select>";
              ?>
            </select>
          </div>
          <div class="form-group">
            <label>Tukang 2</label>
            <select class="form-control" name="tukang2">
              <?php
              foreach ($daftar_user as $row) {
                echo "<option value='" . $row->id . "'>" . $row->nama_lengkap . "</option>";
              }
              echo "</select>";
              ?>
            </select>
          </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->