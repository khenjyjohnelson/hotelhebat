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
        data-target="#<?= $tabel25_field3 . $tl7->$tabel25_field1 ?>">
        <i class="fas fa-edit"></i> <?= $tabel25_field3_alias ?></a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#<?= $tabel25_field4 . $tl7->$tabel25_field1 ?>">
        <i class="fas fa-edit"></i> <?= $tabel25_field4_alias ?></a>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#<?= $tabel25_field5 . $tl7->$tabel25_field1 ?>">
        <i class="fas fa-edit"></i> <?= $tabel25_field5_alias ?></a>
    <?php endforeach; ?>

    <?php foreach ($tbl7 as $tl7): ?>
      <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
        data-target="#<?= $tabel7_field8 . $tl7->$tabel7_field1 ?>">
        <i class="fas fa-edit"></i> <?= $tabel7_field8_alias ?></a>
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



      <form action="<?= site_url($tabel7 . '/update') ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label><?= $tabel7_field2_alias ?></label>
          <input class="form-control tabel7" required type="text" name="<?= $tabel7_field2_input ?>"
            value="<?= $tl7->$tabel7_field2; ?>">
          <input type="hidden" name="<?= $tabel7_field1_input ?>" value="<?= $tl7->$tabel7_field1; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel7_field3_alias ?></label>
          <textarea class="form-control tabel7" required name="<?= $tabel7_field3_input ?>"
            rows="3"><?= $tl7->$tabel7_field3; ?></textarea>
        </div>

        <div class="form-group">
          <label><?= $tabel7_field4_alias ?></label>
          <input class="form-control tabel7" required type="text" name="<?= $tabel7_field4_input ?>"
            value="<?= $tl7->$tabel7_field4; ?>">
        </div>

        <div class="form-group">
          <label><?= $tabel7_field5_alias ?></label>
          <input class="form-control tabel7" required type="text" name="<?= $tabel7_field5_input ?>"
            value="<?= $tl7->$tabel7_field5; ?>">
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
  <div id="<?= $tabel7_field8 . $tl7->$tabel7_field1 ?>" class="modal fade <?= $tabel7_field8 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel7_alias ?>   <?= $tl7->$tabel7_field1; ?></h5>
          &nbsp;&nbsp;&nbsp;<a class="btn btn-info" href="<?= site_url($tabel25 . '/admin') ?>">
            <i class="fas fa-edit"></i> Kelola</a>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel7 . '/update_tabel7_field8') ?>" method="post">
          <div class="modal-body">

            <div class="form-group">
              <label>Pilih <?= $tabel7_field8_alias ?></label>
              <select class="form-control" required name="<?= $tabel7_field8_input ?>">

                <?php foreach ($tbl25 as $tl25): ?>
                  <?php if ($tl7->$tabel7_field8 == $tl25->$tabel25_field1) { ?>

                    <option selected hidden value="<?= $tl25->$tabel25_field1 ?>"><?= $tl25->$tabel25_field2 ?></option>

                  <?php } ?>
                <?php endforeach ?>

                <?php foreach ($tbl25 as $tl25): ?>

                  <option value="<?= $tl25->$tabel25_field1 ?>"><?= $tl25->$tabel25_field2 ?>
                  </option>

                <?php endforeach ?>

              </select>
              <input type="hidden" name="<?= $tabel7_field1_input ?>" value="<?= $tl7->$tabel7_field1; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel7_field8) ?>
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
  <div id="<?= $tabel13 . $tl7->$tabel7_field1 ?>" class="modal fade <?= $tabel7_field6 ?>">
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

        <form action="<?= site_url($tabel7 . '/update_tabel7_field6') ?>" method="post">
          <div class="modal-body">

            <div class="form-group">
              <label>Pilih <?= $tabel7_field6_alias ?></label>
              <select class="form-control" required name="<?= $tabel7_field6_input ?>">

                <?php foreach ($tbl13 as $tl13): ?>
                  <?php if ($tl7->$tabel7_field6 == $tl13->$tabel7_field6) { ?>

                    <option selected hidden value="<?= $tl13->$tabel7_field6 ?>"><?= $tl13->$tabel7_field6 ?> -
                      <?= $tl13->$tabel13_field2; ?>
                    </option>
                  <?php } ?>
                <?php endforeach ?>

                <option value="0">Tidak ada</option>

                <?php foreach ($tbl13 as $tl13): ?>

                  <option value="<?= $tl13->$tabel7_field6 ?>"><?= $tl13->$tabel7_field6 ?> -
                    <?= $tl13->$tabel13_field2; ?>
                  </option>

                <?php endforeach ?>

              </select>
              <input type="hidden" name="<?= $tabel7_field1_input ?>" value="<?= $tl7->$tabel7_field1; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel7_field6) ?>
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
  <div id="<?= $tabel25_field3 . $tl7->$tabel25_field1; ?>" class="modal fade <?= $tabel25_field3 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel25_field3_alias ?>   <?= $tl7->$tabel25_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel25 . '/update_tabel25_field3') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/tabel25/<?= $tl7->$tabel25_field3; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel25_field3_alias ?></label>
              <input class="form-control-file" required type="file" name="<?= $tabel25_field3_input ?>">
              <input type="hidden" name="<?= $tabel25_field1_input ?>" value="<?= $tl7->$tabel25_field1; ?>">
              <input type="hidden" name="<?= $tabel25_field3_old ?>" value="<?= $tl7->$tabel25_field3; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel25_field3) ?>
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
<?php foreach ($tbl7 as $tl7): ?>
  <div id="<?= $tabel25_field4 . $tl7->$tabel25_field1; ?>" class="modal fade <?= $tabel25_field4 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel25_field4_alias ?>   <?= $tl7->$tabel25_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel25 . '/update_tabel25_field4') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/tabel25/<?= $tl7->$tabel25_field4; ?>" width="300">
            </div>
            <hr>


            <div class="form-group">
              <label>Ubah <?= $tabel25_field4_alias ?></label>
              <input class="form-control-file" required type="file" name="<?= $tabel25_field4_input ?>">
              <input type="hidden" name="<?= $tabel25_field1_input ?>" value="<?= $tl7->$tabel25_field1; ?>">
              <input type="hidden" name="<?= $tabel25_field4_old ?>" value="<?= $tl7->$tabel25_field4; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel25_field4) ?>
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
<?php foreach ($tbl7 as $tl7): ?>
  <div id="<?= $tabel25_field5 . $tl7->$tabel25_field1; ?>" class="modal fade <?= $tabel25_field5 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit <?= $tabel25_field5_alias ?>   <?= $tl7->$tabel25_field1; ?></h5>

          <button class="close" data-dismiss="modal">
            <span>&times;</span>
          </button>
        </div>

        <form action="<?= site_url($tabel25 . '/update_tabel25_field5') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <div class="form-group">
              <img src="img/tabel25/<?= $tl7->$tabel25_field5; ?>" width="300">
            </div>
            <hr>

            <div class="form-group">
              <label>Ubah <?= $tabel25_field5_alias ?></label>
              <input class="form-control-file" required type="file" name="<?= $tabel25_field5_input ?>">
              <input type="hidden" name="<?= $tabel25_field1_input ?>" value="<?= $tl7->$tabel25_field1; ?>">
              <input type="hidden" name="<?= $tabel25_field5_old ?>" value="<?= $tl7->$tabel25_field5; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel25_field5) ?>
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

<!-- modal edit lisensi-->
<?php foreach ($tbl7 as $tl7): ?>
  <div id="<?= $tabel23 . $tl7->$tabel7_field1 ?>" class="modal fade <?= $tabel7_field7 ?>">
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

        <form action="<?= site_url($tabel7 . '/update_tabel7_field7') ?>" method="post">
          <div class="modal-body">

            <div class="form-group">
              <label>Pilih <?= $tabel7_field7_alias ?></label>
              <select class="form-control" required name="<?= $tabel7_field7_input ?>">

                <?php foreach ($tbl23 as $tl23): ?>
                  <?php if ($tl7->$tabel7_field7 == $tl23->$tabel7_field7) { ?>

                    <option selected hidden value="<?= $tl23->$tabel7_field7 ?>"><?= $tl23->$tabel7_field7 ?> -
                      <?= $tl23->$tabel23_field2; ?>
                    </option>
                  <?php } ?>
                <?php endforeach ?>

                <option value="0">Tidak ada</option>

                <?php foreach ($tbl23 as $tl23): ?>

                  <option value="<?= $tl23->$tabel7_field7 ?>"><?= $tl23->$tabel7_field7 ?> |
                    <?= $tl23->$tabel23_field2; ?>
                  </option>

                <?php endforeach ?>

              </select>
              <input type="hidden" name="<?= $tabel7_field1_input ?>" value="<?= $tl7->$tabel7_field1; ?>">
            </div>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p id="p_<?= $tabel7_field7 ?>" class="small text-center text-danger">
            <?= $this->session->flashdata('pesan_' . $tabel7_field7) ?>
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