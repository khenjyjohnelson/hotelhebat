<?php switch ($this->session->userdata($tabel9_field6)) {
  case $tabel9_field6_value3:
    // case 'tabel9_field6_value4_alias':
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1><?= $title ?><?= $phase ?></h1>
<hr>
<div class="row">
  <div class="col-md-6">
    <p>Beberapa gambar tidak akan langsung berubah, perlu menghapus cache terlebih dahulu.</p>

    <!-- form edit favicon, logo, dan foto -->
    <?php foreach ($tbl7 as $tl7): ?>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#<?= $tabel7_field3 . $tl7->$tabel7_field1 ?>">
        <i class="fas fa-edit"></i> <?= $tabel7_field3_alias ?></a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#<?= $tabel7_field4 . $tl7->$tabel7_field1 ?>">
        <i class="fas fa-edit"></i> <?= $tabel7_field4_alias ?></a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#<?= $tabel7_field5 . $tl7->$tabel7_field1 ?>">
        <i class="fas fa-edit"></i> <?= $tabel7_field5_alias ?></a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#<?= $tabel7_field13 . $tl7->$tabel7_field1 ?>">
        <i class="fas fa-edit"></i> <?= $tabel7_field13_alias ?></a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#<?= $tabel13 . $tl7->$tabel7_field1 ?>">
        <i class="fas fa-edit"></i> <?= $tabel13_alias ?></a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#<?= $tabel23 . $tl7->$tabel7_field1 ?>">
        <i class="fas fa-edit"></i> <?= $tabel23_alias ?></a>

      <a class="btn btn-info mb-4" href="<?= site_url($tabel12 . '/admin') ?>">
        <i class="fas fa-edit"></i> Kelola <?= $tabel12_alias ?></a>
      <a class="btn btn-info mb-4" href="<?= site_url($tabel24 . '/admin') ?>">
        <i class="fas fa-edit"></i> <?= $tabel24_alias ?></a>
      <a class="btn btn-info mb-4" href="<?= site_url($tabel7 . '/admin') ?>">
        <i class="fas fa-edit"></i> Kelola</a>



      <form action="<?= site_url($tabel7 . '/update') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label><?= $tabel7_field2_alias ?></label>
          <input class="form-control tabel7" required type="text" name="<?= $tabel7_field2_input ?>"
            value="<?= $tl7->$tabel7_field2; ?>">
          <input type="hidden" name="<?= $tabel7_field1_input ?>" value="<?= $tl7->$tabel7_field1; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel7_field6_alias ?></label>
          <textarea class="form-control tabel7" required name="<?= $tabel7_field6_input ?>"
            rows="3"><?= $tl7->$tabel7_field6; ?></textarea>
        </div>

        <div class="form-group">
          <label><?= $tabel7_field7_alias ?></label>
          <input class="form-control tabel7" required type="text" name="<?= $tabel7_field7_input ?>"
            value="<?= $tl7->$tabel7_field7; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel7_field8_alias ?></label>
          <input class="form-control tabel7" required type="text" name="<?= $tabel7_field8_input ?>"
            value="<?= $tl7->$tabel7_field8; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel7_field9_alias ?></label>
          <textarea id="editor1" class="form-control tabel7" required name="<?= $tabel7_field9_input ?>"
            rows="5"><?= $tl7->$tabel7_field9; ?></textarea>
        </div>

        <div class="form-group">
          <button class="btn btn-success" onclick="return confirm('Ubah data website?')" type="submit">Simpan
            Perubahan</button>
        </div>
      </form>
    <?php endforeach; ?>
  </div>
  <div class="col-md-6">
    <?php foreach ($dekor as $dk): ?>
      <img src="img/tabel12/<?= $dk->$tabel12_field3 ?>" class="img-fluid">
    <?php endforeach ?>
  </div>
</div>


<!-- modal edit tema-->
<?php foreach ($tbl7 as $tl7): ?>
  <div id="<?= $tabel7_field13 . $tl7->$tabel7_field1 ?>" class="modal fade <?= $tabel7_field13 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel7_alias ?>   <?= $tl7->$tabel7_field1; ?></h5>
          &nbsp;&nbsp;&nbsp;<a class="btn btn-info" href="<?= site_url($tabel7 . '/admin') ?>">
            <i class="fas fa-edit"></i> Kelola</a>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel7 . '/update_' . $tabel7_field13) ?>" method="post">
          <div class="modal-body">

            <div class="form-group">
              <label>Pilih <?= $tabel7_field13_alias ?></label>
              <select class="form-control" required name="<?= $tabel7_field13_input ?>">

                <?php foreach ($tbl7_alt as $tl7): ?>
                  <?php if ($tl7->$tabel7_field13 == $tl7->$tabel7_field13) { ?>

                    <option selected hidden value="<?= $tl7->$tabel7_field13 ?>"><?= $tl7->$tabel7_field13 ?>
                    </option>
                  <?php } ?>
                <?php endforeach ?>

                <?php foreach ($tbl7_alt as $tl7): ?>

                  <option value="<?= $tl7->$tabel7_field13 ?>"><?= $tl7->$tabel7_field13 ?>
                  </option>

                <?php endforeach ?>

              </select>
              <input type="hidden" name="<?= $tabel7_field1_input ?>" value="<?= $tl7->$tabel7_field1; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel7_field13) ?>
          </p>

          <div class="modal-footer">

            <button class="btn btn-success" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit event-->
