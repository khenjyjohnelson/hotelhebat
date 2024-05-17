<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
  // case $tabel_c2_field6_value4:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>
<p>Beberapa gambar tidak akan langsung berubah, perlu menghapus cache terlebih dahulu.</p>

<?= btn_tambah() ?>
<?= btn_laporan($tabel_a1) ?>

<?php foreach ($dekor as $dk): ?>
  <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200">
<?php endforeach ?>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_a1_field1_alias ?></th>
        <th><?= $tabel_a1_field2_alias ?></th>
        <th><?= $tabel_a1_field4_alias ?></th>
        <th><?= $tabel_a1_field3_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_a1_alt as $tl_a1_alt): ?>
        <tr>
          <td></td>
          <td><?= $tl_a1_alt->$tabel_a1_field1; ?></td>
          <td><?= $tl_a1_alt->$tabel_a1_field2 ?></td>
          <td><?= $tl_a1_alt->$tabel_a1_field4 ?></td>
          <td><img src="img/<?= $tabel_b7 ?>/<?= $tl_a1_alt->$tabel_a1_field3 ?>" width="100"></td>
          <td>
            <?= btn_lihat($tl_a1_alt->$tabel_a1_field1) ?>
            <?= btn_edit($tl_a1_alt->$tabel_a1_field1) ?>
            <?= btn_hapus($tabel_a1, $tl_a1_alt->$tabel_a1_field1) ?>
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
      <?= modal_header('Tambah ' . $tabel_a1_alias, '') ?>

      <form action="<?= site_url($tabel_a1 . '/tambah') ?>" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <?= add_text($tabel_a1_field2, 'required') ?>
          <?= add_text($tabel_a1_field4, 'required') ?>
          <?= add_file($tabel_a1_field3, 'required') ?>
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

<!-- modal lihat -->
<?php foreach ($tbl_a1_alt as $tl_a1_alt): ?>
  <div id="lihat<?= $tl_a1_alt->$tabel_a1_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header($tabel_a1_alias, $tl_a1_alt->$tabel_a1_field1) ?>
        <form>
          <div class="modal-body">
            <?= tampil_text($tabel_a1_field1, $tl_a1_alt->$tabel_a1_field1) ?>
            <?= tampil_text($tabel_a1_field2, $tl_a1_alt->$tabel_a1_field2) ?>
            <?= tampil_text($tabel_a1_field4, $tl_a1_alt->$tabel_a1_field4) ?>
            <?= tampil_file($tabel_a1, $tabel_a1_field3, $tl_a1_alt->$tabel_a1_field3) ?>
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

<!-- modal edit foto -->
<?php foreach ($tbl_a1_alt as $tl_a1_alt): ?>
  <div id="ubah<?= $tl_a1_alt->$tabel_a1_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header('Edit ' . $tabel_a1_field1_alias,  $tl_a1_alt->$tabel_a1_field1) ?>

        <form action="<?= site_url($tabel_a1 . '/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <?= input_hidden('tabel_a1_field1', $tl_a1_alt->$tabel_a1_field1, 'required') ?>
            * Meski ingin mengubah <?= $tabel_a1_field2_alias ?> saja, tetap harus mengupload ulang <?= $tabel_a1_field3_alias ?> juga

            <?= edit_text($tabel_a1_field2, $tl_a1_alt->$tabel_a1_field2, 'required') ?>
            <?= edit_text($tabel_a1_field4, $tl_a1_alt->$tabel_a1_field4, 'required') ?>
            <?= edit_file($tabel_a1_field3, $tabel_a1, $tl_a1_alt->$tabel_a1_field3, 'required') ?>
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
