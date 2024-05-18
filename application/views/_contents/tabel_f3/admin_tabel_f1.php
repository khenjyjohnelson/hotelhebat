<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value2:
    // case $tabel_c2_field6_value4:
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

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_f3_field1_alias ?></th>
        <th><?= $tabel_f3_field4_alias ?></th>
        <th><?= $tabel_f3_field5_alias ?></th>
        <th><?= $tabel_f3_field6_alias ?></th>
        <th><?= $tabel_f3_field7_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_f3 as $tl_f3) : ?>
        <tr>
          <td></td>
          <td><?= $tl_f3->$tabel_f3_field1 ?></td>
          <td><?= $tl_f3->$tabel_f3_field4 ?></td>
          <td><?= $tl_f3->$tabel_f3_field5 ?></td>
          <td>Rp <?= number_format($tl_f3->$tabel_f3_field6, '2', ',', '.') ?></td>
          <td><?= $tl_f3->$tabel_f3_field7 ?></td>
          <td>
            <?= btn_lihat($tl_f3->$tabel_f3_field1) ?>
            <?= btn_print('tabel_f3', $tl_f3->$tabel_f3_field1) ?>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>



  </table>
</div>

<!-- modal lihat -->
<!-- Tabel transaksi dan tabel history literally sudah bergabung
Jadi tidak perlu menambahkan foreach hitory lagi -->
<?php foreach ($tbl_f3 as $tl_f3) : ?>
  <div id="lihat<?= $tl_f3->$tabel_f3_field1 ?>" class="modal fade lihat" role="dialog">
    <?php foreach ($tbl_e4 as $tl_e4) : ?>
      <?php if ($tl_e4->$tabel_e4_field1 === $tl_f3->$tabel_e4_field1) { ?>
        <div class="modal-dialog">
          <div class="modal-content">
            <?= modal_header($tabel_f3_alias, $tl_f3->$tabel_f3_field1) ?>
            
            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <?= tampil_text('tabel_f3_field1', $tl_f3->$tabel_f3_field1) ?>
                  <?= tampil_text('tabel_f3_field4', $tl_f3->$tabel_f3_field4) ?>
                  <?= tampil_text('tabel_f3_field5', $tl_f3->$tabel_f3_field5) ?>
                  <?= tampil_text('tabel_f3_field6', 'Rp' . number_format($tl_f3->$tabel_f3_field6, '2', ',', '.')) ?>
                </div>

                <!-- Di sini adalah bagian menampilkan data history -->
                <div class="col-md-6">
                  <?= tampil_text('tabel_f2_field6', $tl_f3->$tabel_f2_field6) ?>
                  <?= tampil_text('tabel_e4_field2', $tl_e4->$tabel_e4_field2) ?>
                  <?= tampil_text('tabel_f2_field10', $tl_f3->$tabel_f2_field10) ?>
                  <?= tampil_text('tabel_f2_field11', $tl_f3->$tabel_f2_field11) ?>
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
      <?php } ?>
    <?php endforeach ?>
  </div>
<?php endforeach ?>