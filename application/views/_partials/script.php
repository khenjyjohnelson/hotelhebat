<!-- javascript untuk semua halaman (sesuai kebutuhan) -->
<script src="popper.min.js"></script>
<script src="jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="fontawesome/js/all.min.js"></script>

<!-- javascript untuk datatables bertema bootstrap -->
<script src="datatables/datatables/js/jquery.dataTables.min.js"></script>
<script src="datatables/datatables/js/dataTables.bootstrap4.min.js"></script>

<!-- fungsi datatables (wajib ada) -->
<script type="text/javascript">
    $(document).ready(function () {
        // yg ini yang menggunakan toast
        <?= get_flashdata('toast') ?>

        // yg di bawah ini adalah semua yg berhubungan dgn modal
        <?= get_flashdata('modal') ?>

        $('#data').DataTable({
            "createdRow": function (row, data, dataIndex) {
                $(row).find('td:first').html(dataIndex + 1);
            },


        });
    });

    var table = $('#daterange_table').DataTable({

    })
</script>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip({
            html:true
        });
    });
</script>


<!-- Berikut ini adalah list projek2 mendatang yang ingin kubuat jika sudah mempunyai tim frontend
    Bagiku cukup sulit dalam menentukan pilihan terbaik dalam membuat quick tour
    1. Membuat guided tour yang bisa pergi ke halaman lain -->
<script>
    $(document).ready(function () {
        $('.view-toggle').on('click', function () {
            $('.view-toggle').removeClass('active');
            $(this).addClass('active');
            var target = $(this).data('target');
            $('.data-view').removeClass('active').hide();
            $('#' + target).addClass('active').show();
        });
    });
</script>