<?php foreach ($tbl7 as $tl7): ?>
  <div id="<?= $tabel13 . $tl7->$tabel7_field1 ?>" class="modal fade <?= $tabel7_field10 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel13_alias ?>   <?= $tl7->$tabel7_field1; ?></h5>
          &nbsp;&nbsp;&nbsp;<a class="btn btn-info" href="<?= site_url($tabel13 . '/admin') ?>">
            <i class="fas fa-edit"></i> Kelola</a>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel7 . '/update_' . $tabel7_field10) ?>" method="post">
          <div class="modal-body">

            <div class="form-group">
              <label>Pilih <?= $tabel7_field10_alias ?></label>
              <select class="form-control" required name="<?= $tabel7_field10_input ?>">

                <?php foreach ($tbl13 as $tl13): ?>
                  <?php if ($tl7->$tabel7_field10 == $tl13->$tabel7_field10) { ?>

                    <option selected hidden value="<?= $tl13->$tabel7_field10 ?>"><?= $tl13->$tabel7_field10 ?> -
                      <?= $tl13->$tabel13_field2; ?>
                    </option>
                  <?php } ?>
                <?php endforeach ?>

                <option value="0">Tidak ada</option>

                <?php foreach ($tbl13 as $tl13): ?>

                  <option value="<?= $tl13->$tabel7_field10 ?>"><?= $tl13->$tabel7_field10 ?> -
                    <?= $tl13->$tabel13_field2; ?>
                  </option>

                <?php endforeach ?>

              </select>
              <input type="hidden" name="<?= $tabel7_field1_input ?>" value="<?= $tl7->$tabel7_field1; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel7_field10) ?>
          </p>

          <div class="modal-footer">

            <button class="btn btn-success" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit favicon-->
<?php foreach ($tbl7 as $tl7): ?>
  <div id="<?= $tabel7_field3 . $tl7->$tabel7_field1; ?>" class="modal fade <?= $tabel7_field3 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel7_field3_alias ?>   <?= $tl7->$tabel7_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel7 . '/update_' . $tabel7_field3) ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/tabel7/<?= $tl7->$tabel7_field3; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel7_field3_alias ?></label>
              <input class="form-control-file" required type="file" name="<?= $tabel7_field3_input ?>">
              <input type="hidden" name="<?= $tabel7_field1_input ?>" value="<?= $tl7->$tabel7_field1; ?>">
              <input type="hidden" name="<?= $tabel7_field3_old ?>" value="<?= $tl7->$tabel7_field3; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel7_field3) ?>
          </p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah <?= $tabel7_field3 ?>?')" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit logo-->
