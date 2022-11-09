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
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
				</div>
				<h4 class="panel-title">Data Komoditas</h4>
			</div>
			<div class="panel-body">
<table id="data-table-default" class="table table-hover table-bordered table-td-valign-middle">
	    <tr><td>Tgl Update</td><td><?php echo $tgl_update; ?></td></tr>
	    <tr><td>Produk Id</td><td><?php echo $produk_id; ?></td></tr>
	    <tr><td>User Dinas Id</td><td><?php echo $user_dinas_id; ?></td></tr>
	    <tr><td>Stok</td><td><?php echo $stok; ?></td></tr>
	    <tr><td>Rencana Produksi</td><td><?php echo $rencana_produksi; ?></td></tr>
	    <tr><td>Ketahanan Bulanan</td><td><?php echo $ketahanan_bulanan; ?></td></tr>
	    <tr><td>Data Minggu</td><td><?php echo $data_minggu; ?></td></tr>
	    <tr><td>Hasil Produksi Harian</td><td><?php echo $hasil_produksi_harian; ?></td></tr>
	    <tr><td>Harga Total Produksi</td><td><?php echo $harga_total_produksi; ?></td></tr>
	    <tr><td>Harga Dari Produsen</td><td><?php echo $harga_dari_produsen; ?></td></tr>
	    <tr><td>Harga Pedagang</td><td><?php echo $harga_pedagang; ?></td></tr>
	    <tr><td>User Validasi Harga</td><td><?php echo $user_validasi_harga; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('komoditas') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
			</div>
        </div>
    </div>
	</div>
</div>