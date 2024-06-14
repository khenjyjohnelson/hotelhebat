<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><br><span class="h6"> Data: <?= $count ?></span><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200" alt="Image">
    <?php endforeach ?>
  </div>
</div>
<hr>

<!-- tabel fiter pesanan -->
<table class="mb-4">

  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <form action="<?= site_url($language . '/' . $tabel_f2 . '/filter') ?>" method="get">
    <tr>
      <td class="pr-2"><?= $tabel_f2_field10_alias ?></td>
      <?= filter_tgl('Dari', 'tabel_f2_field10_filter1', '') ?>
      <?= filter_tgl('Ke', 'tabel_f2_field10_filter2', '') ?>

      <td>
        <?= btn_cari() ?>
        <?= btn_redo('tabel_f2', '/admin') ?>
      </td>

    </tr>
    <!-- Mengecek data menggunakan tanggal cek out -->
    <!-- method get supaya nilai dari filter bisa tampil nanti -->
    <tr>
      <td class="pr-2"><?= $tabel_f2_field11_alias ?></td>
      <?= filter_tgl('Dari', 'tabel_f2_field11_filter1', '') ?>
      <?= filter_tgl('Ke', 'tabel_f2_field11_filter2', '') ?>
    </tr>
  </form>
</table>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_f2_field1_alias') ?></th>
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
          <td><?= $tl_f2->$tabel_f2_field1 ?></td>
          <td><?= $tl_f2->$tabel_f2_field6 ?></td>
          <td><?= $tl_f2->$tabel_f2_field10 ?></td>
          <td><?= $tl_f2->$tabel_f2_field11 ?></td>
          <td><?= $tl_f2->$tabel_f2_field12 ?></td>

          <td>
            <?php switch ($tl_f2->$tabel_f2_field12) {
              case $tabel_f2_field12_value1: ?>
                <?= btn_book($tl_f2->$tabel_f2_field1) ?>
                <?php break;
              case $tabel_f2_field12_value3:
              case $tabel_f2_field12_value4: ?>
                <?= btn_edit($tl_f2->$tabel_f2_field1) ?>
                <?php break;
              case $tabel_f2_field12_value5: ?>
                <?= btn_hapus('tabel_f2', $tl_f2->$tabel_f2_field1) ?>
                <?php break;
            } ?>
            <!-- tombol print, hasil print akan muncul di tab baru 
        https://stackoverflow.com/questions/32778670/codeigniter-load-view-in-new-tab#:~:text=Say%20you%20want%20it%20to,_blank%22%20in%20the%20form%20tag.&text=That%27s%20all.
        terimakasih pada link di atas
        -->
            <?= btn_print('tabel_f2', $tl_f2->$tabel_f2_field1) ?>
          </td>

        </tr>
      <?php endforeach ?>
    </tbody>

  </table>
</div>

