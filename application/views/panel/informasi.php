<div id="content" class="content">
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Dashboard</a></li>
        <li class="active">Informasi</li>
    </ol>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                            data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                            data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                            data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                            data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">Data Informasi</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="box-body">
                                    <div class='row'>
                                        <div class='col-md-9'>
                                            <div style="padding-bottom: 10px;">
                                                <?php echo anchor(site_url('panel/create_informasi'), '<i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body" style="overflow-x: scroll; ">
                                        <table id="data-table"
                                            class="table table-bordered table-hover table-sm table-td-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Judul</th>
                                                    <th>Kategori</th>
                                                    <th>Deskripsi</th>
                                                    <th>Author</th>
                                                    <th>Tanggal</th>
                                                    <th>Thumbnail</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody><?php $no = 1;
            foreach ($informasi_data as $informasi)
            {
                ?>
                                                <tr>
                                                    <td><?= $no++?></td>
                                                    <td><?php echo $informasi->judul ?></td>
                                                    <td><?php echo $informasi->nama_kategori ?></td>
                                                    <td><?php echo substr($informasi->deskripsi,0,100)  ?></td>
                                                    <td><?php echo $informasi->username ?></td>
                                                    <td><?php echo $informasi->tanggal ?></td>
                                                    <td>
                                                        <?php if ($informasi->thumbnail == '' || $informasi->thumbnail == null) { ?>
                                                        <img src="<?= base_url() ?>temp/img/default.png" width="60px"
                                                            height="auto" />
                                                        <?php } else { ?>
                                                        <img src="<?= base_url() ?>temp/img/<?php echo $informasi->thumbnail ?>"
                                                            width="60px" height="auto" />
                                                        <?php } ?>
                                                        </a>
                                                    </td>

                                                    <td><?php echo $informasi->status ?></td>
                                                    <td style="text-align:center">
                                                        <?php 
				echo anchor(site_url('panel/update_informasi/'.encrypt_url($informasi->informasi_id)),'<i class="fa fa-pencil" aria-hidden="true"></i>','class="btn btn-primary btn-sm update_data"'); 
				echo '  '; 
				echo anchor(site_url('panel/delete_informasi/'.encrypt_url($informasi->informasi_id)),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-sm delete_data" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </ div>
                </div>