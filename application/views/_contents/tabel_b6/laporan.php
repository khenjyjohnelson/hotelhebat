<?php switch (userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
    // case $tabel_c2_field6_value4:
    break;

  default:
    redirect(site_url($language . '/no_level'));
    break;
}
?>

<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_b6_field1_alias') ?></th>
      <th><?= lang('tabel_b6_field2_alias') ?></th>
      <th><?= lang('tabel_b6_field3_alias') ?></th>
      <th><?= lang('tabel_b6_field4_alias') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_b6 as $tl_b6): ?>
      <tr>
        <td width=""><?= $tl_b6->$tabel_b6_field1; ?></td>
        <td width=""><?= $tl_b6->$tabel_b6_field2 ?></td>
        <td width=""><?= $tl_b6->$tabel_b6_field3 ?></td>
        <td width=""><?= $tl_b6->$tabel_b6_field4 ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>