<div class="box-body" style="overflow-x: scroll; ">
    <table id="data-table" class="table table-bordered table-xs table-hover table-td-valign-middle">
        <thead>
            <tr>
                <th>No</th>
                <th>Tgl Update</th>
                <th>Produk</th>
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
                <td><?php echo $komoditas->tgl_update ?></td>
                <td><?php echo $komoditas->nama_produk ?></td>
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
                <td><?php echo $komoditas->user_validasi_harga ?></td>
                <?php } ?>
                <td style="text-align:center">
                    <?php 
				echo anchor(site_url('komoditas/update/'.encrypt_url($komoditas->komoditas_id)),'<i class="fa fa-pencil" aria-hidden="true"></i>','class="btn btn-primary btn-sm update_data"'); 
				echo '  '; 
				echo anchor(site_url('komoditas/delete/'.encrypt_url($komoditas->komoditas_id)),'<i class="fa fa-trash" aria-hidden="true"></i>','class="btn btn-danger btn-sm delete_data" Delete','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
				?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>


</div>
