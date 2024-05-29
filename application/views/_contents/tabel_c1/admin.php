<?php switch (userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
    break;

  default:
    redirect($_SERVER['HTTP_REFERER']);
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
<?= btn_laporan('tabel_c1') ?>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_c1_field1_alias') ?></th>
        <th><?= lang('tabel_c1_field2_alias') ?></th>
        <th><?= lang('tabel_c1_field3_alias') ?></th>
        <th><?= lang('tabel_c1_field6_alias') ?></th>
        <th><?= lang('tabel_c1_field7_alias') ?></th>
        <th><?= lang('tabel_c1_field7_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_c1 as $tl_c1): ?>
        <tr>
          <td></td>
          <td><?= $tl_c1->$tabel_c1_field1; ?></td>
          <td><?= $tl_c1->$tabel_c1_field2 ?></td>
          <td><?= $tl_c1->$tabel_c1_field3 ?></td>
          <td><?= $tl_c1->$tabel_c1_field6 ?></td>
          <td><?= $tl_c1->$tabel_c1_field7 ?></td>
          <td><?= $tl_c1->$tabel_c1_field7 ?></td>
          <td>
            <?= btn_lihat($tl_c1->$tabel_c1_field1) ?>
            <?= btn_edit($tl_c1->$tabel_c1_field1) ?>
            <!-- Sebelumnya saya sudah membahas ini di v_admin_spp
          Saya akan mempending fitur ini dengan alasan yang sama dalam waktu yang belum ditentukan -->
            <!-- <a class="btn btn-light text-danger" onclick="return confirm('Hapus user?')" href="< site_url($tabel_c2 . '/hapus/' . $tl_c1->$tabel_c1_field1) ?>">
            <i class="fas fa-trash"></i></a> -->

          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>




<!-- Khusus tabel_c1 aku menyediakan dua mode, satu mode tabel_c1 biasa -->

<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= modal_header(lang('add') . ' ' . lang('tabel_c1_alias'), '') ?>

      <form action="<?= site_url($language . '/' . $tabel_c1 . '/tambah') ?>" method="post">
        <div class="modal-body">

          <?= input_add('text', 'tabel_c1_field2', 'required') ?>
          <?= input_add('email', 'tabel_c1_field3', 'required') ?>
          <?= add_new_password('tabel_c1_field4', 'required') ?>
          <?= input_add('text', 'tabel_c1_field5', 'required') ?>
          <?= add_file('tabel_c1_field6', 'required') ?>

          <div class="form-group">
            <label><?= $tabel_c1_field7_alias ?></label>
            <select class="form-control" required name="<?= $tabel_c1_field7_input ?>">
              <option value="" selected hidden><?= lang('select') ?> <?= $tabel_c1_field7_alias ?></option>
              <option value="<?= $tabel_c1_field7_value1 ?>"><?= $tabel_c1_field7_value1_alias ?></option>
              <option value="<?= $tabel_c1_field7_value2 ?>"><?= $tabel_c1_field7_value2_alias ?></option>
            </select>
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

<!-- modal edit -->
<?php foreach ($tbl_c1 as $tl_c1): ?>
  <div id="ubah<?= $tl_c1->$tabel_c1_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('update_data') . ' ' . lang('tabel_c1_alias'), $tl_c1->$tabel_c1_field1) ?>

        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url($language . '/' . $tabel_c1 . '/update') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">
            <?= input_hidden('tabel_c1_field1', $tl_c1->$tabel_c1_field1, 'required') ?>
            <?= input_edit('text', 'tabel_c1_field2', $tl_c1->$tabel_c1_field2, 'required') ?>
            <?= input_edit('email', 'tabel_c1_field3', $tl_c1->$tabel_c1_field3, 'required') ?>
            <?= input_edit('text', 'tabel_c1_field5', $tl_c1->$tabel_c1_field5, 'required') ?>
            <?= edit_file('tabel_c1', 'tabel_c1_field6', $tl_c1->$tabel_c1_field6, 'required') ?>

            <div class="form-group">
              <label><?= $tabel_c1_field7_alias ?></label>
              <select class="form-control" required name="<?= $tabel_c1_field7_input ?>">
                <option value="<?= $tl_c1->$tabel_c1_field7 ?>" selected hidden><?= $tl_c1->$tabel_c1_field7 ?></option>
                <option value="<?= $tabel_c1_field7_value1 ?>"><?= $tabel_c1_field7_value1_alias ?></option>
                <option value="<?= $tabel_c1_field7_value2 ?>"><?= $tabel_c1_field7_value2_alias ?></option>
              </select>
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


  <div id="lihat<?= $tl_c1->$tabel_c1_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header(lang('tabel_c1_alias'), $tl_c1->$tabel - $tabel_c1_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <?= tampil_text('tabel_c1_field2', $tl_c1->$tabel_c1_field2) ?>
                <?= tampil_text('tabel_c1_field3', $tl_c1->$tabel_c1_field3) ?>
                <?= tampil_text('tabel_c1_field5', $tl_c1->$tabel_c1_field5) ?>

              </div>
              <div class="col-md-6">
                <?= tampil_text('tabel_c1_field6', $tl_c1->$tabel_c1_field6) ?>
              </div>
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