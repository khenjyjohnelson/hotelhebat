<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
    // case $tabel_c2_field6_value4:
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>
<p>Beberapa gambar tidak akan langsung berubah, perlu menghapus cache terlebih dahulu.</p>


<?= btn_tambah() ?>
<?= btn_laporan($tabel_b2) ?>

<?php foreach ($dekor as $dk): ?>
  <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200">
<?php endforeach ?>

<!-- tabel fiter pesanan -->
<table class="mb-4">

  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <form action="<?= site_url($tabel_b2 . '/filter') ?>" method="get">
    <tr>

      <td class="pr-2">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Pilih <?= $tabel_b7_alias ?></span>
          </div>
          <select class="form-control" required name="<?= $tabel_b2_field7_input ?>">
            <option selected hidden value="<?= $tabel_b2_field7_value ?>"><?= $tabel_b2_field7_value ?></option>
            <?php foreach ($tbl_b7 as $tl_b7): ?>
              <option value="<?= $tl_b7->$tabel_b7_field1 ?>"><?= $tl_b7->$tabel_b7_field1 . ' - ' . $tl_b7->$tabel_b7_field2 ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </td>

      <td>
        <?= btn_cari() ?>
        <?= btn_redo($tabel_b2, '/admin') ?>
      </td>

    </tr>
  </form>
</table>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_b2_field1_alias ?></th>
        <th><?= $tabel_b2_field2_alias ?></th>
        <th><?= $tabel_b2_field3_alias ?></th>
        <th><?= $tabel_b2_field4_alias ?></th>
        <th><?= $tabel_b2_field5_alias ?></th>
        <th><?= $tabel_b2_field6_alias ?></th>
        <th>Aksi</th>
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
              <?= btn_toggle_off("tabel_b2", $tl_b2->$tabel_b2_field1) ?>
            <?php } elseif ($tl_b2->$tabel_b2_field6 == $tabel_b2_field6_value2) { ?>
              <?= btn_toggle_on("tabel_b2", $tl_b2->$tabel_b2_field1) ?>
            <?php } else { ?>

            <?php } ?>
          </td>
          <td>
            <?= btn_lihat($tl_b2->$tabel_b2_field1) ?>
            <?= btn_edit($tl_b2->$tabel_b2_field1) ?>
            <?= btn_hapus("tabel_b2", $tl_b2->$tabel_b2_field1) ?>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>

<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah <?= $tabel_b2_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url($tabel_b2 . '/tambah') ?>" enctype="multipart/form-data" method="post">
        <div class="modal-body">

          <?= add_text("tabel_b2_field2", "required") ?>
          <?= add_text("tabel_b2_field3", "required") ?>
          <?= add_file("tabel_b2_field4", "required") ?>
          <?= add_textarea("tabel_b2_field5", "required") ?>

          <div class="form-group">
            <label>Pilih <?= $tabel_b7_alias ?></label>
            <select class="form-control" required name="<?= $tabel_b2_field6_input ?>">

              <?php foreach ($tbl_b7 as $tl_b7): ?>
                <option value="<?= $tl_b7->$tabel_b7_field1 ?>"><?= $tl_b7->$tabel_b7_field2 ?></option>
              <?php endforeach ?>
            </select>
          </div>

        </div>

        <!-- memunculkan notifikasi modal -->
        <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_tambah') ?></p>

        <div class="modal-footer">
          <button class="btn btn-success" type="submit">Simpan</button>
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
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tl_b2->$tabel_b2_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel_b2 . '/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <input type="hidden" name="<?= $tabel_b2_field1_input ?>" value="<?= $tl_b2->$tabel_b2_field1; ?>">
            * Meski ingin mengubah <?= $tabel_b2_field2_alias ?> saja, tetap harus mengupload ulang
            <?= $tabel_b2_field3_alias ?> juga

            <?= edit_text("tabel_b2_field2", $tl_b2->$tabel_b2_field2, "required") ?>
            <?= edit_text("tabel_b2_field3", $tl_b2->$tabel_b2_field3, "required") ?>
            <?= edit_file("tabel_b2", "tabel_b2_field4", $tl_b2->$tabel_b2_field4, "required") ?>
            <?= edit_textarea("tabel_b2_field5", $tl_b2->$tabel_b2_field5, "required") ?>

            <div class="form-group">
              <label><?= $tabel_b7_alias ?></label>
              <select class="form-control" required name="<?= $tabel_b2_field7_input ?>">
                <?php foreach ($tbl_b7 as $tl_b7): ?>
                  <?php if ($tl_b2->$tabel_b2_field7 == $tl_b7->$tabel_b7_field1) { ?>
                    <option selected hidden value="<?= $tl_b2->$tabel_b2_field7 ?>"><?= $tl_b7->$tabel_b7_field2 ?></option>
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
<?php foreach ($tbl_b2 as $tl_b2): ?>
  <div id="lihat<?= $tl_b2->$tabel_b2_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel_b2_alias ?>   <?= $tl_b2->$tabel_b2_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">

            <?= tampil_text("tabel_b2_field1", $tl_b2->$tabel_b2_field1) ?>
            <?= tampil_text("tabel_b2_field2", $tl_b2->$tabel_b2_field2)  ?>
            <?= tampil_text("tabel_b2_field3", $tl_b2->$tabel_b2_field3) ?>
            <?= tampil_file($tabel_b2, "tabel_b2_field4", $tl_b2->$tabel_b2_field4) ?>
            <?= tampil_text("tabel_b2_field5", $tl_b2->$tabel_b2_field5) ?>

          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>