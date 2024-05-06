<!-- mengarahkan ke no_level jika user tidak memiliki level -->
<?php switch ($this->session->userdata($tabel9_field6)) {
  case $tabel9_field6_value2:
  case $tabel9_field6_value3:
  case $tabel9_field6_value4:
    break;

  default:
    redirect(site_url('welcome/no_level'));
}
?>

<h1>
  <?= $title ?>
  <?= $phase ?>
</h1>
<hr>
<div class="row">
  <!-- menampilkan data untuk administrator -->

  <?php switch ($this->session->userdata($tabel9_field6)) {
    case $tabel9_field6_value3: ?>
      <div class="col-lg-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel9_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl9 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel9 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel4_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl4 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel4 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel20_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl4 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel20 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>
      <?php break;

    default: ?>


  <?php } ?>
</div>

<br>
<hr>


<div class="row">

  <!-- menampilkan data untuk administrator -->

  <?php switch ($this->session->userdata($tabel9_field6)) {
    case $tabel9_field6_value3: ?>
      <div class="col-lg-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel6_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl6 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel6 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel5_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl5 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel5 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel3_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl3 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel3 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel1_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl1 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel1 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>
      <?php break;

    case $tabel9_field6_value4: ?>
      <div class="col-lg-3 mt-2">
        <div class="card text-white bg-danger">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel5_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl5 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel5 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>

      <div class="col-lg-3 mt-2">
        <div class="card text-white bg-primary">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel8_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl8 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel8 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>
      <?php break;

    case $tabel9_field6_value2: ?>
      <div class="col-lg-3 mt-2">
        <div class="card text-white bg-success">
          <div class="card-body">
            <h5 class="card-title">
              <?= $tabel10_alias ?>
            </h5>
            <p class="card-text" style="font-size: 32;">
              <?= $tbl10 ?>
            </p>
            <a class="text-white" href="<?= site_url($tabel10 . '/admin') ?>">Detail >></a>
          </div>
        </div>
      </div>
      <?php break;


    default: ?>


  <?php } ?>
</div>

<!-- The charts shown will be different for each user level -->
<h2 class="mt-4">Statistik</h2>
<hr>
<?php switch ($this->session->userdata($tabel9_field6)) {
  case $tabel9_field6_value2:
  case $tabel9_field6_value3:
  case $tabel9_field6_value4:
    ?>
    <div class="row mt-4">
      <div class="col px-2 px-sm-3 dashboard-stat-box" style="height: 58vh">
        <canvas id="myChart_tabel8_tabel2" width="200" height="100"></canvas>
      </div>
    </div>
    <?php break;

  default:
    break;
}
?>



<h2 class="mt-4">Detail Website</h2>
<hr>

<div class="row">
  <div class="col-md-6">

    <?php foreach ($tbl7 as $tl7): ?>
      <div class="table-responsive">
        <table class="table table-light" id="data">
          <thead></thead>
          <tbody>
            <tr>
              <td class="table-secondary table-active"><?= $tabel7_field2_alias ?></td>
              <td class="table-light"><?= $tl7->$tabel7_field2 ?></td>
            </tr>

            <tr>
              <td class="table-secondary table-active"><?= $tabel7_field6_alias ?></td>
              <td class="table-light"><?= $tl7->$tabel7_field6 ?></td>
            </tr>

            <tr>
              <td class="table-secondary table-active"><?= $tabel7_field7_alias ?></td>
              <td class="table-light"><?= $tl7->$tabel7_field7 ?></td>
            </tr>

            <tr>
              <td class="table-secondary table-active"><?= $tabel7_field8_alias ?></td>
              <td class="table-light"><?= $tl7->$tabel7_field8 ?></td>
            </tr>

            <?php foreach ($tbl24 as $tl24):
              if ($tl24->$tabel24_field2 == $tl7->$tabel7_field1) { ?>
                <tr>
                  <td class="table-secondary table-active"><?= $tl24->$tabel24_field3 ?></td>
                  <td class="table-light"><a class="text-decoration-none text-primary" href="<?= $tl24->$tabel24_field4 ?>" target="_blank">
                    Visit</a>
                </tr>
              <?php }endforeach; ?>

          </tbody>
          <tfoot></tfoot>
        </table>
      </div>

    </div>

    <div class="col-md-6">
      <img class="img-thumbnail rounded" src="img/tabel7/<?= $tl7->$tabel7_field5 ?>">
    </div>
  </div>



<?php endforeach; ?>