<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
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

<?= btn_tambah() ?>
<button class="btn btn-info mb-4" type="button" data-toggle="modal" data-target="#import">+ Import</button>
<?= btn_laporan('tabel_e4') ?>
<button type="button" class="btn btn-info mb-4" id="export-btn" target="_blank">
  <i class="fas fa-print"></i> Cetak Excel</button>




<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_e4_field1_alias ?></th>
        <th><?= $tabel_e4_field2_alias ?></th>
        <th><?= $tabel_e4_field3_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_e4 as $tl_e4): ?>
        <tr>
          <td></td>
          <td><?= $tl_e4->$tabel_e4_field1; ?></td>
          <td><?= $tl_e4->$tabel_e4_field2 ?></td>
          <td><?= $tl_e4->$tabel_e4_field3 ?></td>
          <td>
            <?= btn_lihat($tl_e4->$tabel_e4_field1) ?>
            <?= btn_edit($tl_e4->$tabel_e4_field1) ?>

            <!-- Sebelumnya saya sudah membahas ini di v_admin_spp
          Saya akan mempending fitur ini dengan alasan yang sama dalam waktu yang belum ditentukan -->
            <!-- <a class="btn btn-light text-danger" onclick="return confirm('Hapus user?')" href="< site_url($tabel_c2 . '/hapus/' . $tl_e4->$tabel_e4_field1) ?>">
            <i class="fas fa-trash"></i></a> -->

          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
</div>


<!-- modal import -->
<div id="import" class="modal fade import">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= modal_header('Import ' . $tabel_e4_alias, '') ?>

      <form action="<?= site_url($tabel_e4 . '/import') ?>" enctype="multipart/form-data" method="post">
        <div class="modal-body">

          <div class="form-group">
            <label for="excel">Import Excel</label>
            <input type="file" class="form-control-file" name="import" id="excel" placeholder="Masukkan"
              aria-describedby="fileHelpId">
          </div>


        </div>

        <!-- memunculkan notifikasi modal -->
        <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_import') ?></p>

        <div class="modal-footer">
          <?= btn_simpan() ?>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= modal_header('Tambah ' . $tabel_e4_alias, '') ?>
      <form action="<?= site_url($tabel_e4 . '/tambah') ?>" method="post">
        <div class="modal-body">
          <?= add_text('tabel_e4_field2', 'required') ?>
          <?= add_text('tabel_e4_field3', 'required') ?>
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
<?php foreach ($tbl_e4 as $tl_e4): ?>
  <div id="ubah<?= $tl_e4->$tabel_e4_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header('Edit ' . $tabel_e4_alias, $tl_e4->$tabel_e4_field1) ?>

        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url($tabel_e4 . '/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <?= input_hidden('tabel_e4_field1', $tl_e4->$tabel_e4_field1, 'required') ?>
            <?= edit_text('tabel_e4_field2', $tl_e4->$tabel_e4_field2, 'required') ?>
            <?= edit_text('tabel_e4_field3', $tl_e4->$tabel_e4_field3, 'required') ?>
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

  
  <div id="lihat<?= $tl_e4->$tabel_e4_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header($tabel_e4_alias, $tl_e4->$tabel_e4_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <?= tampil_text('tabel_e4_field2', $tl_e4->$tabel_e4_field2) ?>
                <?= tampil_text('tabel_e4_field3', $tl_e4->$tabel_e4_field3) ?>
              </div>

            </div>
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