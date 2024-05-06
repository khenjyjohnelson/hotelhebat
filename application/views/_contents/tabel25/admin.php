<?php switch ($this->session->userdata($tabel9_field6)) {
  case $tabel9_field6_value3:
    // case $tabel9_field6_value4:
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url($tabel25 . '/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<?php foreach ($dekor as $dk): ?>
  <img src="img/tabel12/<?= $dk->$tabel12_field3 ?>" width="200">
<?php endforeach ?>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel25_field1_alias ?></th>
        <th><?= $tabel25_field2_alias ?></th>
        <th><?= $tabel25_field3_alias ?></th>
        <th><?= $tabel25_field4_alias ?></th>
        <th><?= $tabel25_field5_alias ?></th>
        <th>Aksi</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl25 as $tl25): ?>
        <tr>
          <td></td>
          <td><?= $tl25->$tabel25_field1; ?></td>
          <td><?= $tl25->$tabel25_field2 ?></td>
          <td><img src="img/tabel25/<?= $tl25->$tabel25_field3 ?>" height="100">
            <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
              data-target="#<?= $tabel25_field3 . $tl25->$tabel25_field1 ?>"><i class="fas fa-edit"></i></a>
          </td>
          <td><img src="img/tabel25/<?= $tl25->$tabel25_field4 ?>" height="100">
            <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
              data-target="#<?= $tabel25_field4 . $tl25->$tabel25_field1 ?>"><i class="fas fa-edit"></i></a>
          </td>
          <td><img src="img/tabel25/<?= $tl25->$tabel25_field5 ?>" height="100">
            <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
              data-target="#<?= $tabel25_field5 . $tl25->$tabel25_field1 ?>"><i class="fas fa-edit"></i></a>
          </td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal"
              data-target="#lihat<?= $tl25->$tabel25_field1; ?>">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal"
              data-target="#ubah<?= $tl25->$tabel25_field1; ?>">
              <i class="fas fa-edit"></i></a>

            <?php if ($tl25->$tabel25_field2 != $tabel25_field2_value1) { ?>
              <a class="btn btn-light text-danger" onclick="return confirm('Hapus data <?= $tabel25 ?>?')"
                href="<?= site_url($tabel25 . '/hapus/' . $tl25->$tabel25_field1) ?>">
                <i class="fas fa-trash"></i></a>
            <?php } ?>
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
      <div class="modal-header">
        <h5 class="modal-title">Tambah <?= $tabel25_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url($tabel25 . '/tambah') ?>" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label><?= $tabel25_field2_alias ?></label>
            <input class="form-control" type="text" required name="<?= $tabel25_field2_input ?>"
              placeholder="Masukkan <?= $tabel25_field2_alias ?>">
          </div>

          <div class="form-group">
            <label><?= $tabel25_field6_alias ?></label>
            <textarea class="ckeditor form-control" name="<?= $tabel25_field6_input ?>"
              placeholder="Masukkan <?= $tabel13_field5_alias ?>" required cols="30" rows="10"></textarea>
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



<!-- modal ubah-->
<?php foreach ($tbl25 as $tl25): ?>
  <div id="ubah<?= $tl25->$tabel25_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tl25->$tabel25_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel25 . '/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <label><?= $tabel25_field2_alias ?></label>
              <input class="form-control" type="text" required name="<?= $tabel25_field2_input ?>"
                value="<?= $tl25->$tabel25_field2; ?>">
              <input type="hidden" name="<?= $tabel25_field1_input ?>" value="<?= $tl25->$tabel25_field1; ?>">
            </div>

            <div class="form-group">
              <label><?= $tabel25_field6_alias ?></label>
              <textarea class="ckeditor form-control" name="<?= $tabel25_field6_input ?>"
                placeholder="Masukkan <?= $tabel13_field5_alias ?>" required cols="30"
                rows="10"><?= $tl25->$tabel25_field6; ?></textarea>
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




<!-- modal edit favicon-->
<?php foreach ($tbl25 as $tl25): ?>
  <div id="<?= $tabel25_field3 . $tl25->$tabel25_field1; ?>" class="modal fade <?= $tabel25_field3 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel25_field3_alias ?>   <?= $tl25->$tabel25_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel25 . '/update_tabel25_field3') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/tabel25/<?= $tl25->$tabel25_field3; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel25_field3_alias ?></label>
              <input class="form-control-file" required type="file" name="<?= $tabel25_field3_input ?>">
              <input type="hidden" name="<?= $tabel25_field1_input ?>" value="<?= $tl25->$tabel25_field1; ?>">
              <input type="hidden" name="<?= $tabel25_field2_input ?>" value="<?= $tl25->$tabel25_field2; ?>">
              <input type="hidden" name="<?= $tabel25_field3_old ?>" value="<?= $tl25->$tabel25_field3; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_ubah') ?>
          </p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah <?= $tabel25_field3 ?>?')" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit logo-->
<?php foreach ($tbl25 as $tl25): ?>
  <div id="<?= $tabel25_field4 . $tl25->$tabel25_field1; ?>" class="modal fade <?= $tabel25_field4 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel25_field4_alias ?>   <?= $tl25->$tabel25_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel25 . '/update_tabel25_field4') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/tabel25/<?= $tl25->$tabel25_field4; ?>" width="300">
            </div>
            <hr>


            <div class="form-group">
              <label>Ubah <?= $tabel25_field4_alias ?></label>
              <input class="form-control-file" required type="file" name="<?= $tabel25_field4_input ?>">
              <input type="hidden" name="<?= $tabel25_field1_input ?>" value="<?= $tl25->$tabel25_field1; ?>">
              <input type="hidden" name="<?= $tabel25_field2_input ?>" value="<?= $tl25->$tabel25_field2; ?>">
              <input type="hidden" name="<?= $tabel25_field4_old ?>" value="<?= $tl25->$tabel25_field4; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_ubah') ?>
          </p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah <?= $tabel25_field4 ?>?')" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit foto-->
<?php foreach ($tbl25 as $tl25): ?>
  <div id="<?= $tabel25_field5 . $tl25->$tabel25_field1; ?>" class="modal fade <?= $tabel25_field5 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel25_field5_alias ?>   <?= $tl25->$tabel25_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel25 . '/update_tabel25_field5') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/tabel25/<?= $tl25->$tabel25_field5; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel25_field5_alias ?></label>
              <input class="form-control-file" required type="file" name="<?= $tabel25_field5_input ?>">
              <input type="hidden" name="<?= $tabel25_field1_input ?>" value="<?= $tl25->$tabel25_field1; ?>">
              <input type="hidden" name="<?= $tabel25_field2_input ?>" value="<?= $tl25->$tabel25_field2; ?>">
              <input type="hidden" name="<?= $tabel25_field5_old ?>" value="<?= $tl25->$tabel25_field5; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_ubah') ?>
          </p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah <?= $tabel25_field5 ?>?')" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<!-- modal lihat -->
<?php foreach ($tbl25 as $tl25): ?>
  <div id="lihat<?= $tl25->$tabel25_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel25_alias ?>   <?= $tl25->$tabel25_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel25_field1_alias ?> : </label>
              <p><?= $tl25->$tabel25_field1; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel25_field2_alias ?> : </label>
              <p><?= $tl25->$tabel25_field2; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel25_field2_alias ?> : </label>
              <p><?= html_entity_decode($tl25->$tabel25_field6); ?></p>
            </div>
            <hr>


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