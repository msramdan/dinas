<div id="content" class="content">
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Dashboard</a></li>
        <li class="active">Kontak</li>
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
                    <h4 class="panel-title">Data Kontak</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="box-body">
                                    <div class="box-body" style="overflow-x: scroll; ">
                                        <table id="data-table"
                                            class="table table-bordered table-hover table-td-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama</th>
                                                    <th>Email</th>
                                                    <th>Telpon</th>
                                                    <th>Judul</th>
                                                    <th>Deskripsi</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody><?php $no = 1;
            foreach ($kontak_data as $kontak)
            {
                ?>
                                                <tr>
                                                    <td><?= $no++?></td>
                                                    <td><?php echo $kontak->nama ?></td>
                                                    <td><?php echo $kontak->email ?></td>
                                                    <td><?php echo $kontak->telpon ?></td>
                                                    <td><?php echo $kontak->judul ?></td>
                                                    <td><?php echo $kontak->deskripsi ?></td>
                                                    <td>
                                                        <?php 
				echo anchor(site_url('kontak/delete/'.encrypt_url($kontak->kontak_id)),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-sm delete_data" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
                </div>
            </div>