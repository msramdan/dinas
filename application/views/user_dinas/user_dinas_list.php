<div id="content" class="content">
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Dashboard</a></li>
        <li class="active">User_dinas</li>
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
                    <h4 class="panel-title">Data User_dinas</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="box-body">
                                    <div class='row'>
                                        <div class='col-md-9'>
                                            <div style="padding-bottom: 10px;">
                                                <?php echo anchor(site_url('user_dinas/create'), '<i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body" style="overflow-x: scroll; ">
                                        <table id="data-table"
                                            class="table table-bordered table-hover table-td-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Username</th>
                                                    <th>Dinas</th>
                                                    <th>Email</th>
                                                    <th>No Telpon</th>
                                                    <th>Kelompok</th>
                                                    <th>Input Informasi</th>
                                                    <th>Input Komoditas</th>
                                                    <th>Update Harga</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody><?php $no = 1;
            foreach ($user_dinas_data as $user_dinas)
            {
                ?>
                                                <tr>
                                                    <td><?= $no++?></td>
                                                    <td><?php echo $user_dinas->username ?></td>
                                                    <td><?php echo $user_dinas->nama_dinas ?></td>
                                                    <td><?php echo $user_dinas->email ?></td>
                                                    <td><?php echo $user_dinas->no_telpon ?></td>
                                                    <td><?php echo $user_dinas->kelompok ?></td>
                                                    <th><?php echo $user_dinas->can_input_informasi ?></th>
                                                    <th><?php echo $user_dinas->can_input_komoditas ?></th>
                                                    <th><?php echo $user_dinas->can_update_harga ?></th>
                                                    <td style="text-align:center">
                                                        <?php 

				echo anchor(site_url('user_dinas/update/'.encrypt_url($user_dinas->user_dinas_id)),'<i class="fa fa-pencil" aria-hidden="true"></i>','class="btn btn-primary btn-sm update_data"'); 
				echo '  '; 
				echo anchor(site_url('user_dinas/delete/'.encrypt_url($user_dinas->user_dinas_id)),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-sm delete_data" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
