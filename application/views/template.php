<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8" />
    <title>Aplikasi SIPIT</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="<?= base_url() ?>temp/assets/plugins/jquery-ui/themes/base/minified/jquery-ui.min.css"
        rel="stylesheet" />
    <link href="<?= base_url() ?>temp/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>temp/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>temp/assets/css/animate.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>temp/assets/css/style.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>temp/assets/css/style-responsive.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>temp/assets/css/theme/default.css" rel="stylesheet" id="theme" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <!-- ================== BEGIN PAGE LEVEL STYLE ================== -->
    <link href="<?= base_url() ?>temp/assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css"
        rel="stylesheet" />
    <link href="<?= base_url() ?>temp/assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css"
        rel="stylesheet" />
    <!-- ================== END PAGE LEVEL STYLE ================== -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?= base_url() ?>temp/assets/plugins/pace/pace.min.js"></script>

    <!-- ================== END BASE JS ================== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.css"
        integrity="sha512-m52YCZLrqQpQ+k+84rmWjrrkXAUrpl3HK0IO4/naRwp58pyr7rf5PO1DbI2/aFYwyeIH/8teS9HbLxVyGqDv/A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- #modal-dialog -->
    <div class="modal fade" id="modal-dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Update Password</h4>
                </div>
                <form action="<?= base_url() ?>user/ganti_password/<?= $this->fungsi->user_login()->user_id  ?>"
                    method="post" class="form">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Password</label>
                            <input id="password" class="form-control" name="password" type="password" pattern="^\S{5,}$"
                                onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Minimal 6 Karakter' : ''); if(this.checkValidity()) form.passcon.pattern = this.value;"
                                required value="<?= set_value('password') ?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Confirmasi Password</label>
                            <input class="form-control" id="passcon" name="passcon" type="password" pattern="^\S{5,}$"
                                onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Masukkan Password Yang Sama' : '');"
                                required value="<?= set_value('passcon') ?>">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-sm btn-white" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-sm btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- begin #page-loader -->
    <!-- <div id="page-loader" class="fade in"><span class="spinner"></span></div> -->
    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
        <!-- begin #header -->
        <div id="header" class="header navbar navbar-default navbar-fixed-top">
            <!-- begin container-fluid -->
            <div class="container-fluid">
                <!-- begin mobile sidebar expand / collapse button -->
                <div class="navbar-header">
                    <a href="<?= base_url() ?>dashboard" class="navbar-brand"><span class="navbar-logo"></span>Aplikasi
                        SIPIT</a>
                    <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <!-- end mobile sidebar expand / collapse button -->

                <!-- begin header navigation right -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown navbar-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="<?= base_url() ?>temp/assets/img/user/admins.png" alt="" />
                            <span class="hidden-xs"> <?= $this->fungsi->user_login()->username ?> </span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInLeft">
                            <li class="arrow"></li>
                            <li><a href="#modal-dialog" data-toggle="modal">Ganti Password</a></li>
                            <li><a href="<?= base_url() ?>auth/logout">Log Out</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div id="sidebar" class="sidebar">
            <!-- begin sidebar scrollbar -->
            <div data-scrollbar="true" data-height="100%">
                <!-- begin sidebar user -->
                <ul class="nav">
                    <li class="nav-profile">
                        <div class="image">
                            <a href="javascript:;"><img src="<?= base_url() ?>temp/assets/img/user/admins.png"
                                    alt="" /></a>
                        </div>
                        <div class="info">
                            <?= $this->fungsi->user_login()->username ?>
                        </div>
                    </li>
                </ul>
                <!-- end sidebar user -->
                <!-- begin sidebar nav -->
                <ul class="nav">
                    <li class="nav-header">Main Menu</li>
                    <li><a href="<?= base_url() ?>dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <i class="fa fa-list"></i>
                            <span>Komoditas</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="<?= base_url() ?>komoditas">Form Data Komoditas</a></li>
                            <li><a href="<?= base_url() ?>produk">Data Produk</a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <i class="fa fa-info"></i>
                            <span>Informasi</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="<?= base_url() ?>informasi">Data Informasi</a></li>
                            <li><a href="<?= base_url() ?>kategori">Kategori Informasi</a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <i class="fa fa-users"></i>
                            <span>Kontributor Dinas</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="<?= base_url() ?>user_dinas">User Dinas</a></li>
                            <li><a href="<?= base_url() ?>list_dinas">Dinas Terdaftar</a></li>
                        </ul>
                    </li>
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            <i class="fa fa-globe"></i>
                            <span>Website</span>
                        </a>
                        <ul class="sub-menu">
                            <li><a href="<?= base_url() ?>banner">Banner Managament</a></li>
                            <li><a href="<?= base_url() ?>setting_website/update/Umhxc2ZDeHlpc1JpYWNIUVdzNG1sZz09">About
                                    Us</a>
                            </li>
                            <li><a href="<?= base_url() ?>kontak">Kontak</a></li>
                        </ul>
                    </li>

                    <li><a href="<?= base_url() ?>user"><i class="fa fa-user"></i> <span>User Admin</span></a>
                    </li>
                    <li><a href="<?= base_url() ?>auth/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>
                            <span>Logout</span></a>
                    </li>
                    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                                class="fa fa-angle-double-left"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="sidebar-bg"></div>
        <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
        <?php if ($this->session->flashdata('message')) : ?>
        <?php endif; ?>

        <div class="flash-data2" data-flashdata2="<?= $this->session->flashdata('error'); ?>"></div>
        <?php if ($this->session->flashdata('error')) : ?>
        <?php endif; ?>
        <?php echo $contents ?>
        <!-- end #content -->

        <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade"
            data-click="scroll-top"><i class="fa fa-angle-up"></i></a>


    </div>
    <!-- end page container -->

    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?= base_url() ?>temp/assets/plugins/jquery/jquery-1.9.1.min.js"></script>
    <script src="<?= base_url() ?>temp/assets/plugins/jquery/jquery-migrate-1.1.0.min.js"></script>
    <script src="<?= base_url() ?>temp/assets/plugins/jquery-ui/ui/minified/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>temp/assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>temp/assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url() ?>temp/assets/plugins/jquery-cookie/jquery.cookie.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>temp/assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>temp/assets/js/sweetalert.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="<?= base_url(); ?>temp/assets/js/dataflash.js"></script>
    <script src="<?= base_url() ?>temp/assets/js/summernote.min.js"></script>

    <!-- ================== END BASE JS ================== -->

    <!-- ================== BEGIN PAGE LEVEL JS ================== -->
    <script src="<?= base_url() ?>temp/assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
    <script src="<?= base_url() ?>temp/assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url() ?>temp/assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js">
    </script>
    <script src="<?= base_url() ?>temp/assets/js/table-manage-default.demo.min.js"></script>
    <script src="<?= base_url() ?>temp/assets/js/apps.min.js"></script>
    <!-- ================== END PAGE LEVEL JS ================== -->
    <script>
    $(document).ready(function() {
        App.init();
        TableManageDefault.init();
        $('#deskripsi').summernote({
            height: 200,
            onImageUpload: function(files, editor, welEditable) {
                console.log('event')
                sendFile(files[0], editor, welEditable);
            }
        });

        function sendFile(file, editor, welEditable) {
            data = new FormData();
            data.append("file", file);
            $.ajax({
                data: data,
                type: "POST",
                url: "<?= site_url('informasi/ajax_image') ?>",
                cache: false,
                contentType: false,
                processData: false,
                success: function(res) {
                    console.log(res);

                    if (res.success) {
                        editor.insertImage(welEditable, res.url);
                    }
                }
            });
        }
    });
    </script>
</body>




</html>
