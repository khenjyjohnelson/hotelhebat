<?php switch ($this->session->userdata($tabel_c2_field6)) {
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

<?= btn_tambah() ?>
<?= btn_laporan('tabel_e3') ?>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_e3_field1_alias') ?></th>
        <th><?= lang('tabel_e3_field2_alias') ?></th>
        <th><?= lang('tabel_e3_field4_alias') ?></th>
        <th><?= lang('tabel_e3_field5_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_e3 as $tl_e3): ?>
        <tr>
          <td></td>
          <td><?= $tl_e3->$tabel_e3_field1; ?></td>
          <td><?= $tl_e3->$tabel_e4_field2 ?></td>
          <td><?= $tl_e3->$tabel_e3_field4 ?></td>
          <td><?= $tl_e3->$tabel_e3_field5 ?></td>
          <td>
            <?= btn_lihat($tl_e3->$tabel_e3_field1) ?>
            <?php switch ($tl_e3->$tabel_e3_field4) {
              case $tabel_e3_field4_value2:
              case $tabel_e3_field4_value3: ?>
                <?= btn_edit($tl_e3->$tabel_e3_field1) ?>
                <?php break;
              case $tabel_e3_field4_value4: ?>
                <?= btn_field($tabel_c1_field6_value1 . $tl_e3->$tabel_e3_field1, '<i class="fas fa-broom"></i>') ?>

                <?php break;
              case $tabel_e3_field4_value5: ?>
                <?= btn_field($tabel_c1_field6_value2 . $tl_e3->$tabel_e3_field1, '<i class="fas fa-hammer"></i>') ?>
                <?php break;
            } ?>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>



<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= modal_header(lang('add') . lang('tabel_e3_alias'), '') ?>

      <form action="<?= site_url($language . '/' . $tabel_e3 . '/tambah') ?>" method="post" enctype="multipart/form-data">
        <div class="modal-body">

          <!-- memilih salah satu tipe kamar yang ada -->
          <div class="form-group">
            <label><?= $tabel_e4_field2_alias ?></label>
            <select class="form-control" required name="<?= $tabel_e4_field1_input ?>">
              <option selected hidden value=""><?= lang('select') ?> <?= $tabel_e4_field2_alias ?>...</option>
              <?php foreach ($tbl_e4 as $tl_e4): ?>

                <!-- mengambil nilai tipe dari tipe kamar -->
                <option value="<?= $tl_e3->$tabel_e3_field2 ?>"><?= $tl_e3->$tabel_e4_field2; ?></option>

              <?php endforeach ?>

            </select>
          </div>

          <div class="form-group">
            <label><?= $tabel_e3_field4_alias ?></label>
            <select class="form-control" required name="<?= $tabel_e3_field4_input ?>">
              <option selected hidden value=""><?= lang('select') ?> <?= $tabel_e3_field4_alias ?>...</option>

              <!-- memilih nilai status -->
              <option value="<?= $tabel_e3_field4_value2 ?>"><?= $tabel_e3_field4_value2_alias ?></option>
              <option value="<?= $tabel_e3_field4_value4 ?>"><?= $tabel_e3_field4_value4_alias ?></option>
              <option value="<?= $tabel_e3_field4_value5 ?>"><?= $tabel_e3_field4_value5_alias ?></option>

            </select>
          </div>

          <?= add_number('tabel_e3_field5', 'required', '0', '') ?>

        </div>

        <!-- memunculkan notifikasi modal -->
        <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_tambah') ?></p>

        <div class="modal-footer">
          <?= btn_simpan() ?>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal edit -->
<?php foreach ($tbl_e3 as $tl_e3): ?>
  <?php switch ($tl_e3->$tabel_e3_field4) {
    case $tabel_e3_field4_value2:
    case $tabel_e3_field4_value3: ?>
      <div id="ubah<?= $tl_e3->$tabel_e3_field1; ?>" class="modal fade ubah">
        <div class="modal-dialog">
          <div class="modal-content">
            <?= modal_header('Edit' . lang('tabel_e3_alias'), $tl_e3->$tabel_e3_field1) ?>

            <form action="<?= site_url($language . '/' . $tabel_e3 . '/update') ?>" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <?= edit_text('tabel_e4_field2', $tl_e3->$tabel_e4_field2, 'required readonly') ?>
                <?= input_hidden('tabel_e4_field1', $tl_e3->$tabel_e3_field2, 'required') ?>

                <div class="form-group">
                  <label><?= $tabel_e3_field4_alias ?></label>
                  <select class="form-control" required name="<?= $tabel_e3_field4_input ?>">
                    <option selected hidden value="<?= $tl_e3->$tabel_e3_field4; ?>"><?= $tl_e3->$tabel_e3_field4; ?>
                    </option>

                    <!-- memilih nilai status -->
                    <option value="<?= $tabel_e3_field4_value4 ?>"><?= $tabel_e3_field4_value4_alias ?></option>
                    <option value="<?= $tabel_e3_field4_value5 ?>"><?= $tabel_e3_field4_value5_alias ?></option>

                  </select>
                </div>

                <?= input_hidden('tabel_e3_field1', $tl_e3->$tabel_e3_field1, 'required') ?>
                <?= edit_textarea('tabel_e3_field5', $tl_e3->$tabel_e3_field5, 'required') ?>
              </div>

              <!-- memunculkan notifikasi modal -->
              <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_ubah') ?></p>

              <div class="modal-footer">
                <?= btn_update() ?>
              </div>
            </form>
          </div>
        </div>
      </div>

      <?php break;
    case $tabel_e3_field4_value4: ?>
      <div id="<?= $tabel_c1_field6_value1 . $tl_e3->$tabel_e3_field1 ?>"
        class="modal fade <?= $tabel_c1_field6_value1 ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <?= modal_header('Assign ' . lang('tabel_c1_alias') . ' untuk ' . lang('tabel_e3_alias'), $tl_e3->$tabel_e3_field1) ?>

            <!-- form untuk mengubah nilai status sebuah kamar -->
            <form action="<?= site_url($language . '/' . $tabel_f4 . '/tambah') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <?= input_hidden('tabel_c2_field1', $this->session->userdata($tabel_c2_field1), 'required') ?>
                    <?= tampil_text('tabel_e3_field1', $tl_e3->$tabel_e3_field1) ?>
                    <?= tampil_text('tabel_e3_field2', $tl_e3->$tabel_e3_field2) ?>
                    <?= tampil_text('tabel_e3_field4', $tl_e3->$tabel_e3_field4) ?>

                    <?= tampil_file($tabel_e4, 'tabel_e4_field3', $tl_e3->$tabel_e4_field3) ?>
                    <?= tampil_text('tabel_e3_field5', $tl_e3->$tabel_e3_field5) ?>

                    <!-- mengubah status kamar secara instan berdasarkan id_pesanan -->
                    <!-- jika id pesanan itu kosong, berarti belum ada yang pesan dan kamar menjadi <?= $tabel_e3_field4_value2_alias ?>
                jika sebaliknya, maka kamar akan menjadi <?= $tabel_e3_field4_value3_alias ?> -->
                    <?php if ($tl_e3->$tabel_e3_field3 <> 0) { ?>
                      <?= input_hidden('tabel_e3_field4', $tabel_e3_field4_value3, 'required') ?>
                    <?php } else { ?>
                      <?= input_hidden('tabel_e3_field4', $tabel_e3_field4_value2, 'required') ?>
                    <?php } ?>
                  </div>

                  <div class="col-md-6">
                    <!-- ini adalah fitur untuk assign petugas -->
                    <div class="form-group">
                      <label><?= $tabel_c1_field2_alias ?></label>
                      <select class="form-control" required name="<?= $tabel_c1_field1_input ?>">

                        <!-- menampilkan petugas buat assign -->
                        <option selected hidden><?= lang('select') ?> <?= $tabel_c1_alias ?>...</option>
                        <?php
                        foreach ($tbl_c1 as $tl_c1):
                          if ($tl_c1->$tabel_c1_field6 == $tabel_c1_field6_value1) { ?>
                            <option value="<?= $tl_c1->$tabel_c1_field1; ?>"><?= $tl_c1->$tabel_c1_field2; ?> -
                              <?= $tl_c1->$tabel_c1_field6; ?>
                            </option>
                          <?php }
                        endforeach ?>
                      </select>
                    </div>

                    <!-- Aku masih ada rencana untuk mengubah textbox keterangan ini dengan dropbox 
                  karena menurutku textarea masih kurang cukup
                dan aku juga membutuhkan bantuan ahli UI UX untuk menentukan keputusan terbaik -->

                    <?= add_textarea('tabel_f3_field6', 'required') ?>
                  </div>
                </div>
              </div>

              <!-- memunculkan notifikasi modal -->
              <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_' . $tabel_c1_field6_value1) ?>
              </p>

              <div class="modal-footer">
                <p>Proses <?= $tabel_e3_alias ?>       <?= $tl_e3->$tabel_e3_field1; ?>?</p>
                <button class="btn btn-success" type="submit">Ya</button>

              </div>
            </form>

          </div>
        </div>
      </div>

      <?php break;
    case $tabel_e3_field4_value5: ?>
      <div id="<?= $tabel_c1_field6_value2 . $tl_e3->$tabel_e3_field1 ?>" class="modal fade maintenance">
        <div class="modal-dialog">
          <div class="modal-content">
            <?= modal_header('Assign ' . lang('tabel_c1_alias') . ' untuk ' . lang('tabel_e3_alias'), $tl_e3->$tabel_e3_field1) ?>

            <!-- form untuk mengubah nilai status sebuah kamar -->
            <form action="<?= site_url($language . '/' . $tabel_f4 . '/tambah') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <?= input_hidden('tabel_c2_field1', $this->session->userdata($tabel_c2_field1), 'required') ?>
                    <?= tampil_text('tabel_e3_field1', $tl_e3->$tabel_e3_field1) ?>
                    <?= tampil_text('tabel_e3_field2', $tl_e3->$tabel_e3_field2) ?>
                    <?= tampil_text('tabel_e3_field4', $tl_e3->$tabel_e3_field4) ?>

                    <?= tampil_file($tabel_e4, 'tabel_e4_field3', $tl_e3->$tabel_e4_field3) ?>
                    <?= tampil_text('tabel_e3_field5', $tl_e3->$tabel_e3_field5) ?>
                    <!-- mengubah status kamar secara instan berdasarkan id_pesanan -->
                    <!-- jika id pesanan itu kosong, berarti belum ada yang pesan dan kamar menjadi <?= $tabel_e3_field4_value2_alias ?>
                jika sebaliknya, maka kamar akan menjadi <?= $tabel_e3_field4_value3_alias ?> -->
                    <?php if ($tl_e3->$tabel_e3_field3 <> 0) { ?>
                      <?= input_hidden('tabel_e3_field4', $tabel_e3_field4_value3, 'required') ?>
                    <?php } else { ?>
                      <?= input_hidden('tabel_e3_field4', $tabel_e3_field4_value2, 'required') ?>
                    <?php } ?>
                  </div>

                  <div class="col-md-6">
                    <!-- ini adalah fitur untuk assign petugas -->
                    <div class="form-group">
                      <label><?= $tabel_c1_alias ?></label>
                      <select class="form-control" required name="<?= $tabel_c1_field1_input ?>">

                        <!-- menampilkan petugas buat assign -->
                        <option selected hidden><?= lang('select') ?> <?= $tabel_c1_alias ?>...</option>
                        <?php
                        foreach ($tbl_c1 as $tl_c1):
                          if ($tl_c1->$tabel_c1_field6 == $tabel_c1_field6_value1) { ?>
                            <option value="<?= $tl_c1->$tabel_c1_field1; ?>"><?= $tl_c1->$tabel_c1_field2; ?> -
                              <?= $tl_c1->$tabel_c1_field6; ?>
                            </option>
                          <?php }
                        endforeach ?>
                      </select>
                    </div>

                    <?= add_textarea('tabel_e3_field5', 'required') ?>
                  </div>
                </div>
              </div>

              <!-- memunculkan notifikasi modal -->
              <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_maintenance') ?></p>

              <div class="modal-footer">
                <p>Proses <?= $tabel_e3_alias ?>       <?= $tl_e3->$tabel_e3_field1; ?>?</p>
                <button class="btn btn-success" type="submit">Ya</button>

              </div>
            </form>

          </div>
        </div>
      </div>
      <?php break;
  } ?>




  <div id="lihat<?= $tl_e3->$tabel_e3_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header(lang('tabel_e3_alias'), $tl_e3->$tabel_e3_field1) ?>
        <form>
          <div class="modal-body">
            <?= tampil_text('tabel_e3_field2', $tl_e3->$tabel_e3_field2) ?>
            <?= tampil_text('tabel_e3_field4', $tl_e3->$tabel_e3_field4) ?>
            <?= tampil_text('tabel_e3_field5', $tl_e3->$tabel_e3_field5) ?>
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


<?php endforeach ?>