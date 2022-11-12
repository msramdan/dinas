        <div class="page-title-area">
            <div class="container">
                <div class="page-title-content">
                    <h2><?= ucfirst($informasi[0]->nama_kategori) ?></h2>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><?= ucfirst($informasi[0]->nama_kategori) ?></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Page Banner -->

        <!-- Start Default News Area -->
        <section class="default-news-area ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <?php foreach ($informasi as $row) : ?>
                                <div class="col-lg-4">
                                    <div class="single-business-news">
                                        <div class="business-news-image">
                                            <a href="#">
                                                <img src="<?= base_url() ?>temp/img/<?= $row->thumbnail ?>" alt="image">
                                            </a>
                                        </div>
                                        <?php
                                        $tanggal = date_create($row->tanggal);
                                        $tanggal = date_format($tanggal, 'd M, Y');
                                        ?>
                                        <div class="business-news-content">
                                            <span><?= ucfirst($row->nama_kategori) ?></span>
                                            <h3>
                                                <a href="<?= site_url('web/informasi/' . $row->informasi_id) ?>"><?= $row->judul ?></a>
                                            </h3>
                                            <p><a href="<?= site_url('web/informasi/' . $row->informasi_id) ?>"><?= $row->username ?></a> / <?= $tanggal ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>


                        <div class="pagination-area">
                            <a href="<?= current_url() . '?page=' . $page - 1 ?>" class="prev page-numbers <?= $page == 1 ? 'disabled-link' : '' ?>">
                                <i class='bx bx-chevron-left'></i>
                            </a>
                            <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                                <a href="" class="page-numbers <?= $i == $page ? 'current' : '' ?>"><?= $i ?></a>
                                <!-- <span class="page-numbers current" aria-current="page">2</span>
                                <a href="#" class="page-numbers">3</a>
                                <a href="#" class="page-numbers">4</a> -->
                            <?php endfor; ?>
                            <a href="<?= current_url() . '?page=' . $page + 1 ?>" class="next page-numbers <?= $page == $total_halaman ? 'disabled-link' : '' ?>">
                                <i class='bx bx-chevron-right'></i>
                            </a>
                        </div>
                    </div>

                    <!-- <div class="col-lg-4">
                        <aside class="widget-area">
                            <section class="widget widget_popular_posts_thumb">
                                <h3 class="widget-title">Popular posts</h3>

                                <article class="item">
                                    <a href="#" class="thumb">
                                        <span class="fullimage cover bg1" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <h4 class="title usmall"><a href="#">Match between United States and England at
                                                AGD stadium</a></h4>
                                        <span>28 September, 2022</span>
                                    </div>
                                </article>

                                <article class="item">
                                    <a href="#" class="thumb">
                                        <span class="fullimage cover bg2" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <h4 class="title usmall"><a href="#">For the last time, he addressed the
                                                people</a></h4>
                                        <span>28 September, 2022</span>
                                    </div>
                                </article>

                                <article class="item">
                                    <a href="#" class="thumb">
                                        <span class="fullimage cover bg3" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <h4 class="title usmall"><a href="#">The coronavairus is finished and the outfit
                                                is busy</a></h4>
                                        <span>28 September, 2022</span>
                                    </div>
                                </article>

                                <article class="item">
                                    <a href="#" class="thumb">
                                        <span class="fullimage cover bg4" role="img"></span>
                                    </a>
                                    <div class="info">
                                        <h4 class="title usmall"><a href="#">A fierce battle is going on between the two
                                                in the game</a></h4>
                                        <span>28 September, 2022</span>
                                    </div>
                                </article>
                            </section>
                        </aside>
                    </div> -->
                </div>
            </div>
        </section>