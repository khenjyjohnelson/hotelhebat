<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value2:
  case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
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

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_b8_field3_alias ?></th>
        <th><?= $tabel_b9_field4_alias ?></th>
        <th><?= $tabel_b9_field5_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_b9 as $tl_b9):
        if ($tl_b9->$tabel_b9_field6 == NULL) { ?>
          <tr class="bg-light">
            <td></td>
            <td><?= $tl_b9->$tabel_b8_field3 ?></td>
            <td><?= $tl_b9->$tabel_b9_field4 ?></td>
            <td><?= $tl_b9->$tabel_b9_field5 ?></td>
            <td>
              <a class="btn btn-light text-warning"
                href="<?= site_url($tabel_b9 . '/lihat/' . $tl_b9->$tabel_b9_field1) ?>">
                <i class="fas fa-envelope-open"></i></a>
              <?= btn_lihat($tl_b9->$tabel_b9_field1) ?>
            </td>
          <?php } else { ?>
          <tr>
            <td></td>
            <td><?= $tl_b9->$tabel_b8_field3 ?></td>
            <td><?= $tl_b9->$tabel_b9_field4 ?></td>
            <td><?= $tl_b9->$tabel_b9_field5 ?></td>
            <td>
              <?= btn_lihat($tl_b9->$tabel_b9_field1) ?>
            </td>
          <?php }endforeach; ?>
    </tbody>


  </table>
</div>


<!-- modal lihat -->
<?php foreach ($tbl_b9 as $tl_b9): ?>
  <div id="lihat<?= $tl_b9->$tabel_b9_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header($tabel_b9_alias, $tl_b9->$tabel_b9_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <?= tampil_text('tabel_b8_field3', $tl_b9->$tabel_b8_field3) ?>
            <?= tampil_text('tabel_b8_field4', html_entity_decode($tl_b9->$tabel_b8_field4)) ?>
            <?= tampil_text('tabel_b8_field5', $tl_b9->$tabel_b8_field5) ?>
            <?= tampil_text('tabel_b8_field6', $tl_b9->$tabel_b8_field6) ?>
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