<?php switch (userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
    // case $tabel_c2_field6_value4:
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
    <?= btn_laporan('tabel_e1') ?>
  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>




<div id="card-view" class="row data-view active">
  <?php foreach ($tbl_e1 as $tl_e1):
    echo card_file($tl_e1->$tabel_e1_field1, $tl_e1->$tabel_e1_field2, $tl_e1->$tabel_e1_field3, $tabel_e1, $tl_e1->$tabel_e1_field4, 'bg-danger');
  endforeach; ?>
</div>


<div id="table-view" class="table-responsive data-view" style="display: none;">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_e1_field1_alias') ?></th>
        <th><?= lang('tabel_e1_field2_alias') ?></th>
        <th><?= lang('tabel_e1_field3_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_e1 as $tl_e1): ?>
        <tr>
          <td></td>
          <td><?= $tl_e1->$tabel_e1_field1; ?></td>
          <td><?= $tl_e1->$tabel_e1_field2 ?></td>
          <td><?= $tl_e1->$tabel_e1_field3 ?></td>
          <td>
            <?= btn_lihat($tl_e1->$tabel_e1_field1) ?>
            <?= btn_edit($tl_e1->$tabel_e1_field1) ?>
        </tr>
      <?php endforeach; ?>
    </tbody>

  </table>
</div>

<!-- modal tambah -->
<div id="tambah" class="modal fade tambah">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= modal_header(lang('add') . ' ' . lang('tabel_e1_alias'), '') ?>

      <form action="<?= site_url($language . '/' . $tabel_e1 . '/tambah') ?>" method="post">
        <div class="modal-body">
          <?= input_add('text', 'tabel_e1_field2', 'required') ?>
          <?= input_add('text', 'tabel_e1_field3', 'required') ?>
          <?= input_add('text', 'tabel_e1_field4', 'required') ?>
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

<!-- modal edit -->
<?php foreach ($tbl_e1 as $tl_e1): ?>
  <div id="ubah<?= $tl_e1->$tabel_e1_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('update_data') . ' ' . lang('tabel_e1_alias'), $tl_e1->$tabel_e1_field1) ?>
        <!-- administrator tidak dapat mengubah password akun lain -->
        <form action="<?= site_url($language . '/' . $tabel_e1 . '/update') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">
            <?= input_hidden('tabel_e1_field1', $tl_e1->$tabel_e1_field1, 'required') ?>
            <?= input_edit('text', 'tabel_e1_field2', $tl_e1->$tabel_e1_field2, 'required') ?>
            <?= input_edit('text', 'tabel_e1_field3', $tl_e1->$tabel_e1_field3, 'required') ?>
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




  <div id="lihat<?= $tl_e1->$tabel_e1_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header(lang('tabel_e1_alias'), $tl_e1->$tabel_e1_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <?= tampil_text('tabel_e1_field1', $tl_e1->$tabel_e1_field1) ?>
            <?= tampil_text('tabel_e1_field2', $tl_e1->$tabel_e1_field2) ?>
            <?= tampil_text('tabel_e1_field3', $tl_e1->$tabel_e1_field3) ?>
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