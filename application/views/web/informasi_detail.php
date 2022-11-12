<!-- Start Page Banner -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2><?= $post->nama_kategori ?></h2>
            <ul>
                <li><a href="<?= base_url() ?>">Home</a></li>
                <li>Post</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Banner -->

<!-- Start Contact Area -->
<section class="contact-area ptb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1><?= $post->judul ?></h1>
                <p>
                    <?= $post->deskripsi ?>
                </p>
                <div>
                    <p>
                    <div class="mb-3 fw-bold"><?= $post->username ?></div>
                    <?php
                    $tanggal = date_create($post->tanggal);
                    $tanggal = date_format($tanggal, 'D M Y')
                    ?>
                    <div class="mb-3 text-muted"><small><?= $tanggal ?></small></div>
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>
<!-- End Contact Area -->