<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-7 align-self-center">
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Obat</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Obat</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="<?php echo base_url() ?>obat/tambah"><button type="button" class="btn waves-effect waves-light btn-rounded btn-primary">Tambah Obat</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- basic table -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <h4 class="card-title">Zero Configuration</h4>
                        <h6 class="card-subtitle">DataTables has most features enabled by default, so all you
                            need to do to use it with your own tables is to call the construction
                            function:<code> $().DataTable();</code>. You can refer full documentation from here
                            <a href="https://datatables.net/">Datatables</a>
                        </h6> -->
                        <?php
                        $this->load->helper('form');
                        $error = $this->session->flashdata('error');
                        if ($error) {
                        ?>
                            <div class="alert alert-danger fade show" role="alert"><?php echo $error; ?></div>
                        <?php }
                        $success = $this->session->flashdata('success');
                        if ($success) {
                        ?>
                            <div class="alert alert-success fade show" role="alert"><?php echo $success; ?></div>
                        <?php } ?>
                        <div class="table-responsive">
                            <table id="zero_config" class="table table-striped table-bordered no-wrap">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Komposisi</th>
                                        <th>Efek Samping</th>
                                        <th>Indikasi</th>
                                        <th>Dosis</th>
                                        <th>Aturan Pakai</th>
                                        <th>Perhatian</th>
                                        <th>Gambar</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl_obat">
                                    <?php
                                    $no = 1;
                                    foreach ($daftar_obat as $u) { ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $u->nama ?></td>
                                            <td><?php echo $u->komposisi ?></td>
                                            <td><?php echo $u->efek_samping ?></td>
                                            <td><?php echo $u->indikasi ?></td>
                                            <td><?php echo $u->dosis ?></td>
                                            <td><?php echo $u->aturan_pakai ?></td>
                                            <td><?php echo $u->perhatian ?></td>
                                            <td><img src="<?php echo base_url() ?>asset/obat/<?php echo $u->gambar ?>" width="300" alt=""></td>
                                            <td><?php echo $u->keterangan ?></td>
                                            <td>
                                                <a class="btn btn-rounded btn-danger" href="<?php echo base_url() ?>obat/hapus_obat?id=<?php echo $u->id ?>">Hapus</a>
                                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary editobat" data-keterangan="<?php echo $u->keterangan ?>" data-perhatian="<?php echo $u->perhatian ?>" data-aturan_pakai="<?php echo $u->aturan_pakai ?>" data-dosis="<?php echo $u->dosis ?>" data-indikasi="<?php echo $u->indikasi ?>" data-id="<?php echo $u->id ?>" data-nama="<?php echo $u->nama ?>" data-komposisi="<?php echo $u->komposisi ?>" data-efek_samping="<?php echo $u->efek_samping ?>">Ubah</button>
                                            </td>
                                        </tr>

                                    <?php
                                        $no++;
                                    } ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Komposisi</th>
                                        <th>Efek Samping</th>
                                        <th>Indikasi</th>
                                        <th>Dosis</th>
                                        <th>Aturan Pakai</th>
                                        <th>Perhatian</th>
                                        <th>Gambar</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Page wrapper  -->
<!-- ============================================================== -->

<!-- edit modal content -->
<div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <label for="title">Edit Obat</label>
                </div>

                <form class="pl-3 pr-3" action="<?php echo base_url() ?>obat/edit_obat" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="username">Nama</label>
                        <input class="form-control" type="text" name="edit_nama" required="" placeholder="Masukkan Nama Obat">
                    </div>

                    <div class="form-group">
                        <label for="username">Komposisi</label>
                        <input class="form-control" type="text" name="edit_komposisi" required="" placeholder="Masukkan Komposisi">
                    </div>

                    <div class="form-group">
                        <label for="username">Efek Samping</label>
                        <input class="form-control" type="text" name="edit_efek_samping" required="" placeholder="Masukkan Efek Samping">
                    </div>

                    <div class="form-group">
                        <label for="username">Indikasi</label>
                        <input class="form-control" type="text" name="edit_indikasi" required="" placeholder="Masukkan Indikasi">
                    </div>

                    <div class="form-group">
                        <label for="username">Dosis</label>
                        <input class="form-control" type="text" name="edit_dosis" required="" placeholder="Masukkan Dosis">
                    </div>

                    <div class="form-group">
                        <label for="username">Aturan Pakai</label>
                        <input class="form-control" type="text" name="edit_aturan_pakai" required="" placeholder="Masukkan Aturan Pakai">
                    </div>

                    <div class="form-group">
                        <label for="username">Perhatian</label>
                        <input class="form-control" type="text" name="edit_perhatian" required="" placeholder="Masukkan Perhatian">
                    </div>

                    <div class="form-group">
                        <label for="username">Gambar</label>
                        <input class="form-control" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" name="edit_gambar" placeholder="Masukkan Gambar">
                    </div>

                    <div class="form-group">
                        <label for="username">Keterangan</label>
                        <textarea class="form-control" rows="5" cols="9" id="editordataedit" name="editordataedit"></textarea>
                    </div>

                    <div class="form-group text-center">
                        <input type="hidden" name="id">
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->