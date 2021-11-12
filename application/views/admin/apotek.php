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
                <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Apotek</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb m-0 p-0">
                            <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted active" aria-current="page">Apotek</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary" data-toggle="modal" data-target="#tambah-modal">Tambah Apotek</button>
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
                                        <th>Alamat</th>
                                        <th>Longitude</th>
                                        <th>Langitude</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="tbl_apotek">
                                    <?php
                                    $no = 1;
                                    foreach ($daftar_apotek as $u) { ?>
                                        <tr>
                                            <td><?php echo $no ?></td>
                                            <td><?php echo $u->nama ?></td>
                                            <td><?php echo $u->alamat ?></td>
                                            <td><?php echo $u->longitude ?></td>
                                            <td><?php echo $u->langitude ?></td>
                                            <td>
                                                <a class="btn btn-rounded btn-danger" href="<?php echo base_url() ?>apotek/hapus_apotek?id=<?php echo $u->id ?>">Hapus</a>
                                                <button type="button" class="btn waves-effect waves-light btn-rounded btn-primary editapotek" data-id="<?php echo $u->id ?>" data-nama="<?php echo $u->nama ?>" data-alamat="<?php echo $u->alamat ?>" data-longitude="<?php echo $u->longitude ?>" data-langitude="<?php echo $u->langitude ?>">Ubah</button>
                                                <a href="<?php echo base_url() ?>apotek/obat?id=<?php echo $u->id ?>"><button type="button" class="btn waves-effect waves-light btn-rounded btn-success obatapotek" data-id="<?php echo $u->id ?>" data-nama="<?php echo $u->nama ?>" data-alamat="<?php echo $u->alamat ?>" data-longitude="<?php echo $u->longitude ?>" data-langitude="<?php echo $u->langitude ?>">Obat</button></a>
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
                                        <th>Alamat</th>
                                        <th>Longitude</th>
                                        <th>Langitude</th>
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
<!-- tambah modal content -->
<div id="tambah-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <label for="title">Tambah Apotek</label>
                </div>

                <form class="pl-3 pr-3" action="<?php echo base_url() ?>apotek/tambah_apotek" method="POST">

                    <div class="form-group">
                        <label for="username">Nama</label>
                        <input class="form-control" type="text" name="nama" required="" placeholder="Masukkan Nama Apotek">
                    </div>

                    <div class="form-group">
                        <label for="username">Alamat</label>
                        <input class="form-control" type="text" name="alamat" required="" placeholder="Masukkan Alamat">
                    </div>

                    <div class="form-group">
                        <label for="username">Longitude</label>
                        <input class="form-control" type="text" name="longitude" required="" placeholder="Masukkan Longitude">
                    </div>

                    <div class="form-group">
                        <label for="username">Langitude</label>
                        <input class="form-control" type="text" name="langitude" required="" placeholder="Masukkan Langitude">
                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- edit modal content -->
<div id="edit-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div class="text-center mt-2 mb-4">
                    <label for="title">Edit Apotek</label>
                </div>

                <form class="pl-3 pr-3" action="<?php echo base_url() ?>apotek/edit_apotek" method="POST">

                    <div class="form-group">
                        <label for="username">Nama</label>
                        <input class="form-control" type="text" name="edit_nama" required="" placeholder="Masukkan Nama Apotek">
                    </div>

                    <div class="form-group">
                        <label for="username">Alamat</label>
                        <input class="form-control" type="text" name="edit_alamat" required="" placeholder="Masukkan Alamat">
                    </div>

                    <div class="form-group">
                        <label for="username">Longitude</label>
                        <input class="form-control" type="text" name="edit_longitude" required="" placeholder="Masukkan Longitude">
                    </div>

                    <div class="form-group">
                        <label for="username">Langitude</label>
                        <input class="form-control" type="text" name="edit_langitude" required="" placeholder="Masukkan Langitude">
                    </div>

                    <div class="form-group text-center">
                        <input type="hidden" name="id">
                        <button class="btn btn-primary" type="submit">Update</button>
                    </div>

                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->