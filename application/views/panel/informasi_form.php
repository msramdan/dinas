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
                    <h4 class="panel-title">Data INFORMASI</h4>
                </div>
                <div class="panel-body">

                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                        <thead>
                            <table id="data-table-default"
                                class="table  table-bordered table-hover table-td-valign-middle">
                                <tr>
                                    <td>Judul <?php echo form_error('judul') ?></td>
                                    <td><input type="text" class="form-control" name="judul" id="judul"
                                            placeholder="Judul" value="<?php echo $judul; ?>" /></td>
                                </tr>

                                <tr>
                                    <td>Kategori <?php echo form_error('kategori_id') ?></td>
                                    <td>
                                        <select name="kategori_id" class="form-control theSelect">
                                            <option value="">-- Pilih -- </option>
                                            <?php foreach ($kategori_data as $key => $data) { ?>
                                            <?php if ($kategori_id == $data->kategori_id) { ?>
                                            <option value="<?php echo $data->kategori_id ?>" selected>
                                                <?php echo $data->nama_kategori ?></option>
                                            <?php } else { ?>
                                            <option value="<?php echo $data->kategori_id ?>">
                                                <?php echo $data->nama_kategori ?></option>
                                            <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Deskripsi <?php echo form_error('deskripsi') ?></td>
                                    <td> <textarea class="form-control" rows="3" name="deskripsi" id="deskripsi"
                                            placeholder="Deskripsi"><?php echo $deskripsi; ?></textarea></td>
                                </tr>
                                <?php if ($this->uri->segment(2) == 'create_informasi' || $this->uri->segment(2) == 'create_action_informasi') { ?>
                                <tr>
                                    <td>Thumbnail <?php echo form_error('thumbnail') ?></td>
                                    <td><input type="file" class="form-control" name="thumbnail" id="thumbnail"
                                            placeholder="thumbnail" required="" value=""
                                            onchange="return validasiEkstensi()" />
                                        <!-- <div id="preview"></div> -->
                                    </td>
                                </tr>
                                <?php } else { ?>
                                <div class="form-group">
                                    <tr>
                                        <td>Thumbnail <?php echo form_error('thumbnail') ?></td>
                                        <td>
                                            <a href="#modal-dialog" data-bs-toggle="modal"><img
                                                    src="<?php echo base_url(); ?>temp/img/<?= $thumbnail ?>"
                                                    style="width: 150px;height: 150px;border-radius: 5%;"></img></a>
                                            <input type="hidden" name="thumbnail_lama" value="<?= $thumbnail ?>">
                                            <p style="color: red">Note :Pilih thumbnail Jika Ingin Merubah thumbnail</p>
                                            <input type="file" class="form-control" name="thumbnail" id="thumbnail"
                                                placeholder="thumbnail" value="" onchange="return validasiEkstensi()" />
                                            <!-- <div id="preview"></div> -->
                                        </td>

                                    </tr>
                                </div>
                                <?php } ?>


                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="informasi_id" value="<?php echo $informasi_id; ?>" />
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i>
                                            <?php echo $button ?></button>
                                        <a href="<?php echo site_url('panel/informasi') ?>" class="btn btn-info"><i
                                                class="fa fa-undo"></i> Kembali</a>
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
