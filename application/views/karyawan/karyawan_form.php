<div id="content" class="content">
	<ol class="breadcrumb pull-right">
		<li><a href="javascript:;">Dashboard</a></li>
		<li class="active">Karyawan</li>
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
					<h4 class="panel-title">Data KARYAWAN</h4>
				</div>
				<div class="panel-body">

					<form action="<?php echo $action; ?>" method="post">
						<thead>
							<table id="data-table-default" class="table  table-bordered table-hover table-td-valign-middle">
								<tr>
									<td>NIK <?php echo form_error('nik') ?></td>
									<td><input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" value="<?php echo $nik; ?>" /></td>
								</tr>
								<tr>
									<td>Nama Karyawan <?php echo form_error('nama_karyawan') ?></td>
									<td><input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" placeholder="Nama Karyawan" value="<?php echo $nama_karyawan; ?>" /></td>
								</tr>
								<tr>
									<td>Jabatan <?php echo form_error('jabatan_id') ?></td>
									<td>
										<select name="jabatan_id" class="form-control theSelect">
											<option value="">-- Pilih -- </option>
											<?php foreach ($jabatan as $key => $data) { ?>
												<?php if ($jabatan_id == $data->jabatan_id) { ?>
													<option value="<?php echo $data->jabatan_id ?>" selected><?php echo $data->nama_jabatan ?></option>
												<?php } else { ?>
													<option value="<?php echo $data->jabatan_id ?>"><?php echo $data->nama_jabatan ?></option>
												<?php } ?>
											<?php } ?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Departemen <?php echo form_error('departemen_id') ?></td>
									<td>
										<select name="departemen_id" class="form-control theSelect">
											<option value="">-- Pilih -- </option>
											<?php foreach ($departemen as $key => $data) { ?>
												<?php if ($departemen_id == $data->departemen_id) { ?>
													<option value="<?php echo $data->departemen_id ?>" selected><?php echo $data->nama_departemen ?></option>
												<?php } else { ?>
													<option value="<?php echo $data->departemen_id ?>"><?php echo $data->nama_departemen ?></option>
												<?php } ?>
											<?php } ?>
										</select>
									</td>

								</tr>

								<tr>
									<td>Alamat <?php echo form_error('alamat') ?></td>
									<td> <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea></td>
								</tr>
								<tr>
									<td>Jenis Kelamin <?php echo form_error('jenis_kelamin') ?></td>
									<td>
										<select name="jenis_kelamin" class="form-control theSelect" value="<?= $jenis_kelamin ?>">
											<option value="">-- Pilih --</option>
											<option value="Perempuan" <?php echo $jenis_kelamin == 'Perempuan' ? 'selected' : 'null' ?>>Perempuan</option>
											<option value="Laki-laki" <?php echo $jenis_kelamin == 'Laki-laki' ? 'selected' : 'null' ?>>Laki-laki</option>
										</select>
									</td>
								</tr>
								<tr>
									<td>Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></td>
									<td><input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" /></td>
								</tr>
								<tr>
									<td>Tanggal Masuk <?php echo form_error('tanggal_masuk') ?></td>
									<td><input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" placeholder="Tanggal Masuk" value="<?php echo $tanggal_masuk; ?>" /></td>
								</tr>
								<tr>
									<td>No Telpon <?php echo form_error('no_telpon') ?></td>
									<td><input type="text" class="form-control" name="no_telpon" id="no_telpon" placeholder="No Telpon" value="<?php echo $no_telpon; ?>" /></td>
								</tr>
								<tr>
									<td>Status Karyawan <?php echo form_error('status_karyawan') ?></td>
									<td>
										<select name="status_karyawan" class="form-control theSelect" value="<?= $status_karyawan ?>">
											<option value="">-- Pilih --</option>
											<option value="Aktif" <?php echo $status_karyawan == 'Aktif' ? 'selected' : 'null' ?>>Aktif</option>
											<option value="Tidak Aktif" <?php echo $status_karyawan == 'Tidak Aktif' ? 'selected' : 'null' ?>>Tidak Aktif</option>
										</select>
									</td>
								</tr>
								<tr>
									<td></td>
									<td><input type="hidden" name="karyawan_id" value="<?php echo $karyawan_id; ?>" />
										<button type="submit" class="btn btn-danger"><i class="fa fa-save"></i> <?php echo $button ?></button>
										<a href="<?php echo site_url('karyawan') ?>" class="btn btn-info"><i class="fa fa-undo"></i> Kembali</a>
									</td>
								</tr>
						</thead>
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
