<?php switch (userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
    break;

  default:
    redirect(site_url($language . '/' . 'no_level'));
}
?>



<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200" alt="Image">
    <?php endforeach ?>
  </div>
</div>
<hr>

<div class="row">
  <div class="col-md-10">
    <?= btn_tambah() ?>
    <?= btn_laporan('tabel_b8') ?>
  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>




<div id="card-view" class="row data-view active">
  <?php foreach ($tbl_b8 as $tl_b8):
    echo card_file($tl_b8->$tabel_b8_field1, $tl_b8->$tabel_b8_field2, $tl_b8->$tabel_b8_field5, $tabel_b8, $tl_b8->$tabel_b8_field3, 'bg-danger');
  endforeach; ?>
</div>


<div id="table-view" class="table-responsive data-view" style="display: none;">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_b8_field1_alias') ?></th>
        <th><?= lang('tabel_b8_field2_alias') ?></th>
        <th><?= lang('tabel_b8_field3_alias') ?></th>
        <th><?= lang('tabel_b8_field4_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_b8 as $tl_b8): ?>
        <tr>
          <td></td>
          <td><?= $tl_b8->$tabel_b8_field1; ?></td>
          <td><?= $tl_b8->$tabel_b8_field2 ?></td>
          <td><?= $tl_b8->$tabel_b8_field3 ?></td>
          <td>
            <h2><?= $tl_b8->$tabel_b8_field4 ?></h2>
          </td>
          <td>
            <?= btn_lihat($tl_b8->$tabel_b8_field1) ?>
            <?= btn_edit($tl_b8->$tabel_b8_field1) ?>
            <?= btn_hapus('tabel_b8', $tl_b8->$tabel_b8_field1) ?>
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
      <?= modal_header(lang('add') . lang('tabel_b8_alias'), '') ?>

      <form action="<?= site_url($language . '/' . $tabel_b8 . '/tambah') ?>" enctype="multipart/form-data"
        method="post">
        <div class="modal-body">
          <?= input_add('text', 'tabel_b8_field2', 'required') ?>
          <?= input_add('text', 'tabel_b8_field3', 'required') ?>
          <?= input_add('text', 'tabel_b8_field4', 'required') ?>
        </div>

        <!-- memunculkan notifikasi modal -->
        <p class="small text-center text-danger"><?= get_flashdata('pesan_tambah') ?></p>

        <div class="modal-footer">
          <?= btn_simpan() ?>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- modal ubah-->
<?php foreach ($tbl_b8 as $tl_b8): ?>
  <div id="ubah<?= $tl_b8->$tabel_b8_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('update_data') . ' ' . lang('tabel_b8_alias'), $tl_b8->$tabel_b8_field1) ?>

        <form action="<?= site_url($language . '/' . $tabel_b8 . '/update') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">
            <?= input_hidden('tabel_b8_field1', $tl_b8->$tabel_b8_field1, 'required') ?>
            <?= input_edit('text', 'tabel_b8', 'tabel_b8_field2', $tl_b8->$tabel_b8_field2) ?>
            <?= input_edit('text', 'tabel_b8', 'tabel_b8_field3', $tl_b8->$tabel_b8_field3) ?>
            <?= input_textarea('tabel_b8_field4', htmlspecialchars($tl_b8->$tabel_b8_field4), 'required') ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_ubah') ?></p>

          <div class="modal-footer">
            <?= btn_update() ?>
          </div>
        </form>
      </div>
    </div>
  </div>



  <div id="lihat<?= $tl_b8->$tabel_b8_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header(lang('tabel_b8_alias'), $tl_b8->$tabel_b8_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">

            <?= tampil_text('tabel_b8_field1', $tl_b8->$tabel_b8_field1) ?>
            <?= tampil_text('tabel_b8_field2', $tl_b8->$tabel_b8_field2) ?>
            <?= tampil_text('tabel_b8_field3', $tl_b8->$tabel_b8_field3) ?>
            <?= tampil_icon('tabel_b8_field4', $tl_b8->$tabel_b8_field4) ?>


          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger"><?= get_flashdata('pesan_lihat') ?></p>

          <div class="modal-footer">
            <?= btn_tutup() ?>
          </div>
        </form>

      </div>
    </div>
  </div>
<?php endforeach; ?>