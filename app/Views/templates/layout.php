<!DOCTYPE html>
<html lang="en">

<!-- /**
 *
 * @package CodeIgniter
 * @author Ardi Tri Heru S.Kom, M.Kom
 * @email arditriheruh@gmail.com
 * @link https://arditriheru.github.io
 */

/**
 */ -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= getTabTitle(); ?></title>

    <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/login/images/icons/favicon.jpg" />
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/adminlte.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- flag-icon-css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/flag-icon-css/css/flag-icon.min.css">
    <!-- chatbox-css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/chatbox.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.css">

    <style>
        /* untuk menghilangkan spinner  */
        .spinner {
            display: none;
        }

        .required:after {
            content: " *";
            color: red;
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#imageupload').submit(function(e) {
                if ($('#image_up_id').val()) {
                    e.preventDefault();

                    $("#progress-bar-status-show").width('0%');
                    var file_details = document.getElementById("image_up_id").files[0];
                    var extension = file_details['name'].split(".");

                    var allowed_extension = ["png", "jpg", "jpeg"];
                    var check_for_valid_ext = allowed_extension.indexOf(extension[1]);



                    if (file_details['size'] > 2097152) {
                        alert('Please upload a file less than 2 MB');
                        return false;
                    } else if (check_for_valid_ext == -1) {
                        alert('upload valid image file');
                        return false;
                    } else {
                        if (file_details['size'] < 2097152 && check_for_valid_ext != -1) {
                            $('#loader').show();
                            $(this).ajaxSubmit({
                                target: '#toshow',
                                beforeSubmit: function() {
                                    $("#progress-bar-status-show").width('0%');
                                },
                                uploadProgress: function(event, position, total, percentComplete) {
                                    $("#progress-bar-status-show").width(percentComplete + '%');
                                    $("#progress-bar-status-show").html('<div id="progress-percent">' + percentComplete + ' %</div>');
                                },
                                success: function() {
                                    $('#loader').hide();
                                    $('#imageDiv').show();
                                    var url = $('#toshow').text();
                                    var img = document.createElement("IMG");
                                    img.src = url;
                                    img.height = '100';
                                    img.width = '150';
                                    document.getElementById('imageDiv').appendChild(img);
                                },
                                resetForm: true
                            });
                            return false;
                        }
                    }
                }
            });
        });
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <?= $this->renderSection('content'); ?>

    <?= $this->extend('template/layout'); ?>
    <?= $this->section('content'); ?>
    <?= $this->endSection(); ?>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="<?php echo base_url(); ?>assets/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="<?php echo base_url(); ?>assets/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="<?php echo base_url(); ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo base_url(); ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="<?php echo base_url(); ?>assets/plugins/moment/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo base_url(); ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="<?php echo base_url(); ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <!-- Toastr -->
    <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

    <?php if ($this->session->flashdata('success')) {
        echo '<script>toastr.success("' . $this->session->flashdata('success') . '")</script>';
    } elseif ($this->session->flashdata('info')) {
        echo '<script>toastr.info("' . $this->session->flashdata('info') . '")</script>';
    } elseif ($this->session->flashdata('error')) {
        echo '<script>toastr.error("' . $this->session->flashdata('error') . '")</script>';
    } elseif ($this->session->flashdata('warning')) {
        echo '<script>toastr.warning("' . $this->session->flashdata('warning') . '")</script>';
    } ?>

    <script>
        // format pagination tabel
        $(function() {
            $("#dataTables1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#dataTables1_wrapper .col-md-6:eq(0)');
            $('#dataTablesAsc1').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#dataTablesAsc2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#dataTablesDesc1').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('#dataTablesDesc2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>

    <script type="text/javascript">
        function validate(email) {
            $.post('<?php echo base_url(); ?>ta/mahasiswa/dataMahasiswa/validasiEmail', {
                email: email
            }, function(data) {
                $('#feedback').html(data);
            });
        }

        $(document).ready(function() {
            $('#email').focusin(function() {

                if ($('#email').val() === '') {
                    $('#feedback').text('Masukan alamat email Anda..');
                } else {
                    validate($('#email').val());
                }

            }).blur(function() {
                $('#feedback').text('');
            }).keyup(function() {
                validate($('#email').val());
            });
        });
    </script>

    <script type="text/javascript">
        // Add active class to the current button (highlight it)
        var header = document.getElementById("myDIV");
        var btns = header.getElementsByClassName("nav-link");
        for (var i = 0; i < btns.length; i++) {
            btns[i].addEventListener("click", function() {
                var current = document.getElementsByClassName("active");
                current[0].className = current[0].className.replace(" active", "");
                this.className += " active";
            });
        }
    </script>

    <script>
        // jika form-prevent disubmit maka disable button-prevent dan tampilkan spinner
        (function() {
            $('.form-prevent').on('submit', function() {
                $('.button-prevent').attr('disabled', 'true');
                $('.spinner').show();
                $('.hide-text').hide();
            })
        })();
    </script>
</body>

</html>