<?php foreach ($tbl7 as $tl7): ?>
  <div id="<?= $tabel7_field4 . $tl7->$tabel7_field1; ?>" class="modal fade <?= $tabel7_field4 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel7_field4_alias ?>   <?= $tl7->$tabel7_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel7 . '/update_' . $tabel7_field4) ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/tabel7/<?= $tl7->$tabel7_field4; ?>" width="300">
            </div>
            <hr>


            <div class="form-group">
              <label>Ubah <?= $tabel7_field4_alias ?></label>
              <input class="form-control-file" required type="file" name="<?= $tabel7_field4_input ?>">
              <input type="hidden" name="<?= $tabel7_field1_input ?>" value="<?= $tl7->$tabel7_field1; ?>">
              <input type="hidden" name="<?= $tabel7_field4_old ?>" value="<?= $tl7->$tabel7_field4; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel7_field4) ?>
          </p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah <?= $tabel7_field4 ?>?')" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit foto-->
<?php foreach ($tbl7 as $tl7): ?>
  <div id="<?= $tabel7_field5 . $tl7->$tabel7_field1; ?>" class="modal fade <?= $tabel7_field5 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel7_field5_alias ?>   <?= $tl7->$tabel7_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel7 . '/update_' . $tabel7_field5) ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/tabel7/<?= $tl7->$tabel7_field5; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel7_field5_alias ?></label>
              <input class="form-control-file" required type="file" name="<?= $tabel7_field5_input ?>">
              <input type="hidden" name="<?= $tabel7_field1_input ?>" value="<?= $tl7->$tabel7_field1; ?>">
              <input type="hidden" name="<?= $tabel7_field5_old ?>" value="<?= $tl7->$tabel7_field5; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel7_field5) ?>
          </p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm('Ubah <?= $tabel7_field5 ?>?')" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>

<!-- modal edit lisensi-->
<?php foreach ($tbl7 as $tl7): ?>
  <div id="<?= $tabel23 . $tl7->$tabel7_field1 ?>" class="modal fade <?= $tabel7_field11 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel23_alias ?>   <?= $tl7->$tabel7_field1; ?></h5>
          &nbsp;&nbsp;&nbsp;<a class="btn btn-info" href="<?= site_url($tabel23 . '/admin') ?>">
            <i class="fas fa-edit"></i> Kelola</a>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel7 . '/update_' . $tabel7_field11) ?>" method="post">
          <div class="modal-body">

            <div class="form-group">
              <label>Pilih <?= $tabel7_field11_alias ?></label>
              <select class="form-control" required name="<?= $tabel7_field11_input ?>">

                <?php foreach ($tbl23 as $tl23): ?>
                  <?php if ($tl7->$tabel7_field11 == $tl23->$tabel7_field11) { ?>

                    <option selected hidden value="<?= $tl23->$tabel7_field11 ?>"><?= $tl23->$tabel7_field11 ?> -
                      <?= $tl23->$tabel23_field2; ?>
                    </option>
                  <?php } ?>
                <?php endforeach ?>

                <option value="0">Tidak ada</option>

                <?php foreach ($tbl23 as $tl23): ?>

                  <option value="<?= $tl23->$tabel7_field11 ?>"><?= $tl23->$tabel7_field11 ?> |
                    <?= $tl23->$tabel23_field2; ?>
                  </option>

                <?php endforeach ?>

              </select>
              <input type="hidden" name="<?= $tabel7_field1_input ?>" value="<?= $tl7->$tabel7_field1; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_<?= $tabel7_field11 ?>" class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel7_field11) ?>
          </p>

          <div class="modal-footer">
            <button class="btn btn-success" type="submit">Simpan
              Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>