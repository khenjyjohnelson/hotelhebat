<div class="row mb-2 align-items-center">
  <div class="col-md-9 d-flex align-items-center">
    <h1><?= $title ?><br><span class="h6"> Unread: <?= $notif_count ?></span><?= $phase ?></h1>
  </div>
  <div class="col-md-3 text-right">
    <?php foreach ($dekor->result() as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200" alt="Image">
    <?php endforeach ?>
  </div>
</div>
<hr>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th><?= lang('no') ?></th>
        <th><?= lang('tabel_b8_field3_alias') ?></th>
        <th><?= lang('tabel_b9_field4_alias') ?></th>
        <th><?= lang('tabel_b9_field5_alias') ?></th>
        <th><?= lang('action') ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl_b9->result() as $tl_b9):
        if ($tl_b9->$tabel_b9_field6 == NULL) { ?>
          <tr class="bg-light">
            <td></td>
            <td><?= $tl_b9->$tabel_b8_field3 ?></td>
            <td><?= $tl_b9->$tabel_b9_field4 ?></td>
            <td><?= $tl_b9->$tabel_b9_field5 ?></td>
            <td>
              <a class="btn btn-light text-warning"
                href="<?= site_url($language . '/' . $tabel_b9 . '/lihat/' . $tl_b9->$tabel_b9_field1) ?>">
                <i class="fas fa-envelope-open"></i></a>
              <?= btn_lihat($tl_b9->$tabel_b9_field1) ?>
            </td>
          <?php } else { ?>
          <tr>
            <td></td>
            <td><?= $tl_b9->$tabel_b8_field3 ?></td>
            <td><?= $tl_b9->$tabel_b9_field4 ?></td>
            <td><?= $tl_b9->$tabel_b9_field5 ?></td>
            <td>
              <?= btn_lihat($tl_b9->$tabel_b9_field1) ?>
            </td>
          <?php }endforeach; ?>
    </tbody>


  </table>
</div>


<!-- modal lihat -->
<?php foreach ($tbl_b9->result() as $tl_b9): ?>
  <div id="lihat<?= $tl_b9->$tabel_b9_field1; ?>" class="modal fade lihat" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <?= modal_header(lang('tabel_b9_alias'), $tl_b9->$tabel_b9_field1) ?>

        <!-- administrator tidak bisa melihat password user lain -->
        <form>
          <div class="modal-body">
            <?= table_data(
              row_data('tabel_b8_field3', $tl_b9->$tabel_b8_field3) .
              row_data('tabel_b9_field4', html_entity_decode($tl_b9->$tabel_b9_field4)) .
              row_data('tabel_b9_field5', $tl_b9->$tabel_b9_field5) .
              row_data('tabel_b9_field6', $tl_b9->$tabel_b9_field6),
              'table-light',
            ) ?>
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