<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= count_data($tbl_e3) ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200" alt="Image">
    <?php endforeach ?>
  </div>
</div>
<hr>

<div class="row">
  <div class="col-md-10">
    <?= btn_tambah() ?>
    <?= btn_laporan('tabel_e3') ?>
  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>



<div id="card-view" class="row data-view active">
  <?php foreach ($tbl_e3->result() as $tl_e3):
    switch ($tl_e3->$tabel_e3_field4) {
      case $tabel_e3_field4_value2:
      case $tabel_e3_field4_value3:
        $button = btn_edit($tl_e3->$tabel_e3_field1);
        break;
      case $tabel_e3_field4_value4:
        $button = btn_field($tabel_c1_field7_value1 . $tl_e3->$tabel_e3_field1, '<i class="fas fa-broom"></i>');
        break;
      case $tabel_e3_field4_value5:
        $button = btn_field($tabel_c1_field7_value2 . $tl_e3->$tabel_e3_field1, '<i class="fas fa-hammer"></i>');
        break;
    }

    echo card_regular(
      $tl_e3->$tabel_e4_field1,
      $tl_e3->$tabel_e4_field1 . ' | ' . $tl_e3->$tabel_e4_field2,
      $tl_e3->$tabel_e4_field4,
      btn_lihat($tl_e3->$tabel_e4_field1) . ' ' .
      $button,
      'text-white bg-danger',
      $tabel_e3
    );
  endforeach; ?>
</div>


<div id="table-view" class="table-responsive data-view" style="display: none;">
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
      <?php foreach ($tbl_e3->result() as $tl_e3): ?>
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
                <?= btn_field($tabel_c1_field7_value1 . $tl_e3->$tabel_e3_field1, '<i class="fas fa-broom"></i>') ?>

                <?php break;
              case $tabel_e3_field4_value5: ?>
                <?= btn_field($tabel_c1_field7_value2 . $tl_e3->$tabel_e3_field1, '<i class="fas fa-hammer"></i>') ?>
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
      <?= modal_header_add(lang('add') . ' ' . lang('tabel_e3_alias'), '') ?>

      <form action="<?= site_url($language . '/' . $tabel_e3 . '/tambah') ?>" method="post"
        enctype="multipart/form-data">
        <div class="modal-body">

          <!-- memilih salah satu tipe kamar yang ada -->
          <div class="form-group">
            <select class="form-control float" required name="<?= $tabel_e4_field1_input ?>">
              <option selected hidden value=""><?= lang('select') ?> <?= $tabel_e4_field2_alias ?>...</option>
              <?php foreach ($tbl_e3->result() as $tl_e3): ?>

                <!-- mengambil nilai tipe dari tipe kamar -->
                <option value="<?= $tl_e3->$tabel_e3_field2 ?>"><?= $tl_e3->$tabel_e4_field2; ?></option>

              <?php endforeach ?>

            </select>
            <label class="form-label"><?= $tabel_e4_field2_alias ?></label>
          </div>

          <div class="form-group">
            <select class="form-control float" required name="<?= $tabel_e3_field4_input ?>">
              <option selected hidden value=""><?= lang('select') ?> <?= $tabel_e3_field4_alias ?>...</option>

              <!-- memilih nilai status -->
              <option value="<?= $tabel_e3_field4_value2 ?>"><?= $tabel_e3_field4_value2_alias ?></option>
              <option value="<?= $tabel_e3_field4_value4 ?>"><?= $tabel_e3_field4_value4_alias ?></option>
              <option value="<?= $tabel_e3_field4_value5 ?>"><?= $tabel_e3_field4_value5_alias ?></option>

            </select>
            <label class="form-label"><?= $tabel_e3_field4_alias ?></label>
          </div>

          <?= add_min_max('number', 'tabel_e3_field5', 'required', '0', '') ?>

        </div>

        <!-- memunculkan notifikasi modal -->
        <p class="small text-center text-danger"><?= get_flashdata('pesan_tambah') ?></p>

        <div class="modal-footer">
          <?= btn_simpan() ?>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal edit -->