<!-- modal ubah -->
<?php foreach ($tbl_f2 as $tl_f2): ?>
  <?php switch ($tl_f2->$tabel_f2_field12) {
    case $tabel_f2_field12_value1: ?>
      <div id="book<?= $tl_f2->$tabel_f2_field1 ?>" class="modal fade book">
        <div class="modal-dialog">
          <div class="modal-content">
            <?= modal_header(lang('tabel_f2_alias'), $tl_f2->$tabel_f2_field1) ?>

            <!-- form untuk mengubah nilai status sebuah pesanan -->
            <form action="<?= site_url($language . '/' . $tabel_f2 . '/book') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <?= input_hidden('tabel_f2_field1', $tl_f2->$tabel_f2_field1, 'required') ?>
                    <?= input_hidden('tabel_f2_field7', $tl_f2->$tabel_f2_field7, 'required') ?>
                    <?= row_data('tabel_f2_field1', $tl_f2->$tabel_f2_field1) ?>
                    <?= row_data('tabel_f2_field3', $tl_f2->$tabel_f2_field3) ?>
                    <?= row_data('tabel_f2_field4', $tl_f2->$tabel_f2_field4) ?>
                    <?= row_data('tabel_f2_field5', $tl_f2->$tabel_f2_field5) ?>
                  </div>

                  <div class="col-md-6">
                    <?= row_data('tabel_f2_field6', $tl_f2->$tabel_f2_field6) ?>
                    <?= row_data('tabel_e4_field2', $tlf2_e4->$tabel_e4_field2) ?>
                    <?= row_data('tabel_f2_field10', $tl_f2->$tabel_f2_field10) ?>
                    <?= row_data('tabel_f2_field11', $tl_f2->$tabel_f2_field11) ?>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label><?= lang('select') ?> <?= $tabel_e3_field1_alias ?></label>

                      <div class="row">

                        <!-- <select class="form-control float" required name="<?= $tabel_f2_field13_input ?>"> -->
                        <!-- menampilkan nilai id_tipe kamar yang aktif -->
                        <!-- <option selected hidden value=""><?= lang('select') ?> <?= $tabel_e3_field1_alias ?>:</option> -->
                        <!-- <option value="<?= $tl_e3->$tabel_f2_field13 ?>"><?= $tl_e3->$tabel_f2_field13; ?> - <?= $tlf2_e4->$tabel_e4_field2 ?></option> -->
                        <!-- </select> -->

                        <?php foreach ($tbl_e3 as $tl_e3):
                          if ($tl_f2->$tabel_f2_field7 == $tl_e3->$tabel_f2_field7) {
                            if ($tl_e3->$tabel_f2_field7 == $tlf2_e4->$tabel_f2_field7) {
                              if ($tl_e3->$tabel_e3_field4 == $tabel_e3_field4_value2) { ?>

                                <div class="col-md-3 mb-4">

                                  <div class="card bg-light">
                                    <div class="card-body text-center">

                                      <div class="checkbox-group">
                                        <p class="card-text"><?= $tl_e3->$tabel_f2_field13; ?></p>

                                        <div class="btn-group-toggle" data-toggle="buttons">
                                          <label class="btn btn-primary">

                                            <input type="checkbox" name="<?= $tabel_f2_field13_input ?>" id="option1"
                                              class="checkbox-option form-control-lg" value="<?= $tl_e3->$tabel_e3_field1 ?>"
                                              required>


                                          </label>
                                        </div>
                                      </div>

                                      <!-- <div style="margin-bottom: 20px;" class="form-check d-flex justify-content-center">
                                        <input class="custom-radio form-check-input" type="radio" id="radio_1" name="<?= $tabel_f2_field13_input ?>" value="<?= $tl_e3->$tabel_f2_field13 ?>" required>
                                      </div> -->

                                    </div>
                                  </div>

                                </div>


                              <?php }
                            }
                          }
                        endforeach; ?>

                      </div>


                      <p>*Jika tidak ada, berarti semua <?= $tabel_e3_alias ?> full</p>
                      <?= input_hidden('tabel_f2_field12', $tabel_f2_field12_value2, '') ?>
                    </div>
                  </div>
                </div>

              </div>

              <!-- memunculkan notifikasi modal -->
              <p class="small text-center text-danger"><?= get_flashdata('pesan_book') ?></p>

              <div class="modal-footer">

                <p>Pesan <?= $tabel_e3_alias ?>?</p>
                <button class="btn btn-success" type="submit">Ya</button>

              </div>
            </form>

          </div>
        </div>

      </div>
      <?php break;
    case $tabel_f2_field12_value3:
    case $tabel_f2_field12_value4: ?>
      <div id="ubah<?= $tl_f2->$tabel_f2_field1 ?>" class="modal fade ubah">
        <div class="modal-dialog">
          <div class="modal-content">
            <?= modal_header(lang('tabel_f2_alias'), $tl_f2->$tabel_f2_field1) ?>

            <!-- form untuk mengubah nilai status sebuah pesanan -->
            <form action="<?= site_url($language . '/' . $tabel_f2 . '/update_status') ?>" method="post">
              <div class="modal-body">
                <div class="row">
                  <div class="col-md-6">
                    <?= input_hidden('tabel_f2_field1', $tl_f2->$tabel_f2_field1, 'required') ?>
                    <?= input_hidden('tabel_f2_field7', $tl_f2->$tabel_f2_field7, 'required') ?>
                    <!-- input status berdasarkan nilai status -->
                    <!-- seharusnya jika status masih belum bayar, resepsionis tidak bisa melakukan apa-apa terhadap pesanan -->
                    <?php switch ($tl_f2->$tabel_f2_field12) {
                      case $tabel_f2_field12_value3: ?>
                        <?= input_hidden('tabel_f2_field12', $tabel_f2_field12_value4, 'required') ?>
                        <?php break;
                      case $tabel_f2_field12_value4: ?>
                        <?= input_hidden('tabel_f2_field12', $tabel_f2_field12_value5, 'required') ?>
                        <?php break;
                      default:
                        break;
                    } ?>
                    <?= row_data('tabel_f2_field3', $tl_f2->$tabel_f2_field3) ?>
                    <?= row_data('tabel_f2_field4', $tl_f2->$tabel_f2_field4) ?>
                    <?= row_data('tabel_f2_field5', $tl_f2->$tabel_f2_field5) ?>
                  </div>

                  <div class="col-md-6">
                    <?= row_data('tabel_f2_field6', $tl_f2->$tabel_f2_field6) ?>
                    <?= row_data('tabel_e4_field2', $tlf2_e4->$tabel_e4_field2) ?>
                    <?= row_data('tabel_f2_field10', $tl_f2->$tabel_f2_field10) ?>
                    <?= row_data('tabel_f2_field11', $tl_f2->$tabel_f2_field11) ?>
                  </div>
                </div>
              </div>

              <!-- memunculkan notifikasi modal -->
              <p class="small text-center text-danger"><?= get_flashdata('pesan_ubah') ?></p>

              <div class="modal-footer">
                <!-- pesan yg muncul berdasarkan nilai status -->
                <?php switch ($tl_f2->$tabel_f2_field12) {
                  case $tabel_f2_field12_value3: ?>
                    <p>Ubah Status Menjadi <?= $tabel_f2_field12_value4 ?>?</p>
                    <button class="btn btn-success" type="submit">Ya</button>
                    <?php break;
                  case $tabel_f2_field12_value4: ?>
                    <p>Ubah Status Menjadi <?= $tabel_f2_field12_value5 ?>?</p>
                    <button class="btn btn-success" type="submit">Ya</button>
                    <?php break;
                  default:
                    break;
                } ?>
              </div>

            </form>

          </div>
        </div>
      </div>
      <?php break;
    default:
      break;
  } ?>
<?php endforeach ?>

<?= radio_js() ?>
<?= checkbox_js() ?>