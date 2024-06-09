<!-- mengarahkan ke no_level jika user tidak memiliki level -->
<?php switch (userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value2:
  case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
    break;

  default:
    redirect(site_url($language . '/' . 'welcome/no_level'));
    break;
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
  <!-- menampilkan data untuk administrator -->

  <?php switch (userdata($tabel_c2_field6)) {
    case $tabel_c2_field6_value3: ?>
      <?= card_count(lang('tabel_c2_alias'), 'tabel_c2', 'bg-danger', $tbl_c2) ?>
      <?= card_count(lang('tabel_c1_alias'), 'tabel_c1', 'bg-danger', $tbl_c1) ?>
      <?= card_count(lang('tabel_d3_alias'), 'tabel_d3', 'bg-danger', $tbl_d3) ?>

      <?php break;

    default: ?>


  <?php } ?>
</div>

<br>
<hr>


<div class="row">

  <!-- menampilkan data untuk administrator -->

  <?php switch (userdata($tabel_c2_field6)) {
    case $tabel_c2_field6_value3: ?>
      <?= card_count(lang('tabel_e4_alias'), 'tabel_e4', 'bg-danger', $tbl_e4) ?>
      <?= card_count(lang('tabel_e3_alias'), 'tabel_e3', 'bg-danger', $tbl_e3) ?>
      <?= card_count(lang('tabel_e2_alias'), 'tabel_e2', 'bg-danger', $tbl_e2) ?>
      <?= card_count(lang('tabel_e1_alias'), 'tabel_e1', 'bg-danger', $tbl_e1) ?>
      <?php break;

    case $tabel_c2_field6_value4: ?>
      <?= card_count(lang('tabel_e3_alias'), 'tabel_e3', 'bg-danger', $tbl_e3) ?>
      <?= card_count(lang('tabel_f2_alias'), 'tabel_f2', 'bg-danger', $tbl_f2) ?>
      <?php break;

    case $tabel_c2_field6_value2: ?>
      <?= card_count(lang('tabel_f3_alias'), 'tabel_f3', 'bg-danger', $tbl_f3) ?>
      <?php break;


    default: ?>


  <?php } ?>
</div>

<!-- The charts shown will be different for each user level -->
<h2 class="mt-4"><?= lang('statistics') ?></h2>
<hr>
<?php switch (userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value2:
  case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
    ?>
    <div class="row mt-4">
      <div class="col-md-6 px-2 px-sm-3 dashboard-stat-box">
        <canvas id="myChart_1_2" width="200" height="125"></canvas>
      </div>
    </div>
    <?php break;

  default:
    break;
}
?>



<h2 class="mt-4">Detail Website</h2>
<hr>

<?php foreach ($tbl_a1 as $tl_a1): ?>
  <div class="row">
    <div class="col-md-6">

      <div class="table-responsive">
        <table class="table table-light" id="data">
          <thead></thead>
          <tbody>
            <?= row_data('tabel_a1_field2', $tl_a1->$tabel_a1_field2) ?>
            <?= row_data('tabel_a1_field3', $tl_a1->$tabel_a1_field3) ?>
            <?= row_data('tabel_a1_field4', $tl_a1->$tabel_a1_field4) ?>
            <?= row_data('tabel_a1_field5', $tl_a1->$tabel_a1_field5) ?>
            
            <?php foreach ($sosmed as $sm):
              if ($sm->$tabel_b6_field2 == $tl_a1->$tabel_a1_field1) { ?>
                <?= row_data('tabel_a1_field5', $tl_a1->$tabel_a1_field5) ?>
                <tr>
                  <td class="table-secondary table-active"><?= $sm->$tabel_b6_field3 ?></td>
                  <td class="table-light"><a class="text-decoration-none text-primary" href="<?= $sm->$tabel_b6_field4 ?>"
                      target="_blank">
                      Visit</a>
                </tr>
              <?php }endforeach; ?>

          </tbody>
          <tfoot></tfoot>
        </table>
      </div>

    </div>

    <div class="col-md-6">
      <img class="img-thumbnail rounded" src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>">
    </div>
  </div>
<?php endforeach; ?>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?= chart('tabel_f1', 'tabel_f2') ?>


<script>
  function adjustColumns() {
    // Get the current width of the viewport
    const screenWidth = window.innerWidth;

    // Define the breakpoint for switching column sizes
    const breakpoint = 1024; // You can adjust this value based on your needs

    // Select all elements with the class "col-md-3"
    const colMd3Elements = document.querySelectorAll(".col-md-3");

    // Loop through each element
    colMd3Elements.forEach(element => {
      if (screenWidth >= breakpoint) {
        // If screen size is greater than or equal to breakpoint, set class to col-md-4
        element.classList.add("col-md-3");
        element.classList.remove("col-md-4");
      } else {
        // If screen size is less than breakpoint, set class to col-md-3
        element.classList.remove("col-md-3");
        element.classList.add("col-md-4");
      }
    });
  }

  // Call the adjustColumns function on window resize
  window.addEventListener("resize", adjustColumns);

  // Call the adjustColumns function on page load to handle initial layout
  adjustColumns();
</script>