<?php foreach ($tbl_e3->result() as $tl_e3): ?>
  <?php switch ($tl_e3->$tabel_e3_field4) {
    case $tabel_e3_field4_value2:
    case $tabel_e3_field4_value3: ?>
      <div id="ubah<?= $tl_e3->$tabel_e3_field1; ?>" class="modal fade ubah">
        <div class="modal-dialog">
          <div class="modal-content">
            <?= modal_header('Edit' . lang('tabel_e3_alias'), $tl_e3->$tabel_e3_field1) ?>

            <form action="<?= site_url($language . '/' . $tabel_e3 . '/update') ?>" method="post"
              enctype="multipart/form-data">
              <div class="modal-body">
                <?= input_edit('text', 'tabel_e4_field2', $tl_e3->$tabel_e4_field2, 'required readonly') ?>
                <?= input_hidden('tabel_e4_field1', $tl_e3->$tabel_e3_field2, 'required') ?>

                <div class="form-group">
                  <select class="form-control float" required name="<?= $tabel_e3_field4_input ?>">
                    <option selected hidden value="<?= $tl_e3->$tabel_e3_field4; ?>"><?= $tl_e3->$tabel_e3_field4; ?>
                    </option>

                    <!-- memilih nilai status -->
                    <option value="<?= $tabel_e3_field4_value4 ?>"><?= $tabel_e3_field4_value4_alias ?></option>
                    <option value="<?= $tabel_e3_field4_value5 ?>"><?= $tabel_e3_field4_value5_alias ?></option>

                  </select>
                  <label class="form-label"><?= $tabel_e3_field4_alias ?></label>
                </div>

                <?= input_hidden('tabel_e3_field1', $tl_e3->$tabel_e3_field1, 'required') ?>
                <?= input_textarea('tabel_e3_field5', $tl_e3->$tabel_e3_field5, 'required') ?>
              </div>

              <!-- memunculkan notifikasi modal -->
              <p class="small text-center text-danger"><?= get_flashdata('pesan_ubah') ?></p>

              <div class="modal-footer">
                <?= btn_update() ?>
              </div>
            </form>
          </div>
        </div>
      </div>

      <?php break;
    case $tabel_e3_field4_value4: ?>
      <div id="<?= $tabel_c1_field7_value1 . $tl_e3->$tabel_e3_field1 ?>" class="modal fade <?= $tabel_c1_field7_value1 ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <?= modal_header('Assign ' . lang('tabel_c1_alias') . ' untuk ' . lang('tabel_e3_alias'), $tl_e3->$tabel_e3_field1) ?>

            <!-- form untuk mengubah nilai status sebuah kamar -->
            <form action="<?= site_url($language . '/' . $tabel_f4 . '/tambah') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">

                    <div class="table-responsive">
                      <table class="table table-light" id="data">
                        <thead>
                        <tbody>
                          <?= input_hidden('tabel_c2_field1', userdata($tabel_c2_field1), 'required') ?>
                          <?= row_data('tabel_e3_field1', $tl_e3->$tabel_e3_field1) ?>
                          <?= row_data('tabel_e3_field2', $tl_e3->$tabel_e3_field2) ?>
                          <?= row_data('tabel_e3_field4', $tl_e3->$tabel_e3_field4) ?>
                          <?= row_data('tabel_e3_field5', $tl_e3->$tabel_e3_field5) ?>

                          <!-- mengubah status kamar secara instan berdasarkan id_pesanan -->
                          <!-- jika id pesanan itu kosong, berarti belum ada yang pesan dan kamar menjadi <?= $tabel_e3_field4_value2_alias ?>
                jika sebaliknya, maka kamar akan menjadi <?= $tabel_e3_field4_value3_alias ?> -->
                          <?php if ($tl_e3->$tabel_e3_field3 <> 0) { ?>
                            <?= input_hidden('tabel_e3_field4', $tabel_e3_field4_value3, 'required') ?>
                          <?php } else { ?>
                            <?= input_hidden('tabel_e3_field4', $tabel_e3_field4_value2, 'required') ?>
                          <?php } ?>

                        </tbody>
                        <tfoot></tfoot>
                      </table>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <!-- ini adalah fitur untuk assign petugas -->
                    <div class="form-group">
                      <select class="form-control float" required name="<?= $tabel_c1_field1_input ?>">

                        <!-- menampilkan petugas buat assign -->
                        <option selected hidden><?= lang('select') ?>       <?= $tabel_c1_alias ?>...</option>
                        <?php
                        foreach ($tbl_c1->result() as $tl_c1):
                          if ($tl_c1->$tabel_c1_field7 == $tabel_c1_field7_value1) { ?>
                            <option value="<?= $tl_c1->$tabel_c1_field1; ?>"><?= $tl_c1->$tabel_c1_field2; ?> -
                              <?= $tl_c1->$tabel_c1_field7; ?>
                            </option>
                          <?php }
                        endforeach ?>
                      </select>
                      <label class="form-label"><?= $tabel_c1_alias ?></label>
                    </div>

                    <!-- Aku masih ada rencana untuk mengubah textbox keterangan ini dengan dropbox 
                  karena menurutku textarea masih kurang cukup
                dan aku juga membutuhkan bantuan ahli UI UX untuk menentukan keputusan terbaik -->

                    <?= input_add('text', 'tabel_f4_field6', 'required') ?>
                  </div>
                </div>
              </div>

              <!-- memunculkan notifikasi modal -->
              <p class="small text-center text-danger"><?= get_flashdata('pesan_' . $tabel_c1_field7_value1) ?>
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
      <div id="<?= $tabel_c1_field7_value2 . $tl_e3->$tabel_e3_field1 ?>" class="modal fade maintenance">
        <div class="modal-dialog">
          <div class="modal-content">
            <?= modal_header('Assign ' . lang('tabel_c1_alias') . ' untuk ' . lang('tabel_e3_alias'), $tl_e3->$tabel_e3_field1) ?>

            <!-- form untuk mengubah nilai status sebuah kamar -->
            <form action="<?= site_url($language . '/' . $tabel_f4 . '/tambah') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <div class="table-responsive">
                      <table class="table table-light" id="data">
                        <thead>
                        <tbody>

                          <?= input_hidden('tabel_c2_field1', userdata($tabel_c2_field1), 'required') ?>
                          <?= row_data('tabel_e3_field1', $tl_e3->$tabel_e3_field1) ?>
                          <?= row_data('tabel_e3_field2', $tl_e3->$tabel_e3_field2) ?>
                          <?= row_data('tabel_e3_field4', $tl_e3->$tabel_e3_field4) ?>
                          <?= row_data('tabel_e3_field5', $tl_e3->$tabel_e3_field5) ?>
                          <!-- mengubah status kamar secara instan berdasarkan id_pesanan -->
                          <!-- jika id pesanan itu kosong, berarti belum ada yang pesan dan kamar menjadi <?= $tabel_e3_field4_value2_alias ?>
                jika sebaliknya, maka kamar akan menjadi <?= $tabel_e3_field4_value3_alias ?> -->
                          <?php if ($tl_e3->$tabel_e3_field3 <> 0) { ?>
                            <?= input_hidden('tabel_e3_field4', $tabel_e3_field4_value3, 'required') ?>
                          <?php } else { ?>
                            <?= input_hidden('tabel_e3_field4', $tabel_e3_field4_value2, 'required') ?>
                          <?php } ?>
                        </tbody>
                        <tfoot></tfoot>
                      </table>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <!-- ini adalah fitur untuk assign petugas -->
                    <div class="form-group">
                      <select class="form-control float" required name="<?= $tabel_c1_field1_input ?>">

                        <!-- menampilkan petugas buat assign -->
                        <option selected hidden><?= lang('select') ?>       <?= $tabel_c1_alias ?>...</option>
                        <?php
                        foreach ($tbl_c1->result() as $tl_c1):
                          if ($tl_c1->$tabel_c1_field7 == $tabel_c1_field7_value1) { ?>
                            <option value="<?= $tl_c1->$tabel_c1_field1; ?>"><?= $tl_c1->$tabel_c1_field2; ?> -
                              <?= $tl_c1->$tabel_c1_field7; ?>
                            </option>
                          <?php }
                        endforeach ?>
                      </select>
                      <label class="form-label"><?= $tabel_c1_alias ?></label>
                    </div>

                    <?= input_add('text', 'tabel_e3_field5', 'required') ?>
                  </div>
                </div>
              </div>

              <!-- memunculkan notifikasi modal -->
              <p class="small text-center text-danger"><?= get_flashdata('pesan_maintenance') ?></p>

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
            <div class="table-responsive">
              <table class="table table-light" id="data">
                <thead></thead>
                <tbody>
                  <?= row_data('tabel_e3_field2', $tl_e3->$tabel_e3_field2) ?>
                  <?= row_data('tabel_e3_field4', $tl_e3->$tabel_e3_field4) ?>
                  <?= row_data('tabel_e3_field5', $tl_e3->$tabel_e3_field5) ?>
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
        </form>
      </div>
    </div>
  </div>


<?php endforeach ?>