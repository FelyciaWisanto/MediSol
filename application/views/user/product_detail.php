<?php
foreach ($obat as $u) {
?>
  <div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="<?php echo base_url() ?>home">Home</a> <span class="mx-2 mb-0">/</span> <a href="<?php echo base_url() ?>product">Product</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo $u->nama ?></strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-5 mr-auto">
          <div class="border text-center">
            <img src="<?php echo base_url() ?>asset/obat/<?php echo $u->gambar ?>" alt="Image" class="img-fluid p-5">
          </div>
        </div>
        <div class="col-md-6">

          <h2 class="text-black"><?php echo $u->nama ?></h2>
          <p><?php echo $u->keterangan ?></p>

        <?php }
        ?>

        <!-- <p><a href="cart.html" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</a></p> -->

        <div class="mt-5">
          <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Daftar Apotek</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Detail Obat</a>
            </li>

          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <table class="table custom-table">
                <thead>
                  <th>Nama</th>
                  <th>Alamat</th>
                  <th>Maps</th>
                </thead>
                <tbody>
                  <?php
                  foreach ($apotek as $u) {
                  ?>
                    <tr>
                      <th scope="row"><?php echo $u->nama ?></th>
                      <td><?php echo $u->alamat ?></td>
                      <td><a href="http://www.google.com/maps/place/<?php echo $u->langitude ?>,<?php echo $u->longitude ?>" target="_blank"><button type="button" class="btn btn-primary btn-md ">Open</button></a></td>
                    </tr>
                    <tr>
                    <?php
                  }
                    ?>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

              <table class="table custom-table">
                <?php
                foreach ($obat as $u) {
                ?>
                  <tbody>
                    <tr>
                      <td>Komposisi</td>
                      <td class="bg-light"><?php echo $u->komposisi ?></td>
                    </tr>
                    <tr>
                      <td>Efek Samping</td>
                      <td class="bg-light"><?php echo $u->efek_samping ?></td>
                    </tr>
                    <tr>
                      <td>Indikasi</td>
                      <td class="bg-light"><?php echo $u->indikasi ?></td>
                    </tr>
                    <tr>
                      <td>Dosis</td>
                      <td class="bg-light"><?php echo $u->dosis ?></td>
                    </tr>
                    <tr>
                      <td>Aturan Pakai</td>
                      <td class="bg-light"><?php echo $u->aturan_pakai ?></td>
                    </tr>
                    <tr>
                      <td>Perhatian</td>
                      <td class="bg-light"><?php echo $u->perhatian ?></td>
                    </tr>
                  </tbody>
                <?php }
                ?>
              </table>

            </div>

          </div>
        </div>


        </div>
      </div>
    </div>
  </div>