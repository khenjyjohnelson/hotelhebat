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

<a class="btn btn-info mb-4" href="<?= site_url($tabel20 . '/laporan') ?>" target="_blank">
  <i class="fas fa-print"></i> Cetak Laporan</a>

<?php foreach ($dekor as $dk): ?>
  <img src="img/tabel12/<?= $dk->$tabel12_field3 ?>" width="200">
<?php endforeach ?>

<div class="table-responsive">
  <table class="table table-light" id="data">
    <thead class="thead-light">
      <tr>
        <th>No</th>
        <th><?= $tabel20_field1_alias ?></th>
        <th><?= $tabel20_field2_alias ?></th>
        <th><?= $tabel20_field3_alias ?></th>
        <th><?= $tabel20_field4_alias ?></th>
        <th><?= $tabel20_field5_alias ?></th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($tbl20 as $tl20): ?>
        <tr>
          <td></td>
          <td><?= $tl20->$tabel20_field1; ?></td>
          <td><?= $tl20->$tabel20_field2 ?></td>
          <td><?= $tl20->$tabel20_field3 ?></td>
          <td><?= $tl20->$tabel20_field4 ?></td>
          <td><?= $tl20->$tabel20_field5 ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>


  </table>
</div>