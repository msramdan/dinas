<!-- Start Page Banner -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Kontak</h2>
            <ul>
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li>Kontak</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Banner -->

<!-- Start Contact Area -->
<section class="contact-area ptb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="contact-map">
                    <iframe src="<?= $setting->peta_lokasi ?>" width="600" height="450" style="border:0;"
                        allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

                <ul class="contact-info">
                    <li>
                        <span>Alamat:</span>
                        <?= $setting->alamat ?>
                    </li>
                    <li>
                        <span>Telpon:</span>
                        <a href="tel:<?= $setting->telpon ?>"><?= $setting->telpon ?></a>
                    </li>
                </ul>

                <div class="contact-form">
                    <div class="title">
                        <h3>Ready to get started?</h3>
                        <p>Your email address will not be published. </p>
                    </div>

                    <form id="" method="POST" action="<?= base_url() ?>web/submit_kontak">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="nama" class="form-control" id="name" required
                                        placeholder="Nama">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" id="email" required
                                        placeholder="Email">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="telpon" class="form-control" id="telpon" required
                                        placeholder="Telpon">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6">
                                <div class="form-group">
                                    <input type="text" name="judul" class="form-control" id="judul" required
                                        placeholder="Judul">
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>

                            <div class="col-lg-12 col-md-12">
                                <div class="form-group">
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" cols="30" rows="6"
                                        required placeholder="Deskripsi Pesan"></textarea>
                                    <div class="help-block with-errors"></div>
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-12">
                                <button type="submit" class="default-btn">Send Message</button>
                                <div id="msgSubmit" class="h3 text-center hidden"></div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <aside class="widget-area">
                    <section class="widget widget_stay_connected">
                        <h3 class="widget-title">Stay connected</h3>

                        <ul class="stay-connected-list">
                            <li>
                                <a href="<?= $setting->url_fb ?>" target="_blank">
                                    <i class='bx bxl-facebook'></i>
                                    Facebook
                                </a>
                            </li>

                            <li>
                                <a href="<?= $setting->url_twitter ?>" target="_blank" class="twitter">
                                    <i class='bx bxl-twitter'></i>
                                    Twitter
                                </a>
                            </li>

                            <li>
                                <a href="<?= $setting->url_yt ?>" target="_blank" class="youtube">
                                    <i class='bx bxl-youtube'></i>
                                    Youtube
                                </a>
                            </li>

                            <li>
                                <a href="<?= $setting->url_ig ?>" target="_blank" class="instagram">
                                    <i class='bx bxl-instagram'></i>
                                    Instagram
                                </a>
                            </li>
                        </ul>
                    </section>
                </aside>
            </div>

        </div>
    </div>
</section>
<!-- End Contact Area -->