<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php $this->load->view($head) ?>

<body class="login">
  <?php foreach ($tbl_a1 as $tl_a1): ?>
    <div id="background-image">
      <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>">
    </div>
  <?php endforeach ?>

  <div class="container">
    <!-- membuat konten berada tepat di tengah2 halaman  -->
    <div class="row justify-content-center align-items-center h-100">
      <div class="col-lg-5 login">
        <!-- link kembali -->
        <?= back_to_home() ?>

        <h1 class="text-center"><?= $title ?><?= $phase ?></h1>

        <!-- form login -->
        <form action="<?= site_url($language . '/' . $tabel_c2 . '/ceklogin') ?>" method="post">

          <?= add_email('tabel_c2_field3', 'required') ?>
          <?= add_new_password('tabel_c2_field4', 'required') ?>

          <!-- <p class="text-center"><a class="text-decoration-none" href="<?= site_url($language . '/' . $tabel_c1 . '/login') ?>">Login sebagai <?= $tabel_c1_alias ?></a></p> -->

          <!-- pesan untuk pengguna yang login -->
          <p class="small text-center text-danger"><?= get_flashdata('flash1') ?></p>

          <!-- tombol login dan signup -->
          <div class="form-group d-flex justify-content-around">
            <a class="btn btn-light text-primary login" type="button" href="<?= site_url($language . '/' . $tabel_c2 . '/signup') ?>"><?= lang('create_account') ?></a>
            <button class="btn btn-primary login" type="submit"><?= lang('login') ?></button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <style>
    /* Apply styles to the background image container */
    #background-image {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: -1;
      /* Ensure the background image is behind other content */
    }

    /* Apply blur effect to the background image */
    #background-image img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      filter: blur(5px);
      /* Adjust blur intensity as needed */
      transform: scale(1.1);
    }

    /* Other styles for your form and other content */
    .container {
      position: relative;
      /* Ensure other content stays on top */
      z-index: 1;
      /* Ensure other content stays on top */
    }
  </style>

  <script src="js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.js"></script>
</body>

</html>