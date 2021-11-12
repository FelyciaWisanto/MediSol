</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="<?php echo base_url() ?>asset/libs/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url() ?>asset/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?php echo base_url() ?>asset/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<!-- apps -->
<script src="<?php echo base_url() ?>asset/dist/js/app-style-switcher.js"></script>
<script src="<?php echo base_url() ?>asset/dist/js/feather.min.js"></script>
<script src="<?php echo base_url() ?>asset/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo base_url() ?>asset/dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="<?php echo base_url() ?>asset/dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<script src="<?php echo base_url() ?>asset/extra-libs/c3/d3.min.js"></script>
<script src="<?php echo base_url() ?>asset/extra-libs/c3/c3.min.js"></script>
<script src="<?php echo base_url() ?>asset/libs/chartist/dist/chartist.min.js"></script>
<script src="<?php echo base_url() ?>asset/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="<?php echo base_url() ?>asset/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?php echo base_url() ?>asset/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?php echo base_url() ?>asset/dist/js/pages/dashboards/dashboard1.min.js"></script>
<!-- summernote -->
<script src="<?php echo base_url(); ?>asset/summernote/summernote.js"></script>
<!-- checkbox tabel -->
<!-- <script src="https://gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>
<script src="https://cdn.datatables.net/v/dt/dt-1.10.16/sl-1.2.5/datatables.min.js"></script> -->
</body>

<script type="text/javascript">
    $("#check-all").click(function() { // Ketika user men-cek checkbox all
        if ($(this).is(":checked")) // Jika checkbox all diceklis
            $(".check-item").prop("checked", true); // ceklis semua checkbox siswa dengan class "check-item"
        else // Jika checkbox all tidak diceklis
            $(".check-item").prop("checked", false); // un-ceklis semua checkbox siswa dengan class "check-item"
    });
    //Edit Data Admin
    $("#tbl_admin").on('click', '.editadmin', function() {
        var id = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        var username = $(this).attr('data-username');

        $('input[name="id"]').val(id);
        $('input[name="edit_nama"]').val(nama);
        $('input[name="edit_username"]').val(username);
        $("#edit-modal").modal('show');
    });
    //Edit Data Apotek
    $("#tbl_apotek").on('click', '.editapotek', function() {
        var id = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        var alamat = $(this).attr('data-alamat');
        var longitude = $(this).attr('data-longitude');
        var langitude = $(this).attr('data-langitude');

        $('input[name="id"]').val(id);
        $('input[name="edit_nama"]').val(nama);
        $('input[name="edit_alamat"]').val(alamat);
        $('input[name="edit_longitude"]').val(longitude);
        $('input[name="edit_langitude"]').val(langitude);
        $("#edit-modal").modal('show');
    });
    //Obat Apotek
    $("#tbl_apotek").on('click', '.obatapotek', function() {
        // var id = $(this).attr('data-id');
        // var nama = $(this).attr('data-nama');
        // var alamat = $(this).attr('data-alamat');
        // var longitude = $(this).attr('data-longitude');
        // var langitude = $(this).attr('data-langitude');

        // $('input[name="id"]').val(id);
        // $('input[name="edit_nama"]').val(nama);
        // $('input[name="edit_alamat"]').val(alamat);
        // $('input[name="edit_longitude"]').val(longitude);
        // $('input[name="edit_langitude"]').val(langitude);
        $("#obat-modal").modal('show');
    });
    //Edit Data Obat
    $("#tbl_obat").on('click', '.editobat', function() {
        var id = $(this).attr('data-id');

        window.location.replace("<?php echo base_url() ?>obat/edit?id=" + id);
    });
    //edtor summernote
    $('#editordata').summernote({
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['picture']]
        ],
        //set callback image tuk upload ke serverside
        callbacks: {
            onImageUpload: function(files) {
                uploadFile(files[0]);
            }
        }

    });

    $('#editordataedit').summernote({
        height: 200,
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['picture']]
        ],
        //set callback image tuk upload ke serverside
        callbacks: {
            onImageUpload: function(files) {
                uploadFile(files[0]);
            }
        }

    });

    function uploadFile(file) {
        data = new FormData();
        data.append("file", file);

        $.ajax({
            data: data,
            type: "POST",
            url: "<?php echo base_url(); ?>obat/saveGambar",
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
                console.log(url);
                $('#editordata').summernote("insertImage", url);
                $('#editordataedit').summernote("insertImage", url);
            }
        });
    }
</script>

</html>