<?php switch ($this->session->userdata($tabel9_field6)) {
  case $tabel9_field6_value3:
    // case $tabel9_field6_value4:
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
}
?>

<!-- halaman print untuk pesanan -->

<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body>

  <!-- border garis putus-putus -->
  <div class="container" style="border-style: dashed;">
    <?php foreach ($tbl7 as $tl7) : ?>
      <h1 class="text-center"><?= $title ?><?= $phase ?></h1>
      <p class="text-center"><?= $tl7->$tabel7_field2; ?> | <?= $tl7->$tabel7_field5; ?> | <?= $tl7->$tabel7_field4; ?></p>
      <p class="text-center"><?= $tl7->$tabel7_field3; ?></p>
    <?php endforeach; ?>

    <!-- menampilkan data pesanan sebagai ps -->

    <!-- menampilkan data pemesan -->
    <table class="table">
      <thead class="thead">
        <tr>
          <th><?= $tabel25_field1_alias ?></th>
          <th><?= $tabel25_field2_alias ?></th>
          <th><?= $tabel25_field3_alias ?></th>
          <th><?= $tabel25_field4_alias ?></th>
          <th><?= $tabel25_field5_alias ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tbl25 as $tl25) : ?>
          <tr>
            <td width=""><?= $tl25->$tabel25_field1; ?></td>
            <td width=""><?= $tl25->$tabel25_field2 ?></td>
            <td width=""><img src="img/tabel25/<?= $tl25->$tabel25_field3 ?>" height="100"></td>
            <td width=""><img src="img/tabel25/<?= $tl25->$tabel25_field4 ?>" height="100"></td>
            <td width=""><img src="img/tabel25/<?= $tl25->$tabel25_field5 ?>" height="100"></td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>

  </div>

  <script src="jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.js"></script>

  <script>
    window.print();
  </script>
</body>

</html>