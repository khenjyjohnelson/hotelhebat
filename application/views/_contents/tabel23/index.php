<?php foreach ($tbl7 as $tl7): ?>
  <?php foreach ($tbl23 as $tl23):
    if ($tl7->$tabel7_field13 == $tl23->$tabel23_field1) { ?>
      <img src="img/tabel23/<?= $tl23->$tabel23_field4 ?>" class="img-fluid rounded">

      <h1 class="text-center"><?= $tabel23_alias ?>       <a target="_blank" href="<?= $tl23->$tabel23_field5 ?>"><?= $tl23->$tabel23_field2 ?></a></h1>
      <hr>
      <div class="row">
        <div class="col-md">
          <!-- <p>This course is licensed under a <a target="_blank" href="<?= $tl23->$tabel23_field5 ?>"><?= $tl23->$tabel23_field2 ?></a>
            license. This is a human-readable summary of (and not a substitute for) the <a
            target="_blank" href="<?= $tl23->$tabel23_field5 ?>/legalcode">license</a>. Official
            translations of this license are available in <a
            target="_blank" href="<?= $tl23->$tabel23_field5 ?>/legalcode#languages">other languages</a>.</p> -->
          <p><?= html_entity_decode($tl23->$tabel23_field3) ?></p>
        </div>
      </div>
    <?php }endforeach ?>

<?php endforeach; ?>