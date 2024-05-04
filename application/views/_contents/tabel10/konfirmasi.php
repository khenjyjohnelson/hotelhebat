<?php switch ($this->session->userdata($tabel9_field6)) {
    // case $tabel9_field6_value3:
  case $tabel9_field6_value5:
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
}
?>

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <div class="container">
    <div class="row justify-content-center align-items-center h-100">

      <!-- mengecek apakah ada transaksi yang telah dilakukan -->
      <?php if (isset($tbl10)) { ?>
        <div class="col-md">
          <h1 class="text-center"><?= $title ?><?= $phase ?></h1>
          <p class="text-center"><?= $tabel10_field1_alias ?> Anda adalah <?= $tbl10->$tabel10_field1 ?></p>

          <div class="d-flex justify-content-center">
            <a class="btn btn-success text-light" href="<?= site_url('c_tabel10/print/' . $tbl10->$tabel10_field1) ?>" target="_blank">
              Cetak Bukti <?= $tabel10_alias ?></i></a>
          </div>

          <p class="text-center">Anda juga bisa mengecek data <?= $tabel10_alias ?> anda<br>
            pada daftar <?= $tabel10_alias ?><br>
            untuk mencetak bukti <?= $tabel10_alias ?></p>

          <div class="d-flex justify-content-center">
            <a class="text-decoration-none" href="<?= site_url('welcome') ?>">
              Kembali ke beranda
            </a>

          </div>
        </div>


           <?php } else { ?>
        <!-- anda mengakses halaman konfirmasi tapi tidak memiliki pesanan apapun -->
        <div class="col-md">
          <h1 class="text-center">Anda tidak melakukan <?= $tabel10_alias ?> apapun</h1>

          <div class="d-flex justify-content-center">
            <a class="text-decoration-none" href="<?= site_url('welcome') ?>">
              Kembali ke beranda
            </a>

          </div>
        </div>
      <?php } ?>
    </div>
  </div>

  <script src="fontawesome/js/all.js"></script>

</body>

</html>