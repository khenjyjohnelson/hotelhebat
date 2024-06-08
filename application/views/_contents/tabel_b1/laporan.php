<?php 
if (!in_array(userdata($tabel_c2_field6), [$tabel_c2_field6_value3, $tabel_c2_field6_value4])) {
    redirect(site_url($language . '/no_level'));
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?= base_url('assets/') ?>">
    <?php load_view($head) ?>
</head>
<body>
    <div class="container" style="border-style: dashed;">
        <?php foreach ($tbl_a1 as $tl_a1): ?>
            <h1 class="text-center"><?= htmlspecialchars($title) ?><?= $phase ?></h1>
            <p class="text-center"><?= htmlspecialchars($tl_a1->$tabel_a1_field2) ?> | <?= htmlspecialchars($tl_a1->$tabel_a1_field5) ?> | <?= htmlspecialchars($tl_a1->$tabel_a1_field4) ?></p>
            <p class="text-center"><?= htmlspecialchars($tl_a1->$tabel_a1_field3) ?></p>
        <?php endforeach; ?>

        <table class="table">
            <thead>
                <tr>
                    <th><?= lang('tabel_b1_field1_alias') ?></th>
                    <th><?= lang('tabel_b1_field2_alias') ?></th>
                    <th><?= lang('tabel_b1_field3_alias') ?></th>
                    <th><?= lang('tabel_b1_field4_alias') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tbl_b1 as $tl_b1): ?>
                    <tr>
                        <td><?= htmlspecialchars($tl_b1->$tabel_b1_field1) ?></td>
                        <td><?= htmlspecialchars($tl_b1->$tabel_b1_field2) ?></td>
                        <td><?= htmlspecialchars($tl_b1->$tabel_b1_field3) ?></td>
                        <td><img src="img/<?= htmlspecialchars($tabel_b1) ?>/<?= htmlspecialchars($tl_b1->$tabel_b1_field4) ?>" width="100"></td>
                    </tr>
                <?php endforeach; ?>
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
