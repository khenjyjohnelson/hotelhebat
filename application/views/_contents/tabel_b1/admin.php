<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
    // case $tabel_c2_field6_value4:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>



<div class="row mb-2 align-items-center">
  <div class="col-md-6 d-flex align-items-center">
    <h1><?= $title ?><?= $phase ?></h1>
  </div>
  <div class="col-md-6 text-right">
    <?php foreach ($dekor as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200" alt="Image">
    <?php endforeach ?>
  </div>
</div>
<hr>
<p>Beberapa gambar tidak akan langsung berubah, perlu menghapus cache terlebih dahulu.</p>

<?= btn_tambah() ?>
<?= btn_laporan('tabel_b1') ?>

<?php foreach ($dekor as $dk): ?>
  <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200">
<?php endforeach ?>

<!-- tabel fiter pesanan -->
<table class="mb-4">

  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <form action="<?= site_url($tabel_b1 . '/filter') ?>" method="get">
    <tr>

      <td class="pr-2">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Pilih <?= $tabel_b7_alias ?></span>
          </div>
          <select class="form-control" required name="<?= $tabel_b1_field7_input ?>">
            <option selected hidden value="<?= $tabel_b1_field7_value ?>"><?= $tabel_b1_field7_value ?></option>
            <?php foreach ($tbl_b7 as $tl_b7): ?>
              <option value="<?= $tl_b7->$tabel_b7_field1 ?>">
                <?= $tl_b7->$tabel_b7_field1 . ' - ' . $tl_b7->$tabel_b7_field2 ?>
              </option>
            <?php endforeach ?>
          </select>
        </div>
      </td>

      <td>
        <?= btn_cari() ?>
        <?= btn_redo('tabel_b1', '/admin') ?>
      </td>

    </tr>
  </form>
</table>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_b1_field1_alias ?></th>
        <th><?= $tabel_b1_field2_alias ?></th>
        <th><?= $tabel_b1_field3_alias ?></th>
        <th><?= $tabel_b1_field4_alias ?></th>
        <th><?= $tabel_b1_field5_alias ?></th>
        <th><?= $tabel_b1_field6_alias ?></th>
        <th><?= $tabel_b1_field7_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_b1 as $tl_b1): ?>
        <tr>
          <td></td>
          <td><?= $tl_b1->$tabel_b1_field1; ?></td>
          <td><?= $tl_b1->$tabel_b1_field2 ?></td>
          <td><?= $tl_b1->$tabel_b1_field3 ?></td>
          <td><img src="img/<?= $tabel_b1 ?>/<?= $tl_b1->$tabel_b1_field4 ?>" height="75"></td>
          <td>
            <h2><?= $tl_b1->$tabel_b1_field5 ?></h2>
          </td>
          <td><?= $tl_b1->$tabel_b1_field6 ?></td>
          <td><?= $tl_b1->$tabel_b1_field7 ?></td>
          <td>
            <?= btn_lihat($tl_b1->$tabel_b1_field1) ?>
            <?= btn_edit($tl_b1->$tabel_b1_field1) ?>
            <?= btn_hapus('tabel_b1', $tl_b1->$tabel_b1_field1) ?>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>

<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= modal_header('Tambah ' . $tabel_b1_alias, '') ?>

      <form action="<?= site_url($tabel_b1 . '/tambah') ?>" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <?= add_text('tabel_b1_field2', 'required') ?>
          <?= add_text('tabel_b1_field3', 'required') ?>
          <?= add_file('tabel_b1_field4', 'required') ?>
          <?= add_text('tabel_b1_field5', 'required') ?>

          <div class="form-group">
            <label>Pilih <?= $tabel_b1_field6_alias ?></label>
            <select class="form-control" required name="<?= $tabel_b1_field6_input ?>">
              <option value="a">a</option>
              <option value="b">b</option>
              <option value="c">c</option>
              <option value="d">d</option>
              <option value="f">f</option>
              <option value="0">0</option>
            </select>
          </div>

          <div class="form-group">
            <label>Pilih <?= $tabel_b7_alias ?></label>
            <select class="form-control" required name="<?= $tabel_b1_field7_input ?>">

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
<?php foreach ($tbl_b1 as $tl_b1): ?>
  <div id="ubah<?= $tl_b1->$tabel_b1_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header('Edit ' . $tabel_b1_alias, $tl_b1->$tabel_b1_field1) ?>

        <form action="<?= site_url($tabel_b1 . '/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <small>* Meski ingin mengubah <?= $tabel_b1_field2_alias ?> saja, tetap harus mengupload ulang
            <?= $tabel_b1_field4_alias ?> juga</small>
            <?= input_hidden('tabel_b1_field1', $tl_b1->$tabel_b1_field1, 'required') ?>
            <?= edit_text('tabel_b1_field2', $tl_b1->$tabel_b1_field2, 'required') ?>
            <?= edit_text('tabel_b1_field3', $tl_b1->$tabel_b1_field3, 'required') ?>
            <?= edit_file('tabel_b1', 'tabel_b1_field4', $tl_b1->$tabel_b1_field4, '') ?>
            <?= edit_text('tabel_b1_field5', htmlspecialchars($tl_b1->$tabel_b1_field5), 'required') ?>
            <?= select_ubah('tabel_b1_field6', option_selected($tl_b1->$tabel_b1_field6, $tl_b1->$tabel_b1_field6), option_b1("", ""), 'required') ?>

            <div class="form-group">
              <label><?= $tabel_b7_alias ?></label>
              <select class="form-control" required name="<?= $tabel_b1_field7_input ?>">
                <?php foreach ($tbl_b7 as $tl_b7): ?>
                  <?php if ($tl_b1->$tabel_b1_field7 == $tl_b7->$tabel_b7_field1) { ?>
                    <option selected hidden value="<?= $tl_b1->$tabel_b1_field7 ?>"><?= $tl_b7->$tabel_b7_field2 ?></option>
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
<?php endforeach; ?>


<!-- modal lihat -->
<?php foreach ($tbl_b1 as $tl_b1): ?>
  <div id="lihat<?= $tl_b1->$tabel_b1_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header($tabel_b1_alias, $tl_b1->$tabel_b1_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">

            <?= tampil_text('tabel_b1_field1', $tl_b1->$tabel_b1_field1) ?>
            <?= tampil_text('tabel_b1_field2', $tl_b1->$tabel_b1_field2) ?>
            <?= tampil_text('tabel_b1_field3', $tl_b1->$tabel_b1_field3) ?>
            <?= tampil_file($tabel_b1, 'tabel_b1_field4', $tl_b1->$tabel_b1_field4) ?>
            <?= tampil_text('tabel_b1_field5', $tl_b1->$tabel_b1_field5) ?>

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