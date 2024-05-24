<?php switch (userdata($tabel_c2_field6)) {
  // case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value5:
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
        <th><?= lang('tabel_f2_field6_alias') ?></th>
        <th><?= lang('tabel_f2_field10_alias') ?></th>
        <th><?= lang('tabel_f2_field11_alias') ?></th>
        <th><?= lang('tabel_f2_field12_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_f2 as $tl_f2): ?>
        <tr>
          <td></td>
          <td><?= $tl_f2->$tabel_f2_field6 ?></td>
          <td><?= $tl_f2->$tabel_f2_field10 ?></td>
          <td><?= $tl_f2->$tabel_f2_field11 ?></td>
          <td><?= $tl_f2->$tabel_f2_field12 ?></td>
          <td>
            <?= btn_lihat($tl_f2->$tabel_f2_field1) ?>
            <?php switch ($tl_f2->$tabel_f2_field12) {
              case $tabel_f2_field12_value2: ?>
                <?= btn_field($tabel_f3_field6 . $tl_f2->$tabel_f2_field1, '<i class="fas fa-shopping-cart"></i>') ?>

                <?php break;
              case $tabel_f2_field12_value3:
              case $tabel_f2_field12_value4: ?>
                <?= btn_print('tabel_f2', $tl_f2->$tabel_f2_field1) ?>
                <?php break;
            } ?>
          </td>

        </tr>
      <?php endforeach ?>
    </tbody>

  </table>
</div>

<?php foreach ($tbl_f2 as $tl_f2): ?>
  <div id="lihat<?= $tl_f2->$tabel_f2_field1 ?>" class="modal fade lihat">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('tabel_f2_alias'), $tl_f2->$tabel_f2_field1) ?>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <?= tampil_text('tabel_f2_field1', $tl_f2->$tabel_f2_field1) ?>
              <?= tampil_text('tabel_f2_field3', $tl_f2->$tabel_f2_field3) ?>
              <?= tampil_text('tabel_f2_field4', $tl_f2->$tabel_f2_field4) ?>
              <?= tampil_text('tabel_f2_field5', $tl_f2->$tabel_f2_field5) ?>
            </div>
            <div class="col-md-6">
              <?= tampil_text('tabel_f2_field6', $tl_f2->$tabel_f2_field6) ?>
              <?= tampil_text('tabel_e4_field2', $tl_f2->$tabel_e4_field2) ?>
              <?= tampil_text('tabel_f2_field10', $tl_f2->$tabel_f2_field10) ?>
              <?= tampil_text('tabel_f2_field11', $tl_f2->$tabel_f2_field11) ?>
            </div>
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

  <?php switch ($tl_f2->$tabel_f2_field12) {
    case $tabel_f2_field12_value2: ?>
      <div id="<?= $tabel_f3_field6 . $tl_f2->$tabel_f2_field1 ?>" class="modal fade <?= $tabel_f3_field6 ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <?= modal_header(lang('tabel_f3_alias') . ' untuk ' . lang('tabel_f2_alias'), $tl_f2->$tabel_f2_field1) ?>

            <form action="<?= site_url($language . '/' . $tabel_f3 . '/tambah') ?>" method="post" enctype="multipart/form-data">

              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <?= input_hidden('tabel_f2_field4', $tl_f2->$tabel_f2_field4, 'required') ?>
                    <?= tampil_text('tabel_f2_field1', $tl_f2->$tabel_f2_field1) ?>
                    <?= tampil_text('tabel_f2_field3', $tl_f2->$tabel_f2_field3) ?>
                    <?= tampil_text('tabel_f2_field4', $tl_f2->$tabel_f2_field4) ?>
                    <?= tampil_text('tabel_f2_field5', $tl_f2->$tabel_f2_field5) ?>

                    <div class="col-md-6">
                      <?= tampil_text('tabel_f2_field6', $tl_f2->$tabel_f2_field6) ?>

                      <div class="form-group">
                        <label><?= $tabel_e4_field2_alias ?></label>
                        <p><?= $tl_f2->$tabel_e4_field2 ?></p>
                      </div>
                      <hr>

                      <?= tampil_text('tabel_f2_field10', $tl_f2->$tabel_f2_field10) ?>
                      <?= tampil_text('tabel_f2_field11', $tl_f2->$tabel_f2_field11) ?>
                    </div>


                    <!-- Input metode pembayaran -->

                    <div class="col-md-12">

                      <?= tampil_text('tabel_f2_field9', 'Rp ' . number_format($tl_f2->$tabel_f2_field9, '2', ',', '.')) ?>

                      <div class="form-group">
                        <label><?= $tabel_f3_field5_alias ?></label>
                        <select class="form-control" required name="<?= $tabel_f3_field5_input ?>">
                          <option selected hidden value=""><?= lang('select') ?> <?= $tabel_f3_field5_alias ?>...</option>
                          <option value="<?= $tabel_f3_field5_value1 ?>"><?= $tabel_f3_field5_value1_alias ?></option>
                          <option value="<?= $tabel_f3_field5_value2 ?>"><?= $tabel_f3_field5_value2_alias ?></option>
                        </select>
                      </div>

                      <?= input_hidden('tabel_f2_field1', $tl_f2->$tabel_f2_field1, 'required') ?>
                      <?= input_hidden('tabel_f2_field12', $tabel_f2_field12_value3, 'required') ?>
                      <?= edit_number('tabel_f3_field6', $tl_f2->$tabel_f2_field9, 'required readonly', '0', '') ?>
                    </div>

                  </div>
                </div>

                <!-- pesan untuk pengguna yang sedang merubah password -->
                <p class="small text-center text-danger"><?= get_flashdata('pesan_' . $tabel_f3_field6) ?></p>

                <div class="modal-footer">
                  <button class="btn btn-success" type="submit">Bayar</button>
                </div>
            </form>

          </div>
        </div>
      </div>

      <?php break;
    case $tabel_f2_field12_value3:
    case $tabel_f2_field12_value4: ?>

      <?php break;
  } ?>
<?php endforeach ?>