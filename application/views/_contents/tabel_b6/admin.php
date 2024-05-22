<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
    // case $tabel_c2_field6_value4:
    break;

  default:
    redirect(site_url($this->language_code . '/' . 'welcome/no_level'));
}
?>



<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= headings('title', 'phase') ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200" alt="Image">
    <?php endforeach ?>
  </div>
</div>
<hr>

<?= btn_tambah() ?>
<?= btn_laporan('tabel_b6') ?>

<?php foreach ($dekor as $dk): ?>
  <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200">
<?php endforeach ?>


<!-- tabel fiter pesanan -->
<table class="mb-4">

  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <form action="<?= site_url($language . '/' . $tabel_b6 . '/filter') ?>" method="get">
    <tr>

      <td class="pr-2">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Pilih <?= $tabel_b7_alias ?></span>
          </div>
          <select class="form-control" required name="<?= $tabel_b6_field7_input ?>">
            <?php foreach ($tbl_b7 as $tl_b7): ?>
              <option selected hidden value="<?= $tabel_b6_field7_value ?>"><?= $tabel_b6_field7_value ?></option>
              <option value="<?= $tl_b7->$tabel_b7_field1 ?>">
                <?= $tl_b7->$tabel_b7_field1 . ' - ' . $tl_b7->$tabel_b7_field2 ?>
              </option>
            <?php endforeach ?>
          </select>
        </div>
      </td>

      <td>
        <?= btn_cari() ?>
        <?= btn_redo('tabel_b6', '/admin') ?>
      </td>
    </tr>
  </form>
</table>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_b6_field1_alias') ?></th>
        <th><?= lang('tabel_b6_field2_alias') ?></th>
        <th><?= lang('tabel_b6_field3_alias') ?></th>
        <th><?= lang('tabel_b6_field4_alias') ?></th>
        <th><?= lang('tabel_b6_field5_alias') ?></th>
        <th><?= lang('tabel_b6_field6_alias') ?></th>
        <th><?= lang('tabel_b6_field7_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_b6 as $tl_b6): ?>
        <tr>
          <td></td>
          <td><?= $tl_b6->$tabel_b6_field1; ?></td>
          <td><?= $tl_b6->$tabel_b6_field2 ?></td>
          <td><?= $tl_b6->$tabel_b6_field3 ?></td>
          <td><a href="<?= $tl_b6->$tabel_b6_field4 ?>" target="_blank">Visit</a>
          <td>
            <h2><?= $tl_b6->$tabel_b6_field5 ?></h2>
          </td>
          <td>
            <?php if ($tl_b6->$tabel_b6_field6 == $tabel_b6_field6_value1) { ?>
              <?= btn_toggle_off('tabel_b6', $tl_b6->$tabel_b6_field1) ?>

            <?php } elseif ($tl_b6->$tabel_b6_field6 == $tabel_b6_field6_value2) { ?>
              <?= btn_toggle_on('tabel_b6', $tl_b6->$tabel_b6_field1) ?>

            <?php } else { ?>

            <?php } ?>
          </td>
          <td><?= $tl_b6->$tabel_b6_field7 ?></td>
          <td><?= btn_lihat($tl_b6->$tabel_b6_field1) ?>
            <?= btn_edit($tl_b6->$tabel_b6_field1) ?>
            <?= btn_hapus('tabel_b6', $tl_b6->$tabel_b6_field1) ?>
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
      <?= modal_header(lang('add') . lang('tabel_b6_alias'), '') ?>

      <form action="<?= site_url($language . '/' . $tabel_b6 . '/tambah') ?>" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <?= add_text('tabel_b6_field2', 'required') ?>
          <?= add_text('tabel_b6_field3', 'required') ?>
          <?= add_text('tabel_b6_field4', 'required') ?>
          <?= add_text('tabel_b6_field5', 'required') ?>

          <div class="form-group">
            <label>Pilih <?= $tabel_b7_alias ?></label>
            <select class="form-control" required name="<?= $tabel_b6_field7_input ?>">

              <?php foreach ($tbl_b7 as $tl_b7): ?>
                <option value="<?= $tl_b7->$tabel_b7_field1 ?>"><?= $tl_b7->$tabel_b7_field2 ?></option>
              <?php endforeach ?>
            </select>
          </div>

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


<!-- modal edit-->
<?php foreach ($tbl_b6 as $tl_b6): ?>
  <div id="ubah<?= $tl_b6->$tabel_b6_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('update_data') . lang('tabel_b6_alias'), $tl_b6->$tabel_b6_field1) ?>

        <form action="<?= site_url($language . '/' . $tabel_b6 . '/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <?= input_hidden('tabel_b6_field1', $tl_b6->$tabel_b6_field1, 'required') ?>
            <?= edit_text('tabel_b6_field2', $tl_b6->$tabel_b6_field2, 'required') ?>
            <?= edit_text('tabel_b6_field3', $tl_b6->$tabel_b6_field3, 'required') ?>
            <?= edit_text('tabel_b6_field4', $tl_b6->$tabel_b6_field4, 'required') ?>
            <?= edit_text('tabel_b6_field5', htmlspecialchars($tl_b6->$tabel_b6_field5), 'required') ?>

            <div class="form-group">
              <label><?= $tabel_b7_alias ?></label>
              <select class="form-control" required name="<?= $tabel_b6_field7_input ?>">
                <?php foreach ($tbl_b7 as $tl_b7): ?>
                  <?php if ($tl_b6->$tabel_b6_field7 == $tl_b7->$tabel_b7_field1) { ?>
                    <option selected hidden value="<?= $tl_b6->$tabel_b6_field7 ?>"><?= $tl_b7->$tabel_b7_field2 ?></option>
                  <?php } else { ?>
                    <option selected hidden value="">Pilih <?= $tabel_b7_alias ?>...</option> <?php } ?>

                  <option value="<?= $tl_b7->$tabel_b7_field1 ?>"><?= $tl_b7->$tabel_b7_field2 ?></option>
                <?php endforeach ?>
              </select>
            </div>

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


  <div id="lihat<?= $tl_b6->$tabel_b6_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header(lang('tabel_b6_alias'), $tl_b6->$tabel_b6_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">

            <?= tampil_text('tabel_b6_field1', $tl_b6->$tabel_b6_field1) ?>
            <?= tampil_text('tabel_b6_field2', $tl_b6->$tabel_b6_field1) ?>
            <?= tampil_text('tabel_b6_field3', $tl_b6->$tabel_b6_field3) ?>
            <?= tampil_text('tabel_b6_field4', $tl_b6->$tabel_b6_field4) ?>
            <?= tampil_text('tabel_b6_field5', $tl_b6->$tabel_b6_field5) ?>
            <?= tampil_text('tabel_b6_field6', $tl_b6->$tabel_b6_field6) ?>
            <?= tampil_text('tabel_b6_field7', $tl_b6->$tabel_b6_field7) ?>

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