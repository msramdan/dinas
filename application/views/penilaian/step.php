<div id="content" class="content">
	<div class="row">
		<div class="col-md-4 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="index-1">
				<div class="panel-heading">
					<h4 class="panel-title">List Kategori</h4>
				</div>
				<div class="panel-body">
					<?php
					$priode = $_GET['p'];
					$kategori_id =  $_GET['k'];
					$dataKategori = $this->db->query('SELECT * FROM kategori  ORDER BY kategori_id ASC') ?>

					<?php foreach ($dataKategori->result() as $row) { ?>
						<?php if($kategori_id == $row->kategori_id ){ ?>
							<a href="<?= base_url() ?>penilaian/step?p=<?=$priode ?>&k=<?=$row->kategori_id ?>" class="btn btn-warning" style="margin-bottom: 5px;">
							Kategori <?= $row->kode_kategori ?>
						</a>
						<?php }else{ ?>
							<a href="<?= base_url() ?>penilaian/step?p=<?=$priode ?>&k=<?=$row->kategori_id ?>" class="btn btn-success" style="margin-bottom: 5px;">
							Kategori <?= $row->kode_kategori ?>
						</a>
						<?php } ?>
						
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="col-md-8 ui-sortable">
			<div class="panel panel-inverse" data-sortable-id="index-1">
				<div class="panel-heading">
					<?php
					$query = $this->db->query("SELECT * FROM kategori where kategori_id='$kategori_id'")->row();
					?>
					<h4 class="panel-title">Penilaian Kategori <?= $query->kode_kategori ?> : <?= $query->nama_kategori ?> ( Bobot Maks : <?= $query->bobot ?> Point) </h4>
				</div>
				<div class="panel-body">


					<table id="" class="table table-bordered table-hover table-td-valign-middle">
						<thead>
							<tr>
								<th>#</th>
								<th>Nama Pegawai</th>
								<th>Nilai</th>
							</tr>
						</thead>
						<?php
						$no = 1;
						$pegawai = $this->db->query("SELECT * from karyawan where jabatan_id='2'");
						?>
						<?php foreach ($pegawai->result() as $row) { ?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $row->nama_karyawan  ?></td>
								<td><input type="text" class="form-control" name="nik" id="nik" placeholder="Nilai" value="<?= getNilai($row->karyawan_id, $kategori_id, $priode) ?>" /></td>
							</tr>
						<?php } ?>
					</table>

					<!-- cek last ID -->
					<?php $cek = $this->db->query('SELECT * FROM kategori  ORDER BY kategori_id DESC LIMIT 1')->row();
					$lastID = $cek->kategori_id;
					?>

					<?php if ($kategori_id == $lastID) { ?>
						<!-- <a href='javascript:history.back()'>
							<button class="btn btn-default" style="float: left;">
								<i class="fa fa-arrow-left"></i>
								Kembali
							</button>
						</a> -->
						<form class="" action="" method="GET">
							<input type="hidden" required name="b" value="<?= $kategori_id ?>">
							<button class="btn btn-danger" style="float: right;">
								<i class="fa fa-arrow-right"></i>
								Finish
							</button>
						</form>

					<?php } else { ?>
						<!-- <a href='javascript:history.back()'>
							<button class="btn btn-default" style="float: left;">
								<i class="fa fa-arrow-left"></i>
								Kembali
							</button>
						</a> -->

						<form class="" action="<?= base_url() ?>penilaian/step" method="GET">
							<!-- priode -->
							<input type="hidden" required name="p" value="<?= $priode ?>">
							<!-- kategori_id -->
							<input type="hidden" required name="k" value="<?= $kategori_id +1 ?>">
							<button class="btn btn-primary" style="float: right;">
								<i class="fa fa-save"></i>
								Simpan
							</button>
						</form>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
