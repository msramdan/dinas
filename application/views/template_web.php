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

    <title>Website Aplikasi SIPIT</title>

    <link rel="icon" type="image/png" href="<?= base_url() ?>temp/frontend/assets/img/favicon.png">
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
                        <a href="index.html">
                            <img src="<?= base_url() ?>temp/frontend/assets/img/logo-1.png" class="black-logo"
                                alt="image">
                            <img src="<?= base_url() ?>temp/frontend/assets/img/logo-3.png" class="white-logo"
                                alt="image">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="index.html">
                        <img src="<?= base_url() ?>temp/frontend/assets/img/logo-1.png" class="black-logo" alt="image">
                        <img src="<?= base_url() ?>temp/frontend/assets/img/logo-3.png" class="white-logo" alt="image">
                    </a>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="<?= base_url() ?>" class="nav-link ">
                                    Home
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="politics.html" class="nav-link">
                                    Info Komoditas
                                </a>
                            </li>

                            <?php foreach ($kategori_data as $row) { ?>
                            <li class="nav-item">
                                <a href="business.html" class="nav-link">
                                    <?= $row->nama_kategori ?>
                                </a>
                            </li>
                            <?php } ?>

                            <li class="nav-item">
                                <a href="business.html" class="nav-link">
                                    Kontak
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->

    <!-- Start Main News Area -->
    <section class="main-news-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                </div>
            </div>
        </div>
    </section>

    <section class="default-news-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="politics-news">
                            <div class="section-title">
                                <h2>Tentang Kami</h2>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="single-politics-news">
                                        <div class="politics-news-image">
                                            <a href="#">
                                                <img src="<?= base_url() ?>temp/frontend/assets/img/politics-news/politics-news-1.jpg"
                                                    alt="image">
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <p style="text-align: justify;">Contrary to popular belief, Lorem Ipsum is not
                                        simply random text. It has roots
                                        in a piece of classical Latin literature from 45 BC, making it over 2000 years
                                        old. Richard McClintock, a Latin professor at Hampden-Sydney College in
                                        Virginia, looked up one of the more obscure Latin words, consectetur, from a
                                        Lorem Ipsum passage, and going through the cites of the word in classical
                                        literature, discovered the undoubtable source. Lorem Ipsum comes from sections
                                        1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and
                                        Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of
                                        ethics, very popular during the Renaissance. The first line of Lorem Ipsum,
                                        "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <br>
                            <section class="news-area">
                                <div class="section-title">
                                    <h2>New Post</h2>
                                </div>
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-news-item">
                                                <div class="news-image">
                                                    <a href="#">
                                                        <img src="<?= base_url() ?>temp/frontend/assets/img/news/news-1.jpg"
                                                            alt="image">
                                                    </a>
                                                </div>

                                                <div class="news-content mt-20">
                                                    <span>Politics</span>
                                                    <h6>
                                                        <a href="#">Trump discusses various issues with his party’s
                                                            political leaders.</a>
                                                    </h6>
                                                    <a href="#">Patricia</a> / 28 September, 2022</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-news-item">
                                                <div class="news-image">
                                                    <a href="#">
                                                        <img src="<?= base_url() ?>temp/frontend/assets/img/news/news-1.jpg"
                                                            alt="image">
                                                    </a>
                                                </div>

                                                <div class="news-content mt-20">
                                                    <span>Politics</span>
                                                    <h6>
                                                        <a href="#">Trump discusses various issues with his party’s
                                                            political leaders.</a>
                                                    </h6>
                                                    <a href="#">Patricia</a> / 28 September, 2022</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-news-item">
                                                <div class="news-image">
                                                    <a href="#">
                                                        <img src="<?= base_url() ?>temp/frontend/assets/img/news/news-1.jpg"
                                                            alt="image">
                                                    </a>
                                                </div>

                                                <div class="news-content mt-20">
                                                    <span>Politics</span>
                                                    <h6>
                                                        <a href="#">Trump discusses various issues with his party’s
                                                            political leaders.</a>
                                                    </h6>
                                                    <a href="#">Patricia</a> / 28 September, 2022</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-news-item">
                                                <div class="news-image">
                                                    <a href="#">
                                                        <img src="<?= base_url() ?>temp/frontend/assets/img/news/news-1.jpg"
                                                            alt="image">
                                                    </a>
                                                </div>

                                                <div class="news-content mt-20">
                                                    <span>Politics</span>
                                                    <h6>
                                                        <a href="#">Trump discusses various issues with his party’s
                                                            political leaders.</a>
                                                    </h6>
                                                    <a href="#">Patricia</a> / 28 September, 2022</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-news-item">
                                                <div class="news-image">
                                                    <a href="#">
                                                        <img src="<?= base_url() ?>temp/frontend/assets/img/news/news-1.jpg"
                                                            alt="image">
                                                    </a>
                                                </div>

                                                <div class="news-content mt-20">
                                                    <span>Politics</span>
                                                    <h6>
                                                        <a href="#">Trump discusses various issues with his party’s
                                                            political leaders.</a>
                                                    </h6>
                                                    <a href="#">Patricia</a> / 28 September, 2022</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-news-item">
                                                <div class="news-image">
                                                    <a href="#">
                                                        <img src="<?= base_url() ?>temp/frontend/assets/img/news/news-1.jpg"
                                                            alt="image">
                                                    </a>
                                                </div>

                                                <div class="news-content mt-20">
                                                    <span>Politics</span>
                                                    <h6>
                                                        <a href="#">Trump discusses various issues with his party’s
                                                            political leaders.</a>
                                                    </h6>
                                                    <a href="#">Patricia</a> / 28 September, 2022</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4">
                    <aside class="widget-area">
                        <section class="widget widget_latest_news_thumb">
                            <!-- <h3 class="widget-title"> Grafik Informasi</h3> -->
                            <script src="https://code.highcharts.com/highcharts.js"></script>
                            <script src="https://code.highcharts.com/modules/exporting.js"></script>
                            <script src="https://code.highcharts.com/modules/export-data.js"></script>
                            <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                            <figure class="highcharts-figure">
                                <div id="container"></div>
                            </figure>


                        </section>
                        <section class="widget widget_latest_news_thumb">
                            <h3 class="widget-title">Kategori Informasi</h3>
                            <div class="tagcloud">

                                <?php foreach ($kategori_data as $row) { ?>
                                <a href="#"><?= $row->nama_kategori ?></a>
                                <?php } ?>
                            </div>
                        </section>
                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!-- End Default News Area -->

    <!-- Start Footer Area -->
    <section class="footer-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-footer-widget">
                        <a href="#">
                            <img src="<?= base_url() ?>temp/frontend/assets/img/logo-3.png" alt="image">
                        </a>
                        <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                            laboris nisi ut aliquip ex ea commodo consequat.</p>


                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-footer-widget">
                        <h2>New Post</h2>

                        <div class="post-content">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <div class="post-image">
                                        <a href="#">
                                            <img src="<?= base_url() ?>temp/frontend/assets/img/recent-post/recent-post-1.jpg"
                                                alt="image">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <h4>
                                        <a href="#">The match of the volleyball full of excitement</a>
                                    </h4>
                                    <span>28 Sep 2022</span>
                                </div>
                            </div>
                        </div>

                        <div class="post-content">
                            <div class="row align-items-center">
                                <div class="col-md-4">
                                    <div class="post-image">
                                        <a href="#">
                                            <img src="<?= base_url() ?>temp/frontend/assets/img/recent-post/recent-post-3.jpg"
                                                alt="image">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-8">
                                    <h4>
                                        <a href="#">The match of the volleyball full of excitement</a>
                                    </h4>
                                    <span>28 Sep 2022</span>
                                </div>
                            </div>
                        </div>
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
                                <a href="#">Info Komoditas</a>
                            </li>

                            <?php foreach ($kategori_data as $row) { ?>
                            <li>
                                <a href="#"> <?= $row->nama_kategori ?></a>
                            </li>
                            <?php } ?>

                            <li>
                                <a href="#">Kontak</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="single-footer-widget">
                        <h2>Sosial Media</h2>

                        <ul class="social">
                            <li>
                                <a href="#" class="facebook" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="twitter" target="_blank">
                                    <i class='bx bxl-instagram'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="pinterest" target="_blank">
                                    <i class='bx bxl-linkedin'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="linkedin" target="_blank">
                                    <i class='bx bxl-twitter'></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="linkedin" target="_blank">
                                    <i class='bx bxl-youtube'></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Footer Area -->

    <!-- Start Copy Right Area -->
    <div class="copyright-area">
        <div class="container">
            <div class="copyright-area-content">
                <p>
                    Copyright © <script>
                    document.write(new Date().getFullYear())
                    </script> Sistem Informasi Pengendalian Inflasi Terintegrasi
                </p>
            </div>
        </div>
    </div>
    <!-- End Copy Right Area -->

    <!-- Start Go Top Area -->
    <div class="go-top">
        <i class='bx bx-up-arrow-alt'></i>
    </div>
    <!-- End Go Top Area -->

    <!-- dark version -->
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
    <script>
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Informasi Jumlah Informasi'
        },

        xAxis: {
            type: 'category',
            labels: {
                rotation: -45,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah Informasi'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: 'Population in 2021: <b>{point.y:.1f} millions</b>'
        },
        series: [{
            name: 'Population',
            data: [
                ['Tokyo', 37.33],
                ['Delhi', 31.18],
                ['Shanghai', 27.79],
                ['Sao Paulo', 22.23],
                ['Mexico City', 21.91],

            ],
            dataLabels: {
                enabled: true,
                rotation: -90,
                color: '#FFFFFF',
                align: 'right',
                format: '{point.y:.1f}', // one decimal
                y: 10, // 10 pixels down from the top
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
    </script>
</body>




</html>