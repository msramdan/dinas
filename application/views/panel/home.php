<div id="content" class="content">
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="fa fa-list"></i></div>
            <div class="stats-info">
                <h4>DATA KOMODITAS</h4>
                <?php
					$komoditas = $this->db->get_where('komoditas', array('user_dinas_id' => $this->fungsi->user_dinas()->user_dinas_id))->num_rows();
					?>
                <p><?= $komoditas ?> Data</p>
            </div>
            <div class="stats-link">
                <a href="<?= base_url() ?>panel/komoditas">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon"><i class="fa fa-check"></i></div>
            <div class="stats-info">
                <h4>DATA INFORMASI PUBLISH</h4>
                <?php
					$informasi = $this->db->get_where('informasi', array(
						'author' => $this->fungsi->user_dinas()->user_dinas_id,
						'status' =>'Publish'
						
						))->num_rows();
					?>
                <p><?= $informasi ?> Data</p>
            </div>
            <div class="stats-link">
                <a href="<?= base_url() ?>panel/informasi">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>

    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-red">
            <div class="stats-icon"><i class="fa fa-times"></i></div>
            <div class="stats-info">
                <h4>DATA INFORMASI DRAFT</h4>
                <?php
					$Draft = $this->db->get_where('informasi', array(
						'author' => $this->fungsi->user_dinas()->user_dinas_id,
						'status' =>'Draft'
						
						))->num_rows();
					?>
                <p><?= $Draft ?> Data</p>
            </div>
            <div class="stats-link">
                <a href="<?= base_url() ?>panel/informasi">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-purple">
            <div class="stats-icon"><i class="fa fa-list"></i></div>
            <div class="stats-info">
                <h4>NEED VALIDASI HARGA</h4>
                <?php
					$valid = $this->db->get_where('komoditas', array(
						'user_dinas_id' => $this->fungsi->user_dinas()->user_dinas_id,
						'harga_pedagang' =>null
						
						))->num_rows();
					?>
                <p><?= $valid ?> Data</p>
            </div>
            <div class="stats-link">
                <a href="<?= base_url() ?>panel/komoditas">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>

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
