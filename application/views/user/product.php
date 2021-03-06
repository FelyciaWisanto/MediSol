<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="<?php echo base_url() ?>home">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Store</strong></div>
    </div>
  </div>
</div>

<div class="py-5">
  <div class="container">
    <div class="row">
      <!-- <div class="col-lg-6">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
            <div id="slider-range" class="border-primary"></div>
            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
          </div> -->
      <div class="col-lg-12 text-lg-right">
        <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter</h3>
        <button type="button" class="btn btn-primary btn-md dropdown-toggle px-4" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
          <a class="dropdown-item" href="#">Relevance</a>
          <a class="dropdown-item" href="#">Name, A to Z</a>
          <a class="dropdown-item" href="#">Name, Z to A</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Price, low to high</a>
          <a class="dropdown-item" href="#">Price, high to low</a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <?php
      $no = $this->uri->segment('3') + 1;
      foreach ($daftar_obat as $u) {
      ?>

        <div class="col-sm-6 col-lg-4 text-center item mb-4 item-v2">
          <a href="<?php echo base_url() ?>product/detail?id=<?php echo $u->id ?>"> <img width="300" height="450" src="<?php echo base_url() ?>asset/obat/<?php echo $u->gambar ?>" alt="Image"></a>
          <h3 class="text-dark"><a href="<?php echo base_url() ?>product/detail?id=<?php echo $u->id ?>"><?php echo $u->nama ?></a></h3>
          <p class="price"><a href="<?php echo base_url() ?>product/detail?id=<?php echo $u->id ?>"><button type="button" class="btn btn-primary btn-md ">Detail</button></a></p>

        </div>

      <?php } ?>
    </div>
    <div class="row mt-5">
      <div class="col-md-12 text-center">
        <div class="site-block-27">
          <ul>
            <!-- <li><a href="#">&lt;</a></li>
            <li class="active"><span>1</span></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li><a href="#">&gt;</a></li> -->
            <li><?php
                echo $this->pagination->create_links();
                ?></li>

          </ul>
        </div>
      </div>
    </div>
  </div>
</div>