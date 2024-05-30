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

          <?= input_add('email', 'tabel_c2_field3', 'required') ?>
          <?= input_add('password', 'tabel_c2_field4', 'required') ?>

          <!-- <p class="text-center"><a class="text-decoration-none" href="<?= site_url($language . '/' . $tabel_c1 . '/login') ?>">Login sebagai <?= $tabel_c1_alias ?></a></p> -->

          <!-- pesan untuk pengguna yang login -->
          <p class="small text-center text-danger"><?= get_flashdata('flash1') ?></p>

          <div class="form-group">
            <div class="d-flex justify-content-center mb-4">
              <button class="btn btn-primary login" type="submit">
                <?= lang('login') ?>
              </button>
            </div>

            <div class="text-center">
              <span><?= lang('dont_have_account') ?></span>
              <a class="text-primary text-decoration-none login" type="button"
                href="<?= site_url($language . '/' . $tabel_c2 . '/signup') ?>">
                <?= lang('create_account') ?>
              </a>
            </div>
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

    /* Media query for screens smaller than 768px (typical mobile screens) */
    @media (max-width: 767px) {

      /* Style to make the button width 100% */
      .btn.login {
        width: 100%;
      }
    }
  </style>

  <script src="js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <script src="fontawesome/js/all.js"></script>
</body>

</html>