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

<button class="btn btn-primary mb-4" type="button" data-toggle="modal" data-target="#tambah">+ Tambah</button>
<a class="btn btn-info mb-4" href="<?= site_url($tabel_b6 . '/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<?php foreach ($dekor as $dk): ?>
  <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200">
<?php endforeach ?>


<!-- tabel fiter pesanan -->
<table class="mb-4">

  <!-- method get supaya nilai dari filter bisa tampil nanti -->
  <form action="<?= site_url($tabel_b6 . '/filter') ?>" method="get">
    <tr>

      <td class="pr-2">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Pilih <?= $tabel_b7_alias ?></span>
          </div>
          <select class="form-control" required name="<?= $tabel_b6_field7_input ?>">
            <option selected hidden value="<?= $tabel_b6_field7_value ?>"></option>
            <?php foreach ($tbl_b7 as $tl_b7): ?>
              <option value="<?= $tl_b7->$tabel_b7_field1 ?>"><?= $tl_b7->$tabel_b7_field2 ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </td>

      <td>
        <button class="btn btn-success" type="submit">
          <a type="submit"><i class="fas fa-search"></i></a>
        </button>
        <a class="btn btn-danger" type="button" href="<?= site_url($tabel_b6 . '/admin') ?>">
          <i class="fas fa-redo"></i></a>
      </td>

    </tr>
  </form>
</table>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel_b6_field1_alias ?></th>
        <th><?= $tabel_b6_field2_alias ?></th>
        <th><?= $tabel_b6_field3_alias ?></th>
        <th><?= $tabel_b6_field4_alias ?></th>
        <th><?= $tabel_b6_field5_alias ?></th>
        <th><?= $tabel_b6_field6_alias ?></th>
        <th><?= $tabel_b6_field7_alias ?></th>
        <th>Aksi</th>
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
              <a class="text-warning" href="<?= site_url($tabel_b6 . '/nonaktifkan/' . $tl_b6->$tabel_b6_field1) ?>">
                <h4><i class="fas fa-toggle-on"></i></h4>
              </a>

            <?php } elseif ($tl_b6->$tabel_b6_field6 == $tabel_b6_field6_value2) { ?>
              <a class="text-warning" href="<?= site_url($tabel_b6 . '/aktifkan/' . $tl_b6->$tabel_b6_field1) ?>">
                <h4><i class="fas fa-toggle-off"></i></h4></i>
              </a>
            <?php } else { ?>

            <?php } ?>
          </td>
          <td><?= $tl_b6->$tabel_b6_field7 ?></td>
          <td><a class="btn btn-light text-info" type="button" data-toggle="modal"
              data-target="#lihat<?= $tl_b6->$tabel_b6_field1; ?>">
              <i class="fas fa-eye"></i></a>
            <a class="btn btn-light text-warning" type="button" data-toggle="modal"
              data-target="#ubah<?= $tl_b6->$tabel_b6_field1; ?>">
              <i class="fas fa-edit"></i></a>
            <a class="btn btn-light text-danger" onclick="return confirm('Hapus data <?= $tabel_b6 ?>?')"
              href="<?= site_url($tabel_b6 . '/hapus/' . $tl_b6->$tabel_b6_field1) ?>">
              <i class="fas fa-trash"></i></a>
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
        <h5 class="modal-title">Tambah <?= $tabel_b6_alias ?></h5>

        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
      </div>

      <form action="<?= site_url($tabel_b6 . '/tambah') ?>" enctype="multipart/form-data" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label><?= $tabel_b6_field2_alias ?></label>
            <input class="form-control" type="text" required name="<?= $tabel_b6_field2_input ?>"
              placeholder="Masukkan <?= $tabel_b6_field2_alias ?>">
          </div>

          <div class="form-group">
            <label><?= $tabel_b6_field3_alias ?></label>
            <input class="form-control" type="text" required name="<?= $tabel_b6_field3_input ?>"
              placeholder="Masukkan <?= $tabel_b6_field3_alias ?>">
          </div>

          <div class="form-group">
            <label><?= $tabel_b6_field4_alias ?></label>
            <input class="form-control" type="text" required name="<?= $tabel_b6_field4_input ?>"
              placeholder="Masukkan <?= $tabel_b6_field4_alias ?>">
          </div>

          <div class="form-group">
            <label><?= $tabel_b6_field5_alias ?></label>
            <input class="form-control" type="text" required name="<?= $tabel_b6_field5_input ?>"
              placeholder="Masukkan <?= $tabel_b6_field5_alias ?>">
          </div>

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
          <button class="btn btn-success" type="submit">Simpan</button>
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
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tl_b6->$tabel_b6_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel_b6 . '/update') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel_b6_field2_alias ?></label>
              <input class="form-control" type="text" required name="<?= $tabel_b6_field2_input ?>"
                value="<?= $tl_b6->$tabel_b6_field2; ?>">
            </div>

            <div class="form-group">
              <label><?= $tabel_b6_field3_alias ?></label>
              <input class="form-control" type="text" required name="<?= $tabel_b6_field3_input ?>"
                value="<?= $tl_b6->$tabel_b6_field3; ?>">
              <input type="hidden" name="<?= $tabel_b6_field1_input ?>" value="<?= $tl_b6->$tabel_b6_field1; ?>">
            </div>

            <div class="form-group">
              <label><?= $tabel_b6_field4_alias ?></label>
              <input class="form-control" type="text" required name="<?= $tabel_b6_field4_input ?>"
                value="<?= $tl_b6->$tabel_b6_field4; ?>">
            </div>

            <div class="form-group">
              <label><?= $tabel_b6_field5_alias ?></label>
              <input class="form-control" type="text" required name="<?= $tabel_b6_field5_input ?>"
                value="<?= htmlspecialchars($tl_b6->$tabel_b6_field5); ?>">
            </div>

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
            <button class="btn btn-success" type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<!-- modal lihat -->
<?php foreach ($tbl_b6 as $tl_b6): ?>
  <div id="lihat<?= $tl_b6->$tabel_b6_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?= $tabel_b6_alias ?>   <?= $tl_b6->$tabel_b6_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="form-group">
              <label><?= $tabel_b6_field1_alias ?> : </label>
              <p><?= $tl_b6->$tabel_b6_field1; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel_b6_field2_alias ?> : </label>
              <p><?= $tl_b6->$tabel_b6_field2; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel_b6_field3_alias ?> : </label>
              <p><?= $tl_b6->$tabel_b6_field3; ?></p>
            </div>
            <hr>

            <div class="form-group">
              <label><?= $tabel_b6_field4_alias ?> : </label>
              <p><?= $tl_b6->$tabel_b6_field4; ?></p>
            </div>

            <div class="form-group">
              <label><?= $tabel_b6_field5_alias ?> : </label>
              <p><?= $tl_b6->$tabel_b6_field5; ?></p>
            </div>

            <div class="form-group">
              <label><?= $tabel_b6_field6_alias ?> : </label>
              <p><?= $tl_b6->$tabel_b6_field6; ?></p>
            </div>

            <div class="form-group">
              <label><?= $tabel_b6_field7_alias ?> : </label>
              <p><?= $tl_b6->$tabel_b6_field7; ?></p>
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