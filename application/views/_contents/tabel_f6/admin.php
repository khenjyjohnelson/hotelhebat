<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<a class="btn btn-info mb-4" href="<?= site_url($tabel_f4 . '/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_f4_field1_alias ?></th>
        <th><?= $tabel_f4_field2_alias ?></th>
        <th><?= $tabel_f4_field3_alias ?></th>
        <th><?= $tabel_f4_field4_alias ?></th>
        <th><?= $tabel_f4_field5_alias ?></th>
        <th><?= $tabel_f4_field6_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_f4 as $tl_f4): ?>
        <tr>
          <td></td>
          <td><?= $tl_f4->$tabel_f4_field1; ?></td>
          <td><?= $tl_f4->$tabel_f4_field2 ?></td>
          <td><?= $tl_f4->$tabel_f4_field3 ?></td>
          <td><?= $tl_f4->$tabel_f4_field4 ?></td>
          <td><?= $tl_f4->$tabel_f4_field5 ?></td>
          <td><?= $tl_f4->$tabel_f4_field6 ?></td>
          <td> <?= btn_lihat($tl_f4->$tabel_f4_field1) ?>
            <?= btn_hapus('tabel_f4', $tl_f4->$tabel_f4_field1) ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>


<!-- modal lihat -->
<?php foreach ($tbl_f4 as $tl_f4): ?>
  <div id="lihat<?= $tl_f4->$tabel_f4_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header($tabel_f4_alias . ' ' . $tl_f4->$tabel_f4_field1, '') ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <?= tampil_text('$tabel_f4_field1', $tl_f4->$tabel_f4_field1) ?>
            <?= tampil_text('$tabel_f4_field2', $tl_f4->$tabel_f4_field2) ?>
            <?= tampil_text('$tabel_f4_field3', $tl_f4->$tabel_f4_field3) ?>
            <?= tampil_text('$tabel_f4_field4', $tl_f4->$tabel_f4_field4) ?>
            <?= tampil_text('$tabel_f4_field5', $tl_f4->$tabel_f4_field5) ?>
            <?= tampil_text('$tabel_f4_field6', $tl_f4->$tabel_f4_field6) ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <?= btn_tutup() ?>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>