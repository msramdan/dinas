<!doctype html>
<html lang="zxx" class="theme-light">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/frontend/assets/css/bootstrap.min.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/frontend/assets/css/animate.min.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/frontend/assets/css/meanmenu.css">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/frontend/assets/css/boxicons.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/frontend/assets/css/owl.carousel.min.css">
    <!-- Owl Carousel Default CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/frontend/assets/css/owl.theme.default.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/frontend/assets/css/magnific-popup.min.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/frontend/assets/css/nice-select.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/frontend/assets/css/style.css">
    <!-- Dark CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/frontend/assets/css/dark.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>temp/frontend/assets/css/responsive.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title><?= $setting->nama_website ?></title>

    <link rel="icon" type="image/png" href="<?= base_url() ?>temp/frontend/assets/img/favicon.png">
    <link href="<?= base_url() ?>temp/assets/css/splide.min.css" rel="stylesheet" />
    <script src="<?= base_url() ?>temp/assets/js/splide.min.js"></script>
    <style>
    .splide__slide img {
        width: 100%;
        height: auto;
    }

    .disabled-link {
        pointer-events: none;
    }

    .disabled-link:hover {
        cursor: no-drop;
    }
    </style>
</head>

<body>

    <!-- Start Preloader -->
    <div class="preloader">
        <div class="loader">
            <div class="wrapper">
                <div class="circle circle-1"></div>
                <div class="circle circle-1a"></div>
                <div class="circle circle-2"></div>
                <div class="circle circle-3"></div>
            </div>
            <span>Loading...</span>
        </div>
    </div>
    <!-- End Preloader -->

    <!-- Start Navbar Area -->
    <div class="navbar-area">
        <div class="main-responsive-nav">
            <div class="container">
                <div class="main-responsive-menu">
                    <div class="logo">
                        <a href="<?= base_url() ?>">
                            <img src="<?= base_url() ?>temp/img/<?= $setting->logo_light ?>" class="black-logo"
                                alt="image" width="170">
                            <img src="<?= base_url() ?>temp/frontend/assets/img/<?= $setting->logo_dark ?>"
                                class="white-logo" alt="image" width="170">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="<?= base_url() ?>">
                        <img src="<?= base_url() ?>temp/img/<?= $setting->logo_light ?>" class="black-logo" alt="image"
                            width="170">
                        <img src="<?= base_url() ?>temp/img/<?= $setting->logo_dark ?>" class="white-logo" alt="image"
                            width="170">
                    </a>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="<?= base_url() ?>" class="nav-link ">
                                    Home
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url() ?>web/komoditas" class="nav-link">
                                    Info Komoditas
                                </a>
                            </li>

                            <?php foreach ($kategori_data as $row) { ?>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>web/kategori/<?= $row->kategori_id ?>" class="nav-link">
                                    <?= $row->nama_kategori ?>
                                </a>
                            </li>
                            <?php } ?>
                            <li class="nav-item">
                                <a href="<?= base_url() ?>web/all_informasi" class="nav-link">
                                    All Informasi
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= base_url() ?>web/kontak" class="nav-link">
                                    Kontak
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
    <?php if ($this->session->flashdata('message')) : ?>
    <?php endif; ?>

    <div class="flash-data2" data-flashdata2="<?= $this->session->flashdata('error'); ?>"></div>
    <?php if ($this->session->flashdata('error')) : ?>
    <?php endif; ?>
    <!-- content -->
    <?php echo $contents ?>
    <section class="footer-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-footer-widget">
                        <a href="#">
                            <img src="<?= base_url() ?>temp/img/<?= $setting->logo_dark ?>" alt="image" width="200">
                        </a>
                        <p style="text-align: justify;"><?= substr($setting->about_us, 0, 150) ?> ...</p>


                    </div>
                </div>

                <?php
                $posts = $this->db->order_by('informasi_id', 'DESC')->limit(2)->get('informasi')->result();
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="single-footer-widget">
                        <h2>New Post</h2>
                        <?php foreach ($posts as $post) : ?>
                        <?php
                            $tanggal = date_create($post->tanggal);
                            $tanggal = date_format($tanggal, 'd M Y');
                            ?>
                        <div class="post-content">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <div class="post-image">
                                        <a href="<?= base_url('temp/img/' . $post->thumbnail) ?> ">
                                            <img src="<?= base_url('temp/img/' . $post->thumbnail) ?>" alt="image">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <h4>
                                        <a
                                            href="<?= site_url('/web/informasi/' . $post->informasi_id) ?>"><?= $post->judul ?></a>
                                    </h4>
                                    <span><?= $tanggal ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-footer-widget">
                        <h2>Link Terkait</h2>

                        <ul class="useful-links-list">
                            <li>
                                <a href="<?= base_url() ?>">Home</a>
                            </li>
                            <li>
                                <a href="<?= base_url() ?>web/komoditas">Info Komoditas</a>
                            </li>

                            <?php foreach ($kategori_data as $row) { ?>
                            <li>
                                <a href="<?= site_url('web/kategori/' . $row->kategori_id) ?>">
                                    <?= $row->nama_kategori ?></a>
                            </li>
                            <?php } ?>

                            <li>
                                <a href="<?= base_url() ?>web/kontak">Kontak</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-footer-widget">
                        <h2>Sosial Media</h2>

                        <ul class="social">
                            <li>
                                <a href="<?= $setting->url_fb ?>" class="facebook" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $setting->url_ig ?>" class="twitter" target="_blank">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $setting->url_twitter ?>" class="linkedin" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                            <li>
                                <a href="<?= $setting->url_yt ?>" class="linkedin" target="_blank">
                                    <i class='bx bxl-youtube'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="copyright-area">
        <div class="container">
            <div class="copyright-area-content">
                <p>
                    Copyright © <script>
                    document.write(new Date().getFullYear())
                    </script> <?= $setting->nama_website ?>
                </p>
            </div>
        </div>
    </div>
    <div class="go-top">
        <i class='bx bx-up-arrow-alt'></i>
    </div>
    <div class="dark-version">
        <label id="switch" class="switch">
            <input type="checkbox" onchange="toggleTheme()" id="slider">
            <span class="slider round"></span>
        </label>
    </div>
    <!-- dark version -->
    <!-- Jquery Slim JS -->
    <script src="<?= base_url() ?>temp/frontend/assets/js/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="<?= base_url() ?>temp/frontend/assets/js/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="<?= base_url() ?>temp/frontend/assets/js/bootstrap.min.js"></script>
    <!-- Meanmenu JS -->
    <script src="<?= base_url() ?>temp/frontend/assets/js/jquery.meanmenu.js"></script>
    <!-- Owl Carousel JS -->
    <script src="<?= base_url() ?>temp/frontend/assets/js/owl.carousel.min.js"></script>
    <!-- Magnific Popup JS -->
    <script src="<?= base_url() ?>temp/frontend/assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Nice Select JS -->
    <script src="<?= base_url() ?>temp/frontend/assets/js/nice-select.min.js"></script>
    <!-- Ajaxchimp JS -->
    <script src="<?= base_url() ?>temp/frontend/assets/js/jquery.ajaxchimp.min.js"></script>
    <!-- Form Validator JS -->
    <script src="<?= base_url() ?>temp/frontend/assets/js/form-validator.min.js"></script>
    <!-- Contact JS -->
    <script src="<?= base_url() ?>temp/frontend/assets/js/contact-form-script.js"></script>
    <!-- Wow JS -->
    <sc ript src="<?= base_url() ?>temp/frontend/assets/js/wow.min.js"></sc>
    <!-- Custom JS -->
    <script src="<?= base_url() ?>temp/frontend/assets/js/main.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <scri pt type="text/javascript" src="<?php echo base_url(); ?>temp/assets/js/sweetalert.min.js">
        </script>
        <script type="text/javascript" src="<?php echo base_url(); ?>temp/assets/js/sweetalert.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="<?= base_url(); ?>temp/assets/js/dataflash.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/1.0.3/numeral.min.js"
            integrity="sha512-sMgx0iqtQVrEwuUPBeRZE42fOPWIRBRb3CLaoK5gilEnzKTkdJpjguVk5HpcmOgjyZlHSGqXXugNlaovRhYLsg=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
        <script
            src='https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js'>
        </script>
        <script>
        function convertDateDBtoIndo(string) {
            bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                'Oktober', 'November', 'Desember'
            ];

            tanggal = string.split("-")[2];
            bulan = string.split("-")[1];
            tahun = string.split("-")[0];

            return tanggal + " " + bulanIndo[Math.abs(bulan)] + " " + tahun;
        }

        $(document).ready(function() {
            const table = $('#example').DataTable({
                ajax: {
                    url: `<?= site_url('/web/komoditas') ?>`,
                    dataSrc: '',
                    type: 'GET',
                    data: function(d) {
                        d.komoditas = $('#komoditas').val();
                        d.sumber_data = $('#sumber_data').val();
                        d.kelompok = $('#kelompok').val();
                        d.bulan_tahun = $('#bulan_tahun').val();
                        d.minggu = $('#minggu').val();
                    }
                },
                columns: [{
                        data: null,
                        render: function(data, type, row, meta) {
                            console.log(row);
                            return meta.row + 1;
                        }
                    },
                    {
                        data: 'tgl_update',
                        render: function(data, type, row, meta) {
                            return convertDateDBtoIndo(data);
                        }

                    },
                    {
                        data: 'nama_produk',

                    },
                    {
                        data: 'nama_dinas',

                    },
                    {
                        data: 'kelompok',

                    },
                    {
                        data: 'stok',
                        render: function(data, type, row, meta) {
                            return data + ' Ton';
                        }
                    },
                    {
                        data: 'rencana_produksi',
                        render: function(data, type, row, meta) {
                            return data + ' Ton';
                        }
                    },
                    {
                        data: 'ketahanan_bulanan',
                        render: function(data, type, row, meta) {
                            return data + ' Bulan';
                        }
                    },
                    {
                        data: 'bulan_tahun',
                        render: function(data, type, row, meta) {
                            return moment(data).format('MMMM YYYY')
                        }
                    },
                    {
                        data: 'data_minggu',
                        render: function(data, type, row, meta) {
                            return 'Minggu ke-' + data
                        }
                    },
                    {
                        data: 'jml_produksi_minggu',
                        render: function(data, type, row, meta) {
                            return data + ' Kg'
                        }
                    },
                    {
                        data: 'jml_produksi_minggu',
                        render: function(data, type, row, meta) {
                            return (data / 7).toFixed(2) + ' Kg'
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            return `Rp ${numeral(row.harga_dari_produsen * row.jml_produksi_minggu).format('0,0').replace(/[,]/gm, '.') },00`
                        }
                    },
                    {
                        data: 'harga_dari_produsen',
                        render: function(data, type, row, meta) {
                            return `Rp ${numeral(data).format('0,0').replace(/[,]/gm, '.') },00`
                        }
                    },
                    {
                        data: 'harga_pedagang',
                        render: function(data, type, row, meta) {
                            if (!data) return '-';

                            return `Rp ${numeral(data).format('0,0').replace(/[,]/gm, '.') },00`
                        }
                    },
                ],
                footerCallback: function(row, data, start, end, display) {

                    var intVal = function(i) {
                        return parseFloat(i);
                    };

                    var price = function(i) {

                        if (i == null || i == '-') return 0;

                        const result = i.toString().replace(/[A-z.]/gm, '').replace(',00', '')
                        // console.log(result)
                        return parseInt(result);
                    };
                    const api = this.api();
                    const stok = api
                        .column(5)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    const rencanaProduksi = api
                        .column(6)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    const ketahananBulanan = api
                        .column(7)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    const produksiMingguan = api
                        .column(10)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    const produksiHarian = api
                        .column(11)
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    const hTotalProduksi = api
                        .column(12)
                        .data()
                        .reduce(function(a, b) {
                            return price(a) + price(b.harga_dari_produsen * b
                                .jml_produksi_minggu);
                        }, 0);

                    const hDariProdusen = api
                        .column(13)
                        .data()
                        .reduce(function(a, b) {

                            return price(a) + price(b);
                        }, 0);

                    const hPedagang = api
                        .column(14)
                        .data()
                        .reduce(function(a, b) {
                            return price(a) + price(b);
                        }, 0);


                    $(api.column(0).footer()).html('Total');
                    $(api.column(5).footer()).html(stok.toFixed(2) + ' Ton');
                    $(api.column(6).footer()).html(rencanaProduksi.toFixed(2) + ' Ton');
                    $(api.column(7).footer()).html(ketahananBulanan + ' Bulan');
                    $(api.column(10).footer()).html(Math.round(produksiMingguan) + ' KG');
                    $(api.column(11).footer()).html(Math.round(produksiMingguan / 7) + ' KG');
                    $(api.column(12).footer()).html('Rp. ' + numeral(hTotalProduksi).format('0,0')
                        .replace(/[,]/gm, '.') + ',00');
                    $(api.column(13).footer()).html('Rp. ' + numeral(hDariProdusen / api.data()
                        .count()).format('0,0').replace(/[,]/gm, '.') + ',00');
                    $(api.column(14).footer()).html('Rp. ' + numeral(hPedagang / api.data().count())
                        .format('0,0').replace(/[,]/gm, '.') + ',00');
                }
            });

            $(document).on('click', '#filter-btn', function() {
                table.ajax.reload(function() {
                    console.log('reload')

                });
            })

            $('#exportExcel').click(function() {
                window.location.href =
                    `<?= site_url('web/export_komoditas') ?>?komoditas=${$('#komoditas').val()}&sumber_data=${$('#sumber_data').val()}&kelompok=${$('#kelompok').val()}&bulan_tahun=${$('#bulan_tahun').val()}&minggu=${$('#minggu').val()}`
            })


        });
        </script>
</body>



</html>