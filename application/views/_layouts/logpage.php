<base href="<?= base_url('assets/') ?>">
<!DOCTYPE html>
<html lang="en">

<?php load_view($head) ?>

<body>
    <?php foreach ($tbl_a1 as $tl_a1): ?>
        <div id="background-image">
            <img src="img/<?= $tabel_b7 ?>/<?= $tl_a1->$tabel_b7_field5 ?>">
        </div>
    <?php endforeach ?>

    <div class="container pb-5">

        <!-- membuat konten berada tepat di tengah2 halaman  -->
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-lg-5 login">

                <!-- link kembali -->
                <?= back_to_home() ?>
                <h1 class="text-center"><?= $title ?><?= $phase ?></h1>

                <?= load_view($konten) ?>
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

    <script>
        var myInput = document.getElementById("psw");
        var letter = document.getElementById("letter");
        var capital = document.getElementById("capital");
        var number = document.getElementById("number");
        var length = document.getElementById("length");

        // When the user clicks on the password field, show the message box
        myInput.onfocus = function () {
            document.getElementById("message").style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        myInput.onblur = function () {
            document.getElementById("message").style.display = "none";
        }

        // When the user starts to type something inside the password field
        myInput.onkeyup = function () {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Validate length
            if (myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }
    </script>

    <script src="jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="fontawesome/js/all.js"></script>
</body>

</html>