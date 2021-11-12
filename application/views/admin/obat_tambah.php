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
                            <li class="breadcrumb-item"><a href="<?php echo base_url() ?>" class="text-muted">Home</a></li>
                            <li class="breadcrumb-item text-muted" aria-current="page"><a href="<?php echo base_url() ?>obat">Obat</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-5 align-self-center">
                <div class="customize-input float-right">
                    <a href="<?php echo base_url() ?>obat"><button type="button" class="btn waves-effect waves-light btn-rounded btn-primary">Kembali</button></a>
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
                        <form class="pl-3 pr-3" action="<?php echo base_url() ?>obat/tambah_obat" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label for="username">Nama</label>
                                <input class="form-control" type="text" name="nama" required="" placeholder="Masukkan Nama Obat">
                            </div>

                            <div class="form-group">
                                <label for="username">Komposisi</label>
                                <input class="form-control" type="text" name="komposisi" required="" placeholder="Masukkan Komposisi">
                            </div>

                            <div class="form-group">
                                <label for="username">Efek Samping</label>
                                <input class="form-control" type="text" name="efek_samping" required="" placeholder="Masukkan Efek Samping">
                            </div>

                            <div class="form-group">
                                <label for="username">Indikasi</label>
                                <input class="form-control" type="text" name="indikasi" required="" placeholder="Masukkan Indikasi">
                            </div>

                            <div class="form-group">
                                <label for="username">Dosis</label>
                                <input class="form-control" type="text" name="dosis" required="" placeholder="Masukkan Dosis">
                            </div>

                            <div class="form-group">
                                <label for="username">Aturan Pakai</label>
                                <input class="form-control" type="text" name="aturan_pakai" required="" placeholder="Masukkan Aturan Pakai">
                            </div>

                            <div class="form-group">
                                <label for="username">Perhatian</label>
                                <input class="form-control" type="text" name="perhatian" required="" placeholder="Masukkan Perhatian">
                            </div>

                            <div class="form-group">
                                <label for="username">Gambar</label>
                                <input class="form-control" type="file" accept=".jpg, .png, .jpeg, .gif, .bmp, .tif, .tiff|image/*" name="gambar" required="" placeholder="Masukkan Perhatian">
                            </div>

                            <div class="form-group">
                                <label for="username">Keterangan</label>
                                <textarea class="form-control" rows="5" cols="9" id="editordata" name="editordata"></textarea>
                            </div>

                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit">Tambah</button>
                            </div>

                        </form>
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