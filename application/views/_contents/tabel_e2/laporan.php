<?php switch ($this->session->userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
    // case $tabel_c2_field6_value4:
    break;

  default:
    redirect(site_url($this->language_code . '/' . 'welcome/no_level'));
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
    <?php foreach ($tbl_a1 as $tl_a1) : ?>
      <h1 class="text-center"><?= $title ?><?= $phase ?></h1>
      <p class="text-center"><?= $tl_a1->$tabel_a1_field2; ?> | <?= $tl_a1->$tabel_a1_field5; ?> | <?= $tl_a1->$tabel_a1_field4; ?></p>
      <p class="text-center"><?= $tl_a1->$tabel_a1_field3; ?></p>
    <?php endforeach; ?>

    <!-- menampilkan data pesanan sebagai ps -->

    <!-- menampilkan data pemesan -->
    <table class="table">
      <thead class="thead">
        <tr>
          <th><?= lang('tabel_e2_field1_alias') ?></th>
          <th><?= lang('tabel_e2_field2_alias') ?></th>
          <th><?= lang('tabel_e2_field3_alias') ?></th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($tbl_e2 as $tl_e2) : ?>
          <tr>
            <td width=""><?= $tl_e2->$tabel_e2_field1; ?></td>
            <td width=""><?= $tl_e2->$tabel_e2_field2 ?></td>
            <td width=""><?= $tl_e2->$tabel_e2_field3 ?></td>
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