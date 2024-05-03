<!-- javascript untuk semua halaman (sesuai kebutuhan) -->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/all.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/chart.js"></script>

<!-- javascript untuk datatables bertema bootstrap -->
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap4.min.js"></script>

<!-- TableExport.js -->
<script type="text/javascript" src="js/tableExport.min.js"></script>

<!-- Add Intro.js JavaScript -->
<script src="js/intro.min.js"></script>

<!-- fungsi datatables (wajib ada) -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#data').DataTable({
            "order": [
                [0, "desc"],
            ],
            "createdRow": function (row, data, dataIndex) {
                $(row).find('td:first').html(dataIndex + 1);
            },


        });



        // yg ini yang menggunakan toast
        <?= $this->session->flashdata('toast') ?>
        // yg di bawah ini adalah semua yg berhubungan dgn modal
        <?= $this->session->flashdata('modal') ?>


    });

    var table = $('#daterange_table').DataTable({

    })
</script>


<!-- Berikut ini adalah list projek2 mendatang yang ingin kubuat jika sudah mempunyai tim frontend
    Bagiku cukup sulit dalam menentukan pilihan terbaik dalam membuat quick tour
    1. Membuat guided tour yang bisa pergi ke halaman lain -->


<!-- Fitur di bawah ini adalah fitur oboarding yang berfungsi mengarahkan tamu untuk mengetahui fitur-fitur yang berhubungan dengan pesanan -->

<!-- Intro user publik -->
<script>
    // Initialize Intro.js
    // Wait for the DOM to be ready
    $(document).ready(function () {
        // Bind a click event to the button
        $("#startTour").on("click", function () {
            var intro = introJs();
            intro.setOptions({
                steps: [{
                    element: document.getElementById('tour1'),
                    intro: 'Ini adalah logo aplikasimu!',
                    position: 'bottom'
                },
                {
                    element: document.getElementById('tour2'),
                    intro: 'Ini adalah navigasi.',
                    position: 'bottom'
                }
                ]
            });
            intro.start();
        });
    });
</script>



<!-- Intro user tamu -->
<script>
    // Initialize Intro.js
    // Wait for the DOM to be ready

    // Bind a click event to the button
    $("#introTamu").on("click", function () {
        var intro = introJs();
        intro.setOptions({
            steps: [
                // I want to have this one but I think it doesn't really recessary anymore since it doesn't even work yet
                // {
                //   title: 'Quick Tour',
                //   intro: 'Ayo ikuti tour ini'
                // }, 
                {
                    element: document.getElementById('tour1'),
                    intro: 'Anda sekarang sudah bisa mencari serta mengelola pesanan Anda!',
                    position: 'bottom'
                },
                {
                    element: document.getElementById('tour2'),
                    intro: 'Anda bisa memesan kamar di sini.',
                    position: 'top'
                }

            ],
            // dontShowAgain: true,
        })
        intro.start();
    });
</script>

<!-- Script below is for radio button -->
<script>
    // JavaScript to make radio buttons required and stop validation once one option is picked
    document.addEventListener('DOMContentLoaded', function () {
        var radioGroup = document.querySelectorAll('input[type="radio"].custom-radio');

        radioGroup.forEach(function (radio) {
            radio.addEventListener('change', function () {
                // Set "required" attribute to false for all radio buttons
                radioGroup.forEach(function (r) {
                    r.required = false;
                });

                // Find the checked radio button and set "required" attribute to true
                var checkedRadio = document.querySelector('input[type="radio"].custom-radio:checked');
                if (checkedRadio) {
                    checkedRadio.required = true;
                }
            });
        });
    });
</script>

<!-- Script below is for checkboxes -->
<script>
    // JavaScript to disable all primary buttons once one is chosen
    $(document).ready(function () {
        $('.checkbox-group input[type="checkbox"]').change(function () {
            var checkboxes = $('.checkbox-group input[type="checkbox"]');
            var cards = $('.card-body');
            var checkedCheckbox = $(this);

            if (checkedCheckbox.prop('checked')) {
                checkboxes.parent().removeClass('btn-primary').addClass('btn-secondary');
                cards.parent().removeClass('bg-light').addClass('bg-light');
                checkedCheckbox.parent().addClass('active').addClass('btn-success');
                checkboxes.not(checkedCheckbox).prop('disabled', true).prop('required', false);
            } else {
                checkboxes.parent().removeClass('btn-secondary').addClass('btn-primary');
                cards.parent().removeClass('bg-secondary').addClass('bg-light');
                checkboxes.prop('disabled', false).prop('required', true);
                checkedCheckbox.parent().removeClass('active').removeClass('btn-success');
            }
        });
    });
</script>





<script>
    var ctx = document.getElementById('myChart_tabel8_tabel2').getContext('2d');
    var chartDataTabel2 = <?= $chart_tabel2 ?> // Data passed from controller
    var chartDataTabel8 = <?= $chart_tabel8 ?> // Data passed from controller

    var labelsTabel2 = chartDataTabel2.map(function (item) {
        return item.label;
    });

    var valuesTabel2 = chartDataTabel2.map(function (item) {
        return item.value;
    });

    var labelsTabel8 = chartDataTabel8.map(function (item) {
        return item.label;
    });

    var valuesTabel8 = chartDataTabel8.map(function (item) {
        return item.value;
    });

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labelsTabel8,
            datasets: [{
                label: 'Jumlah <?= $tabel8_alias ?> Aktif',
                data: valuesTabel8,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255, 99, 132, 1)',
                borderWidth: 1
            },
            {
                label: 'Jumlah <?= $tabel2_alias ?>',
                data: valuesTabel2,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<script>
    CKEDITOR.replace('editor');
</script>