<table class="table">
  <thead class="thead">
    <tr>
      <th><?= lang('tabel_e3_field1_alias') ?></th>
      <th><?= lang('tabel_e3_field2_alias') ?></th>
      <th><?= lang('tabel_e3_field3_alias') ?></th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($tbl_e3 as $tl_e3): ?>
      <tr>
        <td width=""><?= $tl_e3->$tabel_e3_field1; ?></td>
        <td width=""><?= $tl_e3->$tabel_e3_field2 ?></td>
        <td width="30%"><?= $tl_e3->$tabel_e3_field3 ?></td>
      </tr>
    <?php endforeach ?>
  </tbody>
</table>