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
    <h1><?= xss_clean($title) ?><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor as $dk): ?>
      <img src="img/<?= xss_clean($tabel_b1) ?>/<?= xss_clean($dk->$tabel_b1_field4) ?>" width="200" alt="Image">
    <?php endforeach ?>
  </div>
</div>
<hr>

<div class="row">
  <div class="col-md-10">
    <?= btn_tambah() ?>
    <?= btn_laporan('tabel_b7') ?>
  </div>

  <div class="col-md-2 d-flex justify-content-end">
    <?= view_switcher() ?>
  </div>
</div>




<div id="card-view" class="row data-view active">
  <?php foreach ($tbl_b7 as $tl_b7):
    echo card_file(
      $tl_b7->$tabel_b7_field1,
      $tl_b7->$tabel_b7_field2,
      btn_field($tabel_b7_field3 . $tl_b7->$tabel_b7_field1, '<i class="fas fa-globe"></i>') . ' ' .
      btn_field($tabel_b7_field4 . $tl_b7->$tabel_b7_field1, '<i class="fas fa-rocket"></i>') . ' ' .
      btn_field($tabel_b7_field5 . $tl_b7->$tabel_b7_field1, '<i class="fas fa-image"></i>'),
      btn_lihat($tl_b7->$tabel_b7_field1) . ' ' . 
      btn_edit($tl_b7->$tabel_b7_field1) . ' ' .
      ($tl_b7->$tabel_b7_field2 != $database ?
        '<a class="btn mr-1 mb-2 btn-light text-danger"
          onclick="return confirm(\'Tindakan anda akan menghapus hal-hal berikut:\n' . $tabel_b7_alias . '\n' . $tabel_b1_alias . '\n' . $tabel_b2_alias . '\n' . $tabel_b5_alias . '\n' . $tabel_b6_alias . '\nHapus data?\')"
          href="' . site_url($language . '/' . $tabel_b7 . '/delete/' . $tl_b7->$tabel_b7_field1) . '">
          <i class="fas fa-trash"></i></a>' : ''
      ),
      $tabel_b7,
      $tl_b7->$tabel_b7_field3,
      'bg-danger'
    );
  endforeach; ?>
</div>


<div id="table-view" class="table-responsive data-view" style="display: none;">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_b7_field1_alias') ?></th>
        <th><?= lang('tabel_b7_field2_alias') ?></th>
        <th><?= lang('tabel_b7_field3_alias') ?></th>
        <th><?= lang('tabel_b7_field4_alias') ?></th>
        <th><?= lang('tabel_b7_field5_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_b7 as $tl_b7): ?>
        <tr>
          <td></td>
          <td><?= xss_clean($tl_b7->$tabel_b7_field1); ?></td>
          <td><?= xss_clean($tl_b7->$tabel_b7_field2) ?></td>
          <td width="10%"><img src="img/<?= xss_clean($tabel_b7) ?>/<?= xss_clean($tl_b7->$tabel_b7_field3) ?>"
              width="50">
            <?= btn_field($tabel_b7_field3 . $tl_b7->$tabel_b7_field1, '<i class="fas fa-globe"></i>') ?>
          </td>
          <td width="10%"><img src="img/<?= xss_clean($tabel_b7) ?>/<?= xss_clean($tl_b7->$tabel_b7_field4) ?>"
              width="50">
            <?= btn_field($tabel_b7_field4 . $tl_b7->$tabel_b7_field1, '<i class="fas fa-rocket"></i>') ?>
          </td>
          <td width="10%"><img src="img/<?= xss_clean($tabel_b7) ?>/<?= xss_clean($tl_b7->$tabel_b7_field5) ?>"
              width="100">
            <?= btn_field($tabel_b7_field5 . $tl_b7->$tabel_b7_field1, '<i class="fas fa-image"></i>') ?>
          </td>
          <td width="20%">
            <?= btn_lihat($tl_b7->$tabel_b7_field1) ?>
            <?= btn_edit($tl_b7->$tabel_b7_field1) ?>

            <?php if ($tl_b7->$tabel_b7_field2 != $database) { ?>
              <a class="btn btn-light text-danger"
                onclick="return confirm('Tindakan anda akan menghapus hal-hal berikut:\n<?= xss_clean($tabel_b7_alias) ?>\n<?= xss_clean($tabel_b1_alias) ?>\n<?= xss_clean($tabel_b2_alias) ?>\n<?= xss_clean($tabel_b5_alias) ?>\n<?= xss_clean($tabel_b6_alias) ?>\nHapus data?')"
                href="<?= site_url($language . '/' . $tabel_b7 . '/delete/' . $tl_b7->$tabel_b7_field1) ?>">
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
      <?= modal_header_add(lang('add') . ' ' . lang('tabel_b7_alias'), '') ?>

      <form action="<?= site_url($language . '/' . $tabel_b7 . '/tambah') ?>" enctype="multipart/form-data"
        method="post">
        <div class="modal-body">
          <?= input_add('text', 'tabel_b7_field2', 'required') ?>
          <?= input_textarea('tabel_b7_field6', '', 'required') ?>
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
<?php foreach ($tbl_b7 as $tl_b7): ?>
  <div id="ubah<?= $tl_b7->$tabel_b7_field1; ?>" class="modal fade ubah">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('change_data') . ' ' . lang('tabel_b7_alias'), $tl_b7->$tabel_b7_field1) ?>
        <form action="<?= site_url($language . '/' . $tabel_b7 . '/update') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <?= input_hidden('tabel_b7_field1', $tl_b7->$tabel_b7_field1, 'required') ?>
            <?= input_edit('text', 'tabel_b7_field2', $tl_b7->$tabel_b7_field2, 'required') ?>
            <?= input_textarea('tabel_b7_field6', $tl_b7->$tabel_b7_field6, 'required') ?>

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


  <div id="<?= $tabel_b7_field3 . $tl_b7->$tabel_b7_field1; ?>" class="modal fade <?= $tabel_b7_field3 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('change_data') . lang('tabel_b7_field3_alias'), $tl_b7->$tabel_b7_field1) ?>

        <form action="<?= site_url($language . '/' . $tabel_b7 . '/update_favicon') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <?= input_hidden('tabel_b7_field1', $tl_b7->$tabel_b7_field1, 'required') ?>
            <?= input_hidden('tabel_b7_field2', $tl_b7->$tabel_b7_field2, 'required') ?>
            <?= edit_file('tabel_b7', 'tabel_b7_field3', $tl_b7->$tabel_b7_field3, 'required') ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= get_flashdata('pesan_' . $tabel_b7_field3) ?>
          </p>

          <div class="modal-footer">
            <?= btn_update_field('tabel_b7_field3') ?>
          </div>
        </form>
      </div>
    </div>
  </div>



  <div id="<?= $tabel_b7_field4 . $tl_b7->$tabel_b7_field1; ?>" class="modal fade <?= $tabel_b7_field4 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('change_data') . ' ' . lang('tabel_b7_field4_alias'), $tl_b7->$tabel_b7_field1) ?>

        <form action="<?= site_url($language . '/' . $tabel_b7 . '/update_logo') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <?= input_hidden('tabel_b7_field1', $tl_b7->$tabel_b7_field1, 'required') ?>
            <?= input_hidden('tabel_b7_field2', $tl_b7->$tabel_b7_field2, 'required') ?>
            <?= edit_file('tabel_b7', 'tabel_b7_field4', $tl_b7->$tabel_b7_field4, 'required') ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= get_flashdata('pesan_' . $tabel_b7_field4) ?>
          </p>

          <div class="modal-footer">
            <?= btn_update_field('tabel_b7_field4') ?>
          </div>
        </form>
      </div>
    </div>
  </div>



  <div id="<?= $tabel_b7_field5 . $tl_b7->$tabel_b7_field1; ?>" class="modal fade <?= $tabel_b7_field5 ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <?= modal_header(lang('change_data') . ' ' . lang('tabel_b7_field5_alias'), $tl_b7->$tabel_b7_field1) ?>

        <form action="<?= site_url($language . '/' . $tabel_b7 . '/update_foto') ?>" method="post"
          enctype="multipart/form-data">
          <div class="modal-body">

            <?= input_hidden('tabel_b7_field1', $tl_b7->$tabel_b7_field1, 'required') ?>
            <?= input_hidden('tabel_b7_field2', $tl_b7->$tabel_b7_field2, 'required') ?>
            <?= edit_file('tabel_b7', 'tabel_b7_field5', $tl_b7->$tabel_b7_field5, 'required') ?>
          </div>

          <!-- memunculkan notifikasi modal -->
          <p class="small text-center text-danger">
            <?= get_flashdata('pesan_' . $tabel_b7_field5) ?>
          </p>

          <div class="modal-footer">
            <?= btn_update_field('tabel_b7_field5') ?>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div id="lihat<?= $tl_b7->$tabel_b7_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header(lang('tabel_b7_alias'), $tl_b7->$tabel_b7_field1) ?>
        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <div class="table-responsive">
              <table class="table table-light" id="data">
                <thead></thead>
                <tbody>
                  <?= row_data('tabel_b7_field2', $tl_b7->$tabel_b7_field2) ?>
                  <?= row_data('tabel_b7_field6', html_entity_decode($tl_b7->$tabel_b7_field6)) ?>
                </tbody>
                <tfoot></tfoot>
              </table>
            </div>
            </tbody>
            <tfoot></tfoot>
            </table>
          </div>
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