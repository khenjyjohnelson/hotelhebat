<?php switch ($this->session->userdata($tabel_c2_field6)) {
  // case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value5:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>


<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_f2_field6_alias ?></th>
        <th><?= $tabel_f2_field10_alias ?></th>
        <th><?= $tabel_f2_field11_alias ?></th>
        <th><?= $tabel_f2_field12_alias ?></th>
        <th>Aksi</th>
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

            <?php foreach ($tbl_e3 as $tl_e3): ?>
              <?php if ($tl_f2->$tabel_f2_field1 == $tl_e3->$tabel_f2_field1) { ?>
                <?= btn_field($tabel_e3 . $tl_f2->$tabel_f2_field1, '<i class="fas fa-bed"></i>') ?>
                <?php break;
              }
            endforeach ?>

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

<!-- modal bayar -->
<?php foreach ($tbl_f2 as $tl_f2): ?>

  <div id="<?= $tabel_f3_field6 . $tl_f2->$tabel_f2_field1 ?>" class="modal fade <?= $tabel_f3_field6 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header($tabel_f3_alias . ' untuk ' . $tabel_f2_alias, $tl_f2->$tabel_f2_field1) ?>

        <form action="<?= site_url($tabel_f3 . '/tambah') ?>" method="post" enctype="multipart/form-data">

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
                    <?php foreach ($tbl_e4 as $tl_e4):
                      if ($tl_e4->$tabel_e4_field1 === $tl_f2->$tabel_e4_field1) { ?>
                        <p><?= $tl_e4->$tabel_e4_field2 ?></p>
                      <?php } ?>
                    <?php endforeach ?>
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
                      <option selected hidden value="">Pilih <?= $tabel_f3_field5_alias ?>...</option>
                      <option value="<?= $tabel_f3_field5_value1 ?>"><?= $tabel_f3_field5_value1_alias ?></option>
                      <option value="<?= $tabel_f3_field5_value2 ?>"><?= $tabel_f3_field5_value2_alias ?></option>
                    </select>
                  </div>

                  <?= input_hidden('tabel_f2_field1', $tl_f2->$tabel_f2_field1, 'required') ?>
                  <?= input_hidden('tabel_f2_field12', $tabel_f2_field12_value3, 'required') ?>
                  <?= edit_number('tabel_f3_field6', $tl_f2->$tabel_f2_field9, 'required readonly') ?>
                </div>

              </div>
            </div>

            <!-- pesan untuk pengguna yang sedang merubah password -->
            <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_' . $tabel_f3_field6) ?></p>

            <div class="modal-footer">
              <button class="btn btn-success" type="submit">Bayar</button>
            </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach ?>

<!-- modal lihat -->
<?php foreach ($tbl_f2 as $tl_f2):
  foreach ($tbl_e4 as $tl_e4):
    if ($tl_e4->$tabel_e4_field1 == $tl_f2->$tabel_e4_field1) { ?>

      <div id="lihat<?= $tl_f2->$tabel_f2_field1 ?>" class="modal fade lihat">
        <div class="modal-dialog">
          <div class="modal-content">
            <?= modal_header($tabel_f2_alias, $tl_f2->$tabel_f2_field1) ?>


            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <?= tampil_text('tabel_f2_field1', $tl_f2->$tabel_f2_field1) ?>
                  <?= tampil_text('tabel_f2_field3', $tl_f2->$tabel_f2_field3) ?>
                  <?= tampil_text('tabel_f2_field4', $tl_f2->$tabel_f2_field4) ?>
                  <?= tampil_text('tabel_f2_field5', $tl_f2->$tabel_f2_field5) ?>
                  <?= tampil_text('tabel_f2_field6', $tl_f2->$tabel_f2_field6) ?>
                  <?= tampil_text('tabel_e4_field2', $tl_f2->$tabel_e4_field2) ?>
                  <?= tampil_text('tabel_f2_field10', $tl_f2->$tabel_f2_field10) ?>
                  <?= tampil_text('tabel_f2_field11', $tl_f2->$tabel_f2_field11) ?>
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
    <?php }
  endforeach;
endforeach ?>


<!-- modal lihat kamar -->
<!-- Aku ingin merubah modal ini menjadi modal yang memberikan informasi khusus mengenai kamar yang sudah dipesan -->
<!-- Aku mau yang ada di sini isinya bagus dan interaktif -->
<?php foreach ($tbl_f2 as $tl_f2):
  foreach ($tbl_e4 as $tl_e4):
    if ($tl_e4->$tabel_e4_field1 == $tl_f2->$tabel_e4_field1) { ?>

      <div id="<?= $tabel_e3 . $tl_f2->$tabel_f2_field1 ?>" class="modal fade lihat">
        <div class="modal-dialog">
          <div class="modal-content">
            <?= modal_header($tabel_f2_alias, $tl_f2->$tabel_f2_field1) ?>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <?= tampil_text('tabel_f2_field1', $tl_f2->$tabel_f2_field1) ?>
                  <?= tampil_text('tabel_f2_field3', $tl_f2->$tabel_f2_field3) ?>
                  <?= tampil_text('tabel_f2_field4', $tl_f2->$tabel_f2_field4) ?>
                  <?= tampil_text('tabel_f2_field5', $tl_f2->$tabel_f2_field5) ?>
                  <?= tampil_text('tabel_f2_field6', $tl_f2->$tabel_f2_field6) ?>
                  <?= tampil_text('tabel_e4_field2', $tl_f2->$tabel_e4_field2) ?>
                </div>

                <div class="col-md-6">
                  <?php foreach ($tbl_e3 as $tl_e3): ?>
                    <?php if ($tl_f2->$tabel_f2_field1 == $tl_e3->$tabel_f2_field1) { ?>

                      <?= tampil_text('tabel_e3_field1', $tl_e3->$tabel_e3_field1) ?>

                    <?php }
                  endforeach ?>

                  <?= tampil_text('tabel_f2_field10', $tl_f2->$tabel_f2_field10) ?>
                  <?= tampil_text('tabel_f2_field11', $tl_f2->$tabel_f2_field11) ?>

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
    <?php }
  endforeach;
endforeach ?>