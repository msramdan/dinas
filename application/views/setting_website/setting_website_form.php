<div id="content" class="content">
    <ol class="breadcrumb pull-right">
        <li><a href="javascript:;">Dashboard</a></li>
        <li class="active">Setting_website</li>
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
                    <h4 class="panel-title">Data SETTING_WEBSITE</h4>
                </div>
                <div class="panel-body">

                    <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
                        <thead>
                            <table id="data-table-default"
                                class="table  table-bordered table-hover table-td-valign-middle">
                                <tr>
                                    <td>Nama Website <?php echo form_error('nama_website') ?></td>
                                    <td><input type="text" class="form-control" name="nama_website" id="nama_website"
                                            placeholder="Nama Website" value="<?php echo $nama_website; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Logo Dark <?php echo form_error('logo_dark') ?></td>
                                    <td>
                                        <a href="#modal-dialog" data-bs-toggle="modal"><img
                                                src="<?php echo base_url();?>temp/img/<?=$logo_dark?>"
                                                style="width: 200px;border-radius: 50%;"></img></a>
                                        <input type="hidden" name="logo_dark_lama" value="<?=$logo_dark?>">
                                        <p style="color: red">Note :Pilih logo_dark Jika Ingin Merubahnya || Saran
                                            Ukuran 200px*45px</p>
                                        <input type="file" class="form-control" name="logo_dark" id="logo_dark"
                                            placeholder="logo_dark" value="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Logo Light <?php echo form_error('logo_light') ?></td>
                                    <td>
                                        <a href="#modal-dialog" data-bs-toggle="modal"><img
                                                src="<?php echo base_url();?>temp/img/<?=$logo_light?>"
                                                style="width: 200px;border-radius: 50%;"></img></a>
                                        <input type="hidden" name="logo_light_lama" value="<?=$logo_light?>">
                                        <p style="color: red">Note :Pilih logo_light Jika Ingin Merubahnya || Saran
                                            Ukuran 200px*45px</p>
                                        <input type="file" class="form-control" name="logo_light" id="logo_light"
                                            placeholder="logo_light" value="" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Telpon <?php echo form_error('telpon') ?></td>
                                    <td><input type="text" class="form-control" name="telpon" id="telpon"
                                            placeholder="Telpon" value="<?php echo $telpon; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Email <?php echo form_error('email') ?></td>
                                    <td><input type="text" class="form-control" name="email" id="email"
                                            placeholder="Email" value="<?php echo $email; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Alamat <?php echo form_error('alamat') ?></td>
                                    <td> <textarea class="form-control" rows="3" name="alamat" id="alamat"
                                            placeholder="Alamat"><?php echo $alamat; ?></textarea></td>
                                </tr>

                                <tr>
                                    <td>About Us <?php echo form_error('about_us') ?></td>
                                    <td> <textarea class="form-control" rows="10" name="about_us" id="about_us"
                                            placeholder="About Us"><?php echo $about_us; ?></textarea></td>
                                </tr>
                                <tr>
                                    <td>Url Fb <?php echo form_error('url_fb') ?></td>
                                    <td><input type="text" class="form-control" name="url_fb" id="url_fb"
                                            placeholder="Url Fb" value="<?php echo $url_fb; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Url Yt <?php echo form_error('url_yt') ?></td>
                                    <td><input type="text" class="form-control" name="url_yt" id="url_yt"
                                            placeholder="Url Yt" value="<?php echo $url_yt; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Url Ig <?php echo form_error('url_ig') ?></td>
                                    <td><input type="text" class="form-control" name="url_ig" id="url_ig"
                                            placeholder="Url Ig" value="<?php echo $url_ig; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Url Twitter <?php echo form_error('url_twitter') ?></td>
                                    <td><input type="text" class="form-control" name="url_twitter" id="url_twitter"
                                            placeholder="Url Twitter" value="<?php echo $url_twitter; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Peta Lokasi <?php echo form_error('peta_lokasi') ?></td>
                                    <td><input type="text" class="form-control" name="peta_lokasi" id="peta_lokasi"
                                            placeholder="Peta Lokasi" value="<?php echo $peta_lokasi; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="setting_website"
                                            value="<?php echo $setting_website; ?>" />
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i>
                                            <?php echo $button ?></button>
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