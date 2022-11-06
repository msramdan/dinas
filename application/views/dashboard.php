<div id="content" class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-green">
                <div class="stats-icon"><i class="fa fa-users"></i></div>
                <div class="stats-info">
                    <h4>DATA KARYAWAN</h4>
                    <p>12 Data</p>
                </div>
                <div class="stats-link">
                    <a href="<?= base_url() ?>karyawan">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-red">
                <div class="stats-icon"><i class="fa fa-list"></i></div>
                <div class="stats-info">
                    <h4>DATA JABATAN</h4>
                    <p>12 Data</p>
                </div>
                <div class="stats-link">
                    <?php if ($this->fungsi->user_login()->level_id == 1) { ?>
                    <a href="<?= base_url() ?>jabatan">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                    <?php } else { ?>
                    <a href="">Akses for Admin <i class="fa fa-arrow-circle-o-right"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-blue">
                <div class="stats-icon"><i class="fa fa-list"></i></div>
                <div class="stats-info">
                    <h4>DATA DEPARTEMEN</h4>
                    <p>12 Data</p>
                </div>
                <div class="stats-link">
                    <?php if ($this->fungsi->user_login()->level_id == 1) { ?>
                    <a href="<?= base_url() ?>departemen">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                    <?php } else { ?>
                    <a href="">Akses for Admin <i class="fa fa-arrow-circle-o-right"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="widget widget-stats bg-purple">
                <div class="stats-icon"><i class="fa fa-list"></i></div>
                <div class="stats-info">
                    <h4>DATA KATEGORI</h4>
                    <p>12 Data</p>
                </div>
                <div class="stats-link">
                    <?php if ($this->fungsi->user_login()->level_id == 1) { ?>
                    <a href="<?= base_url() ?>kategori">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                    <?php } else { ?>
                    <a href="">Akses for Admin <i class="fa fa-arrow-circle-o-right"></i></a>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>