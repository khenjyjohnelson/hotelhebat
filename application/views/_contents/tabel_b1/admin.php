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

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url($tabel_b1 . '/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<?php foreach ($dekor as $dk): ?>
  <img src="img/tabel_b1/<?= $dk->$tabel_b1_field3 ?>" width="200">
<?php endforeach ?>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_b1_field1_alias ?></th>
        <th><?= $tabel_b1_field2_alias ?></th>
        <th><?= $tabel_b1_field4_alias ?></th>
        <th><?= $tabel_b1_field3_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_b1 as $tl_b1): ?>
        <tr>
          <td></td>
          <td><?= $tl_b1->$tabel_b1_field1; ?></td>
          <td><?= $tl_b1->$tabel_b1_field2 ?></td>
          <td><?= $tl_b1->$tabel_b1_field4 ?></td>
          <td><img src="img/tabel_b1/<?= $tl_b1->$tabel_b1_field3 ?>" width="100"></td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal"
              data-target="#lihat<?= $tl_b1->$tabel_b1_field1; ?>">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal"
              data-target="#ubah<?= $tl_b1->$tabel_b1_field1; ?>">
              <i class="fas fa-edit"></i></a>
            <a class="btn btn-light text-danger" onclick="return confirm('Hapus data <?= $tabel_b1 ?>?')"
              href="<?= site_url($tabel_b1 . '/hapus/' . $tl_b1->$tabel_b1_field1) ?>">
              <i class="fas fa-trash"></i></a>
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
        <h5 class="modal-title">Tambah <?= $tabel_b1_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url($tabel_b1 . '/tambah') ?>" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label><?= $tabel_b1_field2_alias ?></label>
            <input class="form-control" type="text" required name="<?= $tabel_b1_field2_input ?>"
              placeholder="Masukkan <?= $tabel_b1_field2_alias ?>">
          </div>
          
          <div class="form-group">
            <label><?= $tabel_b1_field4_alias ?></label>
            <input class="form-control" type="text" required name="<?= $tabel_b1_field4_input ?>"
              placeholder="Masukkan <?= $tabel_b1_field4_alias ?>">
          </div>
          
          <div class="form-group">
            <label><?= $tabel_b1_field3_alias ?></label>
            <input class="form-control-file" required type="file" name="<?= $tabel_b1_field3_input ?>">
            
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
<?php foreach ($tbl_b1 as $tl_b1): ?>
  <div id="ubah<?= $tl_b1->$tabel_b1_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tl_b1->$tabel_b1_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel_b1 . '/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <label><?= $tabel_b1_field2_alias ?></label>
              <input class="form-control" type="text" required name="<?= $tabel_b1_field2_input ?>"
                value="<?= $tl_b1->$tabel_b1_field2; ?>">
              <input type="hidden" name="<?= $tabel_b1_field1_input ?>" value="<?= $tl_b1->$tabel_b1_field1; ?>">
              * Meski ingin mengubah <?= $tabel_b1_field2_alias ?> saja, tetap harus mengupload ulang <?= $tabel_b1_field3_alias ?> juga
            </div>
            
            <div class="form-group">
              <label><?= $tabel_b1_field4_alias ?></label>
              <input class="form-control" type="text" required name="<?= $tabel_b1_field4_input ?>"
                value="<?= $tl_b1->$tabel_b1_field4; ?>">
            </div>

            <div class="form-group">
              <img src="img/tabel_b1/<?= $tl_b1->$tabel_b1_field3; ?>" width="300">
            </div>
            <hr>
            
            <div class="form-group">
              <label>Ubah <?= $tabel_b1_field3_alias ?></label>
              <input class="form-control-file" type="file" name="<?= $tabel_b1_field3_input ?>">
              <input type="hidden" name="<?= $tabel_b1_field3_old ?>" value="<?= $tl_b1->$tabel_b1_field3; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_ubah') ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Simpan Perubahan</button>
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
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel_b1_alias ?>   <?= $tl_b1->$tabel_b1_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel_b1_field1_alias ?> : </label>
              <p><?= $tl_b1->$tabel_b1_field1; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel_b1_field2_alias ?> : </label>
              <p><?= $tl_b1->$tabel_b1_field2; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel_b1_field4_alias ?> : </label>
              <p><?= $tl_b1->$tabel_b1_field4; ?></p>
            </div>
            <hr>
            
            <div class="form-group">
              <label><?= $tabel_b1_field3_alias ?> : </label>
            </div>
            <div class="form-group">
              <img src="img/tabel_b1/<?= $tl_b1->$tabel_b1_field3; ?>" width="450">
            </div>


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