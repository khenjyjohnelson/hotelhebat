
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

<?php foreach ($tbl_c2 as $tl_c2): ?>
<div class="row">
  <div class="col-md-6">
    <a class="btn btn-warning mb-4" type="button" data-toggle="modal"
      data-target="#password<?= $tl_c2->$tabel_c2_field1 ?>">
      <i class="fas fa-edit"></i> <?= lang('update_data') . lang('tabel_c2_field4_alias') ?></a>
  </div>
  <div class="col-md-6">

      <!-- tombol untuk memunculkan modal memperbaiki password -->


      <!-- form ini terpisah dengan form ubah password untuk keamanan sesama :) -->
      <form action="<?= site_url($language . '/' . $tabel_c2 . '/update_profil') ?>" method="post" enctype="multipart/form-data">
        <?= input_hidden('tabel_c2_field1', $tl_c2->$tabel_c2_field1, 'required') ?>
        <?= edit_text('tabel_c2_field2', $tl_c2->$tabel_c2_field2, 'required') ?>
        <small>*Merubah <?= $tabel_c2_field3_alias ?> ini tidak akan merubah <?= $tabel_c2_field3_alias ?> yang ada di
          <?= $tabel_f2_alias ?></small>
        <?= edit_email('tabel_c2_field3', $tl_c2->$tabel_c2_field3, 'required') ?>
        <?= edit_text('tabel_c2_field5', $tl_c2->$tabel_c2_field5, 'required') ?>
        
        <div class="form-group">
          <?= btn_update() ?>
        </div>
      </form>
    </div>
  </div>
  

  
  <div id="password<?= $tl_c2->$tabel_c2_field1 ?>" class="modal fade <?= $tabel_c2_field4 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('update_data') . $tabel_c2_field4_alias . ' Anda', '') ?>
        <form action="<?= site_url($language . '/' . $tabel_c2 . '/update_pass') ?>" method="post" enctype="multipart/form-data">
          <div class="modal-body">

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input class="form-control" type="password" required name="<?= $tabel_c2_field4_old ?>"
                placeholder="Masukkan <?= $tabel_c2_field4_alias ?> lama">
              <input type="hidden" name="<?= $tabel_c2_field1_input ?>" value="<?= $tl_c2->$tabel_c2_field1; ?>">
            </div>

            <!-- < input_password_prepend('tabel_c2_field4', '<i class="fas fa-key"></i>', 'required') ?> -->

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"></span>
              </div>
              <input class="form-control" id="psw" type="password" required name="<?= $tabel_c2_field4_input ?>"
                placeholder="Masukkan <?= $tabel_c2_field4_alias ?> baru" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters">
            </div>

            <div id="message">
              <label class="checkpass">Password must contain the following:</label><br>
              <div class="row">
                <div class="col-md-6">
                  <label id="letter" class="checkpass invalid">A <b>lowercase</b> letter</label><br>
                  <label id="capital" class="checkpass invalid">A <b>capital (uppercase)</b> letter</label><br>

                </div>
                <div class="col-md-6">
                  <label id="number" class="checkpass invalid">A <b>number</b></label><br>
                  <label id="length" class="checkpass invalid">Minimum <b>8 characters</b></label>

                </div>
              </div>
            </div>

            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-key"></i></span>
              </div>
              <input class="form-control" type="password" required name="konfirm"
                placeholder="Konfirmasi <?= $tabel_c2_field4_alias ?> baru">
            </div>
          </div>

          <!-- pesan untuk pengguna yang sedang merubah password -->
          <!-- untuk bagian ini akan kuubah nanti -->
          <p class="small text-center text-danger"><?= $this->session->flashdata('pesan_' . $tabel_c2_field4) ?></p>

          <div class="modal-footer">
            <button class="btn btn-success" onclick="return confirm(<?= lang('update_data') . lang('tabel_c2_field4_alias') . '?'?>)"
              type="submit">Simpan Perubahan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach; ?>


<br>
<br>

<h1><?= lang('tabel_d3_alias') ?><?= $phase ?></h1>
<hr>
<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_d3_field5_alias') ?></th>
        <th><?= lang('tabel_d3_field3_alias') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_d3 as $tl_d3): ?>
        <tr>
          <td></td>
          <td><?= $tl_d3->$tabel_d3_field5 ?></td>
          <td><?= $tl_d3->$tabel_d3_field3 ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
</div>