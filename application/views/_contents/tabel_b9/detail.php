<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value2:
  case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
  case $tabel_c2_field6_value5:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>



<div class="row mb-2 align-items-center">
  <div class="col-md-6 d-flex align-items-center">
    <h1><?= $title ?><?= $phase ?></h1>
  </div>
  <div class="col-md-6 text-right">
    <?php foreach ($dekor as $dk): ?>
      <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200" alt="Image">
    <?php endforeach ?>
  </div>
</div>
<hr>

<?php foreach ($dekor as $dk): ?>
  <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" width="200">
<?php endforeach ?>

<?php foreach ($tbl_b9 as $tl_b9): ?>
  <div class="table-responsive">
    <table class="table table-light" id="data">
      <thead></thead>
      <tbody>
        <tr>
          <td class="table-secondary table-active"><?= $tabel_b9_field4_alias ?></td>
          <td class="table-light"><?= $tl_b9->$tabel_b9_field4 ?></td>
        </tr>

        <tr>
          <td class="table-secondary table-active"><?= $tabel_b9_field5_alias ?></td>
          <td class="table-light"><?= datetime_elapsed_string($tl_b9->$tabel_b9_field5) ?></td>
        </tr>
      </tbody>
      <tfoot></tfoot>
    </table>
    </div>
    
  <?php endforeach ?>