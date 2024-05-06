<?php foreach ($tbl7 as $tl7): ?>
    <!-- footer -->
    <div class="container-fluid bg-light border">
        <div class="container">

            <!-- menampilkan footer khusus jika level adalah tamu, admin, dan sebagainya  -->
            <?php switch ($this->session->userdata($tabel9_field6)) {
                case $tabel9_field6_value3:
                case $tabel9_field6_value4:
                case $tabel9_field6_value2:
                    ?>
                    <div class="row justify-content-center align-content-center">
                        <p class="pt-2">
                            <?= $year_code ?> |
                            <?= $tl7->$tabel7_field2 ?>
                        </p>
                    </div>
                    <?php break;

                default: ?>

                    <!-- menampilkan footer untuk umum  -->
                    <div class="row justify-content-center">
                        <div class="col-lg-4 pt-3">
                            <img src="img/tabel7/<?= $tl7->$tabel7_field4; ?>" height="50">
                            <p class="small pt-2">
                                <?php foreach ($tbl23 as $tl23):
                                    if ($tl7->$tabel7_field11 == $tl23->$tabel23_field1) { ?>


                                        <a class="text-decoration-none text-dark" href="<?= site_url($tabel23) ?>">
                                            <img src="img/tabel23/<?= $tl23->$tabel23_field4 ?>" height="25"></a><br>


                                    <?php }endforeach; ?>
                                <?= $year_code ?>
                                <?= $tl7->$tabel7_field2 ?>.
                                <?= $copyright_notices ?>
                            </p>
                        </div>

                        <div class="col-lg-3 pt-3">
                            <h3>Jelajahi</h3>
                            <ul class="list-unstyled">
                                <li>
                                    <a type="button" id="nextPage" class="text-decoration-none text-dark"
                                        href="<?= site_url($tabel6) ?>">
                                        <?= $tabel6_alias ?>
                                    </a>
                                </li>
                                <li>
                                    <a type="button" id="nextPage" class="text-decoration-none text-dark"
                                        href="<?= site_url($tabel3) ?>">
                                        <?= $tabel3_alias ?>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-3 pt-3">
                            <h3>Alamat</h3>
                            <ul class="list-unstyled">
                                <li>
                                    <?= $tl7->$tabel7_field8 ?>
                                </li>
                                <li>
                                    <?= $tl7->$tabel7_field7 ?>
                                </li>
                                <li>
                                    <?= $tl7->$tabel7_field6 ?>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-2 pt-3">
                            <h3>Ikuti</h3>
                            <ul class="list-unstyled">
                                <?php foreach ($tbl24 as $tl24):
                                    if ($tl24->$tabel24_field2 == $tl7->$tabel7_field1) { ?>
                                        <li>
                                            <a class="text-decoration-none text-primary" href="<?= $tl24->$tabel24_field4 ?>"
                                                target="_blank">
                                                <?= $tl24->$tabel24_field3 ?></a>
                                        </li>
                                    <?php }endforeach; ?>
                            </ul>
                        </div>
                    </div>
            <?php }
            ?>

        </div>
    </div>
<?php endforeach ?>