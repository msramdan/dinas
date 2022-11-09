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
                    <h4 class="panel-title">Data KOMODITAS</h4>
                </div>
                <div class="panel-body">

                    <form action="<?php echo $action; ?>" method="post">
                        <thead>
                            <table id="data-table-default"
                                class="table  table-bordered table-hover table-td-valign-middle">
                                <tr>
                                    <td>Tgl Update <?php echo form_error('tgl_update') ?></td>
                                    <td><input type="date" class="form-control" name="tgl_update" id="tgl_update"
                                            placeholder="Tgl Update" value="<?php echo $tgl_update; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Produk <?php echo form_error('produk_id') ?></td>
                                    <td>
                                        <select name="produk_id" class="form-control theSelect">
                                            <option value="">-- Pilih -- </option>
                                            <?php foreach ($produk_data as $key => $data) { ?>
                                            <?php if ($produk_id == $data->produk_id) { ?>
                                            <option value="<?php echo $data->produk_id ?>" selected>
                                                <?php echo $data->nama_produk ?></option>
                                            <?php } else { ?>
                                            <option value="<?php echo $data->produk_id ?>">
                                                <?php echo $data->nama_produk ?></option>
                                            <?php } ?>
                                            <?php } ?>
                                        </select>
                                    </td>
                                </tr>

                                <tr>
                                    <td>Stok (Ton) <?php echo form_error('stok') ?></td>
                                    <td><input type="number" class="form-control" name="stok" id="stok"
                                            placeholder="Stok" value="<?php echo $stok; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Rencana Produksi (Ton) <?php echo form_error('rencana_produksi') ?></td>
                                    <td><input type="number" class="form-control" name="rencana_produksi"
                                            id="rencana_produksi" placeholder="Rencana Produksi"
                                            value="<?php echo $rencana_produksi; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Ketahanan (Bulan) <?php echo form_error('ketahanan_bulanan') ?></td>
                                    <td><input type="number" class="form-control" name="ketahanan_bulanan"
                                            id="ketahanan_bulanan" placeholder="Ketahanan Bulanan"
                                            value="<?php echo $ketahanan_bulanan; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Bulan Tahun <?php echo form_error('bulan_tahun') ?></td>
                                    <td><input type="month" class="form-control" name="bulan_tahun" id="bulan_tahun"
                                            placeholder="Ketahanan Bulanan" value="<?php echo $bulan_tahun; ?>" /></td>
                                </tr>
                                <tr>
                                    <td>Data Minggu Ke - Jml Produksi (Kg) <?php echo form_error('data_minggu') ?> <br>
                                        <?php echo form_error('jml_produksi_minggu') ?>
                                    </td>
                                    <td>

                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <input type="number" class="form-control" name="data_minggu"
                                                    id="data_minggu" placeholder=" Data Minggu Ke"
                                                    value="<?php echo $data_minggu; ?>" />
                                            </div>

                                            <div class="col-md-6">
                                                <input type="number" class="form-control" name="jml_produksi_minggu"
                                                    id="jml_produksi_minggu" placeholder="Jml Produksi (Kg)"
                                                    value="<?php echo $jml_produksi_minggu; ?>" />
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Harga Dari Produsen (Kg)<?php echo form_error('harga_dari_produsen') ?></td>
                                    <td><input type="number" class="form-control" name="harga_dari_produsen"
                                            id="harga_dari_produsen" placeholder="Harga Dari Produsen"
                                            value="<?php echo $harga_dari_produsen; ?>" /></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><input type="hidden" name="komoditas_id" value="<?php echo $komoditas_id; ?>" />
                                        <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i>
                                            <?php echo $button ?></button>
                                        <a href="<?php echo site_url('panel/komoditas') ?>" class="btn btn-info"><i
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
