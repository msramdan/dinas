<section class="main-news-area">
    <div class="container">
        <div class="row">
            <section class="splide" aria-label="Splide Basic HTML Example">
                <div class="splide__track">
                    <ul class="splide__list">
                        <?php foreach ($banner as $b) : ?>
                            <li class="splide__slide"><img src="<?= $b->url ?>" alt="" class=""></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>
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
                                            <img src="<?= base_url() ?>temp/img/logo.png" alt="image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p style="text-align: justify;"><?= $setting->about_us ?></p>
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
                                    <?php foreach ($informasi as $row) { ?>
                                        <div class="col-lg-4 col-md-6">
                                            <div class="single-news-item">
                                                <div class="news-image">
                                                    <a href="#">
                                                        <img src="<?= base_url() ?>temp/img/<?php echo $row->thumbnail ?>" alt="image">
                                                    </a>
                                                </div>

                                                <div class="news-content mt-20">
                                                    <span><?= $row->nama_kategori ?></span>
                                                    <h6>
                                                        <a href="<?= site_url('/web/informasi/' . $row->informasi_id) ?>"><?= $row->judul ?></a>
                                                    </h6>
                                                    <a href="#"><?= ucfirst($row->username)  ?></a> /
                                                    <?= substr($row->tanggal, 0, 10)  ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
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
                                <a href="<?= site_url('/web/kategori/' . $row->kategori_id)  ?>"><?= $row->nama_kategori ?></a>
                            <?php } ?>
                        </div>
                    </section>
                </aside>
            </div>

        </div>
    </div>
</section>

<script>
    window.addEventListener('load', function() {
        getChart()
    });

    const groupBy = function(xs, key) {
        return xs.reduce(function(rv, x) {
            (rv[x[key]] = rv[x[key]] || []).push(x);

            return rv;
        }, {});
    };

    async function getChart() {
        try {
            const response = await fetch('<?= site_url('web/count_information_with_kategori') ?>')
            const responseData = await response.json();
            const dataGroup = groupBy(responseData, 'nama_kategori');
            const data = [];
            for (const key in dataGroup) {
                data.push([key, dataGroup[key].filter(val => val.informasi_id !=  null).length])
            }
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
                    data,
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

        } catch (err) {
            console.log(err)
        }
    }




    const splide = new Splide('.splide').mount();
</script>