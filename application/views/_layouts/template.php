<!-- setting setiap src di assets -->
<base href="<?= base_url('assets/') ?>">

<!-- memastikan user memiliki id  -->
<!-- memastikan user memiliki id  -->
<?php
switch (true) {
  case ($this->session->userdata($tabel9_field1)):
    break;
  case ($this->session->userdata($tabel4_field1)):
    break;
  default:
    session_destroy();
    // Handle other cases if needed
    break;
}
?>


<!DOCTYPE html>
<html lang="en">

<!-- header -->
<?php $this->load->view($head) ?>

<body>

  <!-- menampilkan data pengaturan sebagai p -->
  <?php foreach ($tbl7 as $tl7): ?>

    <!-- toast -->
    <div class="toast fade" id="element" data-delay="5000">
      <div class="toast-header">
        <img class="rounded mr-2" src="img/tabel7/<?= $tl7->$tabel7_field3 ?>" width="15px" draggable="false">
        <strong class="mr-auto">
          <?= $tl7->$tabel7_field2 ?>
        </strong>
        <button type="button" class="close" data-dismiss="toast">
          <span>&times;</span>
        </button>
      </div>

      <div class="toast-body">
        <?= $this->session->flashdata($this->flashdatas['flash1']) ?>
      </div>
    </div>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top shadow-sm">
      <a class="navbar-brand font-weight-bold" href="<?= site_url('welcome') ?>">
        <img src="img/tabel7/<?= $tl7->$tabel7_field4; ?>" height="50">
      </a>

      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarku">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- menu navbar berdasarkan level user -->
      <div class="collapse navbar-collapse" id="navbarku">
        <?php $this->load->view('_partials/menu'); ?>
      </div>

    </nav>

    <!-- komponen berada tengah halaman -->
    <div class="container" id="konten">

      <!-- modal cari data pesanan -->
      <div id="cari" class="modal fade cari">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Cari daftar <?= $tabel8_alias ?> Anda</h5>

              <button class="close" data-dismiss="modal">
                <span>&times;</span>
              </button>
            </div>

            <!-- form mencari data pesanan, method get utk menampilkan apa yg diinput pengguna di halaman tujuan -->
            <form action="<?= site_url('c_tabel8/cari') ?>" method="get">
              <div class="modal-body">
                <div class="form-group">
                  <label>
                    <?= $tabel8_field1_alias ?>
                  </label>
                  <input class="form-control" type="text" required name="<?= $tabel8_field1_input ?>"
                    placeholder="Masukkan <?= $tabel8_field1_alias ?>">
                </div>

                <div class="form-group">
                  <label>
                    <?= $tabel8_field4_alias ?>
                  </label>
                  <input class="form-control" type="email" required name="<?= $tabel8_field4_input ?>"
                    placeholder="Masukkan <?= $tabel8_field4_alias ?> Anda">
                </div>
              </div>

              <!-- memunculkan notifikasi modal -->
              <p class="small text-center text-danger">
                <?= $this->session->flashdata('pesan_cari') ?>
              </p>

              <div class="modal-footer">
                <button class="btn btn-success" type="submit">Cari</button>
              </div>
            </form>

          </div>
        </div>
      </div>

      <div class="konten">

        <!-- konten sesuai controller -->
        <?php $this->load->view($konten) ?>
      </div>

    </div>


    <!-- footer -->
    <div class="container-fluid bg-light border">
      <div class="container">

        <!-- menampilkan footer khusus jika level adalah tamu, admin, dan sebagainya  -->
        <?php switch ($this->session->userdata($tabel9_field6)) {
          case $tabel9_field6_value3:
          case $tabel9_field6_value4:
          case $tabel9_field6_value2:
            ?>
            <div class="row justify-content-center align-content-center">
              <p class="pt-2">
                <?= $year_code ?> |
                <?= $tl7->$tabel7_field2 ?>
              </p>
            </div>
            <?php break;

          default: ?>

            <!-- menampilkan footer untuk umum  -->
            <div class="row justify-content-center">
              <div class="col-lg-4 pt-3">
                <img src="img/tabel7/<?= $tl7->$tabel7_field4; ?>" height="50">
                <p class="small pt-2">
                  <?php foreach ($tbl23 as $tl23):
                    if ($tl7->$tabel7_field11 == $tl23->$tabel23_field1) { ?>


                      <a class="text-decoration-none text-dark" href="<?= site_url('c_tabel23') ?>">
                        <img src="img/tabel23/<?= $tl23->$tabel23_field4 ?>" height="25"></a><br>


                    <?php }endforeach; ?>
                  <?= $year_code ?>
                  <?= $tl7->$tabel7_field2 ?>.
                  <?= $copyright_notices ?>
                </p>
              </div>

              <div class="col-lg-3 pt-3">
                <h3>Jelajahi</h3>
                <ul class="list-unstyled">
                  <li>
                    <a type="button" id="nextPage" class="text-decoration-none text-dark" href="<?= site_url('c_tabel6') ?>">
                      <?= $tabel6_alias ?>
                    </a>
                  </li>
                  <li>
                    <a type="button" id="nextPage" class="text-decoration-none text-dark" href="<?= site_url('c_tabel3') ?>">
                      <?= $tabel3_alias ?>
                    </a>
                  </li>
                </ul>
              </div>

              <div class="col-lg-3 pt-3">
                <h3>Alamat</h3>
                <ul class="list-unstyled">
                  <li>
                    <?= $tl7->$tabel7_field8 ?>
                  </li>
                  <li>
                    <?= $tl7->$tabel7_field7 ?>
                  </li>
                  <li>
                    <?= $tl7->$tabel7_field6 ?>
                  </li>
                </ul>
              </div>

              <div class="col-lg-2 pt-3">
                <h3>Ikuti</h3>
                <ul class="list-unstyled">
                  <?php foreach ($tbl24 as $tl24):
                    if ($tl24->$tabel24_field2 == $tl7->$tabel7_field1) { ?>
                      <li>
                        <a class="text-decoration-none text-primary" href="<?= $tl24->$tabel24_field4 ?>" target="_blank">
                          <?= $tl24->$tabel24_field3 ?></a>
                      </li>
                    <?php } endforeach; ?>
                </ul>
              </div>
            </div>
        <?php }
        ?>

      </div>
    </div>


    <?php $this->load->view('_partials/script') ?>

  <?php endforeach; ?>

</body>

</html>