<?php switch (userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
    // case $tabel_c2_field6_value4:
    break;

  default:
    redirect(site_url($language . '/' . 'no_level'));
}
?>

<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_d3_field1_alias') ?></th>
      <th><?= lang('tabel_d3_field2_alias') ?></th>
      <th><?= lang('tabel_d3_field3_alias') ?></th>
      <th><?= lang('tabel_d3_field4_alias') ?></th>
      <th><?= lang('tabel_d3_field5_alias') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_d3 as $tl_d3): ?>
      <tr>
        <td width=""><?= $tl_d3->$tabel_d3_field1 ?></td>
        <td width=""><?= $tl_d3->$tabel_d3_field2 ?></td>
        <td width=""><?= $tl_d3->$tabel_d3_field3 ?></td>
        <td width=""><?= $tl_d3->$tabel_d3_field4 ?></td>
        <td width=""><?= $tl_d3->$tabel_d3_field5 ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>