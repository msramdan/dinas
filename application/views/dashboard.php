<div id="content" class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-green">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>DATA DINAS</h4>
                    <?php
					$komoditas = $this->db->get('komoditas')->num_rows();
					?>
                    <p><?= $komoditas ?> Data</p>

                </div>
                <div class="stats-link">
                    <a href="<?= base_url() ?>komoditas">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-list"></i></div>
                <div class="stats-info">
                    <h4>USER DINAS</h4>
                    <?php
					$user_dinas = $this->db->get('user_dinas')->num_rows();
					?>
                    <p><?= $user_dinas ?> Data</p>
                </div>
                <div class="stats-link">
                    <a href="<?= base_url() ?>user_dinas">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-list"></i></div>
                <div class="stats-info">
                    <h4>DATA INFORMASI</h4>
                    <?php
					$informasi = $this->db->get('informasi')->num_rows();
					?>
                    <p><?= $informasi ?> Data</p>
                </div>
                <div class="stats-link">
                    <a href="<?= base_url() ?>informasi">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-purple">
                <div class="stats-icon"><i class="fa fa-list"></i></div>
                <div class="stats-info">
                    <h4>KATEGORI INFORMASI</h4>
                    <?php
					$kategori = $this->db->get('kategori')->num_rows();
					?>
                    <p><?= $kategori ?> Data</p>
                </div>
                <div class="stats-link">
                    <a href="<?= base_url() ?>kategori">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 col-sm-12">
        <div class="alert alert-info" role="alert">

            <marquee width="100%" direction="left">
                <b>Selamat datang di aplikasi Sistem Informasi Pengendalian Inflasi Terintegrasi !!!</b>
            </marquee>

        </div>

        <center>

            <img src="<?= base_url() ?>temp/img/logo.png" alt="" style="width: 45%;margin-top:20px">
        </center>
    </div>
</div>
