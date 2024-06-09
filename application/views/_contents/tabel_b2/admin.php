<?php switch (userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
    // case $tabel_c2_field6_value4:
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
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

<!-- tabel fiter pesanan -->
<table class="mb-4">

  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <form action="<?= site_url($language . '/' . $tabel_b2 . '/filter') ?>" method="get">
    <tr>

      <td class="pr-2">
        <div class="form-group">
          <select class="form-control float" required name="<?= $tabel_b2_field7_input ?>"
            id="<?= $tabel_b2_field7_input ?>">
            <option selected hidden value="<?= $tabel_b2_field7_value ?>"><?= $tabel_b2_field7_value ?></option>
            <?php foreach ($tbl_b7 as $tl_b7): ?>
              <option value="<?= $tl_b7->$tabel_b7_field1 ?>">
                <?= $tl_b7->$tabel_b7_field1 . ' - ' . $tl_b7->$tabel_b7_field2 ?>
              </option>
            <?php endforeach ?>
          </select>
          <label for="<?= $tabel_b6_field7_input ?>" class="form-label"><?= lang('select') ?>
            <?= $tabel_b7_alias ?></label>
        </div>
      </td>

      <td>
        <?= btn_cari() ?>
        <?= btn_redo('tabel_b2', '/admin') ?>
      </td>

    </tr>
  </form>
</table>


<p><?= lang('images_not_change_immediately') ?></p>
<div class="row">
  <div class="col-md-10">
    <?= btn_tambah() ?>
    <?= btn_laporan('tabel_b2') ?>

  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>




<div id="card-view" class="row data-view active">
  <?php foreach ($tbl_b2 as $tl_b2): ?>
    <?php
    $btn_class = '';
    if ($tl_b2->$tabel_b2_field6 == $tabel_b2_field6_value1) {
      $btn_class = btn_toggle_off('tabel_b2', $tl_b2->$tabel_b2_field1);
    } elseif ($tl_b2->$tabel_b2_field6 == $tabel_b2_field6_value2) {
      $btn_class = btn_toggle_on('tabel_b2', $tl_b2->$tabel_b2_field1);
    }
    echo card_file(
      $tl_b2->$tabel_b2_field1,
      $tl_b2->$tabel_b2_field2,
      $btn_class,
      btn_lihat($tl_b2->$tabel_b2_field1) . ' ' . 
      btn_edit($tl_b2->$tabel_b2_field1) . ' ' . 
      btn_hapus('tabel_b2', $tl_b2->$tabel_b2_field1),
      $tabel_b2,
      $tl_b2->$tabel_b2_field4,
      'bg-danger'
    );
    ?>
  <?php endforeach; ?>
</div>


<div id="table-view" class="table-responsive data-view" style="display: none;">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_b2_field1_alias') ?></th>
        <th><?= lang('tabel_b2_field2_alias') ?></th>
        <th><?= lang('tabel_b2_field3_alias') ?></th>
        <th><?= lang('tabel_b2_field4_alias') ?></th>
        <th><?= lang('tabel_b2_field5_alias') ?></th>
        <th><?= lang('tabel_b2_field6_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_b2 as $tl_b2): ?>
        <tr>
          <td></td>
          <td><?= $tl_b2->$tabel_b2_field1; ?></td>
          <td><?= $tl_b2->$tabel_b2_field2 ?></td>
          <td><?= $tl_b2->$tabel_b2_field3 ?></td>
          <td><img src="img/<?= $tabel_b2 ?>/<?= $tl_b2->$tabel_b2_field4 ?>" width="100"></td>
          <td><?= truncateText($tl_b2->$tabel_b2_field5) ?></td>
          <td>
            <?php if ($tl_b2->$tabel_b2_field6 == $tabel_b2_field6_value1) { ?>
              <?= btn_toggle_off('tabel_b2', $tl_b2->$tabel_b2_field1) ?>
            <?php } elseif ($tl_b2->$tabel_b2_field6 == $tabel_b2_field6_value2) { ?>
              <?= btn_toggle_on('tabel_b2', $tl_b2->$tabel_b2_field1) ?>
            <?php } else { ?>

            <?php } ?>
          </td>
          <td>
            <?= btn_lihat($tl_b2->$tabel_b2_field1) ?>
            <?= btn_edit($tl_b2->$tabel_b2_field1) ?>
            <?= btn_hapus('tabel_b2', $tl_b2->$tabel_b2_field1) ?>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>

<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= modal_header_add(lang('add') . ' ' . lang('tabel_b2_alias'), '') ?>

      <form action="<?= site_url($language . '/' . $tabel_b2 . '/tambah') ?>" enctype="multipart/form-data"
        method="post">
        <div class="modal-body">

          <?= input_add('text', 'tabel_b2_field2', 'required') ?>
          <?= input_add('text', 'tabel_b2_field3', 'required') ?>
          <?= add_file('tabel_b2_field4', 'required') ?>
          <?= input_textarea('tabel_b2_field5', '', 'required') ?>

          <div class="form-group">
            <select class="form-control float" required name="<?= $tabel_b2_field6_input ?>"
              id="<?= $tabel_b2_field6_input ?>">

              <?php foreach ($tbl_b7 as $tl_b7): ?>
                <option value="<?= $tl_b7->$tabel_b7_field1 ?>"><?= $tl_b7->$tabel_b7_field2 ?></option>
              <?php endforeach ?>
            </select>
            <label for="<?= $tabel_b2_field6_input ?>" class="form-label"><?= lang('select') ?>
              <?= $tabel_b7_alias ?></label>
          </div>

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

<!-- modal edit foto-->
<?php foreach ($tbl_b2 as $tl_b2): ?>
  <div id="ubah<?= $tl_b2->$tabel_b2_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('update_data') . ' ' . lang('tabel_b2_alias'), $tl_b2->$tabel_b2_field1) ?>

        <form action="<?= site_url($language . '/' . $tabel_b2 . '/update') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">
            <?= input_hidden('tabel_b2_field1', $tl_b2->$tabel_b2_field1, 'required') ?>
            <small><?= lang('reupload_image_even_for_name_change') ?></small>


            <?= input_edit('text', 'tabel_b2_field2', $tl_b2->$tabel_b2_field2, 'required') ?>
            <?= input_edit('text', 'tabel_b2_field3', $tl_b2->$tabel_b2_field3, 'required') ?>
            <?= edit_file('tabel_b2', 'tabel_b2_field4', $tl_b2->$tabel_b2_field4, 'required') ?>
            <?= input_textarea('tabel_b2_field5', $tl_b2->$tabel_b2_field5, 'required') ?>

            <div class="form-group">
              <select class="form-control float" required name="<?= $tabel_b2_field7_input ?>"
                id="<?= $tabel_b2_field6_input ?>">
                <?php foreach ($tbl_b7 as $tl_b7): ?>
                  <?php if ($tl_b2->$tabel_b2_field7 == $tl_b7->$tabel_b7_field1) { ?>
                    <option selected hidden value="<?= $tl_b2->$tabel_b2_field7 ?>"><?= $tl_b7->$tabel_b7_field2 ?></option>
                  <?php } else { ?>
                    <option selected hidden value=""><?= lang('select') ?>       <?= $tabel_b7_alias ?>...</option> <?php } ?>

                  <option value="<?= $tl_b7->$tabel_b7_field1 ?>"><?= $tl_b7->$tabel_b7_field2 ?></option>
                <?php endforeach ?>
              </select>
              <label for="<?= $tabel_b2_field6_input ?>" class="form-label"><?= $tabel_b7_alias ?></label>
            </div>

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



  <div id="lihat<?= $tl_b2->$tabel_b2_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header(lang('tabel_b2_alias'), $tl_b2->$tabel_b2_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="table-responsive">
              <table class="table table-light" id="data">
                <thead></thead>
                <tbody>
                  <?= row_data('tabel_b2_field1', $tl_b2->$tabel_b2_field1) ?>
                  <?= row_data('tabel_b2_field2', $tl_b2->$tabel_b2_field2) ?>
                  <?= row_data('tabel_b2_field3', $tl_b2->$tabel_b2_field3) ?>
                  <?= row_file($tabel_b2, 'tabel_b2_field4', $tl_b2->$tabel_b2_field4) ?>
                  <?= row_data('tabel_b2_field5', $tl_b2->$tabel_b2_field5) ?>

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
<?php endforeach; ?>