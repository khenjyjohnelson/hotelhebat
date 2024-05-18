<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
    // case $tabel_c2_field6_value4:
    break;
  case $tabel_c2_field6_value5:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>



<div class="row mb-2 align-items-center">
  <div class="col-md-6 d-flex align-items-center">
    <h1><?= $title ?><?= $phase ?></h1>
  </div>
  <div class="col-md-6 text-right">
    <?php foreach ($dekor as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200" alt="Image">
    <?php endforeach ?>
  </div>
</div>
<hr>

<!-- method get supaya nilai dari filter bisa tampil nanti -->
<!-- tabel fiter history -->
<form action="<?= site_url($tabel_f1 . '/filter_' . $tabel_c1 . ' /admin') ?>" method="get">

  <div class="row">
    <div class="col-md-auto">
      <table class="mb-4">
        <!-- Mengecek data menggunakan tanggal cek in -->
        <tr>
          <td class="pr-2"><?= $tabel_f1_field11_alias ?></td>
          <?= filter_tgl('Dari', 'tabel_f1_field11_filter1', '') ?>
          <?= filter_tgl('Ke', 'tabel_f1_field11_filter2', '') ?>

          <td>
            <?= btn_cari() ?>
            <?= btn_redo('tabel_f1', '/daftar') ?>
          </td>
        </tr>

        <!-- Mengecek data menggunakan tanggal cek out -->
        <!-- method get supaya nilai dari filter bisa tampil nanti -->
        <tr>

          <td class="pr-2"><?= $tabel_f1_field12_alias ?></td>
          <?= filter_tgl('Dari', 'tabel_f1_field12_filter1', '') ?>
          <?= filter_tgl('Ke', 'tabel_f1_field12_filter2', '') ?>
        </tr>
      </table>
    </div>

  </div>

</form>


<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_f1_field2_alias ?></th>
        <th><?= $tabel_f1_field3_alias ?></th>
        <th><?= $tabel_f1_field4_alias ?></th>
        <th><?= $tabel_f1_field5_alias ?></th>
        <th><?= $tabel_f1_field6_alias ?></th>
        <th><?= $tabel_f1_field7_alias ?></th>
        <th><?= $tabel_f1_field8_alias ?></th>
        <th><?= $tabel_f1_field9_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tbl_f1_e4 as $tl_f1_e4): ?>
        <tr>
          <td></td>
          <td><?= $tl_f1_e4->$tabel_f1_field2 ?></td>
          <td><?= $tl_f1_e4->$tabel_f1_field3 ?></td>
          <td><?= $tl_f1_e4->$tabel_f1_field4 ?></td>
          <td><?= $tl_f1_e4->$tabel_f1_field5 ?></td>
          <td><?= $tl_f1_e4->$tabel_f1_field6 ?></td>
          <td><?= $tl_f1_e4->$tabel_f1_field7 ?></td>
          <td><?= $tl_f1_e4->$tabel_f1_field8 ?></td>
          <td><?= $tl_f1_e4->$tabel_f1_field9 ?></td>
          <td>
            <?= btn_lihat($tl_f1_e4->$tabel_f1_field1) ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
</div>

<!-- modal lihat -->
<?php foreach ($tbl_f1_e4 as $tl_f1_e4): ?>
  <div id="lihat<?= $tl_f1_e4->$tabel_f1_field1 ?>" class="modal fade lihat">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header($tabel_f1_alias, $tl_f1_e4->$tabel_f1_field1) ?>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <?= tampil_text('tabel_f1_field2', $tl_f1_e4->$tabel_f1_field2) ?>
              <?= tampil_text('tabel_f1_field4', $tl_f1_e4->$tabel_f1_field4) ?>
              <?= tampil_text('tabel_f1_field5', $tl_f1_e4->$tabel_f1_field5) ?>
              <?= tampil_text('tabel_f1_field6', $tl_f1_e4->$tabel_f1_field6) ?>

            </div>

            <div class="col-md-6">
              <?= tampil_text('tabel_f1_field7', $tl_f1_e4->$tabel_f1_field7) ?>
              <?= tampil_text('tabel_e4_field2', $tl_f1_e4->$tabel_e4_field2) ?>
              <?= tampil_text('tabel_f1_field11', $tl_f1_e4->$tabel_f1_field11) ?>
              <?= tampil_text('tabel_f1_field12', $tl_f1_e4->$tabel_f1_field12) ?>

            </div>
          </div>
        </div>

        <!-- memunculkan notifikasi modal -->
        <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

        <div class="modal-footer">
          <?= btn_tutup() ?>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>