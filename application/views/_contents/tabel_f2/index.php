<?php switch (userdata($tabel_c2_field6)) {
  // case $tabel_c2_field6_value3:
  case $tabel_c2_field6_value5:
    break;

  default:
    redirect(site_url($language . '/' . 'no_level'));
}
?>

<?php foreach ($tbl_a1 as $tl_a1): ?>
  <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>" class="img-fluid rounded">
<?php endforeach; ?>

<form action="<?= site_url($language . '/' . $tabel_f2 . '/tambah') ?>" method="post">

  <!-- form ini berisi data yang sudah diinput sebelumnya dari halaman home -->
  <div class="row justify-content-center align-items-end mt-2">
    <div class="col-md-2">
      <?= edit_date('tabel_f2_field10', $tabel_f2_field10_value, 'required', date('Y-m-d'), '') ?>
    </div>
    
    <!-- Seperti di bawah bentuk input array ke depannya cman itu perlu dipending dulu -->
    <!-- <div class="col-md-2">
      <div class="form-group">
        <label>Tanggal Cek Out</label>
        <input class="form-control" type="date" required name="<?= $tabel_f2_field11_input ?>" value=" $cek_out ?>">
      </div>
    </div> -->
    
    <div class="col-md-2">
      <?= edit_date('tabel_f2_field11', $tabel_f2_field11_value, 'required', date('Y-m-d', strtotime("+1 day")), '') ?>
    </div>

    <div class="col-md-2">
      <?= edit_number('tabel_f2_field8', $tabel_f2_field8_value, 'required readonly', '1', '10') ?>
    </div>


    <div class="col-md-1">
      <div class="form-group">
        <a class="btn btn-primary" type="button" data-toggle="modal" data-target="#ubah">
          Ubah</a>
      </div>
    </div>


  </div>

  <h2>Pesan <?= $tabel_e3_alias ?> Anda</h2>


  <hr>

  <!-- Di bawah ini adalah fitur yang ditetapkan sebagai unfinished, yakni fitur untuk mengelola array dari jumlah pesanan yang telah dilakukan. -->
  <!-- Dengan fitur ini, tamu dapat memesan lebih dari satu kamar  -->
  <!-- dan mendapatkan pesanan yang terpisah masing-masing -->
  <!-- Sebenarnya lebih baik jika menggunakan tabel pesanan dan tabel detail pesanan -->
  <!-- Namun hal itu hanya akan mempersulit masalah yang sudah ada -->
  <!-- Fitur ini akan diselesaikan ketika sudah ada pemahaman mengenai cara kerja array -->
  <!-- 
  $i = 1;
  do { ?> -->
  <!-- <h2>Pesanan  $i ?></h2> -->
  <div class="row justify-content-start mt-4">
    <hr>


    <div class="col-md-6">

      <!-- menentukan id_user jika user sudah membuat akun atau belum -->
      <div class="form-group">
        <label><?= $tabel_f2_field3_alias ?></label>
        <input class="form-control" type="text" required name="<?= $tabel_f2_field3_input ?>"
          placeholder="Masukkan <?= $tabel_f2_field3_alias ?>"
          value="<?= userdata($tabel_c2_field2) ?>">
        <?php if (userdata($tabel_c2_field1)) { ?>
          <input type="hidden" name="<?= $tabel_c2_field1_input ?>"
            value="<?= userdata($tabel_c2_field1) ?>">
        <?php } else { ?>

          <!-- value 0 di id_user untuk pengguna tanpa akun -->
          <input type="hidden" name="<?= $tabel_c2_field1_input ?>" value="0">

        <?php } ?>
      </div>

      <!-- keterangan * di bawah -->
      <?= edit_email('tabel_f2_field4', userdata($tabel_c2_field3), 'required') ?>
      <?= edit_text('tabel_f2_field5', userdata($tabel_c2_field5), 'required') ?>
      <?= add_text('tabel_f2_field6', 'required') ?>

      <div class="form-group">
        <label><?= $tabel_e4_field2_alias ?></label>
        <select class="form-control" required name="<?= $tabel_e4_field1_input ?>">
          <option selected hidden value=""><?= lang('select') ?> <?= $tabel_e4_field2_alias ?>...</option>
          <?php foreach ($tbl_e4 as $tl_e4): ?>
            <option value="<?= $tl_e4->$tabel_e4_field1; ?>"><?= $tl_e4->$tabel_e4_field2 ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <!-- keterangan * -->
      <small>*<?= $tabel_f2_field4_alias . lang('required_to_do') . $tabel_f2_alias . lang('and') . $tabel_f3_alias ?></small>

    </div>
    <div class="col-md-6">
      <?php foreach ($dekor as $dk): ?>
        <img src="img/<?= $tabel_b1 ?>/<?= $dk->$tabel_b1_field4 ?>" class="img-fluid rounded">
      <?php endforeach ?>
    </div>

  </div>


  <hr>

  <!-- $i++;
  } while ($i <= $jlh) ?> -->



  <div class="row justify-content-start mt-4">
    <div class="col-md6">


      <div class="form-group">
        <button class="btn btn-success"
          onclick="return confirm('Apakah Anda Ingin Memesan <?= lang('tabel_e3_alias') . '?' ?>')"
          type="submit">Konfirmasi <?= $tabel_f2_alias ?></button>
        <a class="btn btn-danger" type="button" href="<?= site_url('/') ?>">Batal</a>
      </div>
    </div>
  </div>
</form>



<!-- modal edit -->
<div id="ubah" class="modal fade ubah">
  <div class="modal-dialog">
    <div class="modal-content">
      <?= modal_header(lang('update_data') . lang('tabel_f2_field8_alias'), '') ?>

      <form action="<?= site_url($language . '/' . $tabel_f2) ?>" method="get">
        <div class="modal-body">
          <?= add_number('tabel_f2_field8', 'required', '1', '10') ?>
          <?= input_hidden('tabel_f2_field10', $tabel_f2_field10_value, 'required') ?>
          <?= input_hidden('tabel_f2_field11', $tabel_f2_field11_value, 'required') ?>

        </div>

        <!-- memunculkan notifikasi modal -->
        <p class="small text-center text-danger"><?= get_flashdata('pesan_ubah') ?></p>

        <div class="modal-footer">
          <?= btn_update() ?>
        </div>
      </form>
    </div>
  </div>
</div>