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
                    <h4 class="panel-title">Data USER_DINAS</h4>
                </div>
                <div class="panel-body">

                    <form action="<?php echo $action; ?>" method="post">
                        <thead>
                            <table id="data-table-default"
                                class="table  table-bordered table-hover table-td-valign-middle">
                                <tr>
                                    <td>Username <?php echo form_error('username') ?></td>
                                    <td><input type="text" class="form-control" name="username" id="username"
                                            placeholder="Username" value="<?php echo $username; ?>" /></td>
                                </tr>
                                <?php if ($this->uri->segment(2) == "create" || $this->uri->segment(2) == "create_action") { ?>
                                <tr>
                                    <td>Password <?php echo form_error('password') ?></td>
                                    <td><input type="password" class="form-control" name="password" id="password"
                                            placeholder="Password" value="<?php echo $password; ?>" /></td>
                                </tr>
                                <?php } else { ?>
                                <tr>
                                    <td>Password <?php echo form_error('password') ?></td>
                                    <td><input type="password" class="form-control" name="password" id="password"
                                            placeholder="Password" value="" />
                                        <small style="color: red">(Biarkan kosong jika tidak diganti)</small>
                                    </td>
                                </tr>
                                <?php } ?>

                                <tr>
                                    <td>Dinas <?php echo form_error('dinas_id') ?></td>
                                    <td>
                                        <select name="dinas_id" class="form-control theSelect">
                                            <option value="">-- Pilih -- </option>
                                            <?php foreach ($dinas_data as $key => $data) { ?>
                                            <?php if ($dinas_id == $data->dinas_id) { ?>
                                            <option value="<?php echo $data->dinas_id ?>" selected>
                                                <?php echo $data->nama_dinas ?></option>
                                            <?php } else { ?>
                                            <option value="<?php echo $data->dinas_id ?>">
                                                <?php echo $data->nama_dinas ?></option>
                                            <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Email <?php echo form_error('email') ?></td>
                                    <td><input type="text" class="form-control" name="email" id="email"
                                            placeholder="Email" value="<?php echo $email; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>No Telpon <?php echo form_error('no_telpon') ?></td>
                                    <td><input type="text" class="form-control" name="no_telpon" id="no_telpon"
                                            placeholder="No Telpon" value="<?php echo $no_telpon; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Kelompok <?php echo form_error('kelompok') ?></td>
                                    <td><input type="text" class="form-control" name="kelompok" id="kelompok"
                                            placeholder="Kelompok" value="<?php echo $kelompok; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Input Informasi <?php echo form_error('can_input_informasi') ?></td>
                                    <td><input type="checkbox" name="can_input_informasi" value="Ya"
                                            <?= $can_input_informasi == 'Ya' ? 'checked' : ''; ?>></td>
                                </tr>
                                <tr>
                                    <td>Input Data Komoditas <?php echo form_error('can_input_komoditas') ?></td>
                                    <td><input type="checkbox" name="can_input_komoditas" value="Ya"
                                            <?= $can_input_komoditas == 'Ya' ? 'checked' : ''; ?>></td>
                                </tr>
                                <tr>
                                    <td>Update Harga <?php echo form_error('can_update_harga') ?></td>
                                    <td><input type="checkbox" name="can_update_harga" value="Ya"
                                            <?= $can_update_harga == 'Ya' ? 'checked' : ''; ?>></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="user_dinas_id"
                                            value="<?php echo $user_dinas_id; ?>" />
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i>
                                            <?php echo $button ?></button>
                                        <a href="<?php echo site_url('user_dinas') ?>" class="btn btn-info"><i
                                                class="fa fa-undo"></i> Kembali</a>
                                    </td>
                                </tr>
                        </thead>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        </ div>
    </div>