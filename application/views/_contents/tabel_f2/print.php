<?php switch (userdata($tabel_c2_field6)) {
  case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value4:
  case $tabel_c2_field6_value5:
    break;

  default:
    redirect(site_url($language . '/' . 'no_level'));
}
?>

<!-- menampilkan data pesanan sebagai ps -->
<?php foreach ($tbl_f2 as $tl_f2): ?>
  <!-- menampilkan data pemesan -->
  <table class="table">
    <thead class="thead-">
      <tr>
        <th><?= lang('tabel_f2_field1_alias') ?></th>
        <th><?= lang('tabel_f2_field2_alias') ?></th>
        <th><?= lang('tabel_f2_field3_alias') ?></th>
        <th><?= lang('tabel_f2_field4_alias') ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width=""><?= $tl_f2->$tabel_f2_field1 ?></td>
        <td width=""><?= $tl_f2->$tabel_f2_field2 ?></td>
        <td width=""><?= $tl_f2->$tabel_f2_field3 ?></td>
        <td width=""><?= $tl_f2->$tabel_f2_field4 ?></td>
        </td>
      </tr>
    </tbody>
  </table>

  <!-- menampilkan data tamu -->
  <table class="table">
    <thead class="thead">
      <tr>
        <th><?= lang('tabel_f2_field5_alias') ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td width=""><?= $tl_f2->$tabel_f2_field5 ?></td>
      </tr>
    </tbody>
  </table>
<?php endforeach ?>
<p class="text-center"><?= lang('tabel_c2_field6_value4_alias_v5_msg') ?></p>