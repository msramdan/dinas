<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Validasi Harga</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= base_url() ?>panel/update_harga">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Harga Pedagang</label>
                        <input type="hidden" id="komoditas_id_modal" name="komoditas_id_modal" value="">
                        <input type="number" required name="harga_pedagang" class="form-control" id="exampleInputEmail1"
                            aria-describedby="" placeholder="">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div id="content" class="content">
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Dashboard</a></li>
        <li class="active">Komoditas</li>
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
                    <h4 class="panel-title">Data Komoditas</h4>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="box-body">
                                    <div class='row'>
                                        <div class='col-md-9'>
                                            <div style="padding-bottom: 10px;">
                                                <?php echo anchor(site_url('panel/create_komoditas'), '<i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm tambah_data"'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body" style="overflow-x: scroll; ">
                                        <table class="table table-bordered table-xs table-hover table-td-valign-middle"
                                            id="example">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Tgl Update</th>
                                                    <th>Produk</th>
                                                    <th>Kelompok</th>
                                                    <th>Created By</th>
                                                    <th>Stok</th>
                                                    <th>Rencana Produksi</th>
                                                    <th>Ketahanan Bulanan</th>
                                                    <th>Bulan Tahun</th>
                                                    <th>Data Minggu</th>
                                                    <th>Produksi Mingguan</th>
                                                    <th>Produksi Harian</th>
                                                    <th>Harga Total Produksi</th>
                                                    <th>Harga Dari Produsen</th>
                                                    <th>Harga Pedagang</th>
                                                    <th>Validasi By</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody><?php $no = 1;
            foreach ($komoditas_data as $komoditas)
            {
                ?>
                                                <tr>
                                                    <td><?= $no++?></td>

                                                    <td><?php echo date('d F Y', strtotime( $komoditas->tgl_update)) ?>
                                                    <td><?php echo $komoditas->nama_produk ?></td>
                                                    <td><?php echo $komoditas->nama_kelompok ?></td>
                                                    <td><?php echo $komoditas->username ?></td>
                                                    <td><?php echo $komoditas->stok ?> Ton</td>
                                                    <td><?php echo $komoditas->rencana_produksi ?> Ton</td>
                                                    <td><?php echo $komoditas->ketahanan_bulanan ?> Bulan</td>
                                                    <td><?php echo $komoditas->bulan_tahun ?></td>
                                                    <td>Minggu Ke-<?php echo $komoditas->data_minggu ?></td>
                                                    <td><?php echo $komoditas->jml_produksi_minggu ?> Kg</td>
                                                    <td><?php echo round($komoditas->jml_produksi_minggu / 7)  ?> Kg
                                                    </td>
                                                    <td><?php echo rupiah($komoditas->harga_dari_produsen * $komoditas->jml_produksi_minggu )  ?>
                                                    </td>
                                                    <td><?php echo rupiah($komoditas->harga_dari_produsen)  ?></td>
                                                    <?php if($komoditas->harga_pedagang ==null){ ?>
                                                    <td>-</td>
                                                    <?php }else{ ?>
                                                    <td><?php echo rupiah($komoditas->harga_pedagang)  ?></td>
                                                    <?php } ?>
                                                    <?php if($komoditas->user_validasi_harga ==null){ ?>
                                                    <td>-</td>
                                                    <?php }else{ ?>
                                                    <td><?php echo username_dinas($komoditas->user_validasi_harga)  ?>
                                                    </td>
                                                    <?php } ?>
                                                    <td>
                                                        <?php if($this->fungsi->user_dinas()->can_update_harga=='Ya'){ ?>
                                                        <button type="button"
                                                            class="btn btn-sm btn-success btn-sm identifyingClass"
                                                            data-toggle="modal"
                                                            data-komoditas_id=<?php echo $komoditas->komoditas_id ?>
                                                            data-target="#exampleModal">
                                                            <i class="fa fa-money"></i>
                                                        </button>
                                                        <?php } ?>
                                                        <?php 
															echo anchor(site_url('panel/update_komoditas/'.encrypt_url($komoditas->komoditas_id)),'<i class="fa fa-pencil" aria-hidden="true"></i>','class="btn btn-primary btn-sm update_data"'); 
															echo '  '; 
															echo anchor(site_url('panel/delete_komoditas/'.encrypt_url($komoditas->komoditas_id)),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-sm delete_data" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
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
        </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function() {
        $(".identifyingClass").click(function() {
            var my_id_value = $(this).data('komoditas_id');
            console.log(my_id_value)
            $(".modal-body #komoditas_id_modal").val(my_id_value);
        });
    });
    </script>