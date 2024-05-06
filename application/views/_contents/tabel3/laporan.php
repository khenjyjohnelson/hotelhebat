<?php switch ($this->session->userdata($tabel9_field6)) {
  case $tabel9_field6_value3:
    // case $tabel9_field6_value4:
    break;

  default:
    redirect(site_url() . 'welcome/no_level');
}
?>

<!-- halaman print -->

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
          <th><?= $tabel3_field1_alias ?></th>
          <th><?= $tabel3_field2_alias ?></th>
          <th><?= $tabel3_field3_alias ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tbl3 as $tl3) : ?>
          <tr>
            <td width=""><?= $tl3->$tabel3_field1; ?></td>
            <td width=""><?= $tl3->$tabel3_field2 ?></td>
            <td width=""><?= $tl3->$tabel3_field3 ?></td>
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