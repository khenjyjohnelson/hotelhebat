<head>
  <!-- Google Tag Manager -->
  <script>(function (w, d, s, l, i) {
      w[l] = w[l] || []; w[l].push({
        'gtm.start':
          new Date().getTime(), event: 'gtm.js'
      }); var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
          'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-MX34Q9MK');</script>
  <!-- End Google Tag Manager -->

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="author" content="Khenjy Johnelson">
  
  <!-- menampilkan data pengaturan sebagai p -->
  <?php foreach ($tbl_a1 as $tl_a1): ?>
    <meta name="description" content="<?= $tl_a1->$tabel_b7_field6 ?>">
    
    <title><?= $title ?> - <?= $tl_a1->$tabel_a1_field2 ?>   <?= userdata($tabel_c2_field6) ?></title>
    
    <!-- menampilkan favicon -->
    <link rel="icon" href="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field3 ?>" type="image/jpg">

  <?php endforeach; ?>

  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <script src="ckeditor/ckeditor.js"></script>
  
  <!-- css untuk datatables bertema bootstrap -->
  <link rel="stylesheet" href="datatables/datatables/css/dataTables.bootstrap4.min.css">
  
  <!-- Add Intro.js CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/3.4.0/introjs.min.css">
  
  <!-- css pribadi -->
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/floating-labels.css">
</head>