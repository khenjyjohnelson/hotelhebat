<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
    // case 'tabel_c2_field6_value4_alias':
    break;

  default:
    redirect(site_url($this->language_code . '/' . 'welcome/no_level'));
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
<?php foreach ($tbl_a1 as $tl_a1): ?>
  <div class="row">
    <div class="col-md-6">
      <p><?= lang('images_not_change_immediately') ?></p>
      <?= btn_field($tabel_b7_field3 . $tl_a1->$tabel_b7_field1, '<i class="fas fa-edit"></i> ' . lang('tabel_b7_field3_alias')) ?>
      <?= btn_field($tabel_b7_field4 . $tl_a1->$tabel_b7_field1, '<i class="fas fa-edit"></i> ' . lang('tabel_b7_field4_alias')) ?>
      <?= btn_field($tabel_b7_field5 . $tl_a1->$tabel_b7_field1, '<i class="fas fa-edit"></i> ' . lang('tabel_b7_field5_alias')) ?>
      <?= btn_field($tabel_b7 . $tl_a1->$tabel_b7_field1, '<i class="fas fa-edit"></i>' . lang('tabel_b7_alias')) ?>
      <?= btn_field($tabel_b2 . $tl_a1->$tabel_b7_field1, '<i class="fas fa-edit"></i>' . lang('tabel_b2_alias')) ?>
      <?= btn_kelola('tabel_b1') ?>
      <?= btn_kelola('tabel_b8') ?>
      <?= btn_kelola('tabel_b5') ?>
      <?= btn_kelola('tabel_b6') ?>
    </div>
    <div class="col-md-6">
      <form action="<?= site_url($language . '/' . $tabel_a1 . '/update') ?>" method="post" enctype="multipart/form-data">
        <?= input_hidden('tabel_a1_field1', $tl_a1->$tabel_a1_field1, 'required') ?>
        <?= edit_text('tabel_a1_field2', $tl_a1->$tabel_a1_field2, 'required') ?>
        <?= edit_text('tabel_a1_field3', $tl_a1->$tabel_a1_field3, 'required') ?>
        <?= edit_text('tabel_a1_field4', $tl_a1->$tabel_a1_field4, 'required') ?>
        <?= edit_text('tabel_a1_field5', $tl_a1->$tabel_a1_field5, 'required') ?>

        <div class="form-group">
          <button class="btn btn-success" onclick="return confirm('Ubah data website?')" type="submit">Simpan
            Perubahan</button>
        </div>
      </form>
    </div>

  </div>


  <div id="<?= $tabel_b7 . $tl_a1->$tabel_a1_field1 ?>" class="modal fade <?= $tabel_b7 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('update_data') . lang('tabel_b7_alias') .
          ' &nbsp;&nbsp;&nbsp;' . btn_kelola('tabel_b7'), $tl_a1->$tabel_a1_field1) ?>

        <form action="<?= site_url($language . '/' . $tabel_a1 . '/update_id_tema') ?>" method="post">
          <div class="modal-body">

            <div class="form-group">
              <label><?= lang('select') ?> <?= $tabel_b7_alias ?></label>
              <select class="form-control" required name="<?= $tabel_a1_field8_input ?>">

                <?php foreach ($tbl_b7 as $tl_b7): ?>
                  <?php if ($tl_a1->$tabel_a1_field8 == $tl_b7->$tabel_b7_field1) { ?>
                    <option selected hidden value="<?= $tl_b7->$tabel_b7_field1 ?>"><?= $tl_b7->$tabel_b7_field2 ?></option>
                  <?php } else { ?>
                    <option value="<?= $tl_b7->$tabel_b7_field1 ?>"><?= $tl_b7->$tabel_b7_field2 ?>
                    </option>
                  <?php }endforeach ?>

              </select>
              <?= input_hidden('tabel_a1_field1', $tl_a1->$tabel_a1_field1, 'required') ?>
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel_a1_field8) ?>
          </p>

          <div class="modal-footer">
            <?= btn_update() ?>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div id="<?= $tabel_b2 . $tl_a1->$tabel_a1_field1 ?>" class="modal fade <?= $tabel_a1_field6 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('update_data') . lang('tabel_b2_alias') .
          ' &nbsp;&nbsp;&nbsp;' . btn_kelola('tabel_b2'), $tl_a1->$tabel_a1_field1) ?>

        <form action="<?= site_url($language . '/' . $tabel_a1 . '/update_id_event') ?>" method="post">
          <div class="modal-body">

            <div class="form-group">
              <label><?= lang('select') ?> <?= $tabel_a1_field6_alias ?></label>
              <select class="form-control" required name="<?= $tabel_a1_field6_input ?>">

                <?php foreach ($tbl_b2 as $tl_b2): ?>
                  <?php if ($tl_a1->$tabel_a1_field6 == $tl_b2->$tabel_a1_field6) { ?>

                    <option selected hidden value="<?= $tl_b2->$tabel_a1_field6 ?>"><?= $tl_b2->$tabel_a1_field6 ?> -
                      <?= $tl_b2->$tabel_b2_field2; ?>
                    </option>
                  <?php } ?>
                <?php endforeach ?>

                <option value="0">Tidak ada</option>

                <?php foreach ($tbl_b2 as $tl_b2): ?>

                  <option value="<?= $tl_b2->$tabel_a1_field6 ?>"><?= $tl_b2->$tabel_a1_field6 ?> -
                    <?= $tl_b2->$tabel_b2_field2; ?>
                  </option>

                <?php endforeach ?>

              </select>
              <?= input_hidden('tabel_a1_field1', $tl_a1->$tabel_a1_field1, 'required') ?>
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel_a1_field6) ?>
          </p>

          <div class="modal-footer">
            <?= btn_update() ?>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit favicon-->
<?php foreach ($tbl_b7 as $tl_b7): ?>
  <div id="<?= $tabel_b7_field3 . $tl_b7->$tabel_b7_field1; ?>" class="modal fade <?= $tabel_b7_field3 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('update_data') . lang('tabel_b7_field3_alias'), $tl_b7->$tabel_b7_field1) ?>

        <form action="<?= site_url($language . '/' . $tabel_b7 . '/update_favicon') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <?= input_hidden('tabel_b7_field1', $tl_b7->$tabel_b7_field1, 'required') ?>
            <?= input_hidden('tabel_b7_field2', $tl_b7->$tabel_b7_field2, 'required') ?>
            <?= edit_file('tabel_b7', 'tabel_b7_field3', $tl_b7->$tabel_b7_field3, 'required') ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel_b7_field3) ?>
          </p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm(<?= lang('update_data') . lang('tabel_b7_field3') . '?' ?>)" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div id="<?= $tabel_b7_field4 . $tl_b7->$tabel_b7_field1; ?>" class="modal fade <?= $tabel_b7_field4 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('update_data') . lang('tabel_b7_field4_alias'), $tl_b7->$tabel_b7_field1) ?>

        <form action="<?= site_url($language . '/' . $tabel_b7 . '/update_logo') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <?= input_hidden('tabel_b7_field1', $tl_b7->$tabel_b7_field1, 'required') ?>
            <?= input_hidden('tabel_b7_field2', $tl_b7->$tabel_b7_field2, 'required') ?>
            <?= edit_file('tabel_b7', 'tabel_b7_field4', $tl_b7->$tabel_b7_field4, 'required') ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel_b7_field4) ?>
          </p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm(<?= lang('update_data') . lang('tabel_b7_field4') . '?' ?>)" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div id="<?= $tabel_b7_field5 . $tl_b7->$tabel_b7_field1; ?>" class="modal fade <?= $tabel_b7_field5 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('update_data') . lang('tabel_b7_field5_alias'), $tl_b7->$tabel_b7_field1) ?>

        <form action="<?= site_url($language . '/' . $tabel_b7 . '/update_foto') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <?= input_hidden('tabel_b7_field1', $tl_b7->$tabel_b7_field1, 'required') ?>
            <?= input_hidden('tabel_b7_field2', $tl_b7->$tabel_b7_field2, 'required') ?>
            <?= edit_file('tabel_b7', 'tabel_b7_field5', $tl_b7->$tabel_b7_field5, 'required') ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel_b7_field5) ?>
          </p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm(<?= lang('update_data') . lang('tabel_b7_field5') . '?' ?>)" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>