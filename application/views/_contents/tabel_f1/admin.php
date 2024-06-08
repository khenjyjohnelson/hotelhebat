<?php switch (userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
    break;

  default:
    redirect(site_url($language . '/' . 'no_level'));
}
?>



<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
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
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_f1_field2_alias') ?></th>
        <th><?= lang('tabel_f1_field3_alias') ?></th>
        <th><?= lang('tabel_f1_field4_alias') ?></th>
        <th><?= lang('tabel_f1_field5_alias') ?></th>
        <th><?= lang('tabel_f1_field6_alias') ?></th>
        <th><?= lang('tabel_f1_field7_alias') ?></th>
        <th><?= lang('tabel_f1_field8_alias') ?></th>
        <th><?= lang('tabel_f1_field9_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($tbl_f1 as $tl_f1):
        foreach ($tbl_e4 as $tl_e4):
          if ($tl_e4->$tabel_e4_field1 == $tl_f1->$tabel_e4_field1) { ?>
            <tr>
              <td></td>
              <td><?= $tl_f1->$tabel_f1_field2 ?></td>
              <td><?= $tl_f1->$tabel_f1_field3 ?></td>
              <td><?= $tl_f1->$tabel_f1_field4 ?></td>
              <td><?= $tl_f1->$tabel_f1_field5 ?></td>
              <td><?= $tl_f1->$tabel_f1_field6 ?></td>
              <td><?= $tl_f1->$tabel_f1_field7 ?></td>
              <td><?= $tl_f1->$tabel_f1_field8 ?></td>
              <td><?= $tl_f1->$tabel_f1_field9 ?></td>
              <td>
                <?= btn_lihat($tl_f1->$tabel_f1_field1) ?>
                <?= btn_hapus('tabel_f1', $tl_f1->$tabel_f1_field1) ?>
              </td>
            </tr>
          <?php }
        endforeach;
      endforeach; ?>
    </tbody>



  </table>
</div>
'
<!-- modal lihat -->
<?php foreach ($tbl_f1 as $tl_f1): ?>
  <div id="lihat<?= $tl_f1->$tabel_f1_field1 ?>" class="modal fade lihat">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('tabel_f1_alias'), $tl_f1->$tabel_f1_field1) ?>

        <div class="modal-body">
          <div class="table-responsive">
            <table class="table table-light" id="data">
              <thead></thead>
              <tbody>
                <?= row_data('tabel_f1_field2', $tl_f1->$tabel_f1_field2) ?>
                <?= row_data('tabel_f1_field4', $tl_f1->$tabel_f1_field4) ?>
                <?= row_data('tabel_f1_field5', $tl_f1->$tabel_f1_field5) ?>
                <?= row_data('tabel_f1_field6', $tl_f1->$tabel_f1_field6) ?>

                <?= row_data('tabel_f1_field7', $tl_f1->$tabel_f1_field7) ?>
                <?= row_data('tabel_e4_field2', $tl_f1->$tabel_e4_field2) ?>
                <?= row_data('tabel_f1_field11', $tl_f1->$tabel_f1_field11) ?>
                <?= row_data('tabel_f1_field12', $tl_f1->$tabel_f1_field12) ?>

              </tbody>
              <tfoot></tfoot>
            </table>
          </div>
        </div>

        <!-- memunculkan notifikasi modal -->
        <p class="small text-center text-danger"><?= get_flashdata('pesan_lihat') ?></p>

        <div class="modal-footer">
          <?= btn_tutup() ?